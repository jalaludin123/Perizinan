@extends('layouts.login.index')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-fluid">
        <div>
            <a href="{{ url('/') }}" class="d-block pt-3 login-text">
                <i class="fas fa-chevron-left me-2"></i>
                Kembali Ke Beranda
            </a>
        </div>
        <div class="logo text-center mt-3">
            <img src="{{ asset('image/logo/' . $appSetting->logo) }}" alt="" width="100px" height="100px">
        </div>
        <div class="d-flex justify-content-center">
            <div class="card w-50">
                <div class="text-center pt-5">
                    <h5>Register</h5>
                    <span class="badge float-end p-2 me-2">
                        {{ $skalaUsaha->nama_skala_usaha }}
                    </span>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="skalaUsaha" value="{{ $skalaUsaha->id }}">
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Nama Pelaku Usaha</label>
                            <input type="text" name="name"
                                class="form-control @error('name')
                            is-invalid
                        @enderror">
                            @error('name')
                                <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email Pelaku Usaha</label>
                            <input type="text" name="email"
                                class="form-control @error('email')
                            is-invalid
                        @enderror">
                            @error('email')
                                <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nomor Induk Kependudukan</label>
                                    <input type="text" name="nik"
                                        class="form-control  @error('nik')
                                    is-invalid
                                @enderror">
                                    @error('nik')
                                        <p class="text-small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nomor Telepon</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone')
                                    is-invalid
                                @enderror">
                                    @error('phone')
                                        <p class="text-small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password')
                                    is-invalid
                                @enderror">
                                    @error('password')
                                        <p class="text-small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror">
                                    @error('password_confirmation')
                                        <p class="text-small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Pelaku usaha</label>
                            <select name="jenisUsaha" id="jenisUsaha"
                                class="form-control @error('jenisUsaha')
                            is-invalid
                        @enderror"
                                onchange="dropdown()">
                                <option value="">--PILIH Pelaku USAHA--</option>
                                @foreach ($jenisSkalaUsaha as $jenisUsaha)
                                    @if ($skalaUsaha->id == 1)
                                        @if ($jenisUsaha->status == 0)
                                            <option value="{{ $jenisUsaha->id }}">{{ $jenisUsaha->nama_jenis_usaha }}
                                            </option>
                                        @endif
                                    @else
                                        <option value="{{ $jenisUsaha->id }}">{{ $jenisUsaha->nama_jenis_usaha }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('jenisUsaha')
                                <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 d-none" id="select">
                            <label>Jenis Usaha</label>
                            <select name="badanUsaha" id="badanUsaha"
                                class="form-control @error('badanUsaha')
                            is-invalid
                        @enderror"></select>
                            @error('badanUsaha')
                                <p class="text-small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center m-4 mb-0">
                            <a href="{{ url('daftar') }}" class="btn btn-warning btn-konfirmasi">Back</a>
                            <button type="submit" class="btn btn-primary me-2 btn-konfirmasi">Create Akun</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            function dropdown() {
                let jenis = $('#jenisUsaha').val()
                if (jenis == 1) {
                    $('#select').removeClass('d-none')
                    $('#badanUsaha').children().remove()
                    $('#badanUsaha').append(`<option value="perseorangan">Perseorangan</option>`)
                } else {
                    $('#select').removeClass('d-none')
                    $('#badanUsaha').children().remove()
                    $('#badanUsaha').append(`<option value="">--Pilih Jenis Usaha--</option>`)
                    $.ajax({
                        url: "{{ url('/getDataJenisUsaha') }}" + '/' + jenis,
                        success: function(res) {
                            $.each(res, function(index, data) {
                                $('#badanUsaha').append(
                                    `<option value="${data.nama_jenisBadanUsaha}">${data.nama_jenisBadanUsaha}</option>`
                                )
                            })
                        }
                    })
                }
            }
        </script>
    @endpush
