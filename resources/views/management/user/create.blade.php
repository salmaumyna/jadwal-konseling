@section('title', 'Tambah Pengguna')

@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Pengguna
        @endslot
        @slot('li_1')
            @slot('link')
                {{ route('mgt.user.index') }}
            @endslot
            Pengguna
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <form action="{{ route('mgt.user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" maxlength="255" minlength="3"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Username <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}">
                                <div class="invalid-feedback">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-3">
                            <label class="col-lg-3 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control select select2-hidden-accessible" name="is_active">
                                    <option disabled>Pilih Status</option>
                                    <option value="1" {{ old('is_active') }}>Aktif</option>
                                    <option value="0" {{ old('is_active') }}>Tidak Aktif
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('mgt.user.index') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
