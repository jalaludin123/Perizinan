@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="text-dark">Detail Data Report</h4>
                <div>
                    <a href="{{ url('admin/verifikasi/' . $pendaftaran->id) }}" class="btn btn-info"><i
                            class="fas fa-save me-2"></i>Verifikasi</a>
                    <a href="{{ url('admin/tidakTerverifikasi') }}" class="btn btn-warning"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table-form" border="0" width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td>Nama Pelaku Usaha</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->name_perusahaan }}</td>
                            </tr>
                            <tr>
                                <td>Email Perusahaan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->user->email }}</td>
                            </tr>
                            <tr>
                                <td>No Telepon Perusahaan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->phone }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->jabatan }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->jk }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Nama Perizinan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->name_perizinan }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Proyek</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->jenis_proyek }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table-form" border="0" width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td>Nomor Induk Berusaha</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->nib }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Permohonan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->no_permohonan }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Proyek</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->no_proyek }}</td>
                            </tr>
                            <tr>
                                <td>Nomor SK</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->no_sk }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Induk kependudukan</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->nik }}</td>
                            </tr>
                            <tr>
                                <td>Nomor NPWP</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->npwp }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td width="2%">:</td>
                                <td>
                                    @if ($pendaftaran->status == 1)
                                        <div class="badge bg-danger">Tidak Terverifikasi</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Sektor</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->sektor }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Pendaftaran</td>
                                <td width="2%">:</td>
                                <td>{{ $pendaftaran->created_at->format('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <textarea rows="4" class="form-control bg-dark" disabled>{{ $pendaftaran->address }}</textarea>
                    </div>
                </div>
                <div class="mt-4 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Skala Usaha</th>
                                <th>Jenis Pelaku Usaha</th>
                                <th>Jenis Usaha</th>
                                <th>Risiko</th>
                                <th>KBLI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pendaftaran->skalaUsaha->nama_skala_usaha }}</td>
                                <td>{{ $pendaftaran->jenisPelakuUsaha->nama_jenis_usaha }}</td>
                                <td>{{ $pendaftaran->namaJenisUsaha }}</td>
                                <td>{{ $pendaftaran->risiko }}</td>
                                <td>{{ $pendaftaran->kbli->nama_kbli }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
