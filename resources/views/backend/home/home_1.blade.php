@extends('backend.layouts.app')

@section('backend-css')
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
                                value="{{ isset($seo->page_name) && !empty($seo->page_name) ? $seo->page_name : 'home-1' }}">
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
                </div><!-- card end -->
            </div>

            {{-- Section 1  --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Slider</h5>
                    </div>
                    <div class="card-body section1">
                        <div class="row">
                            {{-- slider 1 --}}
                            <div class="col-md-6">
                                <form class="section-form" data-section="section-1" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-1">
                                    <input type="hidden" name="content_key" value="slider-1">

                                    <div class="row">
                                        <div class="col-10">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $slider1content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label">Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $slider1content['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $slider1content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $slider1content['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Image (1600x819)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if ($slider1image)
                                                <img src="{{ asset('uploads/home1/' . $slider1image) }}" class="img-fluid"
                                                    style="max-height: 100px;" style="max-width: 250px;">
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

                                    <div class="row">
                                        <div class="col-10">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $slider2content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label">Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $slider2content['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $slider2content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $slider2content['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Image (1600x819)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if ($slider2image)
                                                <img src="{{ asset('uploads/home1/' . $slider2image) }}"
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

            {{-- Section-2  real-world experience --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 2 </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-2" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-2">
                                    <input type="hidden" name="content_key" value="services">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ isset($section2['active']) && !empty($section2['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title1" value="{{ $section2['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Samll Heading</label>
                                            <input type="text" name="heading"
                                                value="{{ $section2['heading'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        {{-- service 1  --}}
                                        <div class="col-4 border border-primary">
                                            <div class="row">
                                                <div class="col-10">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title[]"
                                                        value="{{ $section2['services'][0]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button Name</label>
                                                    <input type="text" name="button_name[]"
                                                        value="{{ $section2['services'][0]['button_name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button URL</label>
                                                    <input type="text" name="button_url[]"
                                                        value="{{ $section2['services'][0]['button_url'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Image (65x65)</label>
                                                    <input type="file" name="image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                {{-- Image Preview --}}
                                                <div class="col-10 m-1 image-preview-area">
                                                    @if (!empty($section2['services'][0]['image']))
                                                        <img src="{{ asset('uploads/home1/' . $section2['services'][0]['image']) }}"
                                                            class="img-fluid" style="max-height: 80px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{-- service 2  --}}
                                        <div class="col-4 border border-primary">
                                            <div class="row">
                                                <div class="col-10">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title[]"
                                                        value="{{ $section2['services'][1]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button Name</label>
                                                    <input type="text" name="button_name[]"
                                                        value="{{ $section2['services'][1]['button_name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button URL</label>
                                                    <input type="text" name="button_url[]"
                                                        value="{{ $section2['services'][1]['button_url'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Image (65x65)</label>
                                                    <input type="file" name="image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                {{-- Image Preview --}}
                                                <div class="col-10 m-1 image-preview-area">
                                                    @if (!empty($section2['services'][1]['image']))
                                                        <img src="{{ asset('uploads/home1/' . $section2['services'][1]['image']) }}"
                                                            class="img-fluid" style="max-height: 80px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{-- service 3  --}}
                                        <div class="col-4 border border-primary">
                                            <div class="row">
                                                <div class="col-10">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title[]"
                                                        value="{{ $section2['services'][2]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button Name</label>
                                                    <input type="text" name="button_name[]"
                                                        value="{{ $section2['services'][2]['button_name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Button URL</label>
                                                    <input type="text" name="button_url[]"
                                                        value="{{ $section2['services'][2]['button_url'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Image (65x65)</label>
                                                    <input type="file" name="image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                {{-- Image Preview --}}
                                                <div class="col-10 m-1 image-preview-area">
                                                    @if (!empty($section2['services'][2]['image']))
                                                        <img src="{{ asset('uploads/home1/' . $section2['services'][2]['image']) }}"
                                                            class="img-fluid" style="max-height: 80px;">
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

            {{-- Section 3 --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Section 3 - Meet the partners</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $partnerSection3 = [
                                'active' => false,
                                'partners' => [],
                            ];

                            if ($section3 && $section3->content_value) {
                                $decoded = json_decode($section3->content_value, true);
                                $partnerSection3['active'] = $section3->active ?? 0;
                                $partnerSection3['partners'] = $decoded['partners'] ?? [];
                            }
                        @endphp
                        <form class="section-form" data-section="section-3" enctype="multipart/form-data">
                            {{-- SECTION NAME & CONTENT KEY --}}
                            <input type="hidden" name="section_name" value="section-3">
                            <input type="hidden" name="content_key" value="partners">

                            <div class="row mb-24 gy-3 align-items-center">
                                <label class="form-label mb-0 col-sm-2">Active:</label>
                                <div class="col-sm-10">
                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input name="active" value="true" class="form-check-input" type="checkbox"
                                            role="switch" id="yes"
                                            {{ isset($partnerSection3['active']) && !empty($partnerSection3['active']) ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div id="partner-container" class="row g-3">
                                @if (isset($partnerSection3['partners']) && !empty($partnerSection3['partners']))
                                    @foreach ($partnerSection3['partners'] as $index => $partner)
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
                                                        <img src="{{ asset('uploads/home1/' . $partner['icon']) }}"
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
                </div><!-- card end -->
            </div>

            {{-- Section 4 --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        @php
                            $section4Content = [
                                'active' => false,
                                'title' => '',
                                'youtube' => '',
                                'short_desc' => '',
                                'about' => [
                                    'title' => '',
                                    'service_1' => ['name' => '', 'percent' => ''],
                                    'service_2' => ['name' => '', 'percent' => ''],
                                ],
                                'contact' => ['question' => '', 'number' => ''],
                                'images' => [null, null],
                                'cards' => [['title' => '', 'desc' => ''], ['title' => '', 'desc' => '']],
                            ];

                            if ($section4 && $section4->content_value) {
                                $decoded = json_decode($section4->content_value, true);
                                $section4Content = array_merge($section4Content, $decoded);
                                $section4Content['active'] = $section4->active ?? 0;
                            }
                        @endphp

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 4 </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-4" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-4">
                                    <input type="hidden" name="content_key" value="about">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    {{ !empty($section4Content['active']) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-2">
                                            <label class="form-label">Name (short)</label>
                                            <input type="text" name="name"
                                                value="{{ $section4Content['name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <label class="form-label">Youtube</label>
                                            <input type="text" name="youtube"
                                                value="{{ $section4Content['youtube'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Image 1 (510x584)</label>
                                                    <input type="file" name="image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>

                                                {{-- Image Preview --}}
                                                <div class="col-6 image-preview-area">
                                                    @if (!empty($section4Content['images'][0]))
                                                        <img src="{{ asset('uploads/home1/' . $section4Content['images'][0]) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Image 2 (350x311)</label>
                                                    <input type="file" name="image[]"
                                                        class="form-control form-control-sm image-input">
                                                </div>
                                                {{-- Image Preview --}}
                                                <div class="col-6 image-preview-area">
                                                    @if (!empty($section4Content['images'][1]))
                                                        <img src="{{ asset('uploads/home1/' . $section4Content['images'][1]) }}"
                                                            class="img-fluid" style="max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section4Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Short Description</label>
                                            <input type="text" name="short_desc"
                                                value="{{ $section4Content['short_desc'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Title 2</label>
                                                    <input type="text" name="about-title"
                                                        value="{{ $section4Content['about']['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-2">
                                                    <label class="form-label">Service 1</label>
                                                    <input type="text" name="about-s1"
                                                        value="{{ $section4Content['about']['service_1']['name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-1">
                                                    <label class="form-label">Service %</label>
                                                    <input type="text" name="about-s1-per"
                                                        value="{{ $section4Content['about']['service_1']['percent'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-2">
                                                    <label class="form-label">Service 2</label>
                                                    <input type="text" name="about-s2"
                                                        value="{{ $section4Content['about']['service_2']['name'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-1">
                                                    <label class="form-label">Service %</label>
                                                    <input type="text" name="about-s2-per"
                                                        value="{{ $section4Content['about']['service_2']['percent'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label">Contact Quetion</label>
                                            <input type="text" name="contact-q"
                                                value="{{ $section4Content['contact']['question'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" name="contact-no"
                                                value="{{ $section4Content['contact']['number'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                        </div>

                                        <div
                                            class="col-5 m-1 border border-primary rounded color-box h-190-px cursor-pointer min-w-120-px bg-info-50 position-relative p-28 flex-grow-1">
                                            <div class="row m-1">
                                                <div class="col-10">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="cardTitle[]"
                                                        value="{{ $section4Content['cards'][0]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-10">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" name="cardDesc[]"
                                                        value="{{ $section4Content['cards'][0]['desc'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="col-5 m-1 border border-primary rounded color-box h-190-px cursor-pointer min-w-120-px bg-info-50 position-relative p-28 flex-grow-1">
                                            <div class="row m-1">
                                                <div class="col-10">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="cardTitle[]"
                                                        value="{{ $section4Content['cards'][1]['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-10">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" name="cardDesc[]"
                                                        value="{{ $section4Content['cards'][1]['desc'] ?? '' }}"
                                                        class="form-control form-control-sm">
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


            {{-- Section 5 case studies   --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 5: Case Studies </h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-5" enctype="multipart/form-data">
                                    <input type="hidden" name="section_name" value="section-5">
                                    <input type="hidden" name="content_key" value="section5">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if (isset($section5) && $section5->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $section5Content = isset($section5)
                                            ? json_decode($section5->content_value, true)
                                            : null; 
                                    @endphp 

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section5->title ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section5Content['smtitle'] ?? '' }}"
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

            {{-- Section 6  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 6 </h5>
                            </div>
                            @php
                                $section6content =
                                    isset($section6->content_value) && !empty($section6->content_value)
                                        ? json_decode($section6->content_value, true)
                                        : [];
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-6" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-6">
                                    <input type="hidden" name="content_key" value="section6">

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

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section6->title ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $section6content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" name="button_url"
                                                value="{{ $section6content['button_url'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Image (1920x1280)</label>
                                            <input type="file" name="image"
                                                class="form-control form-control-sm image-input">
                                        </div>
                                        <div class="col-5 m-1 image-preview-area">
                                            {{-- Image Preview --}}
                                            @if (!empty($section6->image))
                                                <img src="{{ asset('uploads/home1/' . $section6->image) }}"
                                                    class="img-fluid" style="max-height: 120px;">
                                            @endif
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

            {{-- Section 7 Question Answers  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 7</h5>
                            </div>
                            @php
                                $section7Content = $section7 ? json_decode($section7->content_value, true) : null;
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-7" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-7">
                                    <input type="hidden" name="content_key" value="section7">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if ($section7 && $section7->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title"
                                                value="{{ $section7Content['title'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section7Content['smTitle'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="col-3">
                                                <label class="form-label">Question {{ $i + 1 }}</label>
                                                <input type="text" name="queTitle[]"
                                                    class="form-control form-control-sm"
                                                    value="{{ $section7Content['questions'][$i]['title'] ?? '' }}">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Question {{ $i + 1 }} Description</label>
                                                <textarea name="queDesc[]" rows="2" class="form-control">{{ $section7Content['questions'][$i]['description'] ?? '' }}</textarea>
                                            </div>
                                        @endfor

                                        <div class="col-3">
                                            <div class="row">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <div class="col-12">
                                                        <label class="form-label">Point {{ $i }}</label>
                                                        <input type="text" name="points[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $section7Content['points'][$i] ?? '' }}">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>


                                        <div class="col-2">
                                            <label class="form-label">Years of Expeirence Count</label>
                                            <input type="text" name="yearsOfExpCount"
                                                value="{{ $section7Content['yearsOfExpCount'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Years of Expeirence Text</label>
                                            <input type="text" name="yearsOfExpText"
                                                value="{{ $section7Content['yearsOfExpText'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-4">
                                            <div class="row">
                                                <label class="form-label">Image (570x226)</label>
                                                <input type="file" name="image"
                                                    class="form-control form-control-sm image-input">

                                                <div class="col-5 m-1 image-preview-area">
                                                    {{-- Image Preview --}}
                                                    @if (!empty($section7->image))
                                                        <img src="{{ asset('uploads/home1/' . $section7->image) }}"
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

            {{-- Section 8 testimonials  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 8 : Testimonials</h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-8" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-8">
                                    <input type="hidden" name="content_key" value="section8">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if ($section8 && $section8->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section8->title ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        @php
                                            $section8Content = $section8
                                                ? json_decode($section8->content_value, true)
                                                : null;
                                        @endphp
                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section8Content['smtitle'] ?? '' }}"
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

            {{--   about counter  --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 9</h5>
                            </div>
                            <div class="card-body">
                                about counter
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- about tabs --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 10</h5>
                            </div>
                            @php
                                $section10Content = $section10 ? json_decode($section10->content_value, true) : null;
                            @endphp
                            <div class="card-body">
                                <form class="section-form" data-section="section-10" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-10">
                                    <input type="hidden" name="content_key" value="section10">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-4">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if ($section10 && $section10->active) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            {{-- <label class="form-label">Title</label> --}}
                                            <input type="text" name="title"
                                                value="{{ $section10Content['title'] ?? 'about tabs' }}"
                                                class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>

                                    <div class="row g-2">

                                        @php
                                            $card1 = $section10Content['cards']['card1'] ?? null;
                                        @endphp

                                        {{-- card 1 --}}
                                        <div class="col-3 border border-primary rounded  bg-info-50 ">
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="point1_title"
                                                        value="{{ $card1['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1</label>
                                                    <input type="text" name="point1_p1"
                                                        value="{{ $card1['point1'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1 Text</label>
                                                    <textarea rows="2" name="point1_p1text" class="form-control">{{ $card1['point1_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2</label>
                                                    <input type="text" name="point1_p2"
                                                        value="{{ $card1['point2'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2 Text</label>
                                                    <textarea rows="2" name="point1_p2text" class="form-control">{{ $card1['point2_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Short Description</label>
                                                    <textarea rows="2" name="point1_desc" class="form-control">{{ $card1['description'] ?? '' }}</textarea>
                                                </div>

                                                @php
                                                    $point1List = $card1['points'] ?? [];
                                                @endphp
                                                @for ($i = 0; $i < 4; $i++)
                                                    <div class="col-12">
                                                        <input type="text" name="point1_p[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $point1List[$i] ?? '' }}">
                                                    </div>
                                                @endfor

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label">Image (340x326)</label>
                                                            <input type="file" name="point1_image"
                                                                class="form-control form-control-sm image-input">
                                                        </div>

                                                        <div class="col-12 m-1 image-preview-area">
                                                            {{-- Image Preview --}}
                                                            @if (!empty($card1['image']))
                                                                <img src="{{ asset('uploads/home1/' . $card1['image']) }}"
                                                                    class="img-fluid" style="max-height: 120px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-1"></div>

                                        @php
                                            $card2 = $section10Content['cards']['card2'] ?? null;
                                        @endphp
                                        {{-- card 2 --}}
                                        <div class="col-3 border border-primary rounded  bg-info-50 ">
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="point2_title"
                                                        value="{{ $card2['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1</label>
                                                    <input type="text" name="point2_p1"
                                                        value="{{ $card2['point1'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1 Text</label>
                                                    <textarea rows="2" name="point2_p1text" class="form-control">{{ $card2['point1_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2</label>
                                                    <input type="text" name="point2_p2"
                                                        value="{{ $card2['point2'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2 Text</label>
                                                    <textarea rows="2" name="point2_p2text" class="form-control">{{ $card2['point2_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Short Description</label>
                                                    <textarea rows="2" name="point2_desc" class="form-control">{{ $card2['description'] ?? '' }}</textarea>
                                                </div>

                                                @php
                                                    $point2List = $card2['points'] ?? [];
                                                @endphp
                                                @for ($i = 0; $i < 4; $i++)
                                                    <div class="col-12">
                                                        <input type="text" name="point2_p[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $point2List[$i] ?? '' }}">
                                                    </div>
                                                @endfor

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label">Image (340x326)</label>
                                                            <input type="file" name="point2_image"
                                                                class="form-control form-control-sm image-input">
                                                        </div>

                                                        <div class="col-12 m-1 image-preview-area">
                                                            {{-- Image Preview --}}
                                                            @if (!empty($card2['image']))
                                                                <img src="{{ asset('uploads/home1/' . $card2['image']) }}"
                                                                    class="img-fluid" style="max-height: 120px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-1"></div>

                                        @php
                                            $card3 = $section10Content['cards']['card3'] ?? null;
                                        @endphp

                                        {{-- card 3 --}}
                                        <div class="col-3 border border-primary rounded  bg-info-50 ">
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="point3_title"
                                                        value="{{ $card3['title'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1</label>
                                                    <input type="text" name="point3_p1"
                                                        value="{{ $card3['point1'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Point 1 Text</label>
                                                    <textarea rows="2" name="point3_p1text" class="form-control">{{ $card3['point1_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2</label>
                                                    <input type="text" name="point3_p2"
                                                        value="{{ $card3['point2'] ?? '' }}"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Point 2 Text</label>
                                                    <textarea rows="2" name="point3_p2text" class="form-control">{{ $card3['point2_text'] ?? '' }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Short Description</label>
                                                    <textarea rows="2" name="point3_desc" class="form-control">{{ $card3['description'] ?? '' }}</textarea>
                                                </div>

                                                @php
                                                    $point3List = $card3['points'] ?? [];
                                                @endphp

                                                @for ($i = 0; $i < 4; $i++)
                                                    <div class="col-12">
                                                        <input type="text" name="point3_p[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $point3List[$i] ?? '' }}">
                                                    </div>
                                                @endfor

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label">Image (340x326)</label>
                                                            <input type="file" name="point3_image"
                                                                class="form-control form-control-sm image-input">
                                                        </div>
                                                        <div class="col-12 m-1 image-preview-area">
                                                            {{-- Image Preview --}}
                                                            @if (!empty($card3['image']))
                                                                <img src="{{ asset('uploads/home1/' . $card3['image']) }}"
                                                                    class="img-fluid" style="max-height: 120px;">
                                                            @endif
                                                        </div>
                                                    </div>
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

            {{--  contact map --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 11</h5>
                            </div>
                            <div class="card-body">
                                contact map
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Section 12  blogs --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 12 : Blogs</h5>
                            </div>
                            <div class="card-body">
                                <form class="section-form" data-section="section-12" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-12">
                                    <input type="hidden" name="content_key" value="section12">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if ($section12 && $section12->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section12->title ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        @php
                                            $section12Content = $section12
                                                ? json_decode($section12->content_value, true)
                                                : null;
                                        @endphp
                                        <div class="col-6">
                                            <label class="form-label">Small Title</label>
                                            <input type="text" name="smTitle"
                                                value="{{ $section12Content['smtitle'] ?? '' }}"
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

            {{--  btn contact --}}
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Section 13</h5>
                            </div>
                            <div class="card-body">

                                <form class="section-form" data-section="section-13" enctype="multipart/form-data">
                                    {{-- SECTION NAME & CONTENT KEY --}}
                                    <input type="hidden" name="section_name" value="section-13">
                                    <input type="hidden" name="content_key" value="section13">

                                    <div class="row mb-24 gy-3 align-items-center">
                                        <label class="form-label mb-0 col-sm-2">Active:</label>
                                        <div class="col-sm-10">
                                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                                <input name="active" value="true" class="form-check-input"
                                                    type="checkbox" role="switch" id="yes"
                                                    @if ($section13 && $section13->active) checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" value="{{ $section13->title ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        @php
                                            $section13Content = $section13
                                                ? json_decode($section13->content_value, true)
                                                : null;
                                        @endphp
                                        <div class="col-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name"
                                                value="{{ $section13Content['button_name'] ?? '' }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Button Url</label>
                                            <input type="text" name="button_url"
                                                value="{{ $section13Content['button_url'] ?? '' }}"
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
                    url: "{{ route('home1.section.handle') }}",
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

            let newBlock = `
        <div class="col-12 border border-primary p-3 partner-entry">
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
                    <button type="button" class="remove-partner w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
                </div> 
            </div> 
        </div>`;

            container.append(newBlock);
        });

        // // Remove partner block
        // $(document).on('click', '.remove-partner', function() {
        //     $(this).closest('.partner-entry').remove();
        // });

        //  Remove partner block
        $(document).on('click', '.remove-partner', function() {
            $(this).closest('.partner-entry').remove();
        });

        //  Delegated preview binding
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
