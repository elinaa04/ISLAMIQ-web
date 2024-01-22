@extends('layouts.sidebar')

@section('title')
Tambah Latsol
@stop

@section('css')

@stop

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>TAMBAH LATIHAN SOAL</h1>
    <div class="row justify-content-center">
        <div class="container-fluid">
            <p>
                <a class="btn" href="{{ route('latsol') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Kembali</a>
            </p>
            <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                Latihan Soal
            </h5>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Maaf!</strong> Terdapat kesalahan dengan inputan Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="formSimpan" method="post" action="{{ route('tambahLatsol') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-3 col">
                                    <div class="form-group">
                                        <label for="judulMateri" class="col-sm-4 col-form-label" style="font-weight: bold;">Materi</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="position-option" name="judulMateri">
                                                @foreach ($bks as $bk)
                                                <option value="{{ $bk->judulMateri }}">{{ $bk->judulMateri }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="isiLatihanSoal" class="col-sm-4 col-form-label" style="font-weight: bold;">Soal</label>
                                    <div class="col-sm-12">
                                        <textarea style="height: 88px; " type="text" id="isiLatihanSoal" name="isiLatihanSoal" class="form-control" value="{{ old('isiLatihanSoal') }}" placeholder="Masukkan pertanyaan"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="nilai" class="col-sm-4 col-form-label" style="font-weight: bold;">Nilai Soal</label>
                                    <div class="col-sm-12">
                                        <input type="numeric" id="nilai" name="nilai" class="form-control" value="{{ old('nilai') }}" placeholder="Masukkan nilai per soal">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan1" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 1</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan1" name="pilihan1" class="form-control" value="{{ old('pilihan1') }}" placeholder="Masukkan pilihan 1">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan2" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 2</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan2" name="pilihan2" class="form-control" value="{{ old('pilihan2') }}" placeholder="Masukkan pilihan 2">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan3" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 3</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan3" name="pilihan3" class="form-control" value="{{ old('pilihan3') }}" placeholder="Masukkan pilihan 3">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan4" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 4</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan4" name="pilihan4" class="form-control" value="{{ old('pilihan4') }}" placeholder="Masukkan pilihan 4">
                                    </div>
                                </div>

                                <div class="mb-3 col">
                                    <label for="jawaban" class="col-sm-4 col-form-label" style="font-weight: bold;">Jawaban</label>
                                    <div class="col-sm-12">
                                        <select id="jawaban" name="jawaban" class="form-control" required>
                                            <option value="{{ old('jawaban') }}" disabled selected>Pilih Jawaban</option>
                                            <option value="pilihan1">Pilihan 1</option>
                                            <option value="pilihan2">Pilihan 2</option>
                                            <option value="pilihan3">Pilihan 3</option>
                                            <option value="pilihan4">Pilihan 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center" style="background-color: #FFFFFF; padding: 10px;">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn" style="background-color: #79CD7B; border-radius: 10px; color: #ffffff;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection