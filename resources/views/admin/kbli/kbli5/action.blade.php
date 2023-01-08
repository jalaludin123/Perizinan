<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="skala-modalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ $kbli5->id ? url('admin/kbli5/' . $kbli5->id) : url('admin/kbli5') }}" method="POST"
        id="formAction">
        @csrf
        @if ($kbli5->id)
            @method('PUT')
        @endif
        <div class="modal-body">
            <div class="mb-3">
                <label>KBLI IV</label>
                <select name="kbli4" id="kbli4" class="form-control">
                    <option value="{{ $kbli5->golongan_4_id }}">
                        {{ $kbli5->id ? $kbli5->kbli4->kode_kbli . ' - ' . $kbli5->kbli4->nama_kbli : '--Pilih Kode KBLI-- ' }}
                    </option>
                    @foreach ($kbli4 as $kbli)
                        <option value="{{ $kbli->id }}">{{ $kbli->kode_kbli }} - {{ $kbli->nama_kbli }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>KBLI V</label>
                <input type="text" name="kode" id="kode" class="form-control"
                    value="{{ old('kode', $kbli5->kode_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Nama Kbli</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $kbli5->nama_kbli) }}">
            </div>
            <div class="mb-3">
                <label>Fungsi Kbli</label>
                <textarea name="fungsi" id="fungsi" rows="4" class="form-control">{{ old('fungsi', $kbli5->fungsi_kbli) }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
