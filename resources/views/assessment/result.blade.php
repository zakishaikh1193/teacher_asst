<!DOCTYPE html>
<html lang="en">

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
    </style>
    <style>
        #radarChart {
            max-width: 800px;
            max-height: 600px;
        }
    </style>


    <style>
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
    </style>


<body>
    {{-- <div class="wrapper">
        <div class="poll-style-three-content">
            <div class="poll-style-three-img float-left">
                <img src="{{ asset('assets/assessment/thank-you/img/vp.png') }}" alt="">
            </div>
            <div class="poll-style-three-text">
                <h2>Thanks for Participating!</h2>
                <div class="poll-item-selector">
                    <h2>Your response has been recorded successfully.</h2>
                    <div class="poll-btn-pair">
                        <span>Your response has been recorded successfully.</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Section: Thank You -->
    <div class="wrapper container mb-5 py-5" style="page-break-after: always;">
        <div class="row align-items-center mb-5">
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/assessment/thank-you/img/vp.png') }}" class="img-fluid" width="300px"
                    alt="Thank you">
            </div>
            <div class="col-md-6 text-center text-md-start">
                <h2 class="fw-bold mb-3">Thanks for Participating!</h2>
                <h4 class="mb-3">Your response has been recorded successfully.</h4>
                <p class="text-muted">Based on what you shared, we suggest the following report and courses to support
                    your goals.</p>
            </div>
        </div>
    </div>

    <!-- Section: Report -->
    <div class="wrapper p-5 container py-4">
        <h2 class="mb-4">Maarif Teacher Diagnostic Assessment Report</h2>

        <div class="mb-3">
            <strong>Teacher Name:</strong> {{ $teacherProfile['name'] }}<br>
            <strong>Grade Level:</strong> {{ $teacherProfile['grade_band'] }}<br>
            <strong>Assessment Date:</strong> {{ $teacherProfile['assessment_date'] }}
        </div>

        <div class="mb-4">
            <h4>Section A: Teaching Style Snapshot</h4>
            <p><strong>You are a {{ $teacherProfile['teaching_archetype'] }}.</strong></p>
            <p>{{ $teacherProfile['archetype_description'] ?: 'Your archetype is still being shaped. Keep exploring!' }}
            </p>
        </div>

        <div class="mb-4">
            <h4>Section B: Competency Radar Chart</h4>
            <div class="text-center">
                <canvas id="radarChart" width="300" height="300"></canvas>
            </div>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Competency</th>
                        <th>Score %</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competencyPercentages as $comp)
                        <tr>
                            <td>{{ $comp['title'] }}</td>
                            <td>{{ $comp['score'] }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            <h4>Section C: Strength Areas</h4>
            <ol>
                @foreach ($strengths as $s)
                    <li><strong>{{ $s['title'] }} ({{ $s['competency'] }})</strong><br>{{ $s['summary'] }}</li>
                @endforeach
            </ol>
        </div>

        <div class="mb-4">
            <h4>Section D: Growth Opportunities</h4>
            @foreach ($growths as $g)
                <p><strong>❗ {{ $g['title'] }} ({{ $g['competency'] }})</strong><br>{{ $g['summary'] }}</p>
                <p>🎓 <strong>Suggested Courses:</strong><br>
                <ul>
                    @foreach ($g['recommended_courses'] as $course)
                        <li>{{ $course }}</li>
                    @endforeach
                </ul>
                </p>
            @endforeach
        </div>

        <div class="mb-4">
            <h4>Section E: Reflective Prompts</h4>
            <ol>
                @foreach ($prompts as $q)
                    <li>{{ $q }}</li>
                @endforeach
            </ol>
        </div>

        <div class="mb-4">
            <h4>Section F: Personalized Learning Pathway</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Format</th>
                        <th>Duration</th>
                        <th>Why It’s Suggested</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learning_pathway as $lp)
                        <tr>
                            <td>{{ $lp['course'] }}</td>
                            <td>{{ $lp['format'] }}</td>
                            <td>{{ $lp['duration'] }}</td>
                            {{-- <td>{{ $lp['justification'] }}</td> --}}
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="wrapper container py-5">
        @if ($courses->isEmpty())
            <p class="text-danger text-center">No recommended courses matched your answers. Please try again or
                contact support.</p>
        @else
            <h4 class="mb-4  text-center"> Explore Recommended Courses </h4>
            <div class="row mt-2 justify-content-center g-4">
                @foreach ($courses->take(3) as $course)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm course-card">
                            <img src="{{ $course['img'] }}" class="card-img-top" alt="{{ $course['title'] }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $course['title'] }}</h5>
                                <p class="card-text">{{ $course['desc'] }}</p>
                                <a href="{{ $course['href'] }}" class="btn btn-primary mt-auto btn-explore">
                                    Explore Course
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

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





    <!-- /wrapper -->
    <script src="{{ asset('assets/assessment/thank-you/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/thank-you/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/thank-you/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/thank-you/js/appear.js') }}"></script>
    <script src="{{ asset('assets/assessment/thank-you/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/thank-you/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
