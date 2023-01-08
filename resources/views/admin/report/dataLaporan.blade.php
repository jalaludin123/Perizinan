@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-white">{{ $title }}</h5>
                <input type="search" id="search" class="form-control w-25" onkeyup="search()" placeholder="Search">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Skala Usaha</th>
                                <th>Nama Pelaku Usaha</th>
                                <th>Nomor Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $verifikasi)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $verifikasi->name_perusahaan }}</td>
                                    <td>{{ $verifikasi->skalaUsaha->nama_skala_usaha }}</td>
                                    <td>{{ $verifikasi->jenisPelakuUsaha->nama_jenis_usaha }}</td>
                                    <td>{{ $verifikasi->phone }}</td>
                                    <td>{{ $verifikasi->user->email }}</td>
                                    <td>
                                        @if ($verifikasi->status == 1)
                                            <div class="badge bg-danger p-2">Tidak Terverifikasi</div>
                                        @else
                                            <div class="badge bg-success p-2">Terverifikasi</div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('admin/deleteData/' . $verifikasi->id) }}" method="post"
                                            onsubmit="return confirm('Apakah Anda Yakin ?');">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/tidakTerverifikasi/' . $verifikasi->id) }}"
                                                class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush
