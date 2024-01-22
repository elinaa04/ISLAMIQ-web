@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-h3 custom-font">MATERI PEMBELAJARAN</h1>
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
                <a class="btn" href="{{ route('materi.create') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Tambah Materi</a>
            </p>

            <table class="table table-bordered">
                <tr>
                    <th>Id Materi</th>
                    <th>Judul Materi</th>
                    <th>File Materi</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($materis as $materi)
                <tr>
                    <td>{{ $materi->id_materi }}</td>
                    <td>{{ $materi->judulMateri }}</td>
                    <td>{{ $materi->fileMateri }}</td>
                    <td>
                        <form action="{{ route('materi.destroy', $materi->id_materi) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('materi.show', $materi->id_materi) }}" style="border-radius: 10px;">
                                <i class="fas fa-eye fa-sm"></i> Show
                            </a>
                            <a class="btn btn-primary" href="{{ route('materi.edit', $materi->id_materi) }}" style="border-radius: 10px;">
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