@extends('backend.layouts.app')

@section('backend-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet" />

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
            <h6 class="fw-semibold mb-0">Case</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard.cases.index') }}"
                        class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">{{ isset($case) ? 'Edit Case' : 'Create Case' }}</li>
            </ul>
        </div>

        <div class="card p-24">
            <form method="POST" class="d-flex flex-column gap-20"
                action="{{ isset($case) ? route('dashboard.cases.update', $case->id) : route('dashboard.cases.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if (isset($case))
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-4">
                        <label class="form-label">Title</label>
                        <input name="title" class="form-control" value="{{ $case->title ?? old('title') }}" required>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Slug</label>
                        <input name="slug" id="slug" class="form-control" value="{{ $case->slug ?? old('slug') }}"
                            required>
                    </div>

                    <div class="col-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            @foreach (['draft', 'published', 'archived'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $case->status ?? '') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label class="form-label">Client</label>
                        <input type="text" name="client" class="form-control"
                            value="{{ $case->client ?? old('client') }}">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ $case->date ?? old('date') }}">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Categories</label>
                        <select name="categories[]" class="form-control" id="select2categories" multiple>
                            <option value="">Select</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @if (isset($selected) && in_array($cat->id, $selected)) selected @endif>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control descSummernote">{{ $case->description ?? old('description') }}</textarea>
                    </div>


                    <div class="row">
                        <div class="col-3">
                            <label class="form-label fw-bold text-neutral-900">Upload Thumbnail Image (1170X534) </label>
                            <div class="upload-image-wrapper">
                                <div
                                    class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                    <button type="button"
                                        class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                    </button>
                                    <img id="uploaded-img__preview" class=" h-100 object-fit-cover"
                                        src="assets/images/user.png" alt="image">
                                </div>
                                <label
                                    class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                    for="upload-file">
                                    <iconify-icon icon="solar:camera-outline"
                                        class="text-xl text-secondary-light"></iconify-icon>
                                    <span class="fw-semibold text-secondary-light">Upload</span>
                                    <input id="upload-file" type="file" name="main_image" hidden>
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label">Main Image </label>
                            @if (isset($case->main_image))
                                <img src="{{ asset('uploads/cases/' . $case->main_image) }}" alt="Case Image"
                                    class="img-thumbnail mt-2" width="500">
                            @endif
                        </div>

                        <div class="col-3">
                            <label class="form-label fw-bold text-neutral-900">Upload for Listing page (370X452) </label>
                            <div class="upload-image-wrapper">
                                <div
                                    class="uploaded-img2 d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                    <button type="button"
                                        class="uploaded-img__remove2 position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                    </button>
                                    <img id="uploaded-img__preview2" class=" h-100 object-fit-cover"
                                        src="assets/images/user.png" alt="image">
                                </div>
                                <label
                                    class="upload-file2 h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                    for="upload-file2">
                                    <iconify-icon icon="solar:camera-outline"
                                        class="text-xl text-secondary-light"></iconify-icon>
                                    <span class="fw-semibold text-secondary-light">Upload</span>
                                    <input id="upload-file2" type="file" name="listing_image" hidden>
                                </label>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="form-label">Listing Image </label>
                            @if (isset($case->listing_image))
                                <img src="{{ asset('uploads/cases/' . $case->listing_image) }}" alt="Case Image"
                                    class=" mt-2" width="220">
                            @endif
                        </div>

                        <div class="col-6">
                            <label class="form-label">Upload Icon (64x64)</label>
                            <input id="upload-logo" type="file" name="logo_icon">
                        </div>

                        <div class="col-3">
                            <label class="form-label">Logo Icon (64x64)</label>
                            @if (isset($case->icon))
                                <img src="{{ asset('uploads/cases/' . $case->icon) }}" width="64" height="64"
                                    alt="Logo Icon">
                            @endif
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">{{ isset($case) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('dashboard.cases.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>

    </div>
@endsection


@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#select2categories').select2({
                width: '100%'
            });

            $('.descSummernote').summernote({
                height: 200,
            });

            $('input[name="title"]').on('input', function() {
                let slug = $(this).val()
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .replace(/^-+|-+$/g, '');
                $('#slug').val(slug);
            });
        });


        // =============================== Upload Single Image js start here ====================================== 
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove('d-none');
            }
        });
        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add('d-none');
            fileInput.value = "";
        });
        // =============================== Upload Single Image js End here ======================================== 

        // =============================== Upload Single Image js start here ====================================== 
        const fileInput2 = document.getElementById("upload-file2");
        const imagePreview2 = document.getElementById("uploaded-img__preview2");
        const uploadedImgContainer2 = document.querySelector(".uploaded-img2");
        const removeButton2 = document.querySelector(".uploaded-img__remove2");

        fileInput2.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview2.src = src;
                uploadedImgContainer2.classList.remove('d-none');
            }
        });

        removeButton2.addEventListener("click", () => {
            imagePreview2.src = "";
            uploadedImgContainer2.classList.add('d-none');
            fileInput2.value = "";
        });
        // =============================== Upload Single Image js End here ======================================== 
    </script>
@endsection
