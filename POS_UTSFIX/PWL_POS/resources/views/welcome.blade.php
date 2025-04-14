@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halo, apa kabar!!!</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
    </div>
    <div class="col-2">
        <form id="logout-form" action="{{ url('logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Logout</button>
        </form>
      </div> 
</div>

@endsection