@extends('layouts.admin')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">{{ $title }}</h5>
                <a href="{{ url('admin/slide') }}" class="btn btn-outline-dark btn-add">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ $image->id ? url('admin/slide/' . $image->id) : url('admin/slide') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($image->id)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-5">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control"
                                value="{{ old('judul', $image->name_slide) }}">
                        </div>
                        <div class="col-md-5">
                            <label>Gambar Slide</label>
                            <input type="file" name="slide"
                                class="form-control @error('slide')
                                is-invalid
                            @enderror"
                                id="uploadImage" onchange="PreviewImage();">
                            @error('slide')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-outline-info"><i
                                    class="fas fa-save me-1"></i>Save</button>
                        </div>
                    </div>
                    <div class="m-5 text-center">
                        <img src="{{ $image->id ? asset('image/' . $image->slide) : asset('darkpan-1.0.0/img/default-img.png') }}"
                            id="uploadPreview" class="imagePreview" alt="slide">
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
