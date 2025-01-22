@section('title', 'Profil Pengguna')

@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Profil
        @endslot
        @slot('li_1')
            @slot('link')
                {{ route('profile.index') }}
            @endslot
            Profil
        @endslot
        @slot('li_2')
            Form Ubah
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" readonly class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Username</label>
                            <div class="col-lg-9">
                                <input type="text" readonly class="form-control" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password Lama <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" required name="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('old_password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password Baru <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" required name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-lg-3 col-form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" required name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <button class="btn btn-info text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size:12px;">Drag and drop a file here or click</p></div>',
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton: '<button type="button" class="dropify-clear">Remove</button>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>
@endpush
