@extends('layouts.sidebar')

@section('title')
Edit Latsol
@stop

@section('css')

@stop

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>EDIT DATA LATIHAN SOAL</h1>
    <div class="row justify-content-center">
        <div class="container-fluid">
            <p>
                <a class="btn" href="{{ route('latsol') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Kembali</a>
            </p>
            <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                Latihan Soal
            </h5>
            <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <div class="card-body">
                    <form id="formSimpan" method="post" action="{{ route('updateLatsol', $latihanSoal->id_latihan) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-3 col">
                                    <label for="judulMateri" class="col-sm-4 col-form-label" style="font-weight: bold;">Materi</label>
                                    <div class="col-sm-12">
                                        <select id="judulMateri" name="judulMateri" class="form-control" required>
                                            @foreach ($bks as $bk)
                                            <option value="{{ $bk->judulMateri }}" @if($latihanSoal->judulMateri == $bk->judulMateri) selected @endif>{{ $bk->judulMateri }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="isiLatihanSoal" class="col-sm-4 col-form-label" style="font-weight: bold;">Soal</label>
                                    <div class="col-sm-12">
                                        <textarea style="height: 88px;" id="isiLatihanSoal" name="isiLatihanSoal" class="form-control" value="{{ $latihanSoal->isiLatihanSoal }}" placeholder="Masukkan pertanyaan">{{ $latihanSoal->isiLatihanSoal }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="nilai" class="col-sm-4 col-form-label" style="font-weight: bold;">Nilai Soal</label>
                                    <div class="col-sm-12">
                                        <input type="numeric" id="nilai" name="nilai" class="form-control" value="{{ $latihanSoal->nilai }}" placeholder="Masukkan nilai per soal">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan1" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 1</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan1" name="pilihan1" class="form-control" value="{{ $latihanSoal->pilihan1 }}" placeholder="Masukkan pilihan 1">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan2" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 2</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan2" name="pilihan2" class="form-control" value="{{ $latihanSoal->pilihan2 }}" placeholder="Masukkan pilihan 2">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan3" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 3</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan3" name="pilihan3" class="form-control" value="{{ $latihanSoal->pilihan3 }}" placeholder="Masukkan pilihan 3">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan4" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 4</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan4" name="pilihan4" class="form-control" value="{{ $latihanSoal->pilihan4 }}" placeholder="Masukkan pilihan 4">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="jawaban" class="col-sm-4 col-form-label" style="font-weight: bold;">Jawaban</label>
                                    <div class="col-sm-12">
                                        <select id="jawaban" name="jawaban" class="form-control" required>
                                            <option value="pilihan1" @if($latihanSoal->jawaban == 'pilihan1') selected @endif>Pilihan 1</option>
                                            <option value="pilihan2" @if($latihanSoal->jawaban == 'pilihan2') selected @endif>Pilihan 2</option>
                                            <option value="pilihan3" @if($latihanSoal->jawaban == 'pilihan3') selected @endif>Pilihan 3</option>
                                            <option value="pilihan4" @if($latihanSoal->jawaban == 'pilihan4') selected @endif>Pilihan 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center" style="background-color: #FFFFFF; padding: 10px;">
                            <button type="submit" class="btn" style="background-color: #79CD7B; border-radius: 10px; color: #ffffff;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection