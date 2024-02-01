<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Barryvdh\DomPDF\PDF as PDF;

class ReportController extends Controller
{
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
