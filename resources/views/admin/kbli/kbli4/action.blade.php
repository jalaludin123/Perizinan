<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $kbli4->id ? url('admin/kbli4/' . $kbli4->id) : url('admin/kbli4') }}" method="POST"
        id="formAction">
        @csrf
        @if ($kbli4->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>KBLI III</label>
                <select name="kbli3" id="kbli3" class="form-control">
                    <option value="{{ $kbli4->golongan_3_id }}">
                        {{ $kbli4->id ? $kbli4->kbli3->kode_kbli . ' - ' . $kbli4->kbli3->nama_kbli : '--Pilih Kode KBLI-- ' }}
                    </option>
                    @foreach ($kbli3 as $kbli)
                        <option value="{{ $kbli->id }}">{{ $kbli->kode_kbli }} - {{ $kbli->nama_kbli }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>KBLI IV</label>
                <input type="text" name="kode" id="kode" class="form-control"
                    value="{{ old('kode', $kbli4->kode_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Nama Kbli</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $kbli4->nama_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Fungsi Kbli</label>
                <textarea name="fungsi" id="fungsi" rows="4" class="form-control">{{ old('fungsi', $kbli4->fungsi_kbli) }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
