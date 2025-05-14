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
            <h6 class="fw-semibold mb-0">Testimonials</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Components / Testimonials</li>
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
                                        value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'testimonials' }}">
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
                                    <button class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#addTestimonialModal">
                                        + Add Testimonial
                                    </button>
                                </p>

                                {{-- <div class="table-responsive">
                                    <table class="table striped-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Message</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach ($testimonials as $testimonial)
                                                <tr>
                                                    <td>{{ $testimonial->name }}</td>
                                                    <td>{{ $testimonial->designation }}</td>
                                                    <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                                    <td><img src="{{ asset('storage/' . $testimonial->image) }}"
                                                            width="50"></td>
                                                    <td>
                                                        <a href="{{ route('dashboard.testimonials.edit', $testimonial->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form
                                                            action="{{ route('dashboard.testimonials.destroy', $testimonial->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Delete this testimonial?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}

                                <div class="table-responsive">
                                    <table class="table striped-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Message</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="testimonialTable">
                                            @isset($testimonials)
                                                @foreach ($testimonials as $testimonial)
                                                    <tr id="testimonialRow{{ $testimonial->id }}">
                                                        <td>{{ $testimonial->name }}</td>
                                                        <td>{{ $testimonial->designation }}</td>
                                                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                                        <td>
                                                            <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}"
                                                                width="50" class="rounded-circle">
                                                        </td>
                                                        <td>
                                                            {{-- <a href="javascript:void(0)"
                                                            class="btn btn-warning btn-sm edit-testimonial"
                                                            data-id="{{ $testimonial->id }}"
                                                            data-name="{{ $testimonial->name }}"
                                                            data-designation="{{ $testimonial->designation }}"
                                                            data-message="{{ $testimonial->message }}"
                                                            data-image="{{ asset('uploads/testimonials/' . $testimonial->image) }}">
                                                            Edit 
                                                        </a> --}}
                                                            <button class="btn btn-primary btn-sm edit-testimonial"
                                                                data-id="{{ $testimonial->id }}"
                                                                data-name="{{ $testimonial->name }}"
                                                                data-designation="{{ $testimonial->designation }}"
                                                                data-message="{{ $testimonial->message }}"
                                                                data-image="{{ asset('uploads/testimonials/' . $testimonial->image) }}">
                                                                Edit
                                                            </button>

                                                            <button type="button"
                                                                class="btn btn-danger btn-sm delete-testimonial"
                                                                data-id="{{ $testimonial->id }}">
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
                                        value=" {{ isset($section3->section) && !empty($section3->section) ? $section3->section : 'section-2-testimonial' }} ">
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

    <!-- Bootstrap Modal for Adding Testimonial -->
    {{-- <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTestimonialLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTestimonialForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image (77 X 77)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Save Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Bootstrap Modal for Add/Update Testimonial -->
    <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="testimonialForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="testimonial_id" id="testimonial_id">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" id="message" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image (77x77)</label>
                            <input type="file" name="image" class="form-control">
                            <img id="previewImage" class="mt-2" style="width:50px; display:none;">
                        </div>
                        <button type="submit" class="btn btn-success w-200" id="saveTestimonialBtn">Save
                            Testimonial</button>
                    </form>
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

            // $("#addTestimonialForm").submit(function(e) {
            //     e.preventDefault();
            //     var formData = new FormData(this);
            //     $.ajax({
            //         url: "{{ route('dashboard.testimonials.store') }}",
            //         type: "POST",
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function(response) {
            //             $("#addTestimonialModal").modal("hide");
            //             $("#successMessage").removeClass("d-none").text(
            //                 "Testimonial added successfully!").fadeOut(3000);
            //             $("#addTestimonialForm")[0].reset();

            //             // Append new testimonial row
            //             $("#testimonialTable").prepend(`
        //         <tr id="testimonialRow${response.id}">
        //             <td>${response.name}</td>
        //             <td>${response.designation}</td>
        //             <td>${response.message.substring(0, 50)}...</td>
        //             <td>
        //                 <img src="${response.image}" width="50" class="rounded-circle">
        //             </td>
        //             <td>
        //                 <form class="delete-form" data-id="${response.id}" method="POST">
        //                     @csrf @method('DELETE')
        //                     <button type="button" class="btn btn-danger btn-sm delete-testimonial">Delete</button>
        //                 </form>
        //             </td>
        //         </tr>
        //     `);
            //         },
            //         error: function(error) {
            //             alert("Error adding testimonial. Please try again.");
            //         }
            //     });
            // });


            // Open modal in ADD mode
            $('[data-bs-target="#addTestimonialModal"]').on('click', function() {
                $('#testimonialModalLabel').text('Add Testimonial');
                $('#testimonialForm')[0].reset();
                $('#testimonial_id').val('');
                $('#previewImage').hide();
                $('#testimonialModal').modal('show');
            });

            // Open modal in EDIT mode
            $(document).on('click', '.edit-testimonial', function() {
                $('#testimonialModalLabel').text('Edit Testimonial');
                $('#testimonial_id').val($(this).data('id'));
                $('#name').val($(this).data('name'));
                $('#designation').val($(this).data('designation'));
                $('#message').val($(this).data('message'));
                $('#previewImage').attr('src', $(this).data('image')).show();
                $('#testimonialModal').modal('show');
            });


            // $("#addTestimonialForm").submit(function(e) {
            //     e.preventDefault();

            //     Swal.fire({
            //         title: "Are you sure?",
            //         text: "Do you want to add this testimonial?",
            //         icon: "question",
            //         showCancelButton: true,
            //         confirmButtonText: "Yes, add it!",
            //         cancelButtonText: "Cancel",
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             var formData = new FormData(this);

            //             $.ajax({
            //                 url: "{{ route('dashboard.testimonials.store') }}",
            //                 type: "POST",
            //                 data: formData,
            //                 processData: false,
            //                 contentType: false,
            //                 success: function(response) {
            //                     $("#addTestimonialModal").modal("hide");
            //                     $("#addTestimonialForm")[0].reset();

            //                     // Append new testimonial row dynamically
            //                     $("#testimonialTable").prepend(`
        //                 <tr id="testimonialRow${response.id}">
        //                     <td>${response.name}</td>
        //                     <td>${response.designation}</td>
        //                     <td>${response.message.substring(0, 50)}...</td>
        //                     <td>
        //                         <img src="${response.image}" width="50" class="rounded-circle">
        //                     </td>
        //                     <td> 
        //                         <button class="btn btn-danger btn-sm delete-testimonial" data-id="${response.id}">
        //                             Delete
        //                         </button>
        //                     </td>
        //                 </tr>
        //             `);

            //                     Swal.fire({
            //                         title: "Added!",
            //                         text: "Testimonial has been added successfully.",
            //                         icon: "success",
            //                         timer: 2000
            //                     });
            //                 },
            //                 error: function(xhr) {
            //                     let errors = xhr.responseJSON.errors;
            //                     let errorMessage =
            //                         "Error adding testimonial. Please try again.";

            //                     if (errors) {
            //                         errorMessage = Object.values(errors).map((error) =>
            //                             error.join("<br>")).join("<br>");
            //                     }

            //                     Swal.fire({
            //                         title: "Error!",
            //                         html: errorMessage,
            //                         icon: "error"
            //                     });
            //                 }
            //             });
            //         }
            //     });
            // });

            // Submit form
            $('#testimonialForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var id = $('#testimonial_id').val();
                var url = id ? `/dashboard/testimonials/${id}` :
                    `{{ route('dashboard.testimonials.store') }}`;
                var type = id ? 'POST' : 'POST'; // For Laravel PUT via POST, if needed use _method.

                if (id) {
                    formData.append('_method', 'PUT'); // Laravel expects this for PUT
                }

                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#testimonialModal').modal('hide');
                        $('#testimonialForm')[0].reset();
                        $('#testimonial_id').val('');

                        // Optionally update the testimonial row or reload table
                        location.reload(); // Or use AJAX to update only the changed row
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = "Something went wrong.";
                        if (errors) {
                            errorMessage = Object.values(errors).map(e => e.join('<br>')).join(
                                '<br>');
                        }

                        Swal.fire({
                            title: "Error!",
                            html: errorMessage,
                            icon: "error"
                        });
                    }
                });
            });


            $(document).on("click", ".delete-testimonial", function() {
                var testimonialId = $(this).data("id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won’t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/dashboard/testimonials/" + testimonialId,
                            type: "POST",
                            data: {
                                _method: "DELETE",
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                $("#testimonialRow" + testimonialId).fadeOut(300,
                                    function() {
                                        $(this).remove();
                                    });

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Testimonial has been deleted.",
                                    icon: "success",
                                    timer: 2000
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    title: "Error!",
                                    text: "There was a problem deleting the testimonial.",
                                    icon: "error"
                                });
                            }
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
