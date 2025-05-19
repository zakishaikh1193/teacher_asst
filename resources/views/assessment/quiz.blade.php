<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Personality Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background-color: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .quiz-wrapper {
            max-width: 1400px;
            margin: 40px auto;
            display: flex;
            flex-wrap: wrap;
            /* add this */
            gap: 30px;
            padding: 0 15px;
            /* add some side padding for mobile */
        }

        .quiz-main {
            flex: 2.5;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .quiz-main::after {
            content: "";
            position: absolute;
            bottom: 50px;
            left: 0;
            width: 500px;
            height: 500px;
            background-image: url('{{ asset('assets/assessment/quiz/img/riyadha-logo.png') }}');
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.07;
            pointer-events: none;
            z-index: 0;
        }

        .quiz-sidebar {
            flex: 0.7;
            padding: 20px;
            border-radius: 12px;

            height: fit-content;
        }

        .quiz-header {
            margin-bottom: 30px;
        }

        .quiz-header h2 {
            font-weight: 600;
            font-size: 24px;
        }

        .timer-box,
        .timer-box2 {
            text-align: center;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 20px;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.267);
            background: #fff;
        }

        .question-section {
            margin-bottom: 30px;
        }

        .question-context {
            background-color: #eaf0f6;
            padding: 10px;
            border-left: 5px solid #00B7E3;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .question-text {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .quiz-options label {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-bottom: 15px;
            cursor: pointer;
            background: #fff;
            transition: all 0.3s ease;
        }

        .quiz-options label:hover {
            border-color: #F58220;
        }

        .quiz-options input[type="radio"] {
            display: none;
        }

        .quiz-options input[type="radio"]:checked+label {
            border-color: #F58220;
            background-color: #fff6ef;
        }

        .progress {
            height: 18px;
            background-color: #dbe9f1;
            border-radius: 9px;
        }

        .progress-bar {
            background-color: #00B7E3;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 60px;
        }

        .actions button,
        .actions span {
            flex: 1;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            background-color: #F58220;
            color: white;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .quiz-question-list {
            list-style: none;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 20px;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.267);
            background: #fff;
        }

        .quiz-question-list li {
            background: #f4f4f4;
            padding: 10px 15px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .option-square {
            width: 42px;
            height: 52px;
            border: 2px solid #ccc;
            color: #b1b0b0;
            background-color: #f8f8f8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            border-radius: 5px;
            flex-shrink: 0;
        }

        .quiz-options label {
            position: relative;
            padding-right: 50px;
            /* Reserve space for the circle */
            z-index: 0;
            /* Ensure content stays above tick unless overridden */
        }

        .quiz-options input[type="radio"]:checked+label .option-square {
            background-color: #F58220;
            color: white;
            border: 2px solid #F58220;
        }

        .quiz-options input[type="radio"]:checked+label::after {
            content: "\f00c";
            /* Font Awesome check icon */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: #fff;
            background-color: #F58220;
            font-size: 14px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            pointer-events: none;
        }

        .timer-visual {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            position: relative;
        }

        .countdown-svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .countdown-svg .track {
            fill: none;
            stroke: #e6e6e6;
            stroke-width: 8;
        }

        .countdown-svg .progress {
            fill: none;
            stroke: #F58220;
            stroke-width: 8;
            stroke-linecap: round;
            stroke-dasharray: 282.6;
            stroke-dashoffset: 0;
            transition: stroke-dashoffset 1s linear;
        }

        .countdown-svg text {
            fill: #F58220;
            font-size: 16px;
            font-weight: bold;
            transform: rotate(90deg);
            transform-origin: 50% 50%;
        }

        .quiz-question-item.answered {
            background-color: #fff1e6;
            border: 1px solid #F58220;
            color: #F58220;
            font-weight: 600;
            position: relative;
        }

        .quiz-question-item.answered::after {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            background-color: #F58220;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            pointer-events: none;
        }

        .challenge-note {
            background-color: #d3cfcf;
            padding: 10px;
            border-radius: 10px;
        }

        .qno {
            background-color: #f59948;
            padding: 8px;
            border-radius: 4px;
        }

        .question-type {
            margin-bottom: 14px;
        }

        @media (max-width: 768px) {

            .quiz-main,
            .quiz-sidebar {
                flex: 1 1 100%;
                max-width: 100%;
                order: -1;
            }

            .quiz-sidebar {
                order: -1;
                /* move sidebar to the top */
            }

            .quiz-main {
                order: 0;
            }

            .actions {
                flex-direction: column;
                gap: 10px;
            }

            .quiz-options label {
                flex-direction: column;
                align-items: flex-start;
            }

            .quiz-options label .option-square {
                margin-bottom: 10px;
                margin-right: 0;
            }

            .quiz-question-list {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                padding: 18px 5px;
                justify-content: center;
            }

            .quiz-question-list li {
                width: 22px;
                height: 22px;
                border-radius: 50%;
                background-color: #f0f0f0;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 8px;
                font-weight: bold;
                margin: 4px;
                padding: 0;
                position: relative;
                transition: background-color 0.3s ease;
            }


            .quiz-question-list li::after {
                content: '';
            }

            .quiz-question-list li.answered {
                background-color: #F58220;
                color: white;
                font-size: 0;
                /* hide the number visually */
            }

            .quiz-question-list li.answered::after {
                content: '\f00c';
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                font-size: 14px;
                color: #ffffff;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }

        @media (max-width: 480px) {
            .quiz-header h2 {
                font-size: 20px;
            }

            .question-text {
                font-size: 16px;
            }

            .question-context {
                font-size: 0.9rem;
            }

            .timer-visual {
                width: 80px;
                height: 80px;
            }

            .countdown-svg text {
                font-size: 14px;
            }

        }

        .mobile-progress-circle {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            position: relative;
            margin-top: 1.5rem;
        }

        @media (min-width: 768px) {
            .timer-box2 {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .progress-wrapper {
                display: none;
            }
        }

        .mobile-progress-circle svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .progress-ring .track {
            fill: none;
            stroke: #e6e6e6;
            stroke-width: 8;
        }

        .progress-ring .fill {
            fill: none;
            stroke: #00B7E3;
            stroke-width: 8;
            stroke-linecap: round;
            stroke-dasharray: 282.6;
            stroke-dashoffset: 282.6;
            transition: stroke-dashoffset 0.5s ease;
        }

        .progress-ring text {
            fill: #00B7E3;
            font-size: 16px;
            font-weight: bold;
            transform: rotate(90deg);
            transform-origin: 50% 50%;
        }
    </style>
</head>

<body>
    <div class="quiz-wrapper">
        <div class="quiz-main">
            <div class="quiz-header">
                <h2>Personality Quiz</h2>
            </div>

            <form method="POST" action="{{ route('assessment.quiz.submit') }}">
                @csrf
                @foreach ($questions as $index => $q)
                    <div class="question-section" id="question-{{ $index }}"
                        style="display: {{ $index === 0 ? 'block' : 'none' }}">
                        @if (!empty($q['question_type']))
                            <div class="question-type" style="font-size: 1.1rem;">
                                <span class="qno"> Q{{ $index + 1 }}.</span>
                                <strong>{{ ucfirst($q['question_type']) }}</strong>

                            </div>
                        @endif

                        @if (!empty($q['text']))
                            <div class="question-context">
                                {{ $q['text'] }}
                            </div>
                        @endif

                        <div class="question-text">
                            {{ $q['question'] }}
                        </div>

                        <div class="quiz-options">
                            @foreach ($q['options'] as $optIndex => $option)
                                <div>
                                    <input type="radio" name="answers[{{ $q['id'] }}]"
                                        value="{{ $option }}" id="q{{ $q['id'] }}_opt{{ $optIndex }}"
                                        required>
                                    <label for="q{{ $q['id'] }}_opt{{ $optIndex }}">
                                        <span class="option-square">{{ chr(65 + $optIndex) }}</span>
                                        <span class="option-text">{{ $option }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @if (!empty($q['challenge']))
                            <div class="challenge-note">
                                <strong>Challenge: </strong>
                                {!! highlightChallengeTerms($q['challenge']) !!}
                            </div>
                        @endif
                        <div class="actions">
                            @if ($index > 0)
                                <span class="js-btn-prev" data-target="{{ $index - 1 }}">Previous Question</span>
                            @endif
                            @if ($index < count($questions) - 1)
                                <span class="js-btn-next ml-auto" data-target="{{ $index + 1 }}">Next
                                    Question</span>
                            @else
                                <button type="submit">Submit</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </form>

            <div class="mt-4 progress-wrapper">
                <div class="progress">
                    <div class="progress-bar" id="quiz-progress" role="progressbar" style="width: 0%">
                        0% complete
                    </div>
                </div>
            </div>
        </div>

        <div class="quiz-sidebar">
            <div class="timer-box">
                <div class="timer-visual">
                    <svg class="countdown-svg" viewBox="0 0 100 100">
                        <circle class="track" cx="50" cy="50" r="45" />
                        <circle class="progress" cx="50" cy="50" r="45" />
                        <text id="timer" x="50" y="55" text-anchor="middle" dominant-baseline="middle">05:00</text>
                    </svg>
                </div>

                <div class="mt-2 text-muted small">Timer Remaining</div>


            </div>
            {{-- <div class="timer-box2">
                <div class="text-muted small text-center mt-1">Quiz Progress</div>
                <div class="mobile-progress-circle d-md-none mt-4">
                    <svg class="progress-ring" viewBox="0 0 100 100">
                        <circle class="track" cx="50" cy="50" r="45" />
                        <circle class="fill" cx="50" cy="50" r="45" />
                        <text id="progress-label" x="50" y="55" text-anchor="middle"
                            dominant-baseline="middle">0%</text>
                    </svg>

                </div>
            </div> --}}


            <ul class="quiz-question-list">
                @foreach ($questions as $i => $q)
                    <li class="quiz-question-item" data-index="{{ $i }}"
                        data-question-id="{{ $q['id'] }}">
                        <span class="d-none d-md-inline">Question {{ $i + 1 }}</span>
                        <span class="d-inline d-md-none">Q{{ $i + 1 }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        @php
            function highlightChallengeTerms($text)
            {
                $keywords = ['most', 'least', 'always', 'never', 'important', 'significant', 'challenging'];
                foreach ($keywords as $word) {
                    $text = preg_replace(
                        "/\b($word)\b/i",
                        '<span style="color: #F58220; font-weight: bold;">$1</span>',
                        $text,
                    );
                }
                return $text;
            }
        @endphp
    </div>

    <script>
        document.querySelectorAll('.js-btn-next').forEach(btn => {
            btn.addEventListener('click', () => {
                let target = btn.dataset.target;
                document.querySelectorAll('.question-section').forEach(q => q.style.display = 'none');
                document.getElementById(`question-${target}`).style.display = 'block';
                updateProgress(target);
            });
        });

        document.querySelectorAll('.js-btn-prev').forEach(btn => {
            btn.addEventListener('click', () => {
                let target = btn.dataset.target;
                document.querySelectorAll('.question-section').forEach(q => q.style.display = 'none');
                document.getElementById(`question-${target}`).style.display = 'block';
                updateProgress(target);
            });
        });

        // function updateProgress() {
        //     const total = {{ count($questions) }};
        //     const answered = document.querySelectorAll('.quiz-options input[type="radio"]:checked').length;
        //     const progress = (answered / total) * 100;
        //     const rounded = Math.round(progress);

        //     const progressBar = document.getElementById('quiz-progress');
        //     progressBar.style.width = `${rounded}%`;

        //     if (rounded <= 0) {
        //         progressBar.textContent = '';
        //     } else if (rounded < 13) {
        //         progressBar.textContent = `${rounded}%`;
        //     } else {
        //         progressBar.textContent = `${rounded}% complete`;
        //     }


        // }
        function updateProgress() {
            const totalQuestions = document.querySelectorAll('.question-section').length;
            const answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;

            const percentComplete = Math.round((answeredQuestions / totalQuestions) * 100);

            // Update horizontal progress bar
            const progressBar = document.getElementById('quiz-progress');
            progressBar.style.width = percentComplete + '%';
            progressBar.innerText = percentComplete + '% Done';

            // Update circular progress ring
            const ring = document.querySelector('.progress-ring .fill');
            const progressLabel = document.getElementById('progress-label');

            const radius = 45;
            const circumference = 2 * Math.PI * radius;
            const offset = circumference - (percentComplete / 100) * circumference;

            if (ring) {
                ring.style.strokeDashoffset = offset;
            }

            if (progressLabel) {
                progressLabel.textContent = percentComplete + '%';
            }
        }

        // Attach to change event for all radio buttons
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type="radio"]').forEach(input => {
                input.addEventListener('change', updateProgress);
            });

        });



        let totalSeconds = 300; // 5 minutes
        let seconds = totalSeconds;

        const radius = 45;
        const circumference = 2 * Math.PI * radius;
        const progressCircle = document.querySelector('.countdown-svg .progress');
        const timerText = document.getElementById('timer');

        progressCircle.style.strokeDasharray = `${circumference}`;
        progressCircle.style.strokeDashoffset = `0`;

        function updateTimerVisual(percentRemaining) {
            const offset = circumference * (1 - percentRemaining / 100);
            progressCircle.style.strokeDashoffset = offset;
        }

        const interval = setInterval(() => {
            if (seconds <= 0) {
                clearInterval(interval);
                timerText.textContent = "00:00";
                return;
            }

            seconds--;

            const min = String(Math.floor(seconds / 60)).padStart(2, '0');
            const sec = String(seconds % 60).padStart(2, '0');
            timerText.textContent = `${min}:${sec}`;

            let percent = (seconds / totalSeconds) * 100;
            updateTimerVisual(percent);
        }, 1000);
        document.querySelectorAll('.quiz-options input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const inputName = this.name; // e.g., "answers[5]"
                const match = inputName.match(/answers\[(\d+)\]/);
                if (match) {
                    const questionId = match[1];

                    // Find the correct sidebar item using data-question-id
                    const navItem = document.querySelector(
                        `.quiz-question-item[data-question-id="${questionId}"]`);
                    if (navItem) {
                        navItem.classList.add('answered');
                    }
                }
                updateProgress();
            });
        });

        // Optional: Clicking question item navigates to it
        document.querySelectorAll('.quiz-question-item').forEach(item => {
            item.addEventListener('click', () => {
                const index = item.dataset.index;
                document.querySelectorAll('.question-section').forEach(q => q.style.display = 'none');
                document.getElementById(`question-${index}`).style.display = 'block';
                updateProgress(index);
            });
        });
    </script>
</body>

</html>
