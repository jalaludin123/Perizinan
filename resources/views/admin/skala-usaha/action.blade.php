<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $skalaUsaha->id ? url('admin/skala-usaha/' . $skalaUsaha->id) : url('admin/skala-usaha') }}"
        method="POST" id="formAction">
        @csrf
        @if ($skalaUsaha->id)
            @method('put')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>Skala Usaha</label>
                <input type="text" name="skala_usaha" id="skala_usaha" class="form-control"
                    value="{{ old('skala_usaha', $skalaUsaha->nama_skala_usaha) }}">
            </div>
            <div class="mb-3">
                <label>Keterangan Skala Usaha</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan"
                    value="{{ old('keterangan', $skalaUsaha->keterangan_skala_usaha) }}">
            </div>
            <div class="mb-3">
                <label>Deskripsi Skala Usaha</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4">{{ old('deskripsi', $skalaUsaha->description_skala_usaha) }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
