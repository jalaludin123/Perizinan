@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-dark">{{ $title }}</h5>
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ url('admin/setting') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5 text-center">
                        <img src="{{ $setting ? asset('image/logo/' . $setting->logo) : asset('darkpan-1.0.0/img/default-img.png') }}"
                            id="uploadPreview" style="width:300px;height:200px;" alt="slide">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Nama Website</label>
                            <input type="text" class="form-control" name="name" value="{{ $setting->name_website }}">
                        </div>
                        <div class="col-md-6">
                            <label>URL Website</label>
                            <input type="text" class="form-control" name="url" value="{{ $setting->url_website }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" name="phone" value="{{ $setting->phone_website }}">
                        </div>
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ $setting->email_website }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Whatsup</label>
                            <input type="text" class="form-control" name="wa" value="{{ $setting->wa_website }}">
                        </div>
                        <div class="col-md-6">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="fb" value="{{ $setting->fb_website }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Instagram</label>
                            <input type="text" class="form-control" name="ig" value="{{ $setting->ig_website }}">
                        </div>
                        <div class="col-md-6">
                            <label>Twitter</label>
                            <input type="text" class="form-control" name="twet"
                                value="{{ $setting->twitter_website }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Youtube</label>
                            <input type="text" class="form-control" name="yt"
                                value="{{ $setting->youtube_website }}">
                        </div>
                        <div class="col-md-6">
                            <label>Logo</label>
                            <input type="file" class="form-control" name="logo" id="uploadImage"
                                onchange="PreviewImage();">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label>Address Dinas</label>
                            <textarea name="address" rows="4" class="form-control">{{ $setting->address_website }}</textarea>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-outline-info"><i class="fas fa-save me-1"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
@endpush
