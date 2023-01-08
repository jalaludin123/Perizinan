@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">{{ $user->id ? $title : $title }}</h5>
                <a href="{{ url('admin/user') }}" class="btn btn-outline-warning">
                    <i class="fas fa-arrow-left me-1"></i>Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ $user->id ? url('admin/user/' . $user->id) : url('admin/user') }}" method="post">
                    @csrf
                    @if ($user->id)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @if ($user->id)
                    @else
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Role</label>
                                <select name="role"
                                    class="form-select @error('role')
                                    is-invalid
                                @enderror">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="2">Admin</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="text-center m-4">
                        <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save me-2"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
