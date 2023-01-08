@extends('layouts.user.index')
@section('content')
    <div class="card">
        @if (Auth::user()->pendaftaran->nib)
            <div class="card-body">
                @if (Auth::user()->pendaftaran->status == 0)
                    <div class="alert alert-success text-center" role="alert">
                        Terimakasih telah melakukan pendaftaran silahkan download Sertifikat NIB Perizinan Anda : <a
                            href="{{ url('downloadSertifikat/' . Auth::user()->pendaftaran->id) }}"
                            class="text-decoration-none fw-bold">Sertifikat</a>
                    </div>
                @else
                    <div class="alert alert-warning text-center" role="alert">
                        Data permohonan Anda Sedang di proses tunggu dari pihak kami untuk menghubungi anda untuk
                        memverifikasi data perizinan NIB anda
                    </div>
                @endif
            </div>
        @else
            <div class="card-body">
                <h5> Data Skala Usaha Anda : {{ Auth::user()->pendaftaran->skalaUsaha->nama_skala_usaha }}</h5>
                <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-dark text-uppercase fw-bold" id="perizinan-tab"
                            data-bs-toggle="tab" data-bs-target="#perizinan-tab-pane" type="button" role="tab"
                            aria-controls="perizinan-tab-pane" aria-selected="true">Data
                            Perizinan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark text-uppercase fw-bold" id="address-tab" data-bs-toggle="tab"
                            data-bs-target="#address-tab-pane" type="button" role="tab"
                            aria-controls="address-tab-pane" aria-selected="false">Address</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark text-uppercase fw-bold" id="perusahaan-tab" data-bs-toggle="tab"
                            data-bs-target="#perusahaan-tab-pane" type="button" role="tab"
                            aria-controls="perusahaan-tab-pane" aria-selected="false">Data
                            Perusahaan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark text-uppercase fw-bold" id="kbli-tab" data-bs-toggle="tab"
                            data-bs-target="#kbli-tab-pane" type="button" role="tab" aria-controls="kbli-tab-pane"
                            aria-selected="false">Data
                            KBLI</button>
                    </li>
                </ul>
                <form action="{{ url('pendaftaran') }}" method="post">
                    <div class="tab-content" id="myTabContent">
                        @csrf
                        <div class="tab-pane fade show active" id="perizinan-tab-pane" role="tabpanel"
                            aria-labelledby="perizinan-tab" tabindex="0">
                            @include('user.pendaftran.perizinan')
                        </div>
                        <div class="tab-pane fade" id="address-tab-pane" role="tabpanel" aria-labelledby="address-tab"
                            tabindex="0">@include('user.pendaftran.address')</div>
                        <div class="tab-pane fade" id="perusahaan-tab-pane" role="tabpanel" aria-labelledby="perusahaan-tab"
                            tabindex="0">@include('user.pendaftran.perusahaan')</div>
                        <div class="tab-pane fade" id="kbli-tab-pane" role="tabpanel" aria-labelledby="kbli-tab"
                            tabindex="0">
                            @include('user.pendaftran.kbli')
                        </div>
                        <hr>
                        <div class="text-center">
                            <button class="btn btn-primary text-uppercase" type="submit"><i class="fas fa-save me-2"></i>
                                Konfirmasi</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        let skalaUsaha = $('#skalaDown').val()
        let jenisPelakuUsaha = $('#usahaDown').val()

        $(document).ready(function($) {
            $.ajax({
                url: "{{ url('/getDataSkalaUsaha') }}" + '/' + skalaUsaha,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $('#usahaDown').append(
                            `<option value="${data.id}">${data.nama_jenis_usaha}</option>`
                        )
                    })
                }
            })

            $.ajax({
                url: "{{ url('/getDataJenisUsaha') }}" + '/' + jenisPelakuUsaha,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $('#jenisUsahaDown').append(
                            `<option value="${data.nama_jenisBadanUsaha}">${data.nama_jenisBadanUsaha}</option>`
                        )
                    })
                }
            })

            if (skalaUsaha == 1) {
                $('#risikoUsaha').children().remove()
                $('#risikoUsaha').append('<option value="usaha mikro"> Usaha Mikro </option>')
            } else {
                $('#modalUsaha').on('change', function() {
                    let modal = $('#modalUsaha').val()
                    if (modal == '> 5 miliar s.d 10 miliar') {
                        $('#risikoUsaha').children().remove()
                        $('#risikoUsaha').append('<option value="usaha menengah"> Usaha Menengah </option>')
                    } else {
                        $('#risikoUsaha').children().remove()
                        $('#risikoUsaha').append('<option value="usaha besar"> Usaha Besar </option>')

                    }
                })
            }
        })

        function dropdown() {
            let skalaUsaha = $('#skalaDown').val()
            if (skalaUsaha) {
                $('#usahaDown').children().remove()
                $('#usahaDown').append(`<option value="">--Pilih Jenis Usaha--</option>`)
                $('#jenisUsaha').addClass('d-none');

                $.ajax({
                    url: "{{ url('/getDataSkalaUsaha') }}" + '/' + skalaUsaha,
                    success: function(res) {
                        $.each(res, function(index, data) {
                            $('#usahaDown').append(
                                `<option value="${data.id}">${data.nama_jenis_usaha}</option>`
                            )
                        })
                    }
                })
            }

            if (skalaUsaha == 1) {
                $('#sertifikat').val('Sertifikat Standar')
                $('#modalUsaha').children().remove()
                $('#modalUsaha').append('<option value="< 5 miliar">< 5 Miliar </option>')
                let modal = $('#modalUsaha').val()
                if (modal) {
                    $('#risikoUsaha').children().remove()
                    $('#risikoUsaha').append('<option value="usaha mikro"> Usaha Mikro </option>')
                }
            } else {
                $('#sertifikat').val('Sertifikat Non Standar')
                $('#modalUsaha').children().remove()
                $('#modalUsaha').append('<option value="">--Pilih Modal Usaha--</option>')
                $('#modalUsaha').append('<option value="> 5 miliar s.d 10 miliar">> 5 Miliar s.d 10 Miliar</option>')
                $('#modalUsaha').append('<option value="> 10 miliar">> 10 Miliar</option>')
                $('#modalUsaha').on('change', function() {
                    let modal = $('#modalUsaha').val()
                    if (modal == '> 5 miliar s.d 10 miliar') {
                        $('#risikoUsaha').children().remove()
                        $('#risikoUsaha').append('<option value="usaha menengah"> Usaha Menengah </option>')
                    } else {
                        $('#risikoUsaha').children().remove()
                        $('#risikoUsaha').append('<option value="usaha besar"> Usaha Besar </option>')

                    }
                })
            }
        }

        function down() {
            let jenisPelakuUsaha = $('#usahaDown').val()

            if (jenisPelakuUsaha == 1) {
                $('#jenisUsaha').addClass('d-none');
            } else {
                $('#jenisUsaha').removeClass('d-none');
                $('#jenisUsahaDown').children().remove()
                $('#jenisUsahaDown').append(`<option value="">--Pilih Jenis Usaha--</option>`)

                $.ajax({
                    url: "{{ url('/getDataJenisUsaha') }}" + '/' + jenisPelakuUsaha,
                    success: function(res) {
                        $.each(res, function(index, data) {
                            $('#jenisUsahaDown').append(
                                `<option value="${data.nama_jenisBadanUsaha}">${data.nama_jenisBadanUsaha}</option>`
                            )
                        })
                    }
                })
            }
        }
    </script>
    <script>
        function cityDown() {
            let cityId = $('#city').val()
            $('#kecamatan').children().remove()
            $('#kecamatan').append('<option value="">--Pilih Kecamatan--</option>')
            $.ajax({
                url: "{{ url('getKecamatan') }}" + '/' + cityId,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $('#kecamatan').append(
                            `<option value="${data.dis_id}">${data.dis_name}</option>`)
                    })
                }
            })
        }

        function kecamatanDown() {
            let kecamatanId = $('#kecamatan').val()
            $('#kelurahan').children().remove()
            $('#kelurahan').append('<option value="">--Pilih Kelurahan--</option>')
            $.ajax({
                url: "{{ url('getKelurahan') }}" + '/' + kecamatanId,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $('#kelurahan').append(
                            `<option value="${data.subdis_id}">${data.subdis_name}</option>`)
                    })
                }
            })
        }
    </script>
    <script>
        function kbli1Down() {
            let kbli1Id = $('#kbli1').val()
            $('#kbli2').children().remove()
            $('#kbli2').append('<option value="">--Pilih KBLI II--</option>')
            $.ajax({
                url: "{{ url('getKbli2') }}" + '/' + kbli1Id,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $("#kbli2").append(
                            `<option value="${data.id}">${data.kode_kbli} - ${data.nama_kbli}</option>`
                        )
                    })
                }
            })
        }

        function kbli2Down() {
            let kbli2Id = $('#kbli2').val()
            $('#kbli3').children().remove()
            $('#kbli3').append('<option value="">--Pilih KBLI III--</option>')
            $.ajax({
                url: "{{ url('getKbli3') }}" + '/' + kbli2Id,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $("#kbli3").append(
                            `<option value="${data.id}">${data.kode_kbli} - ${data.nama_kbli}</option>`
                        )
                    })
                }
            })
        }

        function kbli3Down() {
            let kbli3Id = $('#kbli3').val()
            $('#kbli4').children().remove()
            $('#kbli4').append('<option value="">--Pilih KBLI IV--</option>')
            $.ajax({
                url: "{{ url('getKbli4') }}" + '/' + kbli3Id,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $("#kbli4").append(
                            `<option value="${data.id}">${data.kode_kbli} - ${data.nama_kbli}</option>`
                        )
                    })
                }
            })
        }

        function kbli4Down() {
            let kbli4Id = $('#kbli4').val()
            $('#kbli5').children().remove()
            $('#kbli5').append('<option value="">--Pilih KBLI V--</option>')
            $.ajax({
                url: "{{ url('getKbli5') }}" + '/' + kbli4Id,
                success: function(res) {
                    $.each(res, function(index, data) {
                        $("#kbli5").append(
                            `<option value="${data.id}">${data.kode_kbli} - ${data.nama_kbli}</option>`
                        )
                    })
                }
            })
        }
    </script>
@endpush
