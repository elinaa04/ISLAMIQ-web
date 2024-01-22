<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use App\Models\Profil;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = auth()->user();

        $bks = Profil::find($user->ni);
        if (!$bks) {
            return response()->json([
                'status' => false,
                'message' => 'Profil tidak ditemukan',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $user,
        ]);
    }

    // public function update(Request $request, $ni)
    // {
    //     $user = auth()->user();

    //     $bks = Profil::find($user->ni);

    //     if (!$bks) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Profil tidak ditemukan',
    //         ], 404);
    //     }

    //     $data = $request->validate([
    //         'namaLengkap' => ['nullable', 'regex:/^[^\d]+$/'],
    //         'tanggalLahir' => 'nullable',
    //         'jenisKelamin' => 'nullable',
    //         'image' => 'image|file|max:2024|nullable',
    //     ]);

    //     // if ($request->file('image')) {
    //     //     if ($bks->image) {
    //     //         Storage::delete($bks->image);
    //     //     }
    //     //     $data['image'] = $request->file('image')->store('post-images');
    //     // }

    //     $bks->update($data);
    //     $updatedProfil = Profil::find($user->ni);

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Profil berhasil diupdate',
    //         'data' => $updatedProfil,
    //     ]);
    // }


    //BARU IKI
    public function update(Request $request, $ni)
    {
        $user = auth()->user();

        $profil = Profil::find($user->ni);

        if (!$profil) {
            return response()->json([
                'status' => false,
                'message' => 'Profil tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'namaLengkap' => ['nullable', 'regex:/^[a-zA-Z\s]+$/'],
            'tanggalLahir' => 'nullable',
            'jenisKelamin' => 'nullable',
            'image' => 'image|file|max:2024|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memvalidasi data',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $profil->update($request->all());
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui profil. ' . $e->getMessage(),
            ], 500);
        }

        $updatedProfil = Profil::find($user->ni);

        return response()->json([
            'status' => true,
            'message' => 'Profil berhasil diupdate',
            'data' => $updatedProfil,
        ]);
    }
}
