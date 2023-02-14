<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Voucher;
use Illuminate\Http\Request;

class AktivasiController extends Controller
{
    public function index(Request $request)
    {
        $data = Voucher::find($request->id);
        if ($data->status == 'non-aktif') {
            $data->status = 'aktif';
            $data->update();
            History::create([
                'history' => 'Berhasil melakukan Aktivasi pada ID ' . $request->id,
                'jenis' => 'aktivasi'
            ]);
            if ($data) {
                return response()->json([
                    'status' => TRUE,
                    'message' => 'Berhasil aktivasi',
                ]);
            } else {
                return response()->json([
                    'status' => TRUE,
                    'message' => 'Gagal aktivasi',
                ]);
            }
        } else {
            return response()->json([
                'status' => FALSE,
                'message' => 'Kartu anda sudah aktif',
            ]);
        }
    }
}
