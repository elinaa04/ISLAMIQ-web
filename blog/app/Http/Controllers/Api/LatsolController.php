<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Latsol;

class LatsolController extends Controller
{
    public function index()
    {
        $latihanSoal = Latsol::all();

        return response([
            'status' => true,
            'message' => 'Daftar Latihan Soal',
            'latsol' => $latihanSoal,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judulMateri' => 'required',
            'isiLatihanSoal' => 'required',
            'nilai' => 'required | numeric',
            'pilihan1' => 'required',
            'pilihan2' => 'required',
            'pilihan3' => 'required',
            'pilihan4' => 'required',
            'jawaban' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data yang Anda masukkan tidak valid',
                'error' => $validator->errors(),
            ]);
        }

        $bks = Latsol::create([
            'judulMateri' => $request->judulMateri,
            'isiLatihanSoal' => $request->isiLatihanSoal,
            'nilai' => $request->nilai,
            'pilihan1' => $request->pilihan1,
            'pilihan2' => $request->pilihan2,
            'pilihan3' => $request->pilihan3,
            'pilihan4' => $request->pilihan4,
            'jawaban' => $request->jawaban,
        ]);

        $bks['jawaban'] = $request->input('jawaban');

        return response([
            'status' => true,
            'message' => 'Latihan Soal ' . $bks->judulMateri . ' berhasil ditambahkan',
            'latsol' => $bks,
        ], 200);
    }

    public function update(Request $request, $id_latihan)
    {
        $request->validate([
            'judulMateri' => 'nullable',
            'isiLatihanSoal' => 'nullable',
            'nilai' => 'nullable|numeric',
            'pilihan1' => 'nullable',
            'pilihan2' => 'nullable',
            'pilihan3' => 'nullable',
            'pilihan4' => 'nullable',
            'jawaban' => 'nullable',
        ]);

        $latihanSoal = Latsol::find($id_latihan);

        if (!$latihanSoal) {
            return response()->json([
                'status' => false,
                'message' => 'Data latihan soal tidak ditemukan.',
            ], 404);
        }

        $latihanSoal->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data latihan soal berhasil diperbarui.',
            'latsol' => $latihanSoal,
        ], 200);
    }

    public function destroy($id_latihan)
    {
        $latihanSoal = Latsol::find($id_latihan);

        if (!$latihanSoal) {
            return response()->json([
                'status' => false,
                'message' => 'Data latihan soal tidak ditemukan.',
            ], 404);
        }

        $latihanSoal->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data latihan soal berhasil dihapus.',
        ], 200);
    }
}
