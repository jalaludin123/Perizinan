@extends('layouts.admin')
@section('contents')
    <embed type="application/pdf" src="{{ asset('file/' . $panduan->file_panduan) }}" width="100%" height="100%"></embed>
@endsection
