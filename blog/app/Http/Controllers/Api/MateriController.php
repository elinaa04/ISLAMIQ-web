<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Materi;
use Barryvdh\DomPDF\PDF as PDF;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::all();

        return response([
            'status' => true,
            'message' => 'Daftar Materi',
            'materis' => $materis,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judulMateri' => 'required',
            'fileMateri' => 'required|mimes:pdf|max:20480', // 20MB limit
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data yang Anda masukkan tidak valid',
                'error' => $validator->errors(),
            ]);
        }

        $data = $request->all();

        // menangani unggahan file
        if ($request->hasFile('fileMateri')) {
            $file = $request->file('fileMateri');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['fileMateri'] = $fileName;
        }

        $materi = Materi::create($data);

        return response([
            'status' => true,
            'message' => 'Materi ' . $materi->judulMateri . ' berhasil ditambahkan',
            'materi' => $materi,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judulMateri' => 'required|max:255',
            'fileMateri' => 'nullable|mimes:pdf|max:20480', // 20MB limit
        ]);

        $updatedMateri = Materi::find($id);

        if (!$updatedMateri) {
            return response()->json([
                'status' => false,
                'message' => 'Materi tidak ditemukan.',
            ], 404);
        }

        $data = $request->only('judulMateri');

        if ($request->hasFile('fileMateri')) {
            $file = $request->file('fileMateri');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['fileMateri'] = $fileName;
        }

        Materi::where('id_materi', $id)->update($data);

        $updatedMateri = Materi::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Data materi berhasil diperbarui.',
            'materi' => $updatedMateri,
        ], 200);
    }

    public function destroy($id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json([
                'status' => false,
                'message' => 'Materi tidak ditemukan.',
            ], 404);
        }

        if ($materi->fileMateri && file_exists(public_path('uploads/' . $materi->fileMateri))) {
            unlink(public_path('uploads/' . $materi->fileMateri));
        }

        $materi->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data materi berhasil dihapus.',
        ], 200);
    }

    // Untuk menampilkan file pdf
    public function show($id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json([
                'status' => false,
                'message' => 'Materi tidak ditemukan.',
            ], 404);
        }

        $file_path = public_path('uploads/' . $materi->fileMateri);

        if (file_exists($file_path)) {
            $pdf_url = asset('uploads/' . $materi->fileMateri);

            return response()->json([
                'status' => true,
                'message' => 'Materi details retrieved successfully',
                'materi' => [
                    'id_materi' => $materi->id_materi,
                    'judulMateri' => $materi->judulMateri,
                    'fileMateri' => $materi->fileMateri,
                    'pdf_url' => $pdf_url,
                ],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'File Materi tidak ditemukan.',
            ], 404);
        }
    }
}
