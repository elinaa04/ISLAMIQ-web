<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latsol;
use App\Models\Materi;
use App\Models\Nilai;

class LatsolController extends Controller
{
    public function latsol()
    {
        $latihanSoal = Latsol::all();

        return view('latsol.latsol', ['latihanSoal' => $latihanSoal]);
    }

    public function tambahLatsol()
    {
        $bks = Materi::all();
        return view('latsol.create', compact('bks'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'judulMateri' => 'required',
            'isiLatihanSoal' => 'required',
            'nilai' => 'required|numeric',
            'pilihan1' => 'required',
            'pilihan2' => 'required',
            'pilihan3' => 'required',
            'pilihan4' => 'required',
            'jawaban' => 'required',
        ]);

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

        // Nilai::create([
        //     'id_latihan' => $bks->id_latihan, // Assuming id_latihan is the primary key of latihansoal
        //     'nilai' => $request->nilai,
        // ]);

        return redirect('latsol')->with('status', 'Data latihan soal berhasil ditambahkan.');
    }

    public function show($id_latihan)
    {
        $latihanSoal = latsol::find($id_latihan);

        return view('latsol.show', compact('latihanSoal'));
    }

    public function edit($id_latihan)
    {
        $latihanSoal = latsol::find($id_latihan);
        $bks = Materi::all();
        return view('latsol.edit', compact('latihanSoal', 'bks'));
    }

    public function update(Request $request, $id_latihan)
    {
        $request->validate([
            'judulMateri' => 'required',
            'isiLatihanSoal' => 'required',
            'nilai' => 'required|numeric',
            'pilihan1' => 'required',
            'pilihan2' => 'required',
            'pilihan3' => 'required',
            'pilihan4' => 'required',
            'jawaban' => 'required',
        ]);

        $latihanSoal = Latsol::find($id_latihan);

        $latihanSoal->update([
            'judulMateri' => $request->judulMateri,
            'isiLatihanSoal' => $request->isiLatihanSoal,
            'nilai' => $request->nilai,
            'pilihan1' => $request->pilihan1,
            'pilihan2' => $request->pilihan2,
            'pilihan3' => $request->pilihan3,
            'pilihan4' => $request->pilihan4,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->route('latsol')->with('success', 'Data latihan soal berhasil diperbarui.');
    }

    public function destroy($id_latihan)
    {
        $bks = Latsol::find($id_latihan);

        $bks->delete();

        return redirect()->route('latsol')->with('success', 'Data materi berhasil dihapus.');
    }
}
