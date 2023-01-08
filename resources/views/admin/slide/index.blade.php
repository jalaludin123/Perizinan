@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">{{ $title }}</h5>
                <a href="{{ url('admin/slide/create') }}" class="btn btn-outline-dark btn-add">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gambar Slide</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($images)
                                @foreach ($images as $image)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $image->name_slide }}</td>
                                        <td>
                                            <img src="{{ asset('image/' . $image->slide) }}" alt="{{ $image->name_slide }}"
                                                style="width: 100px;height:50px;">
                                        </td>
                                        <td>
                                            @if ($image->status == 0)
                                                <a href="{{ url('admin/slide-status/' . $image->id) }}"
                                                    class="badge bg-info p-2 fw-bold">Non Aktifkan</a>
                                            @else
                                                <a href="{{ url('admin/slide-status/' . $image->id) }}"
                                                    class="badge bg-danger p-2 fw-bold">Aktifkan</a>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ url('admin/slide/' . $image->id) }}" method="post"
                                                onsubmit="return confirm('Apakah Anda Yakin ?');">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('admin/slide/' . $image->id . '/edit') }}"
                                                    class="btn btn-outline-dark"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if ($images->links())
                        <div>
                            {{ $images->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
