<!DOCTYPE html>
<html lang="en">
{{-- DEBUG START --}}
<?php
\Log::info('View loaded with data:', [
    'teacherProfile' => isset($teacherProfile),
    'competencyPercentages' => isset($competencyPercentages),
    'strengths' => isset($strengths),
    'growths' => isset($growths),
    'prompts' => isset($prompts),
    'learning_pathway' => isset($learning_pathway),
    'courses' => isset($courses),
]);
?>
{{-- DEBUG END --}}

<head>
    <meta charset="utf-8">
    <title>Thanks for Participating!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/assessment/thank-you/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/thank-you/css/owl.carousel.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/thank-you/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/thank-you/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/thank-you/css/style.css') }}">

    <style>
        body {
            padding: 0;
        }

        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .course-card img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card-body {
            padding: 1.2rem;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .btn-explore {
            border-radius: 20px;
            padding: 6px 18px;
            font-weight: 500;
        }

        #radarChart {
            max-width: 800px;
            max-height: 600px;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .no-print {
                display: none !important;
            }

            .course-card img {
                max-height: 100px;
                object-fit: cover;
            }

            canvas {
                max-width: 300px !important;
                max-height: 300px !important;
            }

            .wrapper,
            .container {
                page-break-inside: avoid;
            }
        }

        #sidebar {
            height: full;
            width: 350px;
            background-color: #1f2937;
            color: white;
            padding: 100px 0px;
            border-right: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px;
        }

        #sidebar::after {
            content: "";
            position: absolute;
            bottom: 10px;
            left: -20px;
            width: 300px;
            height: 300px;
            background-image: url('{{ asset('assets/assessment/quiz/img/riyadha-logo.png') }}');
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.05;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        #sidebar img {
            width: 150px;
            margin-bottom: 60px;
        }


        #sectionTabs {
            width: 100%;
        }

        #sectionTabs .nav-item {
            width: 100%;
        }

        #sectionTabs .nav-link {
            color: #d1d5db;
            padding: 12px 20px;
            font-weight: 500;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            background-color: transparent;
            display: block;
        }

        #sectionTabs .nav-link:hover {
            background-color: #374151;
            color: #fff;
        }

        #sectionTabs .nav-link.active {
            color: #f97316;
            background-color: #374151;
            font-weight: 600;
        }

        .header {
            background-color: #e9e7e7;
            padding: 30px;
            margin: 20px 10px;
        }

        .profile {
            width: 400px;
            margin: 50px;
        }

        .about-teacher {
            font-family: sans-serif;
            font-size: 25px;
        }

        .view-profile {
            outline: none;
            color: #f97316;
            background-color: #fff;
            font-size: 20px;
            padding: 10px;
            border: 2px solid #f97316;
            margin: 25px 0px;
            border-radius: 5px;
        }

        .view-profile:hover {
            background-color: #f97316;
            color: #fff;
        }

        .suggestion-box {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            width: 100%;
        }

        .suggestion-box img {
            width: auto;
            height: 180px;
            border-radius: 0.5rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }

        .suggestion-content {
            flex-grow: 1;
        }

        .suggestion-content h6 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .suggestion-content ul {
            padding-left: 1rem;
            margin-bottom: 0.5rem;
        }

        .suggestion-content li {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #111;
        }

        .suggestion-content a.btn {
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.4rem 0.8rem;
        }

        .reflective-section h4 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .prompt-card {
            display: flex;
            align-items: center;
            background-color: #f4f4f4;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .prompt-icon {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background-color: white;
            border: 4px solid #f97316;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            margin-left: -50px;
            flex-shrink: 0;
        }

        .prompt-icon span {
            font-size: 24px;
            font-weight: bold;
            color: #f97316;
        }

        .prompt-text {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.5;
        }

        @media (max-width: 767px) {
            .prompt-card {
                flex-direction: row;
            }
        }

        .custom-learning-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            margin-top: 20px;
        }

        .custom-learning-table thead th {
            background-color: #1e2a38;
            color: white;
            padding: 12px 10px;
            text-align: left;
            font-weight: 600;
        }

        .custom-learning-table tbody td {
            padding: 12px 10px;
            vertical-align: top;
            color: #333;
        }

        .custom-learning-table tbody .alt-row {
            background-color: #f2f2f2;
        }

        .burger {
            font-size: 28px;
            padding: 15px;
            cursor: pointer;
            position: fixed;
            top: 10px;
            right: 15px;
            left: auto;
            z-index: 1100;
            display: none;
            color: #f97316;
            background-color: white;
        }


        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -150%;
            height: 100%;
            width: 100%;
            /* ✅ full width on mobile */
            background-color: #1f2937;
            z-index: 1050;
            transition: left 0.3s ease-in-out;
            overflow-y: auto;
            padding-top: 60px;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar .close-btn {
            font-size: 24px;
            padding: 12px 20px;
            cursor: pointer;
            color: white;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        @media (max-width: 768px) {
            .burger {
                display: block;
            }

            .sidebar {
                width: 100%;
            }
        }

        @media (min-width: 769px) {
            .burger {
                display: none;
            }

            .sidebar {
                position: relative;
                left: 0 !important;
                width: 350px;
                z-index: auto;
            }

            .sidebar .close-btn {
                display: none;
            }
        }

        @media (max-width: 1000px) and (min-width: 769px) {
            .d-flex.align-items-center.mb-4 {
                flex-direction: column !important;
                text-align: center;
            }

            .profile {
                width: 220px;
                margin: 0 auto 20px auto;
            }

            .about-teacher {
                padding: 0 20px;
                font-size: 18px;
                word-break: break-word;
            }

            .view-profile {
                font-size: 16px;
            }
        }

        @media (max-width: 768px) {
            .cont {
                padding: 1px;
            }

            .prf {
                flex-direction: column !important;
                text-align: center;
            }

            .profile {
                width: 200px;
                margin: 0 auto 20px auto;
            }

            .about-teacher {
                font-size: 18px;
                word-wrap: break-word;
                padding: 0 10px;
            }

            .view-profile {
                font-size: 16px;
                padding: 8px 16px;
            }

            .header {
                font-size: 20px !important;
                padding: 20px 10px;
                margin: 20px 0;
                text-align: center;
            }

            #report .nav-icon {
                display: block;
                margin: 0 auto 10px auto;
            }

            #report span {
                font-size: 20px !important;
                margin-left: 0 !important;
                display: block;
                text-align: center;
            }
        }
    </style>


<body>
    <div class="burger" onclick="toggleSidebar()">☰</div>
    <div style="display: flex; min-height: 100vh;">

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <img src="{{ asset('assets/assessment/thank-you/img/riyadha-logo.png') }}" alt="">
            <ul class="nav flex-column" id="sectionTabs">
                <li class="nav-item"><a class="nav-link active" data-section="report" href="#">Assessment
                        Report</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionA" href="#">Section A</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionB" href="#">Section B</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionC" href="#">Section C</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionD" href="#">Section D</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionE" href="#">Section E</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionF" href="#">Section F</a></li>
                <li class="nav-item"><a class="nav-link" data-section="sectionG" href="#">Section G</a></li>
            </ul>
        </div>

        <!-- Section: Report -->
        <div class="cont" style="flex-grow: 1; padding: 15px;">
            <div class="wrapper p-5 container py-4">
                <div id="report" class="report-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    {{-- <div class="wrapper container mb-5 py-5" style="page-break-after: always;">
                         <div class="row align-items-center mb-5">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('assets/assessment/thank-you/img/vp.png') }}" class="img-fluid"
                                    width="300px" alt="Thank you">
                            </div>
                            <div class="col-md-6 text-center text-md-start">
                                <h2 class="fw-bold mb-3">Thanks for Participating!</h2>
                                <h4 class="mb-3">Your response has been recorded successfully.</h4>
                                <p class="text-muted">Based on what you shared, we suggest the following report and
                                    courses to support
                                    your goals.</p>
                            </div>
                        </div>
                    </div> --}}
                    <h2 class="header"><strong>{{ $teacherProfile['name'] }}'s</strong> Diagnostic Assessment
                        Report</h2>

                    <div class=" prf d-flex align-items-center mb-4">
                        <img src="{{ asset('assets/assessment/thank-you/img/profile.jpg') }}" alt="profile"
                            class="profile me-4">

                        <div class="about-teacher">
                            <strong style="color: #f97316">Teacher Name:</strong> {{ $teacherProfile['name'] }}<br>
                            <strong style="color: #f97316">Grade Level:</strong>
                            {{ $teacherProfile['grade_band'] }}<br>
                            <strong style="color: #f97316">Assessment Date:</strong>
                            {{ $teacherProfile['assessment_date'] }} <br>
                            <button class="view-profile">View Full Profile</button>
                        </div>

                    </div>

                </div>

                <div id="sectionA" class="report-section">
                    <div class="mb-4">
                        <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                            width="35px" class="nav-icon">
                        <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                        <h2 class="header"><strong>Section A: Teaching Style Snapshot</strong></h2>
                        <p><strong style="color: #f97316; font-size:33px">You are a
                                {{ $teacherProfile['teaching_archetype'] }}.</strong></p>
                        <p style="color:#5c5c5e; font-size:23px">
                            {{ $teacherProfile['archetype_description'] ?: 'Your archetype is still being shaped. Keep exploring!' }}
                        </p>
                    </div>
                </div>

                <div id="sectionB" class="report-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    <div class="mb-4">
                        <h2 class="header"><strong>Section B: Competency Radar Chart</strong></h2>
                        {{-- <div class="text-center">
                            <canvas id="radarChart" width="300" height="300"></canvas>
                        </div> --}}
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th style="background-color:#1f2937; color:#f97316">Competency</th>
                                    <th style="background-color:#1f2937; color:#f97316">Score %</th>
                                    <th style="background-color:#1f2937; color:#f97316">Intepretation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competencyPercentages as $comp)
                                    <tr>
                                        <td>{{ $comp['code'] }} - {{ $comp['title'] }}</td>
                                        {{-- <td>{{ $comp['score'] }}%</td> --}}
                                        <td>
                                            <div
                                                style="background-color: #ddd; border-radius: 20px; overflow: hidden; height: 23px; max-width: 100%; width: 100%;">
                                                <div
                                                    style="
                                                            width: {{ $comp['score'] }}%;
                                                            background-color: {{ $comp['score'] >= 70 ? '#4CAF50' : '#f44336' }};
                                                            height: 100%;
                                                            text-align: right;
                                                            padding-right: 8px;
                                                            color: #fff;
                                                            font-weight: bold;
                                                        ">
                                                    {{ $comp['score'] }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($comp['score'] >= 83)
                                                {{ $comp['strength_feedback'] }}
                                            @endif
                                            @if ($comp['score'] < 83)
                                                {{ $comp['growth_feedback'] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="sectionC" class="report-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    <div class="mb-4">
                        <h2 class="header"><strong>Section C: Strength Areas</strong></h2>

                        @foreach ($strengths as $s)
                            <div class="d-flex justify-content-between align-items-center p-4 mb-3"
                                style="background-color: #f9f3f1; border-radius: 8px;">
                                <div style="flex: 1;">
                                    <div class="fw-bold mb-1" style="font-size: 1.5rem; color:#4CAF50">
                                        <strong>{{ $s['title'] }} ({{ $s['competency'] }} –
                                            {{ $s['score'] }}%)</strong>
                                    </div>
                                    <div style="color: #333; font-size: 1.3rem">
                                        {{ $s['summary'] }}
                                    </div>
                                </div>
                                <div style="width: 100px; height: 100px;">
                                    <canvas class="circular-chart" data-score="{{ $s['score'] }}" width="100"
                                        height="100"></canvas>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



                {{-- <div id="sectionD" class="report-section">
                    <div class="mb-4">
                        <h4>Section D: Growth Opportunities</h4>

                        @foreach ($growths as $item)
                            <div class="mb-3">
                                <h5>❗ {{ $item['title'] }} ({{ $item['competency'] }})</h5>
                                <p>{{ $item['summary'] }}</p>

                                @php
                                    $matchedCourses = $groupedByCompetency[$item['competency']] ?? [];
                                @endphp

                                @if (count($matchedCourses))
                                    <ul class="list-unstyled mt-2">
                                        @foreach ($matchedCourses as $course)
                                            <li class="mb-2">🎓 <a href="{{ $course['href'] }}"
                                                    target="_blank">{{ $course['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No courses recommended for this competency.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div> --}}



                @php
                    $suggestedCoursesJson = Session::get('suggested_courses');
                    $suggestedCourses = $suggestedCoursesJson ? json_decode($suggestedCoursesJson, true) : [];

                    $groupedByCompetency = [];
                    foreach ($suggestedCourses as $course) {
                        if (isset($course['match']) && is_array($course['match'])) {
                            foreach ($course['match'] as $competency) {
                                $groupedByCompetency[$competency][] = $course;
                            }
                        }
                    }
                @endphp

                <div id="sectionD" class="report-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    <div class="mb-4">
                        <h2 class="header"><strong>Section D: Growth Opportunities</strong></h2>

                        @foreach ($growths as $item)
                            @php
                                $matchedCourses = $groupedByCompetency[$item['competency']] ?? [];
                                $firstCourse = $matchedCourses[0] ?? null;
                            @endphp

                            <div class="bg-light rounded shadow-sm p-4 mb-4">
                                <div class="row align-items-center">
                                    {{-- Left Column: Chart + Text --}}
                                    <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
                                        <canvas class="circular-chart me-3" width="100" height="100"
                                            data-score="{{ $item['score'] }}" data-color="red"></canvas>
                                        <div>
                                            <div class="fw-bold text-danger mb-1" style="font-size: 1.5rem;">
                                                <strong>{{ $item['title'] }} ({{ $item['competency'] }} –
                                                    {{ $item['score'] }}%)</strong>

                                            </div>
                                            <div style="color: #333; font-size: 1.3rem">
                                                <p class="mb-0 text-muted fw-semibold">{{ $item['summary'] }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Right Column: Image + Suggested Courses --}}
                                    <div class="col-md-6 d-flex flex-column flex-md-row align-items-center gap-3">
                                        @if ($firstCourse)
                                            <div class="suggestion-box d-flex flex-column align-items-center align-items-md-start"
                                                style="background-color: white; padding: 20px; border-radius: 8px; width: 100%;">

                                                <img src="{{ $firstCourse['img'] }}"
                                                    alt="{{ $firstCourse['title'] }}"
                                                    style="max-width: 100%; height: auto; margin-bottom: 15px;">

                                                <div class="suggestion-content">
                                                    <h5 style="color: #f97316;">Suggested Courses</h5>
                                                    <ul class="list-unstyled">
                                                        @foreach ($matchedCourses as $course)
                                                            <li style="color: #555;">- {{ $course['title'] }}</li>
                                                        @endforeach
                                                    </ul>
                                                    <a href="{{ $firstCourse['href'] }}" target="_blank"
                                                        class="btn btn-warning btn-sm mt-2">
                                                        View Course
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-muted">No courses recommended for this competency.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Chart rendering --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.circular-chart').forEach(canvas => {
                            const ctx = canvas.getContext('2d');
                            const score = parseInt(canvas.dataset.score) || 0;
                            const angle = (score / 100) * 2 * Math.PI;
                            const color = canvas.dataset.color === 'red' ? '#EF4444' : '#4CAF50'; // red or green

                            ctx.lineWidth = 10;

                            // Background Circle
                            ctx.strokeStyle = '#e0e0e0';
                            ctx.beginPath();
                            ctx.arc(50, 50, 40, 0, 2 * Math.PI);
                            ctx.stroke();

                            // Foreground Arc
                            ctx.strokeStyle = color;
                            ctx.beginPath();
                            ctx.arc(50, 50, 40, -Math.PI / 2, angle - Math.PI / 2);
                            ctx.stroke();

                            // Score Text
                            ctx.fillStyle = '#333';
                            ctx.font = 'bold 16px Arial';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            ctx.fillText(score + '%', 50, 50);
                        });
                    });
                </script>

                <div id="sectionE" class="report-section reflective-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    <div class="mb-4">
                        <h2 class="header"><strong>Section E: Réflective Prompts</strong></h2>
                        <div class="row">
                            @foreach ($prompts as $q)
                                <div class="col-md-6 mb-4">
                                    <div class="prompt-card">
                                        <div class="prompt-icon">
                                            <span>?</span>
                                        </div>
                                        <div class="prompt-text">
                                            {{ $q }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div id="sectionF" class="report-section">
                    <img src="{{ asset('assets/assessment/thank-you/img/icons/report.png') }}" alt=""
                        width="35px" class="nav-icon">
                    <span style="font-size: 25px; margin-left:20px; color:#5c5c5e">Assessment Report</span>
                    <div class="mb-4">
                        <h2 class="header"><strong>Section F: Personalized Learning Pathway</strong></h2>

                        <table class="custom-learning-table">
                            <thead>
                                <tr>
                                    <th>Course Title</th>
                                    <th>Format</th>
                                    <th>Duration</th>
                                    <th>Why It’s Suggested</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($learning_pathway as $index => $lp)
                                    <tr class="{{ $index % 2 == 1 ? 'alt-row' : '' }}">
                                        <td><strong>{{ $lp['course']['title'] ?? 'N/A' }}</strong></td>
                                        <td>{{ $lp['format'] }}</td>
                                        <td>{{ $lp['duration'] }}</td>
                                        <td>{{ $lp['reason'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


                <div id="sectionG" class="report-section">
                    <div class="wrapper container py-5">
                        @if ($courses->isEmpty())
                            <p class="text-danger text-center">No recommended courses matched your answers. Please try
                                again or
                                contact support.</p>
                        @else
                            <h2 class="header"><strong> Explore Recommended Courses </strong></h2>
                            <div class="row mt-2 justify-content-center g-4">
                                @foreach ($courses as $course)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card h-100 shadow-sm course-card">
                                            <img src="{{ $course['img'] }}" class="card-img-top"
                                                alt="{{ $course['title'] }}">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $course['title'] }}</h5>
                                                <p class="card-text">{{ $course['desc'] }}</p>
                                                <a href="{{ $course['href'] }}"
                                                    class="btn btn-primary mt-auto btn-explore">
                                                    Explore Course
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        <!-- Print & Download Options -->
                        <div class="text-center mt-5 no-print mb-5">
                            <button onclick="window.print()" class="btn btn-primary"> 🖨️ Print Report</button>
                            <a href="{{ route('assessment.download') }}" class="btn btn-success">
                                📄 Download as PDF
                            </a>
                            {{-- <a href="{{ route('assessment.report.download') }}" class="btn btn-success">
            📄 Download as PDF
        </a> --}}
                        </div>


                    </div>
                </div>

                <!-- /wrapper -->
            </div> <!-- end main content -->
        </div> <!-- end flex wrapper -->
        <script src="{{ asset('assets/assessment/thank-you/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/assessment/thank-you/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/assessment/thank-you/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/assessment/thank-you/js/appear.js') }}"></script>
        <script src="{{ asset('assets/assessment/thank-you/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/assessment/thank-you/js/main.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const tabs = document.querySelectorAll('#sectionTabs .nav-link');
            const sections = document.querySelectorAll('.report-section');

            // Hide all sections initially
            sections.forEach(sec => sec.classList.add('d-none'));

            // Show section corresponding to active tab on load
            const activeTab = document.querySelector('#sectionTabs .nav-link.active');
            if (activeTab) {
                const activeSectionId = activeTab.getAttribute('data-section');
                const activeSection = document.getElementById(activeSectionId);
                if (activeSection) {
                    activeSection.classList.remove('d-none');
                }
            }

            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const burger = document.querySelector('.burger');
                const body = document.body;

                sidebar.classList.toggle('active');
                burger.innerHTML = sidebar.classList.contains('active') ? '✖' : '☰';

                // Prevent background scroll on mobile
                if (sidebar.classList.contains('active')) {
                    body.style.overflow = 'hidden';
                } else {
                    body.style.overflow = '';
                }
            }


            // Hide sidebar on nav item click (in mobile view)
            document.querySelectorAll('#sidebar .nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    const sidebar = document.getElementById('sidebar');
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                        document.querySelector('.burger').innerHTML = '☰';
                    }
                });
            });

            // Handle tab click
            tabs.forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = tab.getAttribute('data-section');

                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    sections.forEach(sec => {
                        if (sec.id === target) {
                            sec.classList.remove('d-none');
                        } else {
                            sec.classList.add('d-none');
                        }
                    });
                });
            });

            const ctx = document.getElementById('radarChart');
            const radarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: @json(array_column($competencyPercentages, 'title')),
                    datasets: [{
                        label: 'Proficiency %',
                        data: @json(array_column($competencyPercentages, 'score')),
                        fill: true,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });
        </script>
</body>

</html>
