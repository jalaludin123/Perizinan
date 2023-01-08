<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $kbli2->id ? url('admin/kbli2/' . $kbli2->id) : url('admin/kbli2') }}" method="POST"
        id="formAction">
        @csrf
        @if ($kbli2->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>Kode Kbli I</label>
                <select name="kbli1" id="kbli1" class="form-control">
                    <option value="{{ $kbli2->kbli_id }}">
                        {{ $kbli2->id ? $kbli2->kbli1->kode_kbli . ' - ' . $kbli2->kbli1->nama_kbli : ' -- Pilih Kbli 1 --' }}
                    </option>
                    @foreach ($kbli as $kb)
                        <option value="{{ $kb->id }}">{{ $kb->kode_kbli }} - {{ $kb->nama_kbli }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Kode Kbli II</label>
                <input type="text" name="kode" id="kode" class="form-control"
                    value="{{ old('kode', $kbli2->kode_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Nama Kbli1</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $kbli2->nama_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Fungsi Kbli1</label>
                <textarea name="fungsi" id="fungsi" rows="4" class="form-control">{{ old('fungsi', $kbli2->fungsi_kbli) }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
