<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $jenisUsaha->id ? url('admin/jenis-usaha/' . $jenisUsaha->id) : url('admin/jenis-usaha') }}"
        method="POST" id="formAction">
        @csrf
        @if ($jenisUsaha->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>Jenis Usaha</label>
                <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control"
                    value="{{ old('jenis_usaha', $jenisUsaha->nama_jenis_usaha) }}">
            </div>
            <div class="mb-3">
                <label>Status jenis Usaha</label>
                <div class="m-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                            {{ $jenisUsaha->status == '1' ? 'checked' : '' }} name="status">
                        <label class="form-check-label">Non UMK</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
