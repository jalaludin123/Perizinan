@extends('layouts.app')
@section('content')
    <div class="carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner carosel">
                @foreach ($slide as $sld)
                    <div class="carousel-item active">
                        @if ($sld->status == 0)
                            <img src="{{ asset('image/' . $sld->slide) }}" class="d-block w-100" alt="...">
                        @endif
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="second-navbar">
        <div class="row">
            <div class="col-md-4">
                <a href="">
                    <div class="card box-card">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-2"> Panduan OSS</p>
                            <img src="{{ asset('image/logo/371c89ef-a459-4351-83d9-6303e339c18c.svg') }}" alt=""
                                width="100" height="70" class="text-center">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('login') }}">
                    <div class="card box-card">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-2 me-5">Ajukan Perizinan Usaha Mikro & Kecil</p>
                            <img src="{{ asset('image/logo/63bd7e63-8f45-4184-b00e-1f686c1319ee.svg') }}" alt=""
                                width="100" height="70" class="text-center">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('login') }}">
                    <div class="card box-card">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-2 me-5">Ajukan Perizinan Usaha Menengah & Besar</p>
                            <img src="{{ asset('image/logo/63bd7e63-8f45-4184-b00e-1f686c1319ee.svg') }}" alt=""
                                width="100" height="70" class="text-center">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="table">
        <div class="card">
            <h4 class="pt-4 text-center">KLASIFIKASI BAKU LAPANGAN USAHA INDONESIA (KBLI) 2020</h4>
            <div class="card-body">
                <div class="btn-group mx-5" role="group" aria-label="Basic example">
                    <a href="{{ url('/') }}" class="btn btn-danger fw-bold">KBLI 2020</a>
                    <button class="btn btn-dark px-4 fw-bold text-white">{{ $kbli->kode_kbli }}</button>
                </div>
                <ul>
                    <div>
                        <p>{{ $kbli->nama_kbli }}</p>
                        <p class="text-uppercase fw-bold">Uraian</p>
                        <p>{{ $kbli->fungsi_kbli }}</p>
                        <p class="text-uppercase fw-bold">Sebelumnya</p>
                        <ul class="m-0 p-0">
                            <li class="m-0">
                                <a href="{{ url('kbli2/' . $kbli->kbli2->kbli1->id) }}">
                                    <div class="badge font-bold text-white me-3">{{ $kbli->kbli2->kbli1->kode_kbli }}</div>
                                    {{ $kbli->kbli2->kbli1->nama_kbli }}
                                </a>
                            </li>
                            <li class="m-0 mt-2">
                                <a href="{{ url('kbli3/' . $kbli->kbli2->id) }}">
                                    <div class="badge font-bold text-white me-3">{{ $kbli->kbli2->kode_kbli }}</div>
                                    {{ $kbli->kbli2->nama_kbli }}
                                </a>
                            </li>
                        </ul>
                        <p class="text-uppercase fw-bold mt-3">Turunan</p>
                    </div>
                    @foreach ($kbli->kbliIV as $kb)
                        <li><a href="{{ url('kbli5/' . $kb->id) }}">
                                <div class="badge font-bold text-white me-3 px-4">{{ $kb->kode_kbli }}</div>
                                {{ $kb->nama_kbli }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
