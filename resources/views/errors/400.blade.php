@extends('layout.errorlayout')
@section('content')
    <div class="error-box">
        <h3>
            <i class="fa fa-warning"></i> Oops!
            <small>{{ $exception->getMessage() }}</small>
        </h3>
        <br>
        <br>
        <br>
        <a href="{{ route('dashboard.index') }}" class="btn btn-custom">Kembali ke beranda</a>
    </div>
@endsection
