<div class="p-3">
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label>Kota</label>
                <select name="kota" id="city" class="form-select @error('kota') is-invalid @enderror"
                    onchange="cityDown()">
                    <option value="">--Pilih Kota--</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
                @error('kota')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label>Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror"
                    onchange="kecamatanDown()">
                    <option value="">--Pilih Kecamatan--</option>
                </select>
                @error('kecamatan')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label>Kelurahan</label>
                <select name="kelurahan" id="kelurahan" class="form-select @error('kelurahan') is-invalid @enderror">
                    <option value="">--Pilih Kelurahan--</option>
                </select>
                @error('kelurahan')
                    <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Address</label>
            <textarea name="address" rows="5" class="form-control @error('address') is-invalid @enderror"></textarea>
            @error('address')
                <p class="text-small text-danger invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
