@extends('layouts.sidebar')

@section('title')
Show Latsol
@stop

@section('css')

@stop

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>DETAIL DATA LATIHAN SOAL</h1>
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
                    <form id="formSimpan" method="post" action="{{ route('tambahLatsol') }}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-3 col">
                                    <label for="judulMateri" class="col-sm-4 col-form-label" style="font-weight: bold;">Materi</label>
                                    <div class="col-sm-12">
                                        <input type="numeric" id="judulMateri" name="judulMateri" class="form-control" value="{{ $latihanSoal->judulMateri }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="isiLatihanSoal" class="col-sm-4 col-form-label" style="font-weight: bold;">Soal</label>
                                    <div class="col-sm-12">
                                        <input style="height: 88px; " type="text" id="isiLatihanSoal" name="isiLatihanSoal" class="form-control" value="{{ $latihanSoal->isiLatihanSoal }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="nilai" class="col-sm-4 col-form-label" style="font-weight: bold;">Nilai Soal</label>
                                    <div class="col-sm-12">
                                        <input type="numeric" id="nilai" name="nilai" class="form-control" value="{{ $latihanSoal->nilai }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan1" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 1</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan1" name="pilihan1" class="form-control" value="{{ $latihanSoal->pilihan1 }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan2" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 2</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan2" name="pilihan2" class="form-control" value="{{ $latihanSoal->pilihan2 }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan3" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 3</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan3" name="pilihan3" class="form-control" value="{{ $latihanSoal->pilihan3 }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="pilihan4" class="col-sm-4 col-form-label" style="font-weight: bold;">Pilihan 4</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="pilihan4" name="pilihan4" class="form-control" value="{{ $latihanSoal->pilihan4 }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="jawaban" class="col-sm-4 col-form-label" style="font-weight: bold;">Jawaban</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="jawaban" name="jawaban" class="form-control" value="{{ $latihanSoal->jawaban }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection