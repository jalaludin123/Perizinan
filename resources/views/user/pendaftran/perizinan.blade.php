<div class="p-3">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Nama Perizinan</label>
                @if (Auth::user()->pendaftaran->skalaUsaha->nama_skala_usaha == 'UMK')
                    <input type="text" name="sertifikat" id="sertifikat" value="Sertifikat Standar" class="form-control"
                        readonly>
                @else
                    <input type="text" name="sertifikat" id="sertifikat" value="Sertifikat Non Standar"
                        class="form-control" readonly>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Modal Usaha</label>
                @if (Auth::user()->pendaftaran->skalaUsaha->nama_skala_usaha == 'UMK')
                    <select name="modal" id="modalUsaha" class="form-select @error('modal') is-invalid @enderror">
                        <option value="< 5 miliar">
                            < 5 miliar </option>
                    </select>
                    @error('modal')
                        <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                    @enderror
                @else
                    <select name="modal" id="modalUsaha" class="form-select @error('modal') is-invalid @enderror">
                        <option value="">--Pilih Modal Usaha--</option>
                        <option value="> 5 miliar s.d 10 miliar">
                            > 5 Miliar s.d 10 Miliar</option>
                        <option value="> 10 miliar"> > 10 Miliar</option>
                    </select>
                    @error('modal')
                        <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                    @enderror
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Nama Skala Usaha</label>
                <select name="skala_usaha" id="skalaDown" class="form-control" onchange="dropdown()">
                    <option value="{{ Auth::user()->pendaftaran->skalaUsaha->id }}">
                        {{ Auth::user()->pendaftaran->skalaUsaha->nama_skala_usaha }}</option>
                    @foreach ($skalaUsaha as $sk)
                        <option value="{{ $sk->id }}">{{ $sk->nama_skala_usaha }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Nama Pelaku Usaha</label>
                <select name="pelaku_usaha" id="usahaDown"
                    class="form-select @error('pelaku_usaha') is-invalid @enderror" onchange="down()">
                    <option value="{{ Auth::user()->pendaftaran->jenisPelakuUsaha->id }}">
                        {{ Auth::user()->pendaftaran->jenisPelakuUsaha->nama_jenis_usaha }}</option>
                </select>
                @error('pelaku_usaha')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12" id="jenisUsaha">
            <div class="mb-3">
                <label>Nama Jenis Usaha</label>
                <select name="nama_usaha" id="jenisUsahaDown"
                    class="form-control @error('nama_usaha') is-invalid @enderror">
                    <option value="{{ Auth::user()->pendaftaran->namaJenisUsaha }}">
                        {{ Auth::user()->pendaftaran->namaJenisUsaha }}</option>
                </select>
                @error('nama_usaha')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6" id="">
            <div class="mb-3">
                <label>Jenis Proyek</label>
                <select name="jenis_proyek" id=""
                    class="form-control @error('jenis_proyek') is-invalid @enderror">
                    <option value="">--Pilih Jenis Proyek--</option>
                    <option value="utama">Utama</option>
                    <option value="pendukung">Pendukung</option>
                </select>
                @error('jenis_proyek')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Risiko Usaha</label>
                <select name="risiko" id="risikoUsaha" class="form-select @error('risiko') is-invalid @enderror">
                </select>
                @error('risiko')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4" id="">
            <div class="mb-3">
                <label>No Permohonan</label>
                <input type="text" class="form-control" name="no_permohonan" value="{{ $no_permohonan }}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label>No Proyek</label>
                <input type="text" class="form-control" name="no_proyek" value="{{ $no_proyek }}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="d-flex justify-content-between">
                    No SK
                </label>
                <input type="text" class="form-control @error('no_sk') is-invalid @enderror" name="no_sk"
                    placeholder="Masukan nomor SK Pengesahan Terakhir"
                    value="{{ old('no_sk', Auth::user()->pendaftaran->no_sk) }}">
                <p class="p-input">SK pengesahan di keluarkan oleh Ditjen AHU Kemenkumham</p>
                @error('no_sk')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
