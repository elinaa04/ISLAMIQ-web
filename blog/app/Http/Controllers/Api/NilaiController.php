<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function saveNilai(Request $request)
    {
        $request->validate([
            'id_latihan' => 'required|exists:latsol,id_latihan',
            'ni' => 'required|exists:users,ni',
            'nilai' => 'required|numeric',
        ]);

        $nilai = Nilai::create([
            'id_latihan' => $request->id_latihan,
            'ni' => $request->ni,
            'nilai' => $request->nilai,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Nilai berhasil disimpan.',
            'data' => $nilai,
        ], 201);
    }
}
