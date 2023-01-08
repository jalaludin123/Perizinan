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
                <a href="{{ url('panduanOss') }}">
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
                <ul>
                    <p>Untuk mempermudah pelaku usaha menentukan kategori Bidang Usaha yang akan dikembangkan di Indonesia,
                        pemerintah melalui Badan Pusat Statistik (BPS) menyusun Klasifikasi Baku Lapangan Usaha Indonesia
                        (KBLI) sebagai panduan penentuan jenis kegiatan usaha/bisnis. Acuan ini diperbarui pada September
                        2020 sesuai dengan Peraturan BPS Nomor 2 Tahun 2020 tentang Klasifikasi Baku Lapangan Usaha
                        Indonesia, dengan penambahan 216 kode KBLI 5 digit dari KBLI 2017, sehingga total saat ini ada 1.790
                        kode KBLI.
                    </p>
                    <p class="mb-4"> KBLI adalah pengklasifikasian aktivitas/kegiatan ekonomi Indonesia yang menghasilkan
                        produk/output,
                        baik berupa barang maupun jasa, berdasarkan lapangan usaha untuk memberikan keseragaman konsep,
                        definisi, dan klasifikasi lapangan usaha dalam perkembangan dan pergeseran kegiatan ekonomi di
                        Indonesia.</p>
                    @foreach ($kbli as $kb)
                        <li>
                            <a href="{{ url('kbli2/' . $kb->id) }}">
                                <div class="badge font-bold text-white me-3">{{ $kb->kode_kbli }}</div>
                                {{ $kb->nama_kbli }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
