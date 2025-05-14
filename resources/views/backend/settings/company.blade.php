@extends('backend.layouts.app')

@section('backend-css')
@endsection

@section('backendContent')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Company</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Settings - Company</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">

                <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Site Name<span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" id="name" name="name"
                                    value="{{ $setting->name ?? '' }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                    <span class="text-danger-600">*</span></label>
                                <input type="email" class="form-control radius-8" id="email" name="email"
                                    value="{{ $setting->email ?? '' }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone
                                    Number</label>
                                <input type="text" class="form-control radius-8" id="number" name="phone"
                                    value="{{ $setting->phone ?? '' }}">
                            </div>
                        </div>

                        {{-- <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="Website" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Website</label>
                                <input type="url" class="form-control radius-8" id="Website"
                                    placeholder="Website URL">
                            </div>
                        </div> --}}

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="address"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Address</label>
                                <input type="text" class="form-control radius-8" id="address" name="address"
                                    value="{{ $setting->address ?? '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="twitter" class="form-label fw-semibold text-primary-light text-sm mb-8">Twitter
                                    URL</label>
                                <input type="text" class="form-control radius-8" id="twitter" name="twitter"
                                    value="{{ $setting->twitter ?? '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="facebook"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Facebook URL</label>
                                <input type="text" class="form-control radius-8" id="facebook" name="facebook"
                                    value="{{ $setting->facebook ?? '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="instagram"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">Instagram URL</label>
                                <input type="text" class="form-control radius-8" id="instagram" name="instagram"
                                    value="{{ $setting->instagram ?? '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="linkedin"
                                    class="form-label fw-semibold text-primary-light text-sm mb-8">LinkedIn URL</label>
                                <input type="text" class="form-control radius-8" id="linkedin" name="linkedin"
                                    value="{{ $setting->linkedin ?? '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="imageUpload" class="form-label fw-semibold text-secondary-light text-md mb-8">Logo
                                <span class="text-secondary-light fw-normal">(116px X 28px)</span></label>
                            <input type="file" class="form-control radius-8" id="imageUpload" name="logo">

                            <div class="avatar-upload mt-16">
                                <div class="avatar-preview style-two">
                                    <div id="previewImage1"
                                        @if (isset($setting->logo) && !empty($setting->logo)) style="background-image:url({{ asset('uploads/' . $setting->logo) }})" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="imageUploadTwo"
                                class="form-label fw-semibold text-secondary-light text-md mb-8">Logo
                                <span class="text-secondary-light fw-normal">(32 X 32)</span>
                            </label>
                            <input type="file" class="form-control radius-8" id="imageUploadTwo" name="favicon_icon">

                            <div class="avatar-upload mt-16">
                                <div class="avatar-preview style-two">
                                    <div id="previewImage2"
                                        @if (isset($setting->favicon_icon) && !empty($setting->favicon_icon)) style="background-image:url({{ asset('uploads/' . $setting->favicon_icon) }}) @endif">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="d-flex
                                        align-items-center justify-content-center gap-3 mt-24">
                            <button type="reset"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                Reset
                            </button>
                            <button type="submit"
                                class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                Save Change
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('backend-js')
    <script>
        // ================== Image Upload Js Start ===========================
        function readURL(input, previewElementId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewElementId).css('background-image', 'url(' + e.target.result + ')');
                    $('#' + previewElementId).hide();
                    $('#' + previewElementId).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {
            readURL(this, 'previewImage1');
        });

        $("#imageUploadTwo").change(function() {
            readURL(this, 'previewImage2');
        });
        // ================== Image Upload Js End ===========================
    </script>
@endsection
