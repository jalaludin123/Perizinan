@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">{{ $title }}</h5>
                <a href="{{ url('admin/panduan/create') }}" class="btn btn-info"><i class="fas fa-plus-circle me-2"></i>Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><a
                                            href="{{ url('admin/panduan/' . $file->id . '/viewPdf') }}">{{ $file->nama_panduan }}</a>
                                    </td>
                                    <td>
                                        @if ($file->kategori == 0)
                                            Usaha Mikro Dan Kecil (UMK)
                                        @elseif ($file->kategori == 1)
                                            Non Usaha Mikro Dan Kecil (Non UMK)
                                        @elseif ($file->kategori == 2)
                                            Pemerintah Daerah
                                        @elseif ($file->kategori == 3)
                                            Kementrian Dan Lembaga
                                        @elseif ($file->kategori == 4)
                                            Administrasi Kek/Badan Pengusaha KPBPB
                                        @else
                                            Kementrian Investasi/BKPM Dan DPMPTSP
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('admin/panduan/' . $file->id) }}" method="post"
                                            onsubmit="return confirm('Apakah Anda Yakin ?');">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/panduan/' . $file->id . '/edit') }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($files->links())
                        <div>
                            {{ $files->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
