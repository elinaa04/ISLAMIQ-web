@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>TAMBAH USER</h1>
    <div class="row justify-content-center">
        <div class="container-fluid">
            <p>
                <a class="btn" href="{{ route('user.index') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Kembali</a>
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

            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    Tambah User
                </h5>
                <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ni">Nomor Induk:</label>
                                    <input type="number" class="form-control" id="ni" name="ni" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="{{ old('role') }}" disabled selected>Pilih Role</option>
                                        <option value="guru">Guru</option>
                                        <option value="siswa">Siswa</option>
                                        <option value="kepsek">Kepsek</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px; margin-top:20px">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection