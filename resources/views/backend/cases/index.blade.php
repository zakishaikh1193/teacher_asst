@extends('backend.layouts.app')

@section('backend-css')
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Cases</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Cases</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            {{-- <div class="card-header">
                <h5 class="card-title mb-0">Services</h5> 
            </div> --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Cases</h5>
                <a href="{{ route('dashboard.cases.create') }}"
                    class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11">Add
                    Case</a>
            </div>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th> <!-- Now formatted with Bootstrap badge -->
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>



    </div>
@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This case will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.cases.data') }}",
                columns: [{
                        title: 'ID'
                    },
                    {
                        title: 'Title'
                    },
                    {
                        title: 'Status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        title: 'Slug'
                    },
                    {
                        title: 'Actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        targets: 2,
                        className: "text-center",
                        orderable: false
                    }, // Center status column
                    {
                        targets: 4,
                        className: "text-center"
                    } // Center actions column
                ]
            });
        });
    </script>
@endsection
