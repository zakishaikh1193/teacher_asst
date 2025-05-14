@extends('backend.layouts.app')

@section('backend-css')
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Case Category</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('case-categories.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Edit New Case Category</li>
            </ul>
        </div>

        <div class="card p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('case-categories.update', $category->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            class="form-control" required>
                    </div>

                    <div class="col-4">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('case-categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            nameInput.addEventListener('input', function() {
                let slug = nameInput.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                    .replace(/\s+/g, '-') // replace spaces with -
                    .replace(/-+/g, '-') // replace multiple - with single -
                    .replace(/^-+|-+$/g, ''); // trim - from start/end

                slugInput.value = slug;
            });
        });
    </script>
@endsection
