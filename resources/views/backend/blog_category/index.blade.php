@extends('backend.layouts.app')

@section('backend-css')
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Blog Categories</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Blog Categories</li>
            </ul>
        </div>

        <div class="card basic-data-table">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Blog Categories</h5>

                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#categoryModal"
                    onclick="openAddModal()">+ Add New</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    {{-- <button class="btn btn-sm btn-warning"
                                        onclick="openEditModal({{ $category->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteCategory({{ $category->id }})">Delete</button> --}}

                                    <span onclick="openEditModal({{ $category->id }})"
                                        class="btn w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </span>

                                    <span onclick="deleteCategory({{ $category->id }})"
                                        class="btn delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </span>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>

        </div>

    </div>

    {{-- <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" name="id" id="category_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal -->

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" name="id" id="category_id">

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backend-js')
    {{-- <script>
        // Auto-generate slug on name input
        $('#name').on('input', function() {
            const slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Remove special chars
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/-+/g, '-') // Merge multiple dashes
                .replace(/^-+|-+$/g, ''); // Trim dashes
            $('#slug').val(slug);
        });

        function openAddModal() {
            $('#categoryModalLabel').text('Add Category');
            $('#categoryForm')[0].reset();
            $('#category_id').val('');
        }

        function openEditModal(id) {
            $.get('/dashboard/blog-categories/' + id + '/edit', function(data) {
                $('#categoryModalLabel').text('Edit Category');
                $('#category_id').val(data.id);
                $('#name').val(data.name);
                $('#slug').val(data.slug);
                const modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                modal.show();
            });
        }

        $(document).on('submit', '#categoryForm', function(e) {
            e.preventDefault();
            const id = $('#category_id').val();
            const url = id ? '/dashboard/blog-categories/' + id : '/dashboard/blog-categories';
            const type = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: type,
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    location.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });

        function deleteCategory(id) {
            if (confirm('Delete this category?')) {
                $.ajax({
                    url: '/dashboard/blog-categories/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        }
    </script> --}}

    <script>
        // Auto-generate slug on name input
        $('#name').on('input', function() {
            const slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
            $('#slug').val(slug);
        });

        function openAddModal() {
            $('#categoryModalLabel').text('Add Category');
            $('#categoryForm')[0].reset();
            $('#category_id').val('');
        }

        function openEditModal(id) {
            $.get('/dashboard/blog-categories/' + id + '/edit', function(data) {
                $('#categoryModalLabel').text('Edit Category');
                $('#category_id').val(data.id);
                $('#name').val(data.name);
                $('#slug').val(data.slug);
                const modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                modal.show();
            });
        }

        $(document).on('submit', '#categoryForm', function(e) {
            e.preventDefault();
            const id = $('#category_id').val();
            const url = id ? '/dashboard/blog-categories/' + id : '/dashboard/blog-categories';
            const type = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: type,
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: id ? 'Category Updated!' : 'Category Added!',
                        showConfirmButton: false,
                        timer: 1200
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON.message || 'Something went wrong.'
                    });
                }
            });
        });

        function deleteCategory(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This category will be permanently deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/dashboard/blog-categories/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                showConfirmButton: false,
                                timer: 1200
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
