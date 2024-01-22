@extends('layouts.main')

@section('sidebar')
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand-container">
                <a class="navbar-brand" style="font-family: modak; text-align: center;" href="">
                    <img src="{{ asset('style/images/logo.png') }}" class="brand-image">
                    IslamiQ
                </a>
                <a class="navbar-brand hidden" href="">Q</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" style="display: block; text-align: left;">
                    @can('isGuru')
                    <li>
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}"> <i class="menu-icon fa fa-plus"></i>User</a>
                    </li>
                    <li>
                        <a href="{{ route('materi.index') }}"> <i class="menu-icon fa fa-file"></i>Materi </a>
                    </li>
                    <li>
                        <a href="{{ route('latsol') }}"> <i class="menu-icon fa fa-file"></i>Latihan Soal </a>
                    </li>
                    <li>
                        <a href="{{ route('viewProfil') }}"> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a href="{{ route('login.store') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class=" menu-icon fa fa-sign-out-alt"></i>Logout
                        </a>
                    </li>

                    @endcan
                    @can('isKepsek')
                    <li>
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li>
                        <a href="{{ route('viewProfil') }}"> <i class="menu-icon fa fa-user"></i>Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"> <i class="menu-icon fa fa-sign-out-alt"></i>Logout</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a href="{{ route('login.store') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="menu-icon fa fa-sign-out-alt"></i>Logout
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
    </nav>
</aside>
@endsection