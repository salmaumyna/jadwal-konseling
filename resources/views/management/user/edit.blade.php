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
            Form Ubah
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <form action="{{ route('mgt.user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9">
                                <input name="name" type="text" class="form-control" required value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Username <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="username" min="5"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $user->username) }}">
                                <div class="invalid-feedback">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password Baru</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" min="5"
                                    class="form-control @error('password') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation" min="5"
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
                                    <option value="1" @if (old('is_active', $user->is_active) == 1) selected @endif>Aktif</option>
                                    <option value="0" @if (old('is_active', $user->is_active) == 0) selected @endif>Tidak Aktif
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
