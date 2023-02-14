<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Voucher;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transaksi(Request $request)
    {
        $post = Voucher::find($request->id);
        if ($post->status == 'aktif') {
            $saldo = $request->saldo * 5000;
            if ($post->saldo < $request->saldo) {
                return response()->json([
                    'status' => FALSE,
                    'message' => 'Saldo tidak cukup'
                ]);
            } else {
                $post->saldo = $post->saldo - $request->saldo;
                $post->update();
                History::create([
                    'history' => 'Berhasil melakukan transaksi pada ID ' . $request->id,
                    'jenis' => 'transaksi'
                ]);
                return response()->json([
                    'status' => TRUE,
                    'message' => 'Berhasil melakukan transaksi'
                ]);
            }
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Kartu anda belum diaktivasi'
            ]);
        }
    }

    public function history()
    {
        $data = History::orderBy('created_at')->get();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan data',
            'data' => $data
        ]);
    }

    public function cekSaldo(Request $request)
    {
        $post = Voucher::find($request->id);
        if ($post) {
            return response()->json([
                'status' => TRUE,
                'message' => 'Saldo anda:',
                'data' => $post
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Gagal mendapatkan saldo'
            ]);
        }
    }

    public function topup(Request $request)
    {
        $post = Voucher::find($request->id);
        if ($post->status == 'aktif') {
            $post->saldo = $post->saldo + $request->saldo;
            $post->update();
            History::create([
                'history' => 'Berhasil melakukan TopUP pada ID ' . $request->id,
                'jenis' => 'topup'
            ]);
            return response()->json([
                'status' => TRUE,
                'message' => 'Berhasil melakukan topup'
            ]);
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Kartu anda belum diaktivasi'
            ]);
        }
    }
}
