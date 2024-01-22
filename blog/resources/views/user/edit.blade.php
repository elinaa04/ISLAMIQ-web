@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>EDIT DATA USER</h1>
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

            <form id="formSimpan" action="{{ route('user.update', $user->ni) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    Edit User
                </h5>
                <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ni">Nomor Induk:</label>
                                    <input type="number" class="form-control" id="ni" name="ni" value="{{ $user->ni }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                        <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                        <option value="kepsek" {{ $user->role == 'kepsek' ? 'selected' : '' }}>Kepsek</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection