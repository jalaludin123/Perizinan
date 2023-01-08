<div class="p-3">
    <div class="mb-3">
        <label>KBLI Golongan I</label>
        <select name="kbli1" id="kbli1" class="form-select @error('kbli1') is-invalid @enderror"
            onchange="kbli1Down()">
            <option value="">--Pilih KBLI I--</option>
            @foreach ($kbli as $kb)
                <option value="{{ $kb->id }}">{{ $kb->kode_kbli }} - {{ $kb->nama_kbli }}</option>
            @endforeach
        </select>
        @error('kbli1')
            <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>KBLI Golongan II</label>
        <select name="kbli2" id="kbli2" class="form-select @error('kbli2') is-invalid @enderror"
            onchange="kbli2Down()">
            <option value="">--Pilih KBLI II--</option>
        </select>
        @error('kbli2')
            <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>KBLI Golongan III</label>
        <select name="kbli3" id="kbli3" class="form-select @error('kbli3') is-invalid @enderror"
            onchange="kbli3Down()">
            <option value="">--Pilih KBLI III--</option>
        </select>
        @error('kbli3')
            <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>KBLI Golongan IV</label>
        <select name="kbli4" id="kbli4" class="form-select @error('kbli4') is-invalid @enderror"
            onchange="kbli4Down()">
            <option value="">--Pilih KBLI IV--</option>
        </select>
        @error('kbli4')
            <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label>KBLI Golongan V</label>
        <select name="kbli5" id="kbli5" class="form-select @error('kbli5') is-invalid @enderror">
            <option value="">--Pilih KBLI V--</option>
        </select>
        @error('kbli5')
            <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
