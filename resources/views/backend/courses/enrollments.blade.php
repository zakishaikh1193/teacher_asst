@extends('backend.layouts.app')

@section('title', 'Legato Design - Enrolls')

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
            <h6 class="fw-semibold mb-0">Enrolls</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Enrolls</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3 d-flex justify-content-start gap-2">
                        <a href="{{ route('enrolls.export', 'excel') }}" class="btn btn-outline-success btn-sm">
                            Export Excel
                        </a>
                    </div>
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th class="text-start">Full Name</th>
                                <th class="text-start">School Name</th>
                                <th class="text-start">Designation</th>
                                <th class="text-start">Course Category</th>
                                <th class="text-start">Course Title</th>
                                <th class="text-start">Created at</th>
                                <th class="text-center">Action</th> <!-- action centered -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- View Enroll Modal -->
    <div class="modal fade" id="viewEnrollModal" tabindex="-1" aria-labelledby="viewEnrollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enroll Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td id="modalFullName"></td>
                            </tr>
                            <tr>
                                <th>School Name</th>
                                <td id="modalSchoolName"></td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td id="modalDesignation"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td id="modalEmail"></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td id="modalPhone"></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td id="modalCategory"></td>
                            </tr>
                            <tr>
                                <th>Course Title</th>
                                <td id="modalCourseTitle"></td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td id="modalCreatedAt"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('enroll.get') }}",
                columns: [{
                        data: 'full_name',
                        name: 'full_name',
                        className: 'text-start'
                    },
                    {
                        data: 'school_name',
                        name: 'school_name',
                        className: 'text-start'
                    },
                    {
                        data: 'designation',
                        name: 'designation',
                        className: 'text-start'
                    },
                    {
                        data: 'category',
                        name: 'category',
                        className: 'text-start'
                    },
                    {
                        data: 'course_title',
                        name: 'course_title',
                        className: 'text-start'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-start'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
            });
        });

        $(document).on('click', '.view-btn', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/enrolls/' + id + '/view',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var enroll = response.data;

                        $('#modalFullName').text(enroll.full_name ?? '');
                        $('#modalSchoolName').text(enroll.school_name ?? '');
                        $('#modalDesignation').text(enroll.designation ?? '');
                        $('#modalEmail').text(enroll.email ?? '');
                        $('#modalPhone').text(enroll.phone ?? '');
                        $('#modalCategory').text(enroll.category ?? '');
                        $('#modalCourseTitle').text(enroll.course_title ?? '');
                        $('#modalCreatedAt').text(enroll.created_at ? new Date(enroll.created_at)
                            .toLocaleDateString() : '');

                        $('#viewEnrollModal').modal('show');
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Failed to load details.', 'error');
                }
            });
        });
    </script>

@endsection
