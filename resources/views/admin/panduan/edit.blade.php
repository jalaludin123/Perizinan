@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-white">{{ $title }}</h5>
                <a href="{{ url('admin/panduan') }}" class="btn btn-warning"><i class="fas fa-arrow-left me-2"></i>Back</a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/panduan/' . $panduan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label>Nama File</label>
                            <input type="text" class="form-control @error('nama_file') is-invalid @enderror"
                                name="nama_file" value="{{ old('nama_file', $panduan->nama_panduan) }}">
                            @error('nama_file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>File</label>
                            <input type="file" name="file_panduan"
                                class="form-control @error('file_panduan') is-invalid @enderror">
                            @error('file_panduan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label>Pilih Kategori Panduan OSS</label>
                        <div class="col-md-12 mt-2">
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                is-invalid
                            @enderror"
                                    type="radio" name="kategori" id="inlineRadio1" value="0"
                                    {{ $panduan->kategori == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Usaha Mikro</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                is-invalid
                            @enderror"
                                    type="radio" name="kategori" id="inlineRadio2" value="1"
                                    {{ $panduan->kategori == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Usaha Non Mikro</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                is-invalid
                            @enderror"
                                    type="radio" name="kategori" id="inlineRadio3" value="2"
                                    {{ $panduan->kategori == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Pemerintah Daerah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                is-invalid
                            @enderror"
                                    type="radio" name="kategori" id="inlineRadio4" value="3"
                                    {{ $panduan->kategori == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio4">Kementrian dan Lembaga</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                is-invalid
                            @enderror"
                                    type="radio" name="kategori" id="inlineRadio5" value="4"
                                    {{ $panduan->kategori == 4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio5">Badan Pengusahaan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @error('kategori')
                                    is-invalid
                                @enderror"
                                    type="radio" name="kategori" id="inlineRadio6" value="5"
                                    {{ $panduan->kategori == 5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio6">Kementrian Investasi</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center mt-4">
                        <button class="btn btn-info" type="submit"><i class="fas fa-save me-2"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
