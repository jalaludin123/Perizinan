<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Perizinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .hr {
            border: 2px solid #111;
        }

        .header p {
            font-size: 12px;
            line-height: 5px
        }

        .page-1 {
            height: 100%;
        }

        .table-kbli tr td {
            border: 1px solid #111;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="page-1">
        <div class="text-center header">
            <img src="{{ public_path('image/logo/gambar_burung_garuda.png') }}" alt="" width="100px"
                height="100px">
            <h5 class="text-uppercase mt-3">Pemerintahan Daerah Kabupaten Tangerang</h5>
            <h4 class="text-uppercase">Badan Perindustrian dan Perdaganagn</h4>
            <p>{{ $appSetting->address_website }}</p>
            <p>Telp.({{ $appSetting->phone_website }}) Website : {{ $appSetting->url_website }}</p>
            <p>Email : {{ $appSetting->email_website }}</p>
        </div>
        <hr class="hr">
        <div class="text-center">
            <h4 class="text-uppercase">Perizinan Berusaha Berbasis Risiko</h4>
            <h4 class="text-uppercase">Nomor Induk Berusaha : {{ $perizinan->nib }}</h4>
        </div>
        <div class="text-end m-4">
            <p>Tangerang, {{ $date }}</p>
        </div>
        <div>
            <p>Berdasarkan Undang-undang Nomor 11 Tahun 2020 tentnag Cipta Kerja, Pemerintahan Republik Indonesia
                menerbitkan Nomor Induk Berusaha (NIB) Kepada :</p>
            <table class="mx-2">
                <tbody>
                    <tr>
                        <td style="width:450px;">1. Nama Pelaku Usaha</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->name_perusahaan }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">2. Alamat Perusahaan</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->address }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">3. No. Telepon</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->phone }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">4. Email</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->user->email }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">5. No. Permohonan</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->no_permohonan }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">6. No.SK</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->no_sk }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">7. No. Proyek</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->no_proyek }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">8. Skala Usaha</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->skalaUsaha->nama_skala_usaha }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">9. Jenis Perizinan</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->jenisPelakuUsaha->nama_jenis_usaha }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">10. Nama Perizinan</td>
                        <td style="width:2%;">:</td>
                        <td>{{ $perizinan->namaJenisUsaha }}</td>
                    </tr>
                    <tr>
                        <td style="width:450px;">11. Kode Klasifikasi Buku Lapangan Usaha Indoneisa (KBLI)</td>
                        <td style="width:2%;">:</td>
                        <td>Lihat dilampiran</td>
                    </tr>
                </tbody>
            </table>
            <p class="mt-4">NIB ini berlaku di seluruh wilayah Republik Indonesia selama menjalankan kegiatan usaha
                dan berlaku
                sebagai Angka Pengenal Impor (API-U), hak akses kepabeanan, pendaftaran kepesertaan jaminan sosial
                kesehatan dan jaminan sosial ketenagakerjaan, serta bukti pemenuhan laporan pertama Wajib lapor
                Ketenagakerjaan di perusahaan (WKLKP)</p>
            <p>Pelaku Usaha dengan NIB tersebut di atas dapat melaksanakan kegiatan berusaha sebagaimana terlampir
                dengan tetap memperhatikan ketentuan peraturan perundang-undangan.</p>
            <p>Diterbitkan pada Tanggal : {{ $date }}</p>
        </div>
    </div>

    <div class="page-2">
        <div class="text-center header">
            <img src="{{ public_path('image/logo/gambar_burung_garuda.png') }}" alt="" width="100px"
                height="100px">
            <h5 class="text-uppercase mt-3">Pemerintahan Daerah Kabupaten Tangerang</h5>
            <h4 class="text-uppercase">Badan Perindustrian dan Perdaganagn</h4>
            <p>{{ $appSetting->address_website }}</p>
            <p>Telp.({{ $appSetting->phone_website }}) Website : {{ $appSetting->url_website }}</p>
            <p>Email : {{ $appSetting->email_website }}</p>
        </div>
        <hr class="hr">
        <div class="text-center">
            <h4 class="text-uppercase">Perizinan Berusaha Berbasis Risiko</h4>
            <h4 class="text-uppercase">Lampiran</h4>
            <h4 class="text-uppercase">Nomor Induk Berusaha : {{ $perizinan->nib }}</h4>
        </div>
        <div class="mt-4">
            <p>Lampiran berikut ini memuat daftar bidang usaha untuk : </p>
            <table class="table table-bordered table-hover table-kbli mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Judul KBLI</th>
                        <th>Risiko</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->kbli2->kbli1->kode_kbli }}</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->kbli2->kbli1->nama_kbli }}</td>
                        <td>{{ $perizinan->risiko }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->kbli2->kode_kbli }}</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->kbli2->nama_kbli }}</td>
                        <td>{{ $perizinan->risiko }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->kode_kbli }}</td>
                        <td>{{ $perizinan->kbli->kbli4->kbli3->nama_kbli }}</td>
                        <td>{{ $perizinan->risiko }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{ $perizinan->kbli->kbli4->kode_kbli }}</td>
                        <td>{{ $perizinan->kbli->kbli4->nama_kbli }}</td>
                        <td>{{ $perizinan->risiko }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{ $perizinan->kbli->kode_kbli }}</td>
                        <td>{{ $perizinan->kbli->nama_kbli }}</td>
                        <td>{{ $perizinan->risiko }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <ol>
                    <li>
                        <p>Dengan ketentuan bahwa NIB tersebut hanya berlaku untuk kode dan judul KBLI yang tercantum
                            dalam lampiran ini.</p>
                    </li>
                    <li>
                        <p>Pelaku Usaha wajib memenuhi persyaratan dan kewajiban sesuai Norma, Standar, Prosedur, dan
                            Kriteria (NSPK) Kementrian/Lembaga (K/L)</p>
                    </li>
                    <li>
                        <p>Verifikasi dan Pengawasan pemenuh persyaratan dan kewajiban Pelaku Usaha dilakukan oleh
                            Kementrian/Lembaga/Pemerintah daerah terkait.</p>
                    </li>
                    <li>
                        <p>Lampiran ini merupakan bagian tidak terpisah dari dokumen NIB tersebut.</p>
                    </li>
                </ol>
            </div>
        </div>
        <div class="text-end">
            <div class="text-center">
                <p class="fw-bold">Menteri Investasi/Kepala Badan Koordinasi Penanaman Modal,</p>
                <img src="{{ public_path('image/logo/ttd.png') }}" alt="" width="60px" height="60px">
                <p>Ditandatangani Secara Elektronik</p>
            </div>
        </div>
    </div>
    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
