@extends('backend.layouts.app')

@section('backend-css')
    <style>
        .email-tab.active {
            background-color: #c0deff;
            color: rgb(0, 0, 0);
            border-radius: 8px;
            padding: 8px 12px;
        }

        .email-content {
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
            <h6 class="fw-semibold mb-0">Email</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Components / Email</li>
            </ul>
        </div>

        {{-- <div class="row gy-4">

            <div class="col-xxl-3">
                <div class="card h-100 p-0">
                    <div class="card-body p-24">
                        <div class="mt-16">
                            <ul>
                                <li class="mb-4">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light email-tab active"
                                        data-target="inbox">
                                        <span class="fw-semibold"> Section 1 </span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="starred.html"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light email-tab"
                                        data-target="starred">
                                        <span class="fw-semibold">Section 2 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9">
                <div class="card h-100 p-0">
                    <div class="card-body p-0">
                        <div class="overflow-x-auto m-2">

                            <div id="inbox" class="email-content active">
                                <h4>Section 1</h4>
                            </div>

                            <div id="starred" class="email-content d-none">
                                <h4>Section 2</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

        <div class="row">
            <div class="col-xxl-3">
                <div class="card h-100 p-0">
                    <div class="card-body p-24">
                        <div class="mt-16">
                            <ul>
                                <li class="mb-4">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light email-tab active"
                                        data-target="inbox" data-url="{{ url('contact/sections/section-1') }}">
                                        <span class="fw-semibold"> Section 1 </span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light email-tab"
                                        data-target="starred" data-url="{{ url('contact/sections/section-2') }}">
                                        <span class="fw-semibold"> Section 2 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9">
                <div class="card h-100 p-0 email-card">
                    <div class="card-body p-0">
                        <div class="overflow-x-auto m-2">
                            <div id="email-section-content">
                                <h4>Select a Section</h4>
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
        // document.addEventListener("DOMContentLoaded", function() {
        //     let tabs = document.querySelectorAll(".email-tab");
        //     let contents = document.querySelectorAll(".email-content");

        //     tabs.forEach(tab => {
        //         tab.addEventListener("click", function(e) {
        //             e.preventDefault();

        //             // Remove active class from all tabs
        //             tabs.forEach(t => t.classList.remove("active"));

        //             // Hide all content sections
        //             contents.forEach(content => content.classList.add("d-none"));

        //             // Add active class to clicked tab
        //             this.classList.add("active");

        //             // Show the corresponding content
        //             let targetId = this.getAttribute("data-target");
        //             document.getElementById(targetId).classList.remove("d-none");
        //         });
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $(".email-tab").click(function(e) {
                e.preventDefault();

                let url = $(this).data('url'); // Get URL from data attribute

                $(".email-tab").removeClass("active"); // Remove active class from all buttons
                $(this).addClass("active"); // Add active class to clicked button

                // Load section content using AJAX
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        $("#email-section-content").html(response);
                    },
                    error: function() {
                        $("#email-section-content").html("<p>Error loading section.</p>");
                    }
                });
            });
        });
    </script>
@endsection
