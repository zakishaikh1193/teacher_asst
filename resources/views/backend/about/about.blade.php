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
            <h6 class="fw-semibold mb-0">About</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('/dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Components / About</li>
            </ul>
        </div>

        <div class="row gy-4">

            {{-- sm sidebar  --}}
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

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-4">
                                        <span class="fw-semibold">Section 4 </span>
                                    </a>
                                </li>

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-5">
                                        <span class="fw-semibold">Section 5 </span>
                                    </a>
                                </li>

                                <li class="mb-4 text-center">
                                    <a href="#"
                                        class="bg-hover-primary-50 px-12 py-8 w-100 radius-8 text-secondary-light cms-tab"
                                        data-target="section-6">
                                        <span class="fw-semibold">Section 6 </span>
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
                                        value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'about' }}">
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
                                        value="{{ isset($section1->section) && !empty($section1->section) ? $section1->section : 'section-1' }} ">
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
                                        <label class="form-label mb-0 col-sm-2" for="imageUploadOne">Image
                                            <span class="text-secondary-light fw-normal">(570px X 677px)</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="file" name="image1" value="{{ old('image1') }}"
                                                class="form-control border border-neutral-200 radius-8"
                                                id="imageUploadOne" placeholder="Enter Post Title">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="avatar-upload">
                                                <div class="avatar-preview style-two">
                                                    <div id="previewImage1"
                                                        @if (isset($section1->image1) && !empty($section1->image1)) style="background-image:url({{ asset('uploads/about/' . $section1->image1) }}) @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Heading:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="heading"
                                                value="{{ isset($section1->header) && !empty($section1->header) ? $section1->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="pb-2 bg-light rounded">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2" for="imageUploadTwo">Image
                                                <span class="text-secondary-light fw-normal">(65 X 65)</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="file" name="image2" value="{{ old('image2') }}"
                                                    class="form-control border border-neutral-200 radius-8"
                                                    id="imageUploadTwo" placeholder="Enter Post Title">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="avatar-upload">
                                                    <div class="avatar-preview style-two">
                                                        <div id="previewImage2"
                                                            @if (isset($section1->image2) && !empty($section1->image2)) style="background-image:url({{ asset('uploads/about/' . $section1->image2) }}) @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2">Short Heading:</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title"
                                                    value="{{ isset($section1->title) && !empty($section1->title) ? $section1->title : '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row  mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Short Description:</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control">{{ isset($section1->description) && !empty($section1->description) ? $section1->description : '' }}</textarea>
                                        </div>
                                    </div>

                                    @php
                                        $addInfoS1 =
                                            isset($section1->additional_info) && !empty($section1->additional_info)
                                                ? json_decode($section1->additional_info, true)
                                                : '';
                                    @endphp

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Progress Box 1 :</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="progress_title[]"
                                                value="{{ isset($addInfoS1['progress_title'][0]) && !empty($addInfoS1['progress_title'][0]) ? $addInfoS1['progress_title'][0] : '' }}"
                                                class="form-control" placeholder="Affordable Cost">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="progress_per[]"
                                                value="{{ isset($addInfoS1['progress_per'][0]) && !empty($addInfoS1['progress_per'][0]) ? $addInfoS1['progress_per'][0] : '' }}"
                                                class="form-control" placeholder="95%">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Progress Box 2 :</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="progress_title[]"
                                                value="{{ isset($addInfoS1['progress_title'][1]) && !empty($addInfoS1['progress_title'][1]) ? $addInfoS1['progress_title'][1] : '' }}"
                                                class="form-control" placeholder="Affordable Cost">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="progress_per[]"
                                                value="{{ isset($addInfoS1['progress_per'][1]) && !empty($addInfoS1['progress_per'][1]) ? $addInfoS1['progress_per'][1] : '' }}"
                                                class="form-control" placeholder="95%">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Have any question? :</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="q_title"
                                                value="{{ isset($addInfoS1['q_title']) && !empty($addInfoS1['q_title']) ? $addInfoS1['q_title'] : '' }}"
                                                class="form-control" placeholder="Have any question? Give us a call">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="q_num"
                                                value="{{ isset($addInfoS1['q_num']) && !empty($addInfoS1['q_num']) ? $addInfoS1['q_num'] : '' }}"
                                                class="form-control" placeholder="+91 7097057777">
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
                                                class="form-control" value="Partners" readonly>
                                        </div>
                                    </div>

                                    <div id="providers-container">

                                        @if (!empty($section2->additional_info))
                                            @php
                                                $providers = json_decode($section2->additional_info, true);
                                            @endphp
                                            @foreach ($providers['partners'] ?? [] as $index => $provider)
                                                <div class="provider-entry pb-2 bg-light rounded">
                                                    <div class="row mb-24 gy-3 align-items-center">
                                                        <label class="form-label mb-0 col-sm-2">Image <span
                                                                class="text-secondary-light fw-normal">(123 X
                                                                24)</span></label>

                                                        <div class="col-md-4">
                                                            <input type="text" name="name[]"
                                                                value="{{ isset($provider['name']) && !empty($provider['name']) ? $provider['name'] : '' }}"
                                                                class="form-control" placeholder="Name" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <input type="file" name="icon[]"
                                                                class="form-control border border-neutral-200 radius-8">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="avatar-upload">
                                                                @if (!empty($provider['icon']))
                                                                    <img src="{{ asset('uploads/about/' . $provider['icon']) }}"
                                                                        alt="" width="120">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger  remove-provider">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <button type="button" id="add-provider" class="btn btn-sm btn-primary mt-2">Add
                                    </button>

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
                                <h5 class="card-title mb-0 text-center">Section 3 </h5>
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
                                        <label class="form-label mb-0 col-sm-2">Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="header"
                                                value="{{ isset($section3->header) && !empty($section3->header) ? $section3->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Small Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section3->title) && !empty($section3->title) ? $section3->title : '' }}"
                                                class="form-control">
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

                        {{-- section 4 --}}
                        <div id="section-4" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 4 </h5>
                                <hr class="m-1">
                                <form id="section4" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section4->section) && !empty($section4->section) ? $section4->section : 'section-4' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section4->id) && !empty($section4->id) ? $section4->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active: </label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section4->active) && !empty($section4->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Header:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control"
                                                value="container count" readonly>
                                        </div>
                                    </div>

                                    @php
                                        $S4counts = [];
                                        if (isset($section4) && !empty($section4->additional_info)) {
                                            $dataSection4 = json_decode($section4->additional_info, true);
                                            $S4counts = $dataSection4['counts'] ?? [];
                                        }
                                    @endphp

                                    <div class="provider-entry pb-2 bg-light rounded">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2"> Label & Count <span
                                                    class="text-secondary-light fw-normal"></span></label>

                                            <div class="col-md-2">
                                                <input type="text" name="label[]"
                                                    value="{{ isset($S4counts[0]['label']) && !empty($S4counts[0]['label']) ? $S4counts[0]['label'] : '' }}"
                                                    class="form-control" placeholder="Label" required>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="text" name="count[]"
                                                    value="{{ isset($S4counts[0]['count']) && !empty($S4counts[0]['count']) ? $S4counts[0]['count'] : '' }}"
                                                    class="form-control" placeholder="Count" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for=""> icon (64 X 64)</label>
                                                <input type="file" name="icon[]"
                                                    class="form-control border border-neutral-200 radius-8">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="avatar-upload">
                                                    @if (isset($S4counts[0]['icon']) && !empty($S4counts[0]['icon']))
                                                        <img src="{{ asset('uploads/about/' . $S4counts[0]['icon']) }}"
                                                            alt="" width="100">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="provider-entry pb-2 bg-light rounded">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2"> Label & Count <span
                                                    class="text-secondary-light fw-normal"></span></label>

                                            <div class="col-md-2">
                                                <input type="text" name="label[]"
                                                    value="{{ isset($S4counts[1]['label']) && !empty($S4counts[1]['label']) ? $S4counts[1]['label'] : '' }}"
                                                    class="form-control" placeholder="Label" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="count[]"
                                                    value="{{ isset($S4counts[1]['count']) && !empty($S4counts[1]['count']) ? $S4counts[1]['count'] : '' }}"
                                                    class="form-control" placeholder="Count" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for=""> icon (65 X 65)</label>
                                                <input type="file" name="icon[]"
                                                    class="form-control border border-neutral-200 radius-8">
                                            </div>

                                            <div class="col-md-2">
                                                @if (isset($S4counts[1]['icon']) && !empty($S4counts[1]['icon']))
                                                    <img src="{{ asset('uploads/about/' . $S4counts[1]['icon']) }}"
                                                        alt="" width="100">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="provider-entry pb-2 bg-light rounded">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2"> Label & Count <span
                                                    class="text-secondary-light fw-normal"></span></label>

                                            <div class="col-md-2">
                                                <input type="text" name="label[]"
                                                    value="{{ isset($S4counts[2]['label']) && !empty($S4counts[2]['label']) ? $S4counts[2]['label'] : '' }}"
                                                    class="form-control" placeholder="Label" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="count[]"
                                                    value="{{ isset($S4counts[2]['count']) && !empty($S4counts[2]['count']) ? $S4counts[2]['count'] : '' }}"
                                                    class="form-control" placeholder="Count" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for=""> icon (65 X 65)</label>
                                                <input type="file" name="icon[]"
                                                    class="form-control border border-neutral-200 radius-8">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="avatar-upload">
                                                    @if (isset($S4counts[2]['icon']) && !empty($S4counts[2]['icon']))
                                                        <img src="{{ asset('uploads/about/' . $S4counts[2]['icon']) }}"
                                                            alt="" width="100">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="provider-entry pb-2 bg-light rounded">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2"> Label & Count <span
                                                    class="text-secondary-light fw-normal"></span></label>

                                            <div class="col-md-2">
                                                <input type="text" name="label[]"
                                                    value="{{ isset($S4counts[3]['label']) && !empty($S4counts[3]['label']) ? $S4counts[3]['label'] : '' }}"
                                                    class="form-control" placeholder="Label" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="count[]"
                                                    value="{{ isset($S4counts[3]['count']) && !empty($S4counts[3]['count']) ? $S4counts[3]['count'] : '' }}"
                                                    class="form-control" placeholder="Count" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for=""> icon (65 X 65)</label>
                                                <input type="file" name="icon[]"
                                                    class="form-control border border-neutral-200 radius-8">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="avatar-upload">
                                                    @if (isset($S4counts[3]['icon']) && !empty($S4counts[3]['icon']))
                                                        <img src="{{ asset('uploads/about/' . $S4counts[3]['icon']) }}"
                                                            alt="" width="100">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center ">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section4->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section4->created_at) && !empty($section4->created_at) ? 'created at: ' . $section4->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section4->updated_at) && !empty($section4->updated_at) ? 'updated at: ' . $section4->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>

                            </div>
                        </div>

                        {{-- section 5 --}}
                        <div id="section-5" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 5 </h5>
                                <hr class="m-1">
                                <form id="section5" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value=" {{ isset($section5->section) && !empty($section5->section) ? $section5->section : 'section-5' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section5->id) && !empty($section5->id) ? $section5->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section5->active) && !empty($section5->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="header"
                                                value="{{ isset($section5->header) && !empty($section5->header) ? $section5->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Small Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section5->title) && !empty($section5->title) ? $section5->title : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    @php
                                        $selectedTeamIds =
                                            isset($section5->additional_info) && !empty($section5->additional_info)
                                                ? json_decode($section5->additional_info, true)
                                                : [];

                                        $selectedTeamIds =
                                            isset($selectedTeamIds['team_ids']) && !empty($selectedTeamIds['team_ids'])
                                                ? $selectedTeamIds['team_ids']
                                                : [];
                                    @endphp

                                    @if (isset($section5Team) && !empty($section5Team))
                                        <table class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="col-2">Show on About Page</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Designation</th>
                                                    <th scope="col">Image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($section5Team as $team)
                                                    <tr>
                                                        <!-- Ch eckbox column -->
                                                        <td>
                                                            <div class="form-check style-check">
                                                                <input type="checkbox" name="team_ids[]"
                                                                    class="form-check-input" value="{{ $team->id }}"
                                                                    @if (!empty($selectedTeamIds) && in_array($team->id, $selectedTeamIds)) checked @endif>
                                                            </div>
                                                        </td>
                                                        <td>{{ $team->name }}</td>
                                                        <td>{{ $team->designation }}</td>
                                                        <td>
                                                            @if ($team->image)
                                                                <img src="{{ asset('uploads/team/' . $team->image) }}"
                                                                    alt="{{ $team->name }}" class="rounded-circle"
                                                                    width="50">
                                                            @else
                                                                No image
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section5->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section5->created_at) && !empty($section5->created_at) ? 'created at: ' . $section5->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section5->updated_at) && !empty($section5->updated_at) ? 'updated at: ' . $section5->updated_at : '' }}
                                            </span>
                                        </div>
                                    @endisset
                                </form>
                            </div>
                        </div>

                        {{-- section 6 --}}
                        <div id="section-6" class="cms-content d-none">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0 text-center">Section 6 </h5>
                                <hr class="m-1">
                                <form id="section6" class="mt-3 contactForm">
                                    @csrf
                                    <input type="hidden" name="section_name"
                                        value="{{ isset($section6->section) && !empty($section6->section) ? $section6->section : 'section-6' }} ">
                                    <input type="hidden" name="id"
                                        value="{{ isset($section6->id) && !empty($section6->id) ? $section6->id : '' }}">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section6->active) && !empty($section6->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="header"
                                                value="{{ isset($section6->header) && !empty($section6->header) ? $section6->header : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Small Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title"
                                                value="{{ isset($section6->title) && !empty($section6->title) ? $section6->title : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    @php
                                        $S6add =
                                            isset($section6->additional_info) && !empty($section6->additional_info)
                                                ? json_decode($section6->additional_info, true)
                                                : [];
                                    @endphp
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2"> Btn 1 url:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="btn1url"
                                                value="{{ isset($S6add['btn1url']) && !empty($S6add['btn1url']) ? $S6add['btn1url'] : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2"> Btn 2 url:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="btn2url"
                                                value="{{ isset($S6add['btn2url']) && !empty($S6add['btn2url']) ? $S6add['btn2url'] : '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2" for="imageUploadOne">Bg Image
                                            <span class="text-secondary-light fw-normal">(1600px X 379px)</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="file" name="image1" value="{{ old('image1') }}"
                                                class="form-control border border-neutral-200 radius-8"
                                                id="imageUploadOne" placeholder="Enter Post Title">
                                        </div>

                                        <div class="col-md-4">
                                            <div class="avatar-upload">
                                                @if (isset($section6->image1) && !empty($section6->image1))
                                                    <img src="{{ asset('uploads/about/' . $section6->image1) }}"
                                                        alt="" width="200">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="reset"
                                            class="btn rounded-pill btn-light-50 text-dark radius-8 px-20 py-11 text-sm">Reset</button>
                                        <button type="submit"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-20 py-11 text-sm">Submit</button>
                                    </div>

                                    @isset($section6->created_at)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section6->created_at) && !empty($section6->created_at) ? 'created at: ' . $section6->created_at : '' }}
                                            </span>
                                            <span class="text-xs text-secondary-light fw-normal">
                                                {{ isset($section6->updated_at) && !empty($section6->updated_at) ? 'updated at: ' . $section6->updated_at : '' }}
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
@endsection

@section('backend-js')
    <script>
        /// side bar 2
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

        /////////////////// section 2 ///////////////
        document.getElementById('add-provider').addEventListener('click', function() {
            let container = document.getElementById('providers-container');
            let newEntry = `<div class="provider-entry pb-2 bg-light rounded"> 
                <div class="row mb-24 gy-3 align-items-center">
                <label class="form-label mb-0 col-sm-2">Image <span class="text-secondary-light fw-normal">(123 X 24)</span></label>

                <div class="col-md-4">
                    <input type="text" name="name[]" class="form-control" placeholder="Name" required>
                </div>

                <div class="col-md-4">
                    <input type="file" name="icon[]" class="form-control border border-neutral-200 radius-8" required>
                </div>    
 
                <div class="col-md-2"> 
                    <div class="avatar-upload"></div>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-sm btn-danger remove-provider">Remove</button>
                </div> 
                </div> 
                </div>`;

            container.insertAdjacentHTML('beforeend', newEntry);
        });

        // Remove Provider
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-provider')) {
                e.target.closest('.provider-entry').remove();
            }
        });

        ///////////////////////////////////////////////////

        $(document).ready(function() {
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
            $(".contactForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: "/dashboard/about",
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
        });
    </script>
@endsection
