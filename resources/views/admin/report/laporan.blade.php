@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-white">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <div class="mt-3">
                    <h5>Laporan Berdasarkan Status</h5>
                    <form action="{{ url('admin/cari') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <select name="tahun" class="form-select">
                                    <option value="">--Pilih Tahun Perizinan--</option>
                                    @for ($i = $tahun; $i < $tahun + 100; $i++)
                                        <option value="{{ $i }}">Tahun {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="kecamatan" class="form-select">
                                    <option value="">--Pilih Kecamatan--</option>
                                    @foreach ($kecamatan as $kc)
                                        <option value="{{ $kc->dis_id }}">{{ $kc->dis_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-dark" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
