@extends('layouts.app')
@section('content')
    <div class="panduan">
        <h3>PANDUAN OSS</h3>
        <div class="card">
            <div class="card-body">
                <ul class="m-0 pt-5">
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downA()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">A</div>
                                USAHA MIKRO DAN KECIL (UMK)
                            </a>
                            <i class="fas fa-arrow-down" id="upA"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropA">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 0)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downB()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">B</div>
                                NON USAHA MIKRO DAN KECIL (NON UMK)
                            </a>
                            <i class="fas fa-arrow-down" id="upB"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropB">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 1)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downC()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">C</div>
                                PEMERINTAH DAERAH
                            </a>
                            <i class="fas fa-arrow-down" id="upC"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropC">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 2)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downD()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">D</div>
                                KEMENTRIAN DAN LEMBAGA
                            </a>
                            <i class="fas fa-arrow-down" id="upD"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropD">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 3)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downE()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">E</div>
                                ADMINISTRATOR KEK/BADAN PENGUSAHAAN KPBPB
                            </a>
                            <i class="fas fa-arrow-down" id="upE"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropE">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 4)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center" onclick="downF()">
                            <a href="#">
                                <div class="badge font-bold text-white me-3">F</div>
                                KEMENTRIAN INVESTASI/BKPM DAN DPMPTSP
                            </a>
                            <i class="fas fa-arrow-down" id="upF"></i>
                        </div>
                        <ol class="d-flex d-none" id="dropF">
                            @foreach ($panduan as $file)
                                @if ($file->kategori == 5)
                                    <a href="{{ url('panduanOss/viewPdf/' . $file->id) }}">
                                        <i class="fas fa-file me-5"></i>
                                        <li>{{ $file->nama_panduan }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function downA() {
            if ($('#dropA').hasClass('d-none')) {
                $('#dropA').removeClass('d-none')
                $('#upA').removeClass('fas fa-arrow-down')
                $('#upA').addClass('fas fa-arrow-up')
            } else {
                $('#dropA').addClass('d-none')
                $('#upA').removeClass('fas fa-arrow-up')
                $('#upA').addClass('fas fa-arrow-down')
            }
        }

        function downB() {
            if ($('#dropB').hasClass('d-none')) {
                $('#dropB').removeClass('d-none')
                $('#upB').removeClass('fas fa-arrow-down')
                $('#upB').addClass('fas fa-arrow-up')
            } else {
                $('#dropB').addClass('d-none')
                $('#upB').removeClass('fas fa-arrow-up')
                $('#upB').addClass('fas fa-arrow-down')
            }
        }

        function downC() {
            if ($('#dropC').hasClass('d-none')) {
                $('#dropC').removeClass('d-none')
                $('#upC').removeClass('fas fa-arrow-down')
                $('#upC').addClass('fas fa-arrow-up')
            } else {
                $('#dropC').addClass('d-none')
                $('#upC').removeClass('fas fa-arrow-up')
                $('#upC').addClass('fas fa-arrow-down')
            }
        }

        function downD() {
            if ($('#dropD').hasClass('d-none')) {
                $('#dropD').removeClass('d-none')
                $('#upD').removeClass('fas fa-arrow-down')
                $('#upD').addClass('fas fa-arrow-up')
            } else {
                $('#dropD').addClass('d-none')
                $('#upD').removeClass('fas fa-arrow-up')
                $('#upD').addClass('fas fa-arrow-down')
            }
        }

        function downE() {
            if ($('#dropE').hasClass('d-none')) {
                $('#dropE').removeClass('d-none')
                $('#upE').removeClass('fas fa-arrow-down')
                $('#upE').addClass('fas fa-arrow-up')
            } else {
                $('#dropE').addClass('d-none')
                $('#upE').removeClass('fas fa-arrow-up')
                $('#upE').addClass('fas fa-arrow-down')
            }
        }

        function downF() {
            if ($('#dropF').hasClass('d-none')) {
                $('#dropF').removeClass('d-none')
                $('#upF').removeClass('fas fa-arrow-down')
                $('#upF').addClass('fas fa-arrow-up')
            } else {
                $('#dropF').addClass('d-none')
                $('#upF').removeClass('fas fa-arrow-up')
                $('#upF').addClass('fas fa-arrow-down')
            }
        }
    </script>
@endpush
