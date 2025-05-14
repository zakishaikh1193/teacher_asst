@extends('backend.layouts.app')

@section('backend-css')

@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Services</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Services</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            {{-- <div class="card-header">
                <h5 class="card-title mb-0">Services</h5>
            </div> --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Services</h5>
                {{-- <button type="button" class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11">Add
                    Service</button> --}}
                <a href="{{ route('dashboard.services.add') }}"
                    class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11">Add
                    Service</a>
            </div>

            {{-- 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Heading</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        test
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/user-list/user-list1.png" alt=""
                                class="flex-shrink-0 me-12 radius-8">
                        </div>
                    </td>
                    <td>
                        <a href="javascript:void(0)"
                            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)"
                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                    </td>
                </tr> --}}
            </tbody>

            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Heading</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>



    </div>
@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // let table = new DataTable('#dataTable');

        $(document).ready(function() {
            // let table = $('#dataTable').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{{ route('dashboard.services.list') }}",
            //     columns: [{
            //             data: 'id',
            //             name: 'id',
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: 'heading',
            //             name: 'heading',
            //             orderable: true,
            //             searchable: true
            //         },
            //         {
            //             data: 'image',
            //             name: 'image',
            //             orderable: false,
            //             searchable: false
            //         },
            //         {
            //             data: 'action',
            //             name: 'action',
            //             orderable: false,
            //             searchable: false
            //         }
            //     ],
            //     order: [
            //         [0, "desc"]
            //     ], // Default sorting (ID column, descending)
            //     pageLength: 10 // Show 10 records per page
            // });

            let table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.services.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'heading',
                        name: 'heading',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category',
                        name: 'category',
                        orderable: false,
                        searchable: true // Allow searching through category names
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, "desc"]
                ], // Default sorting (ID column, descending)
                pageLength: 10 // Show 10 records per page
            });


            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                let serviceId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/dashboard/services/delete/" + serviceId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                table.ajax.reload(); // Reload DataTable
                            },
                            error: function() {
                                Swal.fire('Error!', 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
