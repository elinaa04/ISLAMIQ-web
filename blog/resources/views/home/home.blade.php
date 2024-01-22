@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="container-fluid my-8">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-h3 custom-font" style="margin-bottom: 30px;">HOME</h1>
            <div class="page-title">
                <ol class="breadcrumb text-right" style="margin-top: -10px;">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
    @endsection

    @section('content')
    <div class="content mt-3">
        <div id="welcome-message" class="notification">
            <h5>Selamat datang, {{ Auth::user()->namaLengkap }}!</h5>
            <p>NIP Anda: {{ Auth::user()->ni }}</p>
        </div>

        <div class="row">
            <!-- Bagian Siswa -->
            <div class="col-md-4">
                <a href="{{ route('generateUserListPDF', ['role' => 'siswa']) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" style="background-color: #6DCBFF;">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Total Siswa</h3>
                                <p class="display-4">{{$totalSiswa }}</p>
                            </div>
                            <div class="col-md-4">
                                <img src="style/images/user.png" alt="Gambar" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Bagian Guru -->
            <div class="col-md-4">
                <a href="{{ route('generateUserListPDF', ['role' => 'guru']) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" style="background-color: #F4E347;">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Total Guru</h3>
                                <p class="display-4">{{ $totalGuru }}</p>
                            </div>
                            <div class="col-md-4">
                                <img src="style/images/guru.png" alt="Gambar" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Bagian Nilai -->
            <div class="col-md-4">
                <a style="text-decoration: none; color: inherit;">
                    <div class="card" style="background-color: #ED5050;">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Nilai</h3>
                                <p class="display-4"> 5 </p>
                            </div>
                            <div class="col-md-4">
                                <img src="style/images/quiz.png" alt="Gambar" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endsection