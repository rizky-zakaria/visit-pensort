<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasukController extends Controller
{
    public function index(Request $request)
    {
        $pass = User::where('pin', $request->pin)->first();
        if ($pass->password) {
            return response()->json([
                'status' => TRUE,
                'message' => 'Berhasil login',
                'data' => $pass
            ]);
        } else {
            return response()->json([
                'status' => TRUE,
                'message' => 'Gagal login',
            ]);
        }
    }
}
