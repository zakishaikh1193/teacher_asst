@extends('backend.layouts.app')

@section('backend-css')
@endsection

@section('backendContent')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Edit Service Category</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Edit Category</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Update Service Category</h6>
                    </div>
                    <div class="card-body p-24">
                        <form class="d-flex flex-column gap-20"
                            action="{{ route('service-categories.update', $serviceCategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title', $serviceCategory->title) }}"
                                        class="form-control border border-neutral-200 radius-8"
                                        placeholder="Enter Category Title" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug"
                                        value="{{ old('slug', $serviceCategory->slug) }}"
                                        class="form-control border border-neutral-200 radius-8"
                                        placeholder="e.g. banking-finance" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="iconUpload">Icon
                                        <span class="text-secondary-light fw-normal">(65 X 65 or similar)</span>
                                    </label>
                                    <input type="file" name="icon"
                                        class="form-control border border-neutral-200 radius-8" id="iconUpload">
                                    <div class="avatar-upload mt-16">
                                        <div class="avatar-preview style-two">
                                            <div id="previewIcon"
                                                style="background-image: url('{{ asset('uploads/services_category/' . $serviceCategory->icon) }}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="imageUploadOne">Image
                                        (optional)</label>
                                    <input type="file" name="image"
                                        class="form-control border border-neutral-200 radius-8" id="imageUploadOne">
                                    <div class="avatar-upload mt-16">
                                        <div class="avatar-preview style-two">
                                            <div id="previewImage1"
                                                style="background-image: url('{{ asset('uploads/services_category/' . $serviceCategory->image) }}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-neutral-900" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control border border-neutral-200 radius-8"
                                        placeholder="Write something...">{{ old('description', $serviceCategory->description) }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary radius-8 mt-3">Update</button>
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
            $('#description').summernote({
                height: 200,
                placeholder: 'Enter Description'
            });

            $('#title').on('keyup change', function() {
                let title = $(this).val();
                let slug = title.toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                $('#slug').val(slug); 
            });
        });

        function readURL(input, previewElementId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewElementId).css('background-image', 'url(' + e.target.result + ')');
                    $('#' + previewElementId).hide().fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#iconUpload").change(function() {
            readURL(this, 'previewIcon');
        });

        $("#imageUploadOne").change(function() {
            readURL(this, 'previewImage1');
        });
    </script>
@endsection
