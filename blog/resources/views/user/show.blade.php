@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <h1 class="h3 mb-h3 custom-font" style='margin-bottom:20px; margin-top:10px;'>DETAIL DATA USER</h1>
    <div class="row justify-content-center">
        <div class="container-fluid">
            <p>
                <a class="btn" href="{{ route('user.index') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Kembali</a>
            </p>

            <h5 class="card-title mb-0" style="background-color: #79CD7B; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                User
            </h5>
            <div class="card" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nomor Induk :</strong>
                                {{ $user->ni }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Password :</strong>
                                {{ $user->password }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role :</strong>
                                {{ $user->role }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection