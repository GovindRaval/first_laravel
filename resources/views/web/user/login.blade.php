<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{Helper::getAppName()?Helper::getAppName()."  ":''}}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="{{Helper::getFavIcon()?Helper::getFavIcon():''}}" rel="icon">
        <link href="{{Helper::getFavIcon()?Helper::getFavIcon():''}}" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{asset('web/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{asset('web/assets/css/style.css')}}" rel="stylesheet">
        <!-- =======================================================
        * Template Name: BizPage - v3.2.1
        * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
        <style>
            .submit-btn{
                background: #13a456;
                border: 0;
                padding: 10px 30px;
                color:
                    #fff;
                transition: 0.4s;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <main id="main">
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h3>Login</h3>
                    </div>
                    <div class="form">
                        <form action="{{route('web.user.login')}}" method="post" role="form" class="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 ">
                                    <div class="col-md-12">
                                        <?php
                                        if (session()->has('success'))
                                        {
                                            ?>
                                            {{ session()->get('success') }}
                                            <?php
                                        }
                                        if (isset($status) && !empty($status) && $status == 'success')
                                        {
                                            ?>
                                            {{$message_text}}
                                            <?php
                                        }
                                        if (session()->has('error'))
                                        {
                                            ?>
                                            <div class="validate text-danger">{{ session()->get('error') }}</div>
                                            <?php
                                        }
                                        if (isset($status) && !empty($status) && $status == 'error')
                                        {
                                            ?>
                                            <div class="validate text-danger">{{ $message_text }}</div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="text" name="email" class="form-control" id="name" placeholder="Your Name"/>
                                        <div class="validate text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="password" class="form-control" name="password" id="email" placeholder="Your Password" />
                                        <div class="validate text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><button class="submit-btn" type="submit">Login</button></div>
                        </form>
                    </div>
                </div>
            </section><!-- End Contact Section -->
        </main><!-- End #main -->
        <!-- Vendor JS Files -->
        <script src="{{asset('web/assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{asset('web/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('web/assets/vendor/aos/aos.js')}}"></script>
        <!-- Template Main JS File -->
        <script src="{{asset('web/assets/js/main.js')}}"></script>
    </body>
</html>