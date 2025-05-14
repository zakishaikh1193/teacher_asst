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
            <h6 class="fw-semibold mb-0">Contact</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Components / Contact</li>
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
                                        <span class="fw-semibold"> SEO Section </span>
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

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-3">
                                        <span class="fw-semibold">Section 3 </span>
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
                                        value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'contact' }}">
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
                                <form id="section1" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section1->section) && !empty($section1->section) ? $section1->section : 'section-1' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section1->id) && !empty($section1->id) ? $section1->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section1->active) && !empty($section1->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Header:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section1->header) && !empty($section1->header) ? $section1->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Short Description:</label>
                                        <div class="col-sm-10">
                                            <textarea name="short_description" class="form-control">{{ isset($section1->description) && !empty($section1->description) ? $section1->description : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section1->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section1->created_at) && !empty($section1->created_at) ? 'created at: ' . $section1->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section1->updated_at) && !empty($section1->updated_at) ? 'updated at: ' . $section1->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>
                            </div>
                        </div>

                        {{-- section 2 --}}
                        <div id="section-2" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 2 </h5>
                                <hr class="m-1">
                                <form id="section2" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section2->section) && !empty($section2->section) ? $section2->section : 'section-2' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section2->id) && !empty($section2->id) ? $section2->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section2->active) && !empty($section2->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Header:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section2->header) && !empty($section2->header) ? $section2->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Short Description:</label>
                                        <div class="col-sm-10">
                                            <textarea name="short_description" class="form-control">{{ isset($section2->description) && !empty($section2->description) ? $section2->description : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row gy-4 mb-3">
                                        @php
                                            $addInfoS2 =
                                                isset($section2->additional_info) && !empty($section2->additional_info)
                                                    ? json_decode($section2->additional_info, true)
                                                    : '';
                                        @endphp

                                        @if (isset($addInfoS2) && !empty($addInfoS2))
                                            @for ($i = 0; $i < 8; $i++)
                                                {{-- @if (isset($addInfoS2['country'][$i]) && !empty($addInfoS2['country'][$i])) --}}
                                                <div class="col-xxl-6 col-sm-6">
                                                    <div class="card h-100 radius-12">
                                                        <div class="card-body p-24">
                                                            <div class="row mb-24 gy-3 align-items-center">
                                                                <span class="text-center">Office
                                                                    {{ $i + 1 }}</span>
                                                                <label class="form-label mb-1 col-sm-2">Country</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="country[]"
                                                                        value="{{ isset($addInfoS2['country'][$i]) && !empty($addInfoS2['country'][$i]) ? $addInfoS2['country'][$i] : '' }}"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Address</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="address[]"
                                                                        value="{{ isset($addInfoS2['address'][$i]) && !empty($addInfoS2['address'][$i]) ? $addInfoS2['address'][$i] : '' }}"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" name="email[]"
                                                                        value="{{ isset($addInfoS2['email'][$i]) && !empty($addInfoS2['email'][$i]) ? $addInfoS2['email'][$i] : '' }}"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="phone[]"
                                                                        value="{{ isset($addInfoS2['phone'][$i]) && !empty($addInfoS2['phone'][$i]) ? $addInfoS2['phone'][$i] : '' }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @endif --}}
                                            @endfor
                                        @else
                                            @for ($i = 1; $i <= 8; $i++)
                                                <div class="col-xxl-6 col-sm-6">
                                                    <div class="card h-100 radius-12">
                                                        <div class="card-body p-24">
                                                            <div class="row mb-24 gy-3 align-items-center">
                                                                <span class="text-center">Office
                                                                    {{ $i }}</span>
                                                                <label class="form-label mb-1 col-sm-2">Country</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="country[]"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Address</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="address[]"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" name="email[]"
                                                                        class="form-control">
                                                                </div>
                                                                <label class="form-label mb-1 col-sm-2">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="phone[]"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section2->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section2->created_at) && !empty($section2->created_at) ? 'created at: ' . $section2->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section2->updated_at) && !empty($section2->updated_at) ? 'updated at: ' . $section2->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>
                            </div>
                        </div>

                        {{-- section 3 --}}
                        <div id="section-3" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center"> Section 3 </h5>
                                <hr class="m-1">
                                <form id="section3" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section3->section) && !empty($section3->section) ? $section3->section : 'section-3' }} ">
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
                                        <label class="form-label mb-0 col-sm-2"> </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="MAP" class="form-control"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">iframe src:</label>
                                        <div class="col-sm-10">
                                            <textarea name="short_description" class="form-control"
                                                placeholder="src only. e.g. https://www.google.com/maps/embed?pb=!1m1...">{{ isset($section3->description) && !empty($section3->description) ? $section3->description : '' }}</textarea>
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

            //////////////////// seoForm //////////////////// 
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

            //////////////////// section1 //////////////////// 
            // $("#section1").submit(function(e) {
            $(".contactForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: "/dashboard/contact",
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
