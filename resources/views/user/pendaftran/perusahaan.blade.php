<div class="p-3">
    <div class="row mb-3">
        <div class="col-md-6">
            <label>Nama Perusahaan</label>
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                name="name_perusahaan">
            @error('nama_perusahaan')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label>No Hp Pelaku</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ Auth::user()->pendaftaran->phone }}">
            @error('phone')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label>NIB</label>
            <input type="text" class="form-control" name="nib" value="{{ $nib }}" readonly>
        </div>
        <div class="col-md-6">
            <label>Sektor</label>
            <input type="text" class="form-control" name="sektor" value="Perindustrian" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label>NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp"
                placeholder="Contoh :  01.855.081.4-412.000">
            @error('npwp')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label>NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                value="{{ Auth::user()->pendaftaran->nik }}">
            @error('nik')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir">
            @error('tgl_lahir')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Jenis Kelamin</label>
            <select name="jk" id="" class="form-select @error('jk') is-invalid @enderror">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="0">Laki-Laki</option>
                <option value="1">Wanita</option>
            </select>
            @error('jk')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan">
            @error('jabatan')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
