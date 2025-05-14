<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teacher Diagnostic Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #222;
        }

        h2,
        h4 {
            color: #004080;
        }

        .section {
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #888;
            padding: 6px;
            text-align: left;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .course-card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 30%;
            box-sizing: border-box;
        }

        .course-card h5 {
            margin: 5px 0;
            font-size: 14px;
        }

        .course-card p {
            font-size: 12px;
        }

        .chart-image {
            width: 300px;
            margin-bottom: 10px;
        }

        .chart-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h2>Maarif Teacher Diagnostic Assessment Report</h2>

    <div class="section">
        <strong>Teacher Name:</strong> {{ $teacherProfile['name'] }}<br>
        <strong>Grade Level:</strong> {{ $teacherProfile['grade_band'] }}<br>
        <strong>Assessment Date:</strong> {{ $teacherProfile['assessment_date'] }}
    </div>

    <div class="section">
        <h4>Section A: Teaching Style Snapshot</h4>
        <p><strong>You are a {{ $teacherProfile['teaching_archetype'] }}.</strong></p>
        <p>{{ $teacherProfile['archetype_description'] }}</p>
    </div>

    <div class="section">
        <h4>Section B: Competency Radar Chart</h4>
        @if (file_exists(public_path('charts/competency_radar_chart.png')))
            <img src="{{ public_path('charts/competency_radar_chart.png') }}" style="width: 400px;" alt="Radar Chart">
        @else
            <p><em>Radar chart not available at the moment.</em></p>
        @endif
        {{-- <div class="chart-container">
            <img src="{{ public_path('charts/competency_radar_chart.png') }}" class="chart-image" alt="Radar Chart">
        </div> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Competency</th>
                    <th>Score (%)</th>
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

    <div class="section">
        <h4>Section C: Strength Areas</h4>
        <ol>
            @foreach ($strengths as $s)
                <li><strong>{{ $s['title'] }} ({{ $s['competency'] }})</strong><br>{{ $s['summary'] }}</li>
            @endforeach
        </ol>
    </div>

    <div class="section">
        <h4>Section D: Growth Opportunities</h4>
        @foreach ($growths as $g)
            <p><strong>❗ {{ $g['title'] }} ({{ $g['competency'] }})</strong><br>{{ $g['summary'] }}</p>
            <p><strong>Suggested Courses:</strong></p>
            <ul>
                @foreach ($g['recommended_courses'] as $course)
                    <li>{{ $course }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <div class="section">
        <h4>Section E: Reflective Prompts</h4>
        <ol>
            @foreach ($prompts as $prompt)
                <li>{{ $prompt }}</li>
            @endforeach
        </ol>
    </div>

    <div class="section">
        <h4>Section F: Personalized Learning Pathway</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Format</th>
                    <th>Duration</th>
                    <th>Justification</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($learning_pathway as $lp)
                    <tr>
                        <td>{{ $lp['course'] }}</td>
                        <td>{{ $lp['format'] }}</td>
                        <td>{{ $lp['duration'] }}</td>
                        <td>{{ $lp['justification'] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h4>Section G: Course Recommendations</h4>
        <div class="card-container">
            @foreach ($courses->take(3) as $course)
                <div class="course-card">
                    <h5>{{ $course['title'] }}</h5>
                    <p>{{ $course['desc'] }}</p>
                    <small>🔗 {{ $course['href'] }}</small>
                </div>
            @endforeach
        </div>
    </div> 
</body>

</html>
