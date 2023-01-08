@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">{{ $title }}</h5>
                @if (Auth::user()->role == 1)
                    <a href="{{ url('admin/user/create') }}" class="btn btn-outline-dark btn-add">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                @endif
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 0)
                                                User
                                            @elseif ($user->role == 1)
                                                Kabid
                                            @elseif ($user->role == 2)
                                                Admin
                                            @endif
                                        </td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ url('admin/user/' . $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('admin/user/' . $user->id . '/edit') }}"
                                                    class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if ($users->links())
                        <div>
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
