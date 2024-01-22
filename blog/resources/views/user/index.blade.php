@extends('layouts.sidebar')

@section('content')
<div class="container-fluid my-8">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-h3 custom-font">DATA USER</h1>
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><i class="fa fa-plus"></i></li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <p>
                <a class="btn" href="{{ route('user.create') }}" style="background-color: #79CD7B; color: #ffffff; border-radius: 10px;">Tambah User</a>
            </p>

            <table class="table table-bordered">
                <tr>
                    <th style="width: 20%;">Nomor Induk</th>
                    <th style="width: 20%;">Role</th>
                    <th style="width: 50%;">Action</th>
                </tr>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->ni }}</td>
                        <!-- <td>{{ $user->password }}</td> -->
                        <td>{{ $user->role }}</td>
                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <form action="{{ route('user.destroy', $user->ni) }}" method="POST" style="display:inline">
                                <a href="{{ route('user.show', $user->ni) }}" class="btn btn-warning" style="border-radius: 10px;">
                                    <i class="fas fa-eye fa-sm"></i> Show
                                </a>
                                <a href="{{ route('user.edit', $user->ni) }}" class="btn btn-primary" style="border-radius: 10px;">
                                    <i class="fas fa-edit fa-sm"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" style="border-radius: 10px;">
                                    <i class="fas fa-trash-alt fa-sm"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection