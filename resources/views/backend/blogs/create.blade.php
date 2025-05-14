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

        /* .note-editor.fullscreen .note-editable {
                        padding: 20px;
                        border: 1px solid #e0e0e0;
                        border-radius: 6px;
                    }  */
    </style>
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Blog </h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/dashboard/blogs') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">{{ isset($case) ? 'Edit blog' : 'Create blog' }}</li>
            </ul>
        </div>

        <div class="card p-24">

            <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                            value="{{ isset($blog) ? $blog->slug : old('slug') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ isset($blog) ? $blog->meta_title : old('meta_title') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ isset($blog) ? $blog->meta_description : old('meta_description') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Meta Keywords (comma separated)</label>
                        <input type="text" name="meta_keywords" class="form-control"
                            value="{{ isset($blog) ? $blog->meta_keywords : old('meta_keywords') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tags (Comma Separated)</label>
                        <input type="text" name="tags" id="tags-input" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control summernote" rows="6"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-6">
                                <label class="form-label fw-bold text-neutral-900">Upload Thumbnail Image (770X420) </label>
                                <div class="upload-image-wrapper">
                                    <div
                                        class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="radix-icons:cross-2"
                                                class="text-2xl text-white"></iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview" class=" h-100 object-fit-cover"
                                            src="assets/images/user.png" alt="image">
                                    </div>
                                    <label
                                        class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                        for="upload-file">
                                        <iconify-icon icon="solar:camera-outline"
                                            class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Featured Image</span>
                                        <input id="upload-file" type="file" name="featured_image" hidden>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Featured Image</label>
                            @if (isset($case->main_image))
                                <img src="{{ asset('uploads/cases/' . $case->main_image) }}" alt="Case Image"
                                    class="img-thumbnail mt-2" width="500">
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="col-6">
                                <label class="form-label fw-bold text-neutral-900">Listing Image (370X336)
                                </label>
                                <div class="upload-image-wrapper">
                                    <div
                                        class="uploaded-img2 d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove2 position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="radix-icons:cross-2"
                                                class="text-2xl text-white"></iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview2" class=" h-100 object-fit-cover"
                                            src="assets/images/user.png" alt="image">
                                    </div>
                                    <label
                                        class="upload-file2 h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                        for="upload-file2">
                                        <iconify-icon icon="solar:camera-outline"
                                            class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Listing Image</span>
                                        <input id="upload-file2" type="file" name="listing_image" hidden>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Listing Image</label>
                            @if (isset($case->listing_image))
                                <img src="{{ asset('uploads/cases/' . $case->listing_image) }}" alt="Case Image"
                                    class="img-thumbnail mt-2" width="500">
                            @endif
                        </div>

                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success mt-3">Save</button>
                    </div>

                </div>
            </form>


        </div>

    </div>
@endsection


@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 250
            });

            $('#title').on('input', function() {
                const slug = $(this).val()
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with dash
                    .replace(/-+/g, '-') // Replace multiple dashes with single
                    .replace(/^-+|-+$/g, ''); // Trim leading/trailing dashes

                $('#slug').val(slug);
            });


            // Clean & normalize tags
            // $('#tags-input').on('input', function() {
            //     let tags = $(this).val().split(','); // Split the input by commas
            //     let cleanedTags = tags
            //         .map(tag => tag.trim()) // Remove extra spaces around tags
            //         .filter(tag => tag !== ''); // Remove any empty tags

            //     // Update the input value with cleaned tags, preserving the commas
            //     $(this).val(cleanedTags.join(', '));

            //     // For debugging, log the cleaned tags
            //     console.log(cleanedTags);
            // });
        });

        // =============================== Upload Single Image js start here ================================================
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
        // =============================== Upload Single Image js End here ================================================

        // =============================== Upload Single Image js start here 2 =====================
        const fileInput2 = document.getElementById("upload-file2");
        const imagePreview2 = document.getElementById("uploaded-img__preview2");
        const uploadedImgContainer2 = document.querySelector(".uploaded-img2");
        const removeButton2 = document.querySelector(".uploaded-img__remove2");

        fileInput2.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src2 = URL.createObjectURL(e.target.files[0]);
                imagePreview2.src = src2;
                uploadedImgContainer2.classList.remove('d-none');
            }
        });

        removeButton2.addEventListener("click", () => {
            imagePreview2.src2 = "";
            uploadedImgContainer2.classList.add('d-none');
            fileInput2.value = "";
        });
        // =============================== Upload Single Image js End here ====================== 
    </script>
@endsection
