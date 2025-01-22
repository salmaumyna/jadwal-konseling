@extends('layout.errorlayout')
@section('content')
    <div class="error-box">
        <h1><i class="fa fa-warning"></i></h1>
        <h3>Oops, Anda tidak memiliki akses untuk melakukan aksi ini</h3>
        <br>
        <a href="{{ route('dashboard.index') }}" class="btn btn-custom">Kembali ke beranda</a>
    </div>
@endsection
