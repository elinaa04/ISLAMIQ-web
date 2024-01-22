@extends('layouts.sidebar')

@section('title')
latsol
@stop

@section('css')

@stop

@section('content')
<div class="container-fluid my-8">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-h3 custom-font">LATIHAN SOAL</h1>
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><i class="fa fa-file"></i></li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <p>
                <a class="btn" href="{{ route('indexLatsol') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Tambah Latihan Soal</a>
            </p>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 5%;">Id Latihan</th>
                    <th style="width: 10%;">Judul Materi</th>
                    <th style="width: 45%;">Soal</th>
                    <th>Action</th>
                </tr>
                @foreach($latihanSoal as $latihan)
                <tr>
                    <td>{{ $latihan->id_latihan }}</td>
                    <td>{{ $latihan->judulMateri }}</td>
                    <td>{{ $latihan->isiLatihanSoal }}</td>
                    <td>
                        <form action="{{ route('hapusLatsol', $latihan->id_latihan) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('showLatsol', ['id_latihan' => $latihan->id_latihan]) }}" style="border-radius: 10px;">
                                <i class="fas fa-eye fa-sm"></i> Show
                            </a>
                            <a class="btn btn-primary" href="{{ route('editLatsol', ['id_latihan' => $latihan->id_latihan]) }}" style="border-radius: 10px;">
                                <i class="fas fa-edit fa-sm"></i> Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="border-radius: 10px;">
                                <i class="fas fa-trash-alt fa-sm"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection