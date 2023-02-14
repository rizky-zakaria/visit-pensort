<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VoucherController extends Controller
{
    public function cetakVoucher()
    {
        $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'php.net');
        $data = "https://3073-36-75-187-95.ap.ngrok.io/voucher/view-voucher/" . $uuid5;
        $qrcode = QrCode::size(400)->generate($data);
        return view('qrcode.index', compact('qrcode', 'data'));
    }

    public function cetakVoucherBanyak(Request $request)
    {
        $view = array();
        for ($i = 0; $i < $request->jumlah; $i++) {
            $uuid5 = rand(0, 9999) . rand(0, 9999) . $i . rand(0, 123456) . date('ymdHis');
            $data = "http://localhost:8000/voucher/view-voucher/" . $uuid5;
            $qrcode = QrCode::size(100)->generate($uuid5);
            array_push($view, $qrcode);
            $post = new Voucher;
            $post->id = $uuid5;
            $post->saldo = 100000;
            $post->status = 'non-aktif';
            $post->save();
        }
        History::create([
            'history' => 'Berhasil menggenerate voucher sebanyak: ' . $request->jumlah . ' pcs',
            'jenis' => 'generate'
        ]);
        return view('qrcode.banyak', compact('view'));
    }

    public function viewVoucher($id)
    {
        $id = $id;
        return view('scan.index', compact('id'));
    }

    public function transaksi(Request $request)
    {
        // dd($request);
        $kurang = $request->saldo * 5000;
        $data = Voucher::find($request->id);
        if ($kurang > $data->saldo) {
            echo "gagal";
        } else {
            $data->saldo = $data->saldo - $kurang;
            $data->update();
        }
        return redirect('/');
    }
}
