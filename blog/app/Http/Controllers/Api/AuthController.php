<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());

        $validateData = Validator::make($request->all(), [
            "ni" => "required|integer",
            "password" => "required",
            "role" => "required|in:siswa,guru,kepsek",
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validateData->errors(),
            ]);
        }

        $user = User::create([
            "ni" => $request->input('ni'),
            "password" => $request->password,
            "role" => $request->role,
        ]);


        if ($user->save()) {
            //akan dijalankan jika penyimpanan berhasil
            dd($request->input('ni')); // Sebelum penyimpanan
            $user->save();
            dd($user->ni); // Setelah penyimpanan

            return response()->json([
                'status' => true,
                'message' => 'Insert ke database berhasil',
                'data' => $user,
            ]);
        } else {
            //akan dijalankan jika penyimpanan gagal
            dd($request->input('ni')); // Sebelum penyimpanan
            $user->save();
            dd($user->ni); // Setelah penyimpanan

            return response()->json([
                'status' => false,
                'message' => 'Insert ke database gagal',
                'data' => $user,
            ]);
        }
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            "ni" => "required",
            "password" => "required",
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json([
                'status' => false,
                'message' => 'login atau password salah',
            ]);
        }
        $user = auth()->user();

        if ($user->role === 'guru') {
            $token = $user->createToken('auth_token');

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'role' => $user->role,
                'access_token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Akses ditolak',
            ]);
        }
    }

    public function loginSiswa(Request $request)
    {
        $loginData = $request->validate([
            "ni" => "required",
            "password" => "required",
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json([
                'status' => false,
                'message' => 'login atau password salah',
            ]);
        }

        $user = auth()->user();

        if ($user->role === 'siswa') {
            $token = $user->createToken('auth_token');

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'role' => $user->role,
                'access_token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Akses ditolak',
            ]);
        }
    }

    public function ubahPassword(Request $request)
    {
        if (!Hash::check($request->passwordLama, auth()->user()->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password lama tidak sesuai!',
            ]);
        }

        if ($request->passwordBaru != $request->repeatPassword) {
            return response()->json([
                'status' => false,
                'message' => 'Password baru tidak sama!',
            ]);
        }

        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->passwordBaru),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Update password berhasil',
            'data' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        // Periksa apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            // Logout pengguna
            Auth::logout();

            // Menonaktifkan sesi
            $request->session()->invalidate();

            // Regenerasi token CSRF
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Berhasil keluar dari aplikasi']);
    }
}
