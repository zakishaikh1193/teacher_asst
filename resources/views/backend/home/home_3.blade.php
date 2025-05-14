@extends('backend.layouts.app')

@section('backend-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>

    </style>
@endsection

@section('backendContent')
    <div class="dashboard-main-body">
        <div class="row gy-4">

            {{-- SEO  --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Section: SEO</h5>
                    </div>
                    <div class="card-body section1">
                        <form id="seoForm" class="mt-3">
                            @csrf
                            <input type="hidden" name="page_name"
                                value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'home-3' }}">
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
                                        {{ isset($seo->created_at) && !empty($seo->created_at) ? 'created at: ' . $seo->created_at->setTimezone('Asia/Kolkata')->format('d-m-Y h:ia') : '' }}
                                    </span>
                                    <span class="text-xs text-secondary-light fw-normal">
                                        {{ isset($seo->updated_at) && !empty($seo->updated_at) ? 'updated at: ' . $seo->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y h:ia') : '' }}
                                    </span>
                                </div>
                            @endisset
                        </form>
                    </div>
                </div><!-- card end -->
            </div>

            {{-- Section 1: slider  --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Section 1 - Slider</h5>
                    </div>
                    <div class="card-body section1">
                        <div class="row">
                            {{-- slider 1 --}}
                            <div class="col-md-6">
                                <form class="section-form" data-section="section-1" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-1">
                                    <input type="hidden" name="content_key" value="slider-1">
                                    @php
                                        $slider1 = isset($section1S1->content_value)
                                            ? json_decode($section1S1->content_value, true)
                                            : [];
                                    @endphp
                                    <div class="row">
                                        <div class="col-10">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $slider1['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label">Heading</label>
                                            <input type="text" name="heading" value="{{ $slider1['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $slider1['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $slider1['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Image (1894x770)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if (isset($section1S1->image))
                                                <img src="{{ asset('uploads/home3/' . $section1S1->image) }}"
                                                    class="img-fluid" style="max-height: 100px;" style="max-width: 250px;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                {{-- slider 2 --}}
                                <form class="section-form" data-section="section-1" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-1">
                                    <input type="hidden" name="content_key" value="slider-2">
                                    @php
                                        $slider2 = isset($section1S2->content_value)
                                            ? json_decode($section1S2->content_value, true)
                                            : [];
                                    @endphp
                                    <div class="row">
                                        <div class="col-10">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $slider2['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label">Heading</label>
                                            <input type="text" name="heading" value="{{ $slider2['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $slider2['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $slider2['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Image (1894x770)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if (isset($section1S2->image))
                                                <img src="{{ asset('uploads/home3/' . $section1S2->image) }}"
                                                    class="img-fluid" style="max-height: 100px;"
                                                    style="max-width: 250px;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- card end -->
            </div>

            {{-- Section-2: Services --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 2 - Services </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-2" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-2">
                                    <input type="hidden" name="content_key" value="S2Services">

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
                                    @php
                                        $S2Content = isset($section2->content_value)
                                            ? json_decode($section2->content_value, true)
                                            : '';
                                    @endphp

                                    <div class="row g-3">
                                        @for ($sCount = 0; $sCount < 3; $sCount++)
                                            <div class="col-4 border border-primary">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="title[]"
                                                            value="{{ $S2Content['services'][$sCount]['title'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Small Description</label>
                                                        <input type="text" name="sm_desc[]"
                                                            value="{{ $S2Content['services'][$sCount]['sm_desc'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label"> URL</label>
                                                        <input type="text" name="button_url[]"
                                                            value="{{ $S2Content['services'][$sCount]['button_url'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Image (370x133)</label>
                                                        <input type="file" name="image[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>
                                                    <div class="col-10 m-1 image-preview-area">
                                                        @if (!empty($S2Content['services'][$sCount]['image']))
                                                            <img src="{{ asset('uploads/home3/' . $S2Content['services'][$sCount]['image']) }}"
                                                                class="img-fluid" style="max-height: 80px;">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                        <div class="col-12 border border-primary">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="bottom_title"
                                                        value="{{ $S2Content['services'][$sCount]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Small Description</label>
                                                    <input type="text" name="bottom_title2"
                                                        value="{{ $S2Content['services'][$sCount]['sm_desc'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                {{-- <div class="col-12">
                                                    <label class="form-label"> URL</label>
                                                    <input type="text" name="button_url[]"
                                                        value="{{ $S2Content['services'][$sCount]['button_url'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div> --}}
                                                <div class="col-3">
                                                    <label class="form-label">Image (67x72)</label>
                                                    <input type="file" name="bottom_img"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                <div class="col-2 m-1 image-preview-area">
                                                    @if (!empty($S2Content['services'][$sCount]['image']))
                                                        <img src="{{ asset('uploads/home3/' . $S2Content['services'][$sCount]['image']) }}"
                                                            class="img-fluid" style="max-height: 50px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 3 case studies --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 3: Case Studies</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section3Content = [];

                                    if (isset($section3) && $section3->content_value) {
                                        $section3Content = json_decode($section3->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-3" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-3">
                                    <input type="hidden" name="content_key" value="section3">

                                    {{-- Active Toggle --}}
                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-3">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section3Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Headings --}}
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Main Heading</label>
                                            <input type="text" name="main_heading"
                                                class="form-control form-control-sm"
                                                value="{{ $section3Content['main_heading'] ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Subheading</label>
                                            <input type="text" name="subheading" class="form-control form-control-sm"
                                                value="{{ $section3Content['subheading'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        @for ($i = 0; $i < 2; $i++)
                                            @php $card = $section3Content['cards'][$i] ?? [] @endphp
                                            <div class="col-md-6 border p-3 rounded">
                                                <p class="text-muted">Case Study {{ $i + 1 }}</p>
                                                {{-- Card Image --}}
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <label class="form-label">Card Image (570x412)</label>
                                                        <input type="file" name="card_image[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>
                                                    <div class="col-6 image-preview-area">
                                                        @if (!empty($card['image']))
                                                            <img src="{{ asset('uploads/home3/' . $card['image']) }}"
                                                                class="img-fluid" style="max-height: 60px;">
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- Icon --}}
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <label class="form-label">Icon (64x64)</label>
                                                        <input type="file" name="icon[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>
                                                    <div class="col-6 image-preview-area">
                                                        @if (!empty($card['icon']))
                                                            <img src="{{ asset('uploads/home3/' . $card['icon']) }}"
                                                                class="img-fluid" style="max-height: 50px;">
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- Category + Title + Desc --}}
                                                <div class="mb-2">
                                                    <label class="form-label">Category Title</label>
                                                    <input type="text" name="category[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ $card['category'] ?? '' }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Case Title</label>
                                                    <input type="text" name="case_title[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ $card['title'] ?? '' }}">
                                                </div>
                                                <div>
                                                    <label class="form-label">Description</label>
                                                    <textarea name="case_desc[]" rows="2" class="form-control form-control-sm">{{ $card['desc'] ?? '' }}</textarea>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">url</label>
                                                    <input type="text" name="case_url[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ $card['case_url'] ?? '' }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section-4: Services we offer --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 4 - Services we offer </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $S4Content = [];
                                    if ($section4 && $section4->content_value) {
                                        $S4Content = json_decode($section4->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-4" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-4">
                                    <input type="hidden" name="content_key" value="Services4offer">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($S4Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title1" class="form-control form-control-sm"
                                                value="{{ $S4Content['title1'] ?? '' }}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Samll Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $S4Content['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label">Short Description</label>
                                            <textarea name="shortDesc" class="form-control form-control-sm" rows="2">{{ $S4Content['shortDesc'] ?? '' }}</textarea>
                                        </div>

                                        @php
                                            $services = $S4Content['services'] ?? [];
                                        @endphp

                                        @for ($sCount = 0; $sCount < 4; $sCount++)
                                            @php
                                                $service = $services[$sCount] ?? [
                                                    'title' => '',
                                                    'sm_desc' => '',
                                                    'button_url' => '',
                                                    'image' => '',
                                                ];
                                            @endphp
                                            <div class="col-3 border border-primary">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="title[]"
                                                            value="{{ $service['title'] }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Small Description</label>
                                                        <input type="text" name="sm_desc[]"
                                                            value="{{ $service['sm_desc'] }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label"> URL</label>
                                                        <input type="text" name="button_url[]"
                                                            value="{{ $service['button_url'] }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Image (64x64)</label>
                                                        <input type="file" name="image[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>
                                                    <div class="col-10 m-1 image-preview-area">
                                                        @if (!empty($service['image']))
                                                            <img src="{{ asset('uploads/home3/' . $service['image']) }}"
                                                                class="img-fluid" style="max-height: 80px;">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 5: Discover More  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 5 : Discover More </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section5Content = [];
                                    if ($section5 && $section5->content_value) {
                                        $section5Content = json_decode($section5->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-5" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-5">
                                    <input type="hidden" name="content_key" value="section5">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section5Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section5Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $section5Content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $section5Content['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Bg Image (1920x1280)</label>
                                            <input type="file" name="bg_image"
                                                class="form-control form-control-sm image-input">
                                        </div>

                                        <div class="col-4 m-1 image-preview-area">
                                            @if (!empty($section5Content['bg_image']))
                                                <img src="{{ asset('uploads/home3/' . $section5Content['bg_image']) }}"
                                                    class="img-fluid" style="max-height: 120px;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 6: Financial Goals  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 6 : financial goals </h5>
                            </div>

                            <div class="card-body">
                                @php
                                    $section6Content = [];
                                    if (isset($section6) && $section6->content_value) {
                                        $section6Content = json_decode($section6->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-6" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-6">
                                    <input type="hidden" name="content_key" value="financialGoals">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section6Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section6Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Short Title</label>
                                            <input type="text" name="shortTitle"
                                                value="{{ $section6Content['shortTitle'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description" rows="2">{{ $section6Content['description'] ?? '' }}</textarea>
                                        </div>

                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Image (270x225)</label>
                                                    <input type="file" name="card_image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>

                                                <div class="col-12 m-1 image-preview-area">
                                                    @if (!empty($section6Content['card_image']))
                                                        <img src="{{ asset('uploads/home3/' . $section6Content['card_image']) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Image (270x225)</label>
                                                    <input type="file" name="icon"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                <div class="col-12 m-1 image-preview-area">
                                                    @if (!empty($section6Content['icon']))
                                                        <img src="{{ asset('uploads/home3/' . $section6Content['icon']) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Text for the Box</label>
                                            <input type="text" name="box_text"
                                                value="{{ $section6Content['box_text'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        @php
                                            $points = $section6Content['points'] ?? [];
                                        @endphp
                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="col-3">
                                                <input type="text" name="points[]"
                                                    class="form-control form-control-sm" value="{{ $points[$i] ?? '' }}">
                                            </div>
                                        @endfor

                                        <div class="text-center m-1">
                                            <button type="submit"
                                                class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 7: Reason For Choosing Us --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 7: Reason For Choosing Us </h5>
                            </div>
                            @php
                                $section7Content = [];
                                if (isset($section7) && $section7->content_value) {
                                    $section7Content = json_decode($section7->content_value, true);
                                }
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-7" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-7">
                                    <input type="hidden" name="content_key" value="section7">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section7Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section7Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        @php
                                            $points = $section7Content['points'] ?? [];
                                        @endphp

                                        <div class="col-6">
                                            @for ($Ci = 0; $Ci < 3; $Ci++)
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label">Point {{ $Ci + 1 }} </label>
                                                        <input type="text" name="points_title[]"
                                                            value="{{ $points[$Ci]['title'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Point {{ $Ci + 1 }} Short
                                                            Description</label>
                                                        <input type="text" name="points_desc[]"
                                                            value="{{ $points[$Ci]['desc'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>

                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-10">
                                                    <label class="form-label">Image (1032x669)</label>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                <div class="col-10 m-1 image-preview-area">
                                                    @if (!empty($section7Content['image']))
                                                        <img src="{{ asset('uploads/home3/' . $section7Content['image']) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center m-1">
                                            <button type="submit"
                                                class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Section 8 --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 8: contact</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section8Content = [];
                                    if (isset($section8) && $section8->content_value) {
                                        $section8Content = json_decode($section8->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-8" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-8">
                                    <input type="hidden" name="content_key" value="sectionContact">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section8Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Title </label>
                                            <input type="text" name="title1"
                                                value="{{ $section8Content['title1'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $section8Content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label">Button Url </label>
                                            <input type="text" name="button_url"
                                                value="{{ $section8Content['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 9: blogs  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 9: Blogs</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section9Content = [];
                                    if (isset($section9) && $section9->content_value) {
                                        $section9Content = json_decode($section9->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-9" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-9">
                                    <input type="hidden" name="content_key" value="blogs9">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section9Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section9Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section9Content['smTitle'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="text-center m-1">
                                        <button type="submit"
                                            class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 10 : meet the partners --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Section 10 - Meet the partners</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $partnerSection10 = [];
                            if (isset($section10) && $section10->content_value) {
                                $partnerSection10 = json_decode($section10->content_value, true);
                            }
                        @endphp
                        <form class="section-form" data-section="section-10" enctype="multipart/form-data">
                            <input type="hidden" name="section_name" value="section-10">
                            <input type="hidden" name="content_key" value="partners10">

                            <div class="row mb-24 gy-3 align-items-center">
                                <label class="form-label mb-0 col-sm-2">Active:</label>
                                <div class="col-sm-3">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input name="active" value="true" class="form-check-input" type="checkbox"
                                            role="switch" id="yes"
                                            {{ !empty($partnerSection10['active']) ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>


                            <div id="partner-container" class="row g-3">
                                @if (isset($partnerSection10['partners']) && !empty($partnerSection10['partners']))
                                    @foreach ($partnerSection10['partners'] as $index => $partner)
                                        <div class="col-12 border border-primary p-3 partner-entry">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label">Partner Name</label>
                                                    <input type="text" name="name[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ $partner['name'] ?? '' }}">
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label"> URL</label>
                                                    <input type="text" name="url[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ $partner['url'] ?? '' }}">
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label"> Icon (123x24)</label>
                                                    <input type="file" name="icon[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                <div class="col-2 image-preview-area">
                                                    @if (!empty($partner['icon']))
                                                        <img src="{{ asset('uploads/home3/' . $partner['icon']) }}"
                                                            style="max-height: 60px;">
                                                    @endif
                                                </div> 

                                                <div class="col-1 d-flex align-items-end">
                                                    <button type="button"
                                                        class="remove-partner w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="text-center mt-2 mb-3">
                                <button type="button" id="add-partner"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:plus"></iconify-icon>
                                </button>
                            </div>
                            <div class="text-center m-1">
                                <button type="submit"
                                    class="btn btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{-- END Section 9 --}}

        </div>
    </div>
@endsection

@section('backend-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            //////////////////// seoForm ////////////////////
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

            $('.section-form').on('submit', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                let formData = new FormData(form);
                let sectionName = $(this).data('section');

                if (!sectionName) {
                    swal.fire('Error', 'Missing section name!', 'error');
                    return;
                }
                // formData.append('section_name', section);

                $.ajax({
                    url: "{{ route('home3.section.handle') }}",
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                title: 'Saved',
                                text: res.message || 'Data saved!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload page after OK
                                }
                            });
                        } else {
                            swal.fire('Error', res.message || 'Unknown error', 'error');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let msg = Object.values(errors).flat().join('<br>');
                            swal.fire('Validation Error', msg, 'warning');
                        } else {
                            let msg = xhr.responseJSON?.message || 'Something went wrong!';
                            swal.fire('Error', msg, 'error');
                        }
                    }
                });
            });

            $('.image-input').on('change', function() {
                const preview = $(this).closest('.row').find('.image-preview-area');
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.html(
                            `<img src="${e.target.result}" class="img-fluid" style="max-height:150px;">`
                        );
                    };
                    reader.readAsDataURL(file);
                }
            });

            // teamMembersSelect 
            $('.formSelect2').select2({
                templateResult: formatMember,
                templateSelection: formatMember,
                escapeMarkup: function(m) {
                    return m;
                }
            });

            function formatMember(option) {
                if (!option.id) return option.text;

                const imgUrl = $(option.element).data('image');
                const text = option.text;

                return `<span class="d-flex align-items-center">
                        <img src="${imgUrl}" class="me-2 rounded-circle" style="height: 24px; width: 24px; object-fit: cover;">
                        ${text}
                    </span>`;
            }
        });
    </script>

    <script>
        // add or remove the partners
        let maxPartners = 10;

        $('#add-partner').on('click', function() {
            let container = $('#partner-container');
            let count = container.find('.partner-entry').length;

            if (count >= maxPartners) {
                Swal.fire('Limit Reached', 'You can only add up to 10 partners.', 'warning');
                return;
            }

            let newBlock = ` <div class="col-12 border border-primary p-3 partner-entry">
            <div class="row">
            <div class="col-3">
                <label class="form-label">Partner Name</label>
                <input type="text" name="name[]" class="form-control form-control-sm">
            </div>
            <div class="col-3">
                <label class="form-label"> URL</label>
                <input type="text" name="url[]" class="form-control form-control-sm">
            </div>
            <div class="col-3">
                <label class="form-label">Icon (123x24)</label>
                <input type="file" name="icon[]" class="form-control form-control-sm image-input">
            </div>
            <div class="col-2 image-preview-area"></div>

            <div class="col-1 d-flex align-items-end">
                <button type="button"
                    class="remove-partner w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                        icon="mingcute:delete-2-line"></iconify-icon></button>
            </div>
            </div>
            </div>`;

            container.append(newBlock);
        });

        // Remove partner block
        $(document).on('click', '.remove-partner', function() {
            $(this).closest('.partner-entry').remove();
        });

        // Delegated preview binding
        $(document).on('change', '.image-input', function() {
            let preview = $(this).closest('.partner-entry').find('.image-preview-area');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.html(`<img src="${e.target.result}" class="img-fluid" style="max-height: 80px;">`);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
