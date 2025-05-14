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
                                value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'home-2' }}">
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

            {{-- Section 1  --}}
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
                                            <label class="form-label">Image (1600x819)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if (isset($section1S1->image))
                                                <img src="{{ asset('uploads/home2/' . $section1S1->image) }}"
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
                                            <label class="form-label">Image (1600x819)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if (isset($section1S2->image))
                                                <img src="{{ asset('uploads/home2/' . $section1S2->image) }}"
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

            {{-- Section-2 Industries --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 2 - industries </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-2" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-2">
                                    <input type="hidden" name="content_key" value="industries">

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
                                        <div class="col-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title1" value="{{ $S2Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Samll Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $S2Content['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label">Short Description</label>
                                            <textarea name="shortDesc" class="form-control form-control-sm" rows="2">{{ $S2Content['shortDesc'] ?? '' }}</textarea>
                                        </div>

                                        @for ($sCount = 0; $sCount < 4; $sCount++)
                                            <div class="col-3 border border-primary">
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
                                                        <label class="form-label">Image (64x64)</label>
                                                        <input type="file" name="image[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>
                                                    <div class="col-10 m-1 image-preview-area">
                                                        @if (!empty($S2Content['services'][$sCount]['image']))
                                                            <img src="{{ asset('uploads/home2/' . $S2Content['services'][$sCount]['image']) }}"
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

            {{-- Section 3 Services --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 3: Services</h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-3" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-3">
                                    <input type="hidden" name="content_key" value="section3">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if (isset($section3) && $section3->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $section3Content = isset($section3)
                                            ? json_decode($section3->content_value, true)
                                            : null;
                                    @endphp

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section3Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section3Content['smTitle'] ?? '' }}"
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

            {{-- Section 4 --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 4</h5>
                            </div>
                            @php
                                $section4B =
                                    isset($section4->content_value) && !empty($section4->content_value)
                                        ? json_decode($section4->content_value, true)
                                        : [];
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-4" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-4">
                                    <input type="hidden" name="content_key" value="section4">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section4->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section4B['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Image (947x659)</label>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                <div class="col-5 m-1 image-preview-area">
                                                    {{-- Image Preview --}}
                                                    @if (!empty($section4->image))
                                                        <img src="{{ asset('uploads/home2/' . $section4->image) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Title 1 </label>
                                                    <input type="text" name="points_title[]"
                                                        value="{{ $section4B['points_title'][0] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Description 1</label>
                                                    <textarea name="points_desc[]" class="form-control form-control-sm" rows="3">{{ $section4B['points_desc'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Title 2 </label>
                                                    <input type="text" name="points_title[]"
                                                        value="{{ $section4B['points_title'][1] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Description 2</label>
                                                    <textarea name="points_desc[]" class="form-control form-control-sm" rows="3">{{ $section4B['points_desc'][1] ?? '' }}</textarea>
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

            {{-- Section 5 --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 5 : experience casses
                                </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section5Content = [];
                                    if (isset($section5) && $section5->content_value) {
                                        $section5Content = json_decode($section5->content_value, true);
                                    }
                                    // echo '<pre>';
                                    // print_r($section5);
                                @endphp
                                <form class="section-form" data-section="section-5" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-5">
                                    <input type="hidden" name="content_key" value="casses">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section5->active) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">

                                        <div class="col-4">
                                            <label class="form-label">Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $section5Content['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Small Heading</label>
                                            <input type="text" name="small_heading"
                                                value="{{ $section5Content['small_heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Youtube</label>
                                            <input type="text" name="youtube"
                                                value="{{ $section5Content['youtube'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Image 1 (1170x544)</label>
                                                    <input type="file" name="image"
                                                        class="form-control form-control-sm image-input">
                                                </div>

                                                {{-- Image Preview --}}
                                                <div class="col-6 image-preview-area">
                                                    @if (!empty($section5Content['images'][0]))
                                                        <img src="{{ asset('uploads/home2/' . $section5Content['images'][0]) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section5Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Short Description</label>
                                            <input type="text" name="short_desc"
                                                value="{{ $section5Content['short_desc'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="form-label">Service 1</label>
                                                    <input type="text" name="service_1"
                                                        value="{{ $section5Content['about']['service_1']['name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-2">
                                                    <label class="form-label">Service %</label>
                                                    <input type="text" name="service_1_per"
                                                        value="{{ $section5Content['about']['service_1']['percent'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label">Service 2</label>
                                                    <input type="text" name="service_2"
                                                        value="{{ $section5Content['about']['service_2']['name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-2">
                                                    <label class="form-label">Service %</label>
                                                    <input type="text" name="service_2_per"
                                                        value="{{ $section5Content['about']['service_2']['percent'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        @for ($S2i = 0; $S2i < 3; $S2i++)
                                            <div
                                                class="col-4 border border-primary rounded color-box h-190-px cursor-pointer min-w-120-px bg-info-50 position-relative p-28 flex-grow-1">
                                                <div class="row m-1">
                                                    <div class="col-12">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="cardTitle[]"
                                                            value="{{ $section5Content['cards'][$S2i]['title'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="cardDesc[]" rows="2" class="form-control form-control-sm">{{ $section5Content['cards'][$S2i]['desc'] ?? '' }}</textarea>
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

            {{-- Section 6: Meet the team  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 6 </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section6Content = [];
                                    if (isset($section6) && $section6->content_value) {
                                        $section6Content = json_decode($section6->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-6">
                                    <input type="hidden" name="section_name" value="section-6">
                                    <input type="hidden" name="content_key" value="team_selection">
                                    <div class="row">
                                        <div class="row mb-24 gy-3 align-items-center">
                                            <label class="form-label mb-0 col-sm-2">Active:</label>
                                            <div class="col-sm-10">
                                                <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                    <input name="active" value="true" class="form-check-input"
                                                        type="checkbox" role="switch" id="yes"
                                                        {{ !empty($section6->active) ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section6Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Short Title</label>
                                            <input type="text" name="short_title"
                                                value="{{ $section6Content['short_title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Select Team Members to Highlight:</label>
                                            @if (isset($teamMembers))
                                                <select name="selected_team_members[]" class="form-select formSelect2"
                                                    multiple="multiple" style="width: 100%;">
                                                    @foreach ($teamMembers as $member)
                                                        <option value="{{ $member->id }}"
                                                            data-image="{{ asset('uploads/team/' . $member->image) }}"
                                                            {{ in_array($member->id, $section6Content['selected_ids'] ?? []) ? 'selected' : '' }}>
                                                            {{ $member->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- </div> --}}

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 7: Testimonials  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 7: Testimonials </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-7" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-7">
                                    <input type="hidden" name="content_key" value="testimonials">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if (isset($section7) && $section7->active) checked @endif>
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

            {{-- Section 8: blogs  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 8 : Blogs</h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-8" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-8">
                                    <input type="hidden" name="content_key" value="blogs">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if (isset($section8) && $section8->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $section8Content = isset($section8)
                                            ? json_decode($section8->content_value, true)
                                            : null;
                                    @endphp

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section8Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section8Content['smTitle'] ?? '' }}"
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

            {{-- Section 9 : meet the partners --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Section 9 - Meet the partners</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $partnerSection9 = [
                                'partners' => [],
                            ];

                            if (isset($section9) && $section9->content_value) {
                                $decoded = json_decode($section9->content_value, true);
                                $partnerSection9['partners'] = $decoded['partners'] ?? [];
                            }
                        @endphp
                        <form class="section-form" data-section="section-9" enctype="multipart/form-data">
                            <input type="hidden" name="section_name" value="section-9">
                            <input type="hidden" name="content_key" value="partners">

                            <div class="row mb-24 gy-3 align-items-center">
                                <label class="form-label mb-0 col-sm-2">Active:</label>
                                <div class="col-sm-3">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input name="active" value="true" class="form-check-input" type="checkbox"
                                            role="switch" id="yes"
                                            {{ isset($section9->active) && !empty($section9->active) ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ $section9->title ?? '' }}"
                                        class="form-control form-control-sm">
                                </div>
                            </div>


                            <div id="partner-container" class="row g-3">
                                @if (isset($partnerSection9['partners']) && !empty($partnerSection9['partners']))
                                    @foreach ($partnerSection9['partners'] as $index => $partner)
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
                                                        <img src="{{ asset('uploads/home2/' . $partner['icon']) }}"
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

            {{-- Section 10: Creating Value  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 10 : Creating Value </h5>
                            </div>
                            @php
                                $section10Content = [];
                                if (isset($section10) && $section10->content_value) {
                                    $section10Content = json_decode($section10->content_value, true);
                                }
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-10" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-10">
                                    <input type="hidden" name="content_key" value="createValues">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section10Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $cards = $section10Content['cards'] ?? [
                                            ['title' => '', 'image' => ''],
                                            ['title' => '', 'image' => ''],
                                        ];
                                    @endphp

                                    <div class="row">
                                        @foreach ($cards as $index => $card)
                                            <div class="col-3">
                                                <div class="row border border-primary rounded">
                                                    <div class="col-12">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" name="card_title[]"
                                                            value="{{ $card['title'] ?? '' }}"
                                                            class="form-control form-control-sm">
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label">Image (300x229)</label>
                                                        <input type="file" name="card_image[]"
                                                            class="form-control form-control-sm image-input">
                                                    </div>

                                                    <div class="col-12 m-1 image-preview-area">
                                                        @if (!empty($card['image']))
                                                            <img src="{{ asset('uploads/home2/' . $card['image']) }}"
                                                                class="img-fluid" style="max-height: 120px;">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title"
                                                        value="{{ $section10Content['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label">Icon (64x64)</label>
                                                            <input type="file" name="icon"
                                                                class="form-control form-control-sm image-input">
                                                        </div>
                                                        <div class="col-12 m-1 image-preview-area">
                                                            @if (!empty($section10Content['icon']))
                                                                <img src="{{ asset('uploads/home2/' . $section10Content['icon']) }}"
                                                                    class="img-fluid" style="max-height: 120px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Icon Title</label>
                                                    <input type="text" name="icon_title"
                                                        value="{{ $section10Content['icon_title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Description 1</label>
                                            <textarea name="description1" class="form-control form-control-sm" rows="2">{{ $section10Content['description1'] ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Description 2</label>
                                            <textarea name="description2" class="form-control form-control-sm" rows="2">{{ $section10Content['description2'] ?? '' }}</textarea>
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

            {{--  Section 11 --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 11</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $section11Content = [];
                                    if (isset($section11) && $section11->content_value) {
                                        $section11Content = json_decode($section11->content_value, true);
                                    }
                                @endphp
                                <form class="section-form" data-section="section-11" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-11">
                                    <input type="hidden" name="content_key" value="sectionContact">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section11Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Title 1</label>
                                            <input type="text" name="title1"
                                                value="{{ $section11Content['title1'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Title 2</label>
                                            <input type="text" name="title2"
                                                value="{{ $section11Content['title2'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Background Image (1894x449)</label>
                                            <input type="file" name="bg_image"
                                                class="form-control form-control-sm image-input">
                                        </div>

                                        <div class="col-3 image-preview-area">
                                            @if (!empty($section11Content['bg_image']))
                                                <img src="{{ asset('uploads/home2/' . $section11Content['bg_image']) }}"
                                                    class="img-fluid" style="max-height: 120px;">
                                            @endif
                                        </div>

                                        {{-- <div class="col-3">
                                            <label class="form-label">Button Name 1</label>
                                            <input type="text" name="button_name1"
                                                class="form-control form-control-sm">
                                        </div> --}}
                                        <div class="col-3">
                                            <label class="form-label">Button Url 1</label>
                                            <input type="text" name="button_url1"
                                                value="{{ $section11Content['button_1'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        {{-- <div class="col-3">
                                            <label class="form-label">Button Name 2</label>
                                            <input type="text" name="button_name2"
                                                class="form-control form-control-sm">
                                        </div> --}}
                                        <div class="col-3">
                                            <label class="form-label">Button Url 2</label>
                                            <input type="text" name="button_url2"
                                                value="{{ $section11Content['button_2'] ?? '' }}"
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
                    url: "{{ route('home2.section.handle') }}",
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
