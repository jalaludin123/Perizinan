<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $kbli3->id ? url('admin/kbli3/' . $kbli3->id) : url('admin/kbli3') }}" method="POST"
        id="formAction">
        @csrf
        @if ($kbli3->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>KBLI II</label>
                <select name="kbli2" id="kbli2" class="form-control">
                    <option value="{{ $kbli3->golongan_2_id }}">
                        {{ $kbli3->id ? $kbli3->kbli2->kode_kbli . ' - ' . $kbli3->kbli2->nama_kbli : '--Pilih Kode KBLI-- ' }}
                    </option>
                    @foreach ($kbli2 as $kbli)
                        <option value="{{ $kbli->id }}">{{ $kbli->kode_kbli }} - {{ $kbli->nama_kbli }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>KBLI III</label>
                <input type="text" name="kode" id="kode" class="form-control"
                    value="{{ old('kode', $kbli3->kode_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Nama Kbli1</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $kbli3->nama_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Fungsi Kbli1</label>
                <textarea name="fungsi" id="fungsi" rows="4" class="form-control">{{ old('fungsi', $kbli3->fungsi_kbli) }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
