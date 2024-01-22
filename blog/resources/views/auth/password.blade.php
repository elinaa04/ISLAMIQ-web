@extends('layouts.sidebar')

@section('title')
Update Password
@stop

@section('css')

@stop

@section('content')
<div class="container-fluid my-8">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-9 my-5">
            <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                Update Password
            </h5>
            <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <div class=" card-body">
                    <div class="row">
                        @if (session()->has('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                        @endif
                        <div class="col-md-12 mb-8 d-flex justify-content-center">
                            <div class="col-sm-10">
                                <form action="{{ route('pass', $bks->nip) }}" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nip" name="nip" class="form-control" value="{{ $bks->ni }}" readonly>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('password') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3 row">
                                        <label for="passwordLama" class="col-sm-4 col-form-label">Password lama</label>
                                        <div class="col-sm-8">
                                            <input type="password" id="passwordLama" name="passwordLama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="passwordBaru" class="col-sm-4 col-form-label">Password Baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" id="passwordBaru" name="passwordBaru" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="repeatPassword" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" id="repeatPassword" name="repeatPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center" style="background-color: #FFFFFF; padding: 10px;">
                                        <form id="formSimpan" method="post" action="{{ route('edit') }}">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn" style="color:white; background-color: #79CD7B; border-radius: 10px;">Simpan</button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection