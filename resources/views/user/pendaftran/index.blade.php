@extends('layouts.login.index')
@section('content')
    {{-- <div class="d-flex justify-content-center m-3">
        <div class="box">
            <div class="card">
                <div class="text-center mt-4">
                    <h4 class="fw-bold text-uppercase">Pendaftaran Akun</h4>
                </div>
                <form action="{{ url('create-akun') }}" method="get">
                    @csrf
                    <div class="row mt-5 p-3">
                        <div class="mb-3">
                            <h5>Pilih Skala Usaha</h5>
                        </div>
                        @foreach ($skalaUsaha as $sk)
                            <div class="col-6">
                                <div class="card-body box-col">
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-bold text-uppercase">{{ $sk->nama_skala_usaha }}</p>
                                        <input class="form-check-input" type="radio" name="skalaUsaha"
                                            value="{{ $sk->id }}" id="flexRadioDefault1">
                                    </div>
                                    <p style="font-size: 17px;color:rgb(107, 107, 107);font-weight:500;margin-bottom:5px">
                                        {{ $sk->keterangan_skala_usaha }}
                                    </p>
                                    <p>{{ $sk->description_skala_usaha }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary w-100">Konfirmasi</button>
                        </div>
                    </div>
                </form>
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
            <div class="box-login mt-3">
                <div class="text-center mt-5">
                    <h4 class="fw-bold text-uppercase">Pendaftaran Akun</h4>
                </div>
                <form action="{{ url('create-akun') }}" method="get">
                    @csrf
                    <div class="row mt-5 p-3">
                        <div class="mb-3">
                            <h5>Pilih Skala Usaha</h5>
                        </div>
                        @foreach ($skalaUsaha as $sk)
                            <div class="col-6 mb-5">
                                <div class="card-body box-col p-3">
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-bold text-uppercase">{{ $sk->nama_skala_usaha }}</p>
                                        <input class="form-check-input" type="radio" name="skalaUsaha"
                                            value="{{ $sk->id }}" id="flexRadioDefault1">
                                    </div>
                                    <p style="font-size: 17px;color:rgb(107, 107, 107);font-weight:500;margin-bottom:5px">
                                        {{ $sk->keterangan_skala_usaha }}
                                    </p>
                                    <p>{{ $sk->description_skala_usaha }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Konfirmasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
