<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form
        action="{{ $jenisBadanUsaha->id ? url('admin/jenis-badan-usaha/' . $jenisBadanUsaha->id) : url('admin/jenis-badan-usaha') }}"
        method="POST" id="formAction">
        @csrf
        @if ($jenisBadanUsaha->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>Jenis Usaha</label>
                <select name="jenis_usaha" id="jenis_usaha" class="form-control">
                    <option value="{{ $jenisBadanUsaha->jenisUsaha_id }}">
                        {{ $jenisBadanUsaha->id ? $jenisBadanUsaha->jenisUsaha->nama_jenis_usaha : ' -- Pilih Jenis Usaha --' }}
                    </option>
                    @foreach ($jenisUsaha as $ju)
                        <option value="{{ $ju->id }}">{{ $ju->nama_jenis_usaha }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Jenis Pelaku Usaha</label>
                <input type="text" name="jenis_badan_usaha" id="jenis_badan_usaha" class="form-control"
                    value="{{ old('jenis_badan_usaha', $jenisBadanUsaha->nama_jenisBadanUsaha) }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
