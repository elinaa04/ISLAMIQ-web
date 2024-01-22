@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>EDIT DATA MATERI</h1>
    <div class="row justify-content-center">
        <div class="container-fluid">
            <p>
                <a class="btn" href="{{ route('materi.index') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Kembali</a>
            </p>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="formSimpan" method="POST" action="{{ route('materi.update', $materi->id_materi) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    Edit Materi
                </h5>
                <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Judul Materi:</strong>
                                    <input type="text" name="judulMateri" value="{{ $materi->judulMateri }}" class="form-control" placeholder="Judul Materi">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
                                <div class="form-group">
                                    <strong>File Materi:</strong>
                                    <input type="file" name="fileMateri" class="form-control" accept=".pdf,.doc,.docx,.ppt,.pptx">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection