@extends('backend.layouts.app')

@section('backend-css')
    <style>
        .note-editor.fullscreen {
            background-color: #fff !important;
            z-index: 9999;
        }

        .note-editor.fullscreen .note-editable {
            background-color: #fff !important;
            color: #000;
        }

        body.note-fullscreen {
            background-color: #fff !important;
        }
    </style>
@endsection 

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Edit Service</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Edit Service</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Edit Service</h6>
                    </div>
                    <div class="card-body p-24">

                        <form class="d-flex flex-column gap-20"
                            action="{{ route('dashboard.services.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @php
                                $seo = '';
                                if (isset($service->seo) && !empty($service->seo)) {
                                    $seo = json_decode($service->seo, true);
                                }
                            @endphp
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-neutral-900" for="seo_title">SEO Title</label>
                                    <input type="text" name="seo_title"
                                        value="{{ isset($seo['title']) && !empty($seo['title']) ? $seo['title'] : '' }}"
                                        class="form-control border border-neutral-200 radius-8" id="seo_title"
                                        placeholder="Enter SEO Title" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-neutral-900" for="meta_description">Meta
                                        Description</label>
                                    <textarea name="seo_desc" class="form-control border border-neutral-200 radius-8" id="meta_description"
                                        placeholder="Enter Meta Description" rows="3" required>{{ isset($seo['description']) && !empty($seo['description']) ? $seo['description'] : '' }} </textarea>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-neutral-900" for="meta_keywords">Meta
                                        Keywords</label>
                                    <input type="text" name="seo_key"
                                        value="{{ isset($seo['keywords']) && !empty($seo['keywords']) ? $seo['keywords'] : '' }}"
                                        class="form-control border border-neutral-200 radius-8" id="meta_keywords"
                                        placeholder="Enter Keywords (comma separated)" required>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold text-neutral-900" for="category_id">Service
                                        Category</label>
                                    <select name="category_id" id="category_id"
                                        class="form-control form-control-sm border border-neutral-200 radius-8" required>
                                        <option value="" disabled>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Heading</label>
                                    <input type="text" name="heading"
                                        value="{{ isset($service->heading) && !empty($service->heading) ? $service->heading : '' }}"
                                        class="form-control form-control-sm border border-neutral-200 radius-8"
                                        id="title" placeholder="Enter Post Title" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-bold text-neutral-900" for="imageUploadOne">Image
                                        <span class="text-secondary-light fw-normal">(770px X 424px)</span>
                                    </label>
                                    <input type="file" name="image"
                                        class="form-control form-control-sm border border-neutral-200 radius-8"
                                        id="imageUploadOne">
                                    <small class="text-muted">Leave empty to keep the existing image.</small>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-upload mt-16">
                                        <div class="avatar-preview style-two">
                                            <div id="previewImage1"
                                                @if ($service->image) style="background-image:url({{ asset('uploads/services/' . $service->image) }}) @endif">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-neutral-900" for="description1">Description
                                        1:</label>
                                    <textarea name="description1" class="form-control border border-neutral-200 radius-8" id="description1"
                                        placeholder="Enter Description" required>{{ isset($service->description1) && !empty($service->description1) ? $service->description1 : '' }}</textarea>
                                </div>
                            </div>

                            @php
                                $additional_info1 = '';
                                if (isset($service->additional_info1) && !empty($service->additional_info1)) {
                                    $additional_info1 = json_decode($service->additional_info1, true);
                                }
                            @endphp

                            {{-- additonal info  --}}
                            <div class="row bg-light">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title2">Title</label>
                                    <input type="text" name="add_title"
                                        value="{{ isset($additional_info1['title']) && !empty($additional_info1['title']) ? $additional_info1['title'] : '' }}"
                                        class="form-control form-control-sm border border-neutral-200 radius-8"
                                        id="title2" placeholder="Enter Title">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="short_description">Short
                                        Description</label>
                                    <input type="text" name="add_desc"
                                        value="{{ isset($additional_info1['description']) && !empty($additional_info1['description']) ? $additional_info1['description'] : '' }}"
                                        class="form-control form-control-sm border border-neutral-200 radius-8"
                                        id="short_description" placeholder="Enter Short Description">
                                </div>

                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900" for="imageUploadTwo">Image
                                                <span class="text-secondary-light fw-normal">(354px X 314px)</span>
                                            </label>
                                            <input type="file" name="add_image" value="{{ old('add_image') }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="imageUploadTwo" placeholder="Enter Image URL">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="avatar-upload mt-16">
                                                <div class="avatar-preview style-two">
                                                    <div id="previewImage2"
                                                        @if ($additional_info1['image']) style="background-image:url({{ asset('uploads/services/' . $additional_info1['image']) }}) @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][0]) && !empty($additional_info1['add_point'][0]) ? $additional_info1['add_point'][0] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][1]) && !empty($additional_info1['add_point'][1]) ? $additional_info1['add_point'][1] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][2]) && !empty($additional_info1['add_point'][2]) ? $additional_info1['add_point'][2] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][3]) && !empty($additional_info1['add_point'][3]) ? $additional_info1['add_point'][3] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][4]) && !empty($additional_info1['add_point'][4]) ? $additional_info1['add_point'][4] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="point">Point</label>
                                            <input type="text" name="add_point[]"
                                                value="{{ isset($additional_info1['add_point'][5]) && !empty($additional_info1['add_point'][5]) ? $additional_info1['add_point'][5] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="point" placeholder="Enter Point">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-neutral-900" for="description2">Description
                                        2:</label>
                                    <textarea name="description2" class="form-control border border-neutral-200 radius-8" id="description2"
                                        placeholder="Enter Description">{{ isset($service->description2) && !empty($service->description2) ? $service->description2 : '' }}</textarea>
                                </div>
                            </div>
                            <hr>

                            @php
                                $additional_info2 = '';
                                if (isset($service->additional_info2) && !empty($service->additional_info2)) {
                                    $additional_info2 = json_decode($service->additional_info2, true);
                                }
                            @endphp
                            {{-- additional info 2  --}}
                            <div class="row bg-light pb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900" for="icon-1">Icon</label>
                                            <input type="file" name="add2_icon[]" value=""
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="icon-1">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="avatar-upload mt-16">
                                                <div class="avatar-preview style-two">
                                                    <div id="previewImage3"
                                                        @if (isset($additional_info2['icons'][0]) && !empty($additional_info2['icons'][0])) style="background-image:url({{ asset('uploads/services/' . $additional_info2['icons'][0]) }}) @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="title3">Title</label>
                                            <input type="text" name="add2_title[]"
                                                value="{{ isset($additional_info2['add2_title'][0]) && !empty($additional_info2['add2_title'][0]) ? $additional_info2['add2_title'][0] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="title3" placeholder="Enter Title">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="description3">Description</label>
                                            <textarea name="add2_description[]" class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="description3">{{ isset($additional_info2['add2_description'][0]) && !empty($additional_info2['add2_description'][0]) ? $additional_info2['add2_description'][0] : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row bg-light pb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900" for="icon-2">Icon</label>
                                            <input type="file" name="add2_icon[]"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="icon-2">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="avatar-upload mt-16">
                                                <div class="avatar-preview style-two">
                                                    <div id="previewImage4"
                                                        @if (isset($additional_info2['icons'][1]) && !empty($additional_info2['icons'][1])) style="background-image:url({{ asset('uploads/services/' . $additional_info2['icons'][1]) }}) @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="title3">Title</label>
                                            <input type="text" name="add2_title[]"
                                                value="{{ isset($additional_info2['add2_title'][1]) && !empty($additional_info2['add2_title'][1]) ? $additional_info2['add2_title'][1] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="title3" placeholder="Enter Title">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="description3">Description</label>
                                            <textarea name="add2_description[]" class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="description3">{{ isset($additional_info2['add2_description'][1]) && !empty($additional_info2['add2_description'][1]) ? $additional_info2['add2_description'][1] : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row bg-light pb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900" for="icon-3">Icon</label>
                                            <input type="file" name="add2_icon[]"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="icon-3">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="avatar-upload mt-16">
                                                <div class="avatar-preview style-two">
                                                    <div id="previewImage5"
                                                        @if (isset($additional_info2['icons'][2]) && !empty($additional_info2['icons'][2])) style="background-image:url({{ asset('uploads/services/' . $additional_info2['icons'][2]) }}) @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="title3">Title</label>
                                            <input type="text" name="add2_title[]"
                                                value="{{ isset($additional_info2['add2_title'][2]) && !empty($additional_info2['add2_title'][2]) ? $additional_info2['add2_title'][2] : '' }}"
                                                class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="title3" placeholder="Enter Title">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-neutral-900"
                                                for="description3">Description</label>
                                            <textarea name="add2_description[]" class="form-control form-control-sm border border-neutral-200 radius-8"
                                                id="description3">{{ isset($additional_info2['add2_description'][2]) && !empty($additional_info2['add2_description'][2]) ? $additional_info2['add2_description'][2] : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="reset" class="btn btn-sm btn-dark radius-8 mt-1">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary radius-8 mt-1">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (session('error_messages'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Errors',
                        html: "{!! implode('<br>', session('error_messages')) !!}",
                        confirmButtonColor: '#d33',
                    });
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#3085d6',
                    });
                });
            </script>
        @endif
    </div>
@endsection

@section('backend-js')
    <script>
        $(document).ready(function() {
            $('#description1').summernote({
                height: 200, // Set the height of the editor
                placeholder: 'Enter Description'
            });

            $('#description2').summernote({
                height: 200, // Set the height of the editor
                placeholder: 'Enter Description'
            });
        });

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

        $("#imageUploadOne").change(function() {
            readURL(this, 'previewImage1');
        });

        $("#imageUploadTwo").change(function() {
            readURL(this, 'previewImage2');
        });

        $("#icon-1").change(function() {
            readURL(this, 'previewImage3');
        });

        $("#icon-2").change(function() {
            readURL(this, 'previewImage4');
        });

        $("#icon-3").change(function() {
            readURL(this, 'previewImage5');
        });
        // ================== Image Upload Js End ===========================
    </script>
@endsection
