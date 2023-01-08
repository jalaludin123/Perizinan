@extends('layouts.admin')
@push('css')
    <link href="{{ asset('darkpan-1.0.0/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('darkpan-1.0.0/css/responsive.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('darkpan-1.0.0/css/toastr.min.css') }}" rel="stylesheet" />
@endpush
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="text-dark">Data KBLI</h5>
                <button type="button" class="btn btn-outline-dark btn-add">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="kbliModal" tabindex="-1">
        <div class="modal-dialog">

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('darkpan-1.0.0/js/jquery.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('darkpan-1.0.0/js/toastr.min.js') }}"></script>
    {{ $dataTable->scripts() }}

    <script>
        $(document).ready(function($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }


            $('.btn-add').on('click', function() {
                $.ajax({
                    method: 'get',
                    url: `{{ url('admin/kbli1/create') }}`,
                    success: function(res) {
                        $('#kbliModal').find('.modal-dialog').html(res)
                        modal.show()
                        store()
                    }
                })

                function store() {
                    $('#formAction').on('submit', function(e) {
                        e.preventDefault()
                        const _form = this
                        const formData = new FormData(_form)
                        $.ajax({
                            method: 'POST',
                            url: `{{ url('admin/kbli1') }}`,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                window.LaravelDataTables["kbli1-table"].ajax
                                    .reload()
                                modal.hide()
                                toastr.success('Data Created successfully', 'Success');
                            },
                            error: function(res) {
                                let errors = res.responseJSON?.errors
                                $(_form).find('.text-danger.text-small').remove()
                                if (errors) {
                                    for (const [key, value] of Object.entries(errors)) {
                                        $(`[name='${key}']`).parent().append(
                                            `<span class="text-danger text-small">${value}</span>`
                                        )
                                    }
                                }
                            }
                        })
                    })
                }
            })

            const modal = new bootstrap.Modal('#kbliModal')

            $('#kbli1-table').on('click', '.action', function() {
                let data = $(this).data()
                let id = data.id
                let jenis = data.jenis

                if (jenis == 'delete') {
                    if (confirm("Are You sure want to delete this Post!") === true) {
                        $.ajax({
                            method: 'DELETE',
                            url: `{{ url('admin/kbli1/') }}/${id}`,
                            success: function(res) {
                                window.LaravelDataTables["kbli1-table"].ajax
                                    .reload()
                                toastr.success('Data Deleted successfully', 'Success');
                            }
                        })
                    }
                    return
                }

                $.ajax({
                    method: 'get',
                    url: `{{ url('admin/kbli1/') }}/${id}/edit`,
                    success: function(res) {
                        $('#kbliModal').find('.modal-dialog').html(res)
                        modal.show()
                        store()
                    }
                })

                function store() {
                    $('#formAction').on('submit', function(e) {
                        e.preventDefault()
                        const _form = this
                        const formData = new FormData(_form)
                        $.ajax({
                            method: 'POST',
                            url: `{{ url('admin/kbli1/') }}/${id}`,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                window.LaravelDataTables["kbli1-table"].ajax
                                    .reload()
                                modal.hide()
                                toastr.success('Data Updated successfully', 'Success');
                            },
                            error: function(res) {
                                let errors = res.responseJSON?.errors
                                $(_form).find('.text-danger.text-small').remove()
                                if (errors) {
                                    for (const [key, value] of Object.entries(errors)) {
                                        $(`[name='${key}']`).parent().append(
                                            `<span class="text-danger text-small">${value}</span>`
                                        )
                                    }
                                }
                            }
                        })
                    })
                }
            })
        })
    </script>
@endpush
