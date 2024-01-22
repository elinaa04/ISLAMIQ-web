<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Barryvdh\DomPDF\PDF as PDF;

class ReportController extends Controller
{
    // public function generateUserListPDF($role)
    // {
    //     $users = User::all();

    //     $data = [
    //         'title' => 'Daftar User',
    //         'users' => $users,
    //     ];

    //     $pdf = app('dompdf.wrapper'); // Create an instance of the PDF class
    //     $pdf->loadView('home.show', $data);

    //     return $pdf->stream('daftar_user.pdf');
    // }

    public function generateUserListPDF($role)
    {
        // Ambil hanya user dengan role yang sesuai
        $users = User::where('role', $role)->get();

        $data = [
            'title' => "Daftar $role",
            'users' => $users,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('home.show', $data);

        return $pdf->stream($role . '_user_list.pdf');

    }
}
