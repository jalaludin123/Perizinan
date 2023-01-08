@extends('layouts.app')
@section('content')
    <div class="card h-100 mt-2">
        <div class="card-body">
            <embed type="application/pdf" src="{{ asset('file/' . $panduan->file_panduan) }}"
                style="height: 100vh;width:100%;"></embed>
        </div>
    </div>
@endsection
