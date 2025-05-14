<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/owl.carousel.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/quiz/css/style.css') }}">

    <style>
        .actions.clearfix {
            padding: 20px 40px;
            margin-top: auto;
            justify-content: space-between;
            align-items: center;
        }

        .quiz-option-selector ul {
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;

            justify-content: center;
        }

        .quiz-option-selector ul li {
            flex: 1 1 calc(50% - 20px);
            /* Two per row */
            display: flex;
            align-items: stretch;
            min-width: 250px; 
        }

        .start-quiz-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            transition: all 0.2s ease-in-out;
            height: 100%;
            font-size: 16px;
        }

        .exp-label {
            flex: 1;
            padding-left: 10px;
            word-break: break-word;
            white-space: normal;
        }
    </style>

<body>
    <div class="quiz-top-area text-center">
        <h1>Personality Quiz</h1>
        <div class="quiz-countdown text-center ul-li">
            <ul>
                <li class="hours">
                    <span class="count-down-number"></span>
                    <span class="count-unit">Hours</span>
                </li>

                <li class="minutes">
                    <span class="count-down-number"></span>
                    <span class="count-unit">Min</span>
                </li>

                <li class="seconds">
                    <span class="count-down-number"></span>
                    <span class="count-unit">Sec</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrapper position-relative">
        <div class="wizard-content-1 clearfix">
            <div class="steps d-inline-block position-absolute clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current"></li>
                    <li class="multisteps-form__progress-btn"></li>
                    <li class="multisteps-form__progress-btn"></li>
                    <li class="multisteps-form__progress-btn"></li>
                    <li class="multisteps-form__progress-btn"></li>
                </ul>
            </div>
            <div class="step-inner-content clearfix position-relative">
                <form method="POST" action="{{ route('assessment.quiz.submit') }}" id="wizard"
                    class="multisteps-form__form">
                    @csrf
                    <div class="form-area position-relative">
                        @foreach ($questions as $index => $q)
                            <div class="multisteps-form__panel {{ $index === 0 ? 'js-active' : '' }}"
                                data-animation="fadeIn">
                                <div class="wizard-forms clearfix position-relative">
                                    <div class="quiz-title text-center mx-auto px-3">
                                        <span>Question {{ $index + 1 }}. </span>
                                        <span>{{ $q['question_type'] }} </span>
                                        <p>
                                            {{ $q['text'] }}
                                        </p>
                                        <h2>{{ $q['question'] }}</h2>
                                    </div>

                                    <div class="quiz-option-selector clearfix">
                                        <ul>
                                            @foreach ($q['options'] as $optIndex => $option)
                                                @if (!empty($q['id']))
                                                    <li>
                                                        <label class="start-quiz-item">
                                                            <input type="radio" name="answers[{{ $q['id'] }}]"
                                                                value="{{ $option }}" class="exp-option-box"
                                                                required>
                                                            <span
                                                                class="exp-number text-uppercase">{{ chr(65 + $optIndex) }}</span>
                                                            <span class="exp-label">{{ $option }}</span>
                                                            <span class="checkmark-border"></span>
                                                        </label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="bottom-vector">
                                        <img src="{{ asset('assets/assessment/quiz/img/bq1.png') }}" alt="">
                                    </div>

                                    <div class="quiz-progress-area">
                                        <div class="progress">
                                            @php $progress = (($index + 1) / count($questions)) * 100; @endphp
                                            <div class="progress-bar position-relative"
                                                style="width: {{ $progress }}%">
                                                <span>{{ round($progress) }}% complete, keep it up!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="actions clearfix">
                                        <ul class="d-flex justify-content-between align-items-center">
                                            @if ($index !== 0)
                                                <li>
                                                    <span class="js-btn-prev" title="PREV">Previous Question</span>
                                                </li>
                                            @endif
                                            <li class="ml-auto">
                                                @if ($index !== count($questions) - 1)
                                                    <span class="js-btn-next" title="NEXT">Next Question</span>
                                                @else
                                                    <button class="js-btn-submit"
                                                        type="submit"><span>SUBMIT</span></button>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/assessment/quiz/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/quiz/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/quiz/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/quiz/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/assessment/quiz/js/form-step.js') }}"></script>
    <script src="{{ asset('assets/assessment/quiz/js/jquery.validate.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/assessment/quiz/js/main.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/assessment/quiz/js/switch.js') }}"></script>  --}}

    {{-- <script>
        (function() {

            "use strict";

            var Wizard = {
                init: function() {
                    this.Basic.init();
                },

                Basic: {
                    init: function() {

                        this.preloader();
                        this.countDown();

                    },
                    preloader: function() {
                        jQuery(window).on('load', function() {
                            jQuery('#preloader').fadeOut('slow', function() {
                                jQuery(this).remove();
                            });
                        });
                    },
                    countDown: function() {
                        if ($('.quiz-countdown').length > 0) {
                            // var deadlineDate = new Date('dec 26, 2020 23:59:59').getTime(); 
                            var deadlineDate = new Date('dec 26, 2020 23:59:59').getTime();
                            // var countdownDays = document.querySelector('.days .count-down-number');
                            var countdownHours = document.querySelector('.hours .count-down-number');
                            var countdownMinutes = document.querySelector('.minutes .count-down-number');
                            var countdownSeconds = document.querySelector('.seconds .count-down-number');
                            setInterval(function() {
                                var currentDate = new Date().getTime();
                                var distance = deadlineDate - currentDate;
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                                    60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                // countdownDays.innerHTML = days;
                                countdownHours.innerHTML = hours;
                                countdownMinutes.innerHTML = minutes;
                                countdownSeconds.innerHTML = seconds;
                            }, 1000);

                        };
                    },
                }
            }
            jQuery(document).ready(function() {
                Wizard.init();
            });

        })();
    </script> --}}

    <script>
        const quizStartTime = {{ $startTime }}; // e.g., 1715000000
        const quizDurationMinutes = 330; // fixed duration
        // const deadline = quizStartTime * 1000 + quizDurationMinutes * 60 * 1000; // convert to milliseconds

        (function() {
            "use strict";

            var Wizard = {
                init: function() {
                    this.Basic.init();
                },

                Basic: {
                    init: function() {
                        this.preloader();
                        this.countDown(quizStartTime); // <--- Using the JS variable
                    },

                    preloader: function() {
                        jQuery(window).on('load', function() {
                            jQuery('#preloader').fadeOut('slow', function() {
                                jQuery(this).remove();
                            });
                        });
                    },

                    countDown: function(startTimestamp) {
                        // const deadline = startTimestamp * 1000 + (30 * 60 * 1000);   
                        const deadline = quizStartTime * 1000 + quizDurationMinutes * 60 *
                            1000; // convert to milliseconds  
                        const countdownHours = document.querySelector('.hours .count-down-number');
                        const countdownMinutes = document.querySelector('.minutes .count-down-number');
                        const countdownSeconds = document.querySelector('.seconds .count-down-number');
                        const form = document.getElementById('wizard');

                        const interval = setInterval(function() {
                            const now = new Date().getTime();
                            let timeLeft = deadline - now;

                            if (timeLeft <= 0) {
                                clearInterval(interval);
                                countdownHours.innerHTML = '00';
                                countdownMinutes.innerHTML = '00';
                                countdownSeconds.innerHTML = '00';
                                if (form) form.submit();
                                return;
                            }

                            const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
                            const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
                            const seconds = Math.floor((timeLeft / 1000) % 60);

                            countdownHours.innerHTML = String(hours).padStart(2, '0');
                            countdownMinutes.innerHTML = String(minutes).padStart(2, '0');
                            countdownSeconds.innerHTML = String(seconds).padStart(2, '0');
                        }, 1000);
                    }
                }
            };

            jQuery(document).ready(function() {
                Wizard.init();
            });
        })();
    </script>


</body>

</html>
