@extends('layout.mainlayout')

@section('title', 'Beranda')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-box">
                <div class="welcome-det">
                    <h3>Selamat Datang, {{ auth()->user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>

    <x-alert/>

@endsection
@push('scripts')
@endpush
