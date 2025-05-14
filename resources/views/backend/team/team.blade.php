@extends('backend.layouts.app')

@section('backend-css')
    <style>
        .cms-tab.active {
            background-color: #c0deff;
            color: rgb(0, 0, 0);
            border-radius: 8px;
            padding: 8px 12px;
        }

        .cms-content {
            padding: 20px;
        }

        .d-none {
            display: none !important;
        }
    </style>
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Team</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard 
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Components / Team</li>
            </ul>
        </div>

        <div class="row gy-4">

            <div class="col-xxl-3">
                <div class="card h-100 p-0 shadow">
                    <div class="card-body p-24">
                        <div class="mt-16">
                            <ul>
                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab active"
                                        data-target="seoSection">
                                        <span class="fw-semibold"> SEO Section</span>
                                    </a>
                                </li>

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-1">
                                        <span class="fw-semibold"> Section 1 </span>
                                    </a>
                                </li>

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-2">
                                        <span class="fw-semibold">Section 2 </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9">
                <div class="card h-100 p-0 shadow">
                    <div class="card-body p-0">

                        {{-- seo section  --}}
                        <div id="seoSection" class="cms-content active">
                            <div class="col-md-12 ">
                                <h5 class="card-title mb-0 text-center">SEO </h5>
                                <hr class="m-1">

                                <form id="seoForm" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="page_name"
                                        value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'team' }}">
                                    <input type="hidden" name="id"
                                        value="{{ isset($seo->id) && !empty($seo->id) ? $seo->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">SEO Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($seo->title) && !empty($seo->title) ? $seo->title : '' }}"
                                                class="form-control" placeholder="SEO Title">
                                        </div>
                                    </div>
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Meta Description:</label>
                                        <div class="col-sm-10">
                                            <textarea name="meta_description" class="form-control" placeholder="Meta Description">{{ isset($seo->meta_description) && !empty($seo->meta_description) ? $seo->meta_description : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">SEO Keywords:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="keywords"
                                                value="{{ isset($seo->keywords) && !empty($seo->keywords) ? $seo->keywords : '' }}"
                                                class="form-control" placeholder="SEO Keywords">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($seo->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($seo->created_at) && !empty($seo->created_at) ? 'created at: ' . $seo->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($seo->updated_at) && !empty($seo->updated_at) ? 'updated at: ' . $seo->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>
                            </div>
                        </div>

                        {{-- section 1 --}}
                        <div id="section-1" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 1 </h5>
                                <hr class="m-1">

                                <p class="text-end">
                                    {{-- <button class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#addTestimonialModal">
                                        + Add Testimonial
                                    </button> --}}
                                    <button class="btn btn-primary mb-3" id="addTeamBtn">Add Team Member</button>
                                </p>

                                <div class="table-responsive">
                                    <table class="table striped-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="teamTable">
                                            @isset($teams)
                                                @foreach ($teams as $team)
                                                    <tr id="teamRow{{ $team->id }}">
                                                        <td>{{ $team->name }}</td>
                                                        <td>{{ $team->designation }}</td>
                                                        <td>
                                                            <img src="{{ asset('/uploads/team/' . $team->image) }}"
                                                                width="60" class="rounded">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-sm editTeam"
                                                                data-id="{{ $team->id }}" data-name="{{ $team->name }}"
                                                                data-designation="{{ $team->designation }}"
                                                                data-button_name="{{ $team->button_name }}"
                                                                data-button_url="{{ $team->button_url }}"
                                                                data-facebook="{{ $team->facebook }}"
                                                                data-twitter="{{ $team->twitter }}"
                                                                data-instagram="{{ $team->instagram }}"
                                                                data-linkedin="{{ $team->linkedin }}"
                                                                data-image="{{ asset('/uploads/team/' . $team->image) }}">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm deleteTeam"
                                                                data-id="{{ $team->id }}">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- section 2 --}}
                        <div id="section-2" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 2 </h5>
                                <hr class="m-1">

                                <form id="section3" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section3->section) && !empty($section3->section) ? $section3->section : 'section-2-team' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section3->id) && !empty($section3->id) ? $section3->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section3->active) && !empty($section3->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section3->header) && !empty($section3->header) ? $section3->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    @php
                                        $add_infoS3 =
                                            isset($section3->additional_info) && !empty($section3->additional_info)
                                                ? json_decode($section3->additional_info, true)
                                                : '';
                                    @endphp

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Button Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="btn_name"
                                                value="{{ isset($add_infoS3['btn_name']) && !empty($add_infoS3['btn_name']) ? $add_infoS3['btn_name'] : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Button URL:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="btn_url"
                                                value="{{ isset($add_infoS3['btn_url']) && !empty($add_infoS3['btn_url']) ? $add_infoS3['btn_url'] : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section3->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section3->created_at) && !empty($section3->created_at) ? 'created at: ' . $section3->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section3->updated_at) && !empty($section3->updated_at) ? 'updated at: ' . $section3->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teamModalLabel">Add Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="teamForm">
                        @csrf
                        <input type="hidden" name="id" id="teamId">
                        <input type="hidden" name="action" id="teamAction" value="add">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="teamName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" id="teamDesignation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Button Name</label>
                            <input type="text" name="button_name" id="teamButtonName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="url" name="url" id="teamUrl" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="url" name="facebook" id="teamFacebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="url" name="twitter" id="teamTwitter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="url" name="instagram" id="teamInstagram" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="url" name="linkedin" id="teamLinkedIn" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Image (370 X 446)</label>
                            <input type="file" name="image" id="teamImage" class="form-control">
                            <img id="previewImage" src="" width="100" class="mt-2 d-none">
                        </div>

                        {{-- <button type="submit" class="btn btn-success">Save</button> --}}
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" form="teamForm" class="btn btn-success">Save</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('backend-js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tabs = document.querySelectorAll(".cms-tab");
            let contents = document.querySelectorAll(".cms-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function(e) {
                    e.preventDefault();

                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove("active"));

                    // Hide all content sections
                    contents.forEach(content => content.classList.add("d-none"));

                    // Add active class to clicked tab
                    this.classList.add("active");

                    // Show the corresponding content
                    let targetId = this.getAttribute("data-target");
                    document.getElementById(targetId).classList.remove("d-none");
                });
            });
        });

        $(document).ready(function() {
            $("#seoForm").submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ url('/seo') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: response.status === "success" ? "success" : "error",
                            title: response.status === "success" ? "Success!" :
                                "Error!",
                            text: response.message,
                            confirmButtonColor: response.status === "success" ?
                                "#3085d6" : "#d33",
                            confirmButtonText: "OK"
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                "An unexpected error occurred.",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });
            //////////////////// seoForm END ////////////////////

            $("#addTeamBtn").click(function() {
                $("#teamModal").modal("show");
                $("#teamForm")[0].reset();
                $("#teamAction").val("add");
                $("#previewImage").attr("src", "").addClass("d-none");
            });

            $(".editTeam").click(function() {
                $("#teamModal").modal("show");
                $("#teamAction").val("edit");

                let id = $(this).data("id");
                let name = $(this).data("name");
                let designation = $(this).data("designation");
                let button_name = $(this).data("button_name");
                let url = $(this).data("button_url");
                let facebook = $(this).data("facebook");
                let twitter = $(this).data("twitter");
                let instagram = $(this).data("instagram");
                let linkedin = $(this).data("linkedin");
                let image = $(this).data("image");

                $("#teamId").val(id);
                $("#teamName").val(name);
                $("#teamDesignation").val(designation);
                $("#teamButtonName").val(button_name);
                $("#teamUrl").val(url);
                $("#teamFacebook").val(facebook);
                $("#teamTwitter").val(twitter);
                $("#teamInstagram").val(instagram);
                $("#teamLinkedIn").val(linkedin);

                if (image) {
                    $("#previewImage").attr("src", image).removeClass("d-none");
                } else {
                    $("#previewImage").addClass("d-none");
                }
            });

            $("#teamImage").change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImage").attr("src", e.target.result).removeClass("d-none");
                };
                reader.readAsDataURL(this.files[0]);
            });

            $("#teamForm").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                formData.append("action", $("#teamAction").val());

                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.team') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.success,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong!',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            $(".deleteTeam").click(function() {
                let id = $(this).data("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("{{ route('dashboard.team') }}", {
                            id: id,
                            action: "delete",
                            _token: "{{ csrf_token() }}"
                        }, function(response) {
                            Swal.fire('Deleted!', response.success, 'success').then(() => {
                                location.reload();
                            });
                        });
                    }
                });
            });

            //////////////////// section1 //////////////////// 

            $(".contactForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: "/dashboard/faq",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            icon: response.status === "success" ? "success" : "error",
                            title: response.status === "success" ? "Success!" :
                                "Error!",
                            text: response.message,
                            confirmButtonColor: response.status === "success" ?
                                "#3085d6" : "#d33",
                            confirmButtonText: "OK"
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                "An unexpected error occurred.",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });
            //////////////////// section1 END ////////////////////
        });
    </script>
@endsection
