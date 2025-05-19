{{-- <!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/owl.carousel.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/style.css') }}">
    <script src="{{ asset('assets/assessment/register/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/register/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/register/js/popper.min.js') }}"></script>
    <style type="text/css">
        table {
            zoom: 0.9;
        }

        thead {
            background: #724dd8;
            color: #fff;
            font-weight: bold;
        }

        .step-inner-content {
            padding: 40px 40px 28px;
        }

        .custom-btn.custom-btn {
            margin-bottom: 30px;
            display: block;
            right: 0;
            background: #724dd8;
            float: left;
            padding: 9px 25px;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            border-radius: 0;
        }

        /* Chrome, Safari, Edge, Opera */
        .no-spinners::-webkit-outer-spin-button,
        .no-spinners::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head> 
 
<body>
    <div class="wrapper">
        <div class="wizard-content-1 clearfix">
            <div class="steps d-inline-block clearfix">
                <span class="bg-shape"></span>
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current">
                        <div class="step-btn-icon-text">
                            <div class="step-btn-icon float-left position-relative">
                                <img src="{{ asset('assets/assessment/register/img/bt1.png') }}" alt="">
                            </div>
                            <div class="step-btn-text">
                                <h2 class="text-uppercase">Registration</h2>
                                <span class="text-capitalize"></span>
                            </div>
                        </div>
                    </li>
                    <li class="multisteps-form__progress-btn">
                        <div class="step-btn-icon-text">
                            <div class="step-btn-icon float-left position-relative">
                                <img src="{{ asset('assets/assessment/register/img/bt2.png') }}" alt="">
                            </div>
                            <div class="step-btn-text">
                                <h2 class="text-uppercase"><a href="login.php">Quiz</a></h2>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="step-inner-content clearfix position-relative">
                <div class="wizard-inner-box row justify-content-center">
                    <div class="inner-title text-center">
                        <h2>Registration</h2>
                        <p>Please fill in your details to begin the assessment and discover your ideal learning path.
                        </p>
                    </div>
                    <form class="col-md-8 need-job-slide" action="{{ route('assessment.register') }}" method="POST">
                        @csrf

                        <table width="600" border="0" class="table table-striped table-hover" cellspacing="0"
                            cellpadding="5">
                            <tr>
                                <th width="90" scope="row" style="text-align:right"> Full name</th>
                                <td width="347">
                                    <input type="text" class="form-control input-large" name="full_name" />
                                </td>
                            </tr>
                            <tr>
                                <th width="90" scope="row" style="text-align:right">School name</th>
                                <td width="347">
                                    <input type="text" class="form-control input-large" name="school_name" />
                                </td>
                            </tr>
                            <tr>
                                <th width="90" scope="row" style="text-align:right">Designation</th>
                                <td width="347">
                                    <input type="text" class="form-control input-large" name="designation" />
                                </td>
                            </tr>

                            <tr>
                                <th width="90" scope="row" style="text-align:right">Email</th>
                                <td width="347">
                                    <input type="email" class="form-control input-large" name="email" />
                                </td>
                            </tr>

                            <tr>
                                <th width="90" scope="row" style="text-align:right">Phone</th>
                                <td width="347">
                                    <input type="number" class="form-control input-large" name="phone" />
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:center">
                                    <input type="submit" name="submit" value="Start Quiz"
                                        class="btn btn-success custom-btn" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/owl.carousel.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assessment/register/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('assets/assessment/register/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/register/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assessment/register/js/popper.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }

        .wrapper {
            background: linear-gradient(90deg, rgb(255, 255, 253) 40%, rgb(255, 255, 255) 40%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .form-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 90%;
            max-width: 1000px;
            overflow: hidden;
        }

        .left-panel {
            background-color: #00bcd4;

            color: #fff;
            padding: 40px 20px;
            width: 40%;
            text-align: center;
        }

        .left-panel h2 {
            margin-bottom: 30px;
        }

        .left-panel .nav-btn {
            display: block;
            margin: 20px auto;
            background: #03a9f4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .right-panel {
            background: linear-gradient(to right, #ffffff 0%, #e0f7fa 25%, rgb(208, 225, 228) 50%, #e0f7fa 75%, #ffffff 100%);
            padding: 40px;
            width: 60%;
            opacity: 0.7;

        }

        .right-panel h2 {
            color: #ff6600;
            margin-bottom: 10px;
        }

        .right-panel p {
            color: #666;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .btn-submit {
            background: #ff6600;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #e65c00;
        }

        .input-container {
            display: flex;
            width: 100%;
            margin-bottom: 15px;
            align-items: center;
        }

        .icon {
            padding: 10px;
            background: #808080;
            color: white;
            min-width: 50px;
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            outline: none;
            border: 1px solid #ccc;
            border-left: none;
            border-radius: 0 5px 5px 0;
        }

        .input-field:focus {
            border: 1px solid #00bcd4;
        }

        .left-panel {
            background: linear-gradient(135deg, #00bcd4, #2196f3, #1e88e5);
            width: 40%;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 20px;

        }

        .nav-item {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 0;
        }

        .icon-box {
            background-color: rgb(1, 162, 255);
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            height: 75px;
            width: 75px;


            margin-left: -20px;
            /* <-- This makes it overflow to the left */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            /* Optional: gives subtle depth */
            z-index: 2;
            /* Keeps it above any background */
            position: relative;
        }

        .icon-box img {
            height: 50px;
            width: 50px;
        }

        .label-box {
            background-color: #4fc3f7;

            height: 60px;
            display: flex;
            align-items: center;

            padding: 3px;
            flex: 1;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .label-box span {
            color: #000;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .custom-underline {
            position: relative;
            display: inline-block;
            color: #ff6600;
            /* orange color */
            font-weight: bold;
            font-size: 25px;

        }

        .custom-underline::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            /* Adjust this value to add space */
            width: 100%;
            height: 2px;
            background-color: #ff6600;
        }

        .para {
            margin-top: 10px;

        }

        .custom-underline2 {
            position: relative;
            display: inline-block;
            color: #ff6600;
            /* orange color */
            font-weight: bold;
            font-size: 13px;

        }

        .custom-underline2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            /* Adjust this value to add space */
            width: 100%;
            height: 2px;
            background-color: #ff6600;
        }

        .custom-underline3::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            /* Adjust this value to add space */
            width: 100%;
            height: 2px;
            background-color: #ff6600;
        }

        .btn-submit {
            height: 40px;
            width: 140px;
            font-size: 14px;
        }

        .logo-container {
            position: relative;
            /* Keeps it in flow, you can use absolute if needed */
            text-align: right;
            /* Aligns the image to the right */
            margin-top: 20px;
            /* Spacing above the image */
            opacity: 0.1;
            /* Makes it look like a watermark */
        }

        .logo-container img {
            max-width: 150px;
            /* Controls logo size */
            height: auto;
            /* Maintains aspect ratio */
        }

        .right-panel {
            position: relative;
            overflow: visible;
            /* Allow overflow */
        }

        /* Bigger logo, overflow outside .right-panel */
        .logo-watermark {
            position: absolute;
            bottom: -30px;
            /* Move outside container */
            right: -30px;
            /* Move outside container */
            opacity: 0.1;
            z-index: 0;
            pointer-events: none;
        }

        .logo-watermark img {
            width: 160px;
            /* Increase size */
            height: auto;
        }

        .left-panel::before {
            content: "";
            position: absolute;
            bottom: 0;
            right: -150px;
            /* ← This shifts the image to the right */
            width: 300px;
            /* adjust as needed */
            height: 300px;
            background-image: url("{{ asset('assets/assessment/register/img/1234.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
            z-index: 0;
            opacity: 0.6;
        }

        .left-panel {
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 992px) {
            .form-container {
                flex-direction: column;
                max-width: 95%;
            }

            .left-panel,
            .right-panel {
                width: 100%;
                padding: 30px 20px;
            }

            .left-panel {
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
            }

            .left-panel::before {
                display: none;
                /* Hide decorative image on smaller devices */
            }

            .nav-item {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                margin-bottom: 20px;
            }

            .icon-box {
                margin-left: 0;
            }

            .label-box {
                border-radius: 10px;
                justify-content: center;
            }

            .logo-watermark {
                display: none;
                /* Hide watermark on smaller screens */
            }

            .custom-underline {
                font-size: 20px;
            }

            .custom-underline2,
            .custom-underline3 {
                font-size: 11px;
            }

            .btn-submit {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .wrapper {
                padding: 5px !important;
            }

            .input-container {
                flex-direction: column;
                align-items: stretch;
                flex-wrap: wrap;
            }

            .icon {
                border-radius: 5px 5px 0 0;
                width: 100%;
                text-align: start;
            }

            .input-field {
                border-left: 1px solid #ccc;
                border-top: none;
                border-radius: 0 0 5px 5px;
            }

            .form-group input,
            .input-field {
                width: 100% !important;
            }

            form {
                width: 100%;
            }

        }
    </style>
</head>


<body>
    <div class="wrapper">

        <div class="form-container">
            <div class="left-panel">
                <div class="nav-item">
                    <div class="icon-box">
                        <img src="{{ asset('assets/assessment/register/img/Registration.png') }}" alt="">
                    </div>
                    <div class="label-box">
                        <span>REGISTRATION</span>
                    </div>
                </div>
                <div class="nav-item">
                    <div class="icon-box">
                        <img src="{{ asset('assets/assessment/register/img/Quiz.png') }}" alt="" />
                    </div>
                    <div class="label-box ">
                        <span>QUIZ</span>
                    </div>

                </div>
            </div>
            <div class="right-panel ">
                <div class="text-center">
                    <h2 class="custom-underline">Registration</h2>
                    <p class="para">Please fill in your details to begin the assessment and discover your ideal
                        learning path.</p>
                    <form method="POST" action="{{ route('assessment.register') }}">

                </div>
                <div class="logo-watermark">
                    <img src="{{ asset('assets/assessment/register/img/riyado-logo.png') }}" alt="Logo">
                </div>
                @csrf
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Full Name" name="full_name" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-university icon"></i>
                    <input class="input-field" type="text" placeholder="School Name" name="school_name" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-briefcase icon"></i>
                    <input class="input-field" type="text" placeholder="Designation" name="designation" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-container">
                    <i class="fa fa-phone icon"></i>
                    <input class="input-field" type="text" placeholder="Phone" name="phone" required>
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" required> I agree to all statements in <span
                            class="custom-underline2">terms of service</span>
                    </label>
                </div>
                <button type="submit" class="btn-submit mr-2">START QUIZ</button>
                </form>
            </div>

        </div>

    </div>

</body>
</div>


</html>
