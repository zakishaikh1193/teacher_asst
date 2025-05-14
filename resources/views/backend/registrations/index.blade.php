@extends('backend.layouts.app')

@section('title', 'Legato Design - Registrations')

@section('backend-css')
    <style>
        div.dt-buttons {
            float: right;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Registrations</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">registrations</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            {{-- <div class="card-header">
                <h5 class="card-title mb-0">Services</h5> 
            </div> --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                {{-- <h5 class="card-title mb-0">Cases</h5> --}}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3 d-flex justify-content-start gap-2">
                        <a href="{{ route('registrations.export', 'csv') }}" class="btn btn-outline-primary btn-sm">Export
                            CSV</a>
                        <a href="{{ route('registrations.export', 'excel') }}" class="btn btn-outline-success btn-sm">Export
                            Excel</a>
                    </div>
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th class="text-start">Full Name</th>
                                <th class="text-start">School Name</th>
                                <th class="text-start">Designation</th>
                                <th class="text-start">Preferred Month</th>
                                <th class="text-start">Estimated Participants</th>
                                <th class="text-start">Created at</th>
                                <th class="text-center">Action</th> <!-- action centered -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registration Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Full Name:</strong> <span id="v-name"></span></li>
                            <li class="list-group-item"><strong>School Name:</strong> <span id="v-school"></span></li>
                            <li class="list-group-item"><strong>Designation:</strong> <span id="v-designation"></span></li>
                            <li class="list-group-item"><strong>Email:</strong> <span id="v-email"></span></li>
                            <li class="list-group-item"><strong>Phone:</strong> <span id="v-phone"></span></li>
                            <li class="list-group-item"><strong>Preferred Month:</strong> <span id="v-month"></span></li>
                            <li class="list-group-item"><strong>Estimated Participants:</strong> <span
                                    id="v-count"></span></li>
                            <li class="list-group-item"><strong>Additional Notes:</strong> <span id="v-notes"></span></li>
                            <li class="list-group-item"><strong>Created At (IST):</strong> <span id="v-created"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}

    {{-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script> --}}

    {{-- <script>
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('registrations.data') }}",
            columns: [{
                    data: 0,
                    name: 'full_name'
                },
                {
                    data: 1,
                    name: 'school_name'
                },
                {
                    data: 2,
                    name: 'designation'
                },
                {
                    data: 3,
                    name: 'preferred_month'
                },
                {
                    data: 4,
                    name: 'estimated_participants'
                },
                {
                    data: 5,
                    name: 'created_at'
                },
                {
                    data: 6,
                    orderable: false,
                    searchable: false
                } // Action column
            ],
            // dom: "<'row mb-3'<'col-md-6 text-start'B><'col-md-6 text-end'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row mt-2'<'col-md-5'i><'col-md-7'p>>",
            // buttons: [{
            //         extend: 'csvHtml5',
            //         text: 'CSV',
            //         exportOptions: {
            //             columns: [0, 1, 2, 3, 4, 5] // Excludes action column (index 6)
            //         }
            //     },
            //     { 
            //         extend: 'excelHtml5',
            //         text: 'Excel',
            //         exportOptions: {
            //             columns: [0, 1, 2, 3, 4, 5]
            //         }
            //     },
            //     {
            //         extend: 'pdfHtml5',
            //         text: 'PDF',
            //         exportOptions: {
            //             columns: [0, 1, 2, 3, 4, 5]
            //         }
            //     },
            //     {
            //         extend: 'print',
            //         text: 'Print',
            //         exportOptions: {
            //             columns: [0, 1, 2, 3, 4, 5]
            //         }
            //     }
            // ]
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            const table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('registrations.data') }}', 
                columns: [{
                        data: 0,
                        name: 'full_name'
                    },
                    {
                        data: 1,
                        name: 'school_name'
                    },
                    {
                        data: 2,
                        name: 'designation',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 3,
                        name: 'preferred_month'
                    },
                    {
                        data: 4,
                        name: 'estimated_participants'
                    },
                    {
                        data: 5,
                        name: 'created_at'
                    },
                    {
                        data: 6,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ]
            });
 
            // Modal handler
            $('#dataTable').on('click', '.view-btn', function() {
                $('#v-name').text($(this).data('name'));
                $('#v-school').text($(this).data('school'));
                $('#v-designation').text($(this).data('designation'));
                $('#v-email').text($(this).data('email'));
                $('#v-phone').text($(this).data('phone'));
                $('#v-month').text($(this).data('month'));
                $('#v-count').text($(this).data('count'));
                $('#v-notes').text($(this).data('notes') || 'N/A');
                $('#v-created').text($(this).data('created'));
            });
        });
    </script>

@endsection
