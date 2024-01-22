<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Materi;

class HomeController extends Controller
{
    public function index()
    {
        $report = new Report();

        $totalSiswa = $report->getTotalUsers('siswa');
        $totalGuru = $report->getTotalUsers('guru');

        return view('home.home', [
            'totalSiswa' => $totalSiswa,
            'totalGuru' => $totalGuru,
            // 'totalMateri' => $report->getTotalMateri(),
            // 'totalLatihanSoal' => $report->getTotalLatihanSoal(),
            // 'totalNilai' => $report->getTotalNilai(),
        ]);
    }
}
