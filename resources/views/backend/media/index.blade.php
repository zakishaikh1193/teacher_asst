@extends('backend.layouts.app')

@section('backend-css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> --}}
@endsection

@section('backendContent')
    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Media Library</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashbaord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Media Files</li>
            </ul>
        </div>

        <div class="card">
            {{-- <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Media Library</h5>
            </div> --}}

            <div class="card-body">
                <div class="container py-4">
                    <form id="upload-form" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="file" class="form-control" required>
                            <button class="btn btn-success" type="submit">Upload</button>
                        </div>
                    </form>
                    <br>

                    <div class="row" id="media-container"></div>

                    <div class="text-center mt-3">
                        <button id="load-more" class="btn btn-primary">Load More</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('backend-js')
    <script>
        let page = 1;

        function loadMedia() {
            $.get(`/media/list?page=${page}`, function(response) {
                response.data.forEach(media => {
                    const fileUrl = `/uploads/media/${media.file_name}`;
                    const fullUrl = `${window.location.origin}${fileUrl}`;

                    const card = `
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    ${media.file_type === 'image' 
                        ? `<img src="${fileUrl}" class="card-img-top" style="height:180px;object-fit:cover;">`
                        : `<video src="${fileUrl}" class="card-img-top" controls style="height:180px;"></video>`
                    }
                    <div class="card-body">
                        <p class="small">Slug: <code>${media.slug}</code></p>
                        <button class="btn btn-sm btn-outline-secondary copy-url" data-url="${fullUrl}">Copy URL</button>
                        <button class="btn btn-sm btn-outline-danger float-end delete-file" data-id="${media.id}">Delete</button>
                    </div>
                </div>
            </div>`;
                    $('#media-container').append(card);
                });

                if (!response.next_page_url) $('#load-more').hide();
            });
        }


        $('#load-more').on('click', function() {
            page++;
            loadMedia();
        });

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: '{{ route('media.upload') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function() {
                    Swal.fire('Success!', 'Media uploaded successfully.', 'success');
                    $('#media-container').html('');
                    page = 1;
                    loadMedia();
                },
                error: function() {
                    Swal.fire('Error!', 'Media upload failed.', 'error');
                }
            });
        });

        $(document).on('click', '.copy-url', function() {
            const url = $(this).data('url');
            navigator.clipboard.writeText(url);
            Swal.fire('Copied!', 'URL has been copied to clipboard.', 'success');
        });

        $(document).on('click', '.delete-file', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This file will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/media/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire('Deleted!', 'Your media file has been removed.',
                                'success');
                            $('#media-container').html('');
                            page = 1;
                            loadMedia();
                        },
                        error: function() {
                            Swal.fire('Error!', 'Deletion failed.', 'error');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            loadMedia();
        });
    </script>
@endsection
