@extends('layouts.admin')
@section('contents')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4 h-75">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 box-card">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Users</p>
                        <h6 class="mb-0 text-dark">{{ $user }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 box-card">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Terverifikasi</p>
                        <h6 class="mb-0 text-dark">{{ $verifikasi }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 box-card">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Belum Terverifikasi</p>
                        <h6 class="mb-0 text-dark">{{ $belumtervifikasi }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5" style="width: 100%">
            <div class="card-body">
                <div class="mb-3">
                    <h4 class="text-dark">Data Perizinan Perkecamatan</h4>
                </div>
                <div style="width: 100%">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endpush
