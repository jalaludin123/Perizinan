<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $kbli1->id ? url('admin/kbli1/' . $kbli1->id) : url('admin/kbli1') }}" method="POST"
        id="formAction">
        @csrf
        @if ($kbli1->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>Kode Kbli1</label>
                <input type="text" name="kode" id="kode" class="form-control"
                    value="{{ old('kode', $kbli1->kode_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Nama Kbli1</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $kbli1->nama_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Fungsi Kbli1</label>
                <input type="text" name="fungsi" id="fungsi" class="form-control"
                    value="{{ old('fungsi', $kbli1->fungsi_kbli) }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
