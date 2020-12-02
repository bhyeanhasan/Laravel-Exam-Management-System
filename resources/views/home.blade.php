<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!--====== Laravel CSRF Token ======-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!--====== Title ======-->
    <title>Laravel Quize Management</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.png ') }} type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href={{ asset('assets/css/magnific-popup.css') }}>
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href={{ asset('assets/css/all.min.css') }}>


    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href={{ asset('assets/css/slick.css') }}>
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href={{ asset('') }}>
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.min.css') }}>
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
</head>

<body>
    <!--====== PRELOADER PART START ======-->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->
        <section class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                        
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/logo.svg" alt="Logo">
                            </a>
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo" >
                                <ul class="navbar-nav m-auto">
                                </ul>
                            </div>
                                <ul>
                                    <li><a class="btn btn-dark" href="#"data-toggle="modal" data-target="#exampleModalCenter">SignIn <span class="text-danger">or</span> SignUp</a></li>
                                </ul>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    <!--====== NAVBAR TWO PART ENDS ======-->

    <!----====== SLIDER PART START ======---->
        <section id="home" class="slider_area">
            <div id="carouselThree" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselThree" data-slide-to="1"></li>
                    <li data-target="#carouselThree" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-content">
                                        <p class="title" style="z-index: 2;">Laravel & Php</p>
                                        <h3 class="text text-dark">Lets Start a Laravel Quize Project</h3>
                                    </div> <!-- slider-content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                        <div class="slider-image-box d-none d-lg-flex align-items-end" >
                            <div class="slider-image">
                                <img src="assets/images/logo.jpg" alt="Hero"style="z-index: 1;">
                            </div> <!-- slider-imgae -->
                        </div> <!-- slider-imgae box -->
                    </div> <!-- carousel-item -->

                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-content">
                                        <h1 class=""style="font-size:80px; color:rgb(92, 0, 0);" >Online Quize System</h1>
                                        <p class="text">Happy 😍 Project</p>
                                    </div> <!-- slider-content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                        <div class="slider-image-box d-none d-lg-flex align-items-end">
                            <div class="slider-image">
                                <img src="assets/images/slider/3.png" alt="Hero">
                            </div> <!-- slider-imgae -->
                        </div> <!-- slider-imgae box -->
                    </div> <!-- carousel-item -->
                </div>

                <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
                    <i class="fas fa-arrow-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
                    <i class="fas fa-arrow-right text-dark"></i>
                </a>
            </div>
        </section>
    <!----====== SLIDER PART ENDS ======----->

    
    
<!--====== SignIn Or SignUp Modal Start======-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">
            <!--======Card Modal Body Start======-->
                <div class="modal-body">
                    <!--======Card SignIn Form Start======-->
                        <div class="card card_signin">
                            <!--======Card Header Start======-->
                            <div class="card-header text-center bg-info">
                                <span class="h3"> SignIn </span>
                            </div>
                            <!--======Card Header End======-->


                            <!--======Card Body Start======-->
                            <div class="card-body">
                                <!--======Response Message Start======-->
                                <strong><div class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="sin_error"></div></strong>
                                <strong><div class='alert bg-success alert-dismissible fade show text-center' id="sin_success" role='alert'></div></strong>
                                <!--======Response Message End======-->
                                
                                <!--======SignIn Form Start======-->
                                <form id="signin_form">
                                    <div class="form-group mt-2">
                                    <label for="sin_who"><strong>Who Are You ?</strong></label>
                                    <select id="sin_who" class="form-control">
                                    <option value="0">-- Select --</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="controller">Controller</option>
                                    </select>
                                    </div>
                                    <div class="form-group mt-2">
                                    <label for="sin_id"><strong>Id</strong></label>
                                    <input type="text" class="form-control" id="sin_id"  placeholder="Enter Your Id" />
                                    </div>

                                    <div class="form-group mt-2">
                                    <label for="sin_email"><strong>Email</strong></label>
                                    <input type="email" class="form-control" id="sin_email"  placeholder="Enter Your Email" />
                                    </div>
                                    <div class="form-group mt-2">
                                    <label for="sin_pass"><strong>Password</strong></label>
                                    <input type="password" class="form-control" id="sin_pass" placeholder="Enter Your Password" />
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-info form-control" id="signin_btn">SignIn</button>
                                </form>
                                <!--======SignIn Form End======--->
                                
                                <!--======SignIn Form Bellow Link Section Start======-->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mt-3"> Have You an account ? <a style="cursor: pointer;" id="signup_link"><strong class="text-danger">SignUp</strong></a></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mt-3"> Forgot Your Password ? <a style="cursor: pointer;" id="reset_link"><strong class="text-danger">Reset</strong></a></p>
                                    </div>
                                </div>
                                 <!--======SignIn Form Bellow Link Section End======-->
                            </div>
                            <!--======Card Body End======-->
                        </div>
                    <!--======Card SignIn Form End======---->




                    <!--======Card SignUp Form Start======-->
                        <div class="card card_signup">
                            <!--======Card Header Start======-->
                            <div class="card-header text-center bg-info">
                                <span class="h3"> SignUp </span>
                            </div>
                            <!--======Card Header End======-->


                            <!--======Card Body Start======-->
                            <div class="card-body">
                            <!--======Response Message Start======-->
                            <img src="{{ asset('assets/images/loading1.gif ') }}" alt="" height="30px" width="100%" id="before" style="display: none;">
                            <strong><div class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="sup_error"></div></strong>
                            <strong><div class='alert bg-success alert-dismissible fade show text-center' id="sup_success" role='alert'></div></strong>
                            <!--======Response Message End======-->
                            
                            <!--======SignUp Form Start======-->
                            <form id="signup_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mt-2">
                                        <label for="sup_who"><strong>Who Are You ?</strong></label>
                                        <select id="sup_who" class="form-control">
                                        <option value="0">-- Select --</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                        <option value="controller">Controller</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mt-2">
                                        <label for="sup_fac"><strong>Faculty</strong></label>
                                        <select id="sup_fac" class="form-control">
                                        <option value="0">-- Select --</option>
                                        <option value="cse">CSE</option>
                                        <option value="eee">EEE</option>
                                        <option value="cce">CCE</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mt-2">
                                        <label for="sup_id"><strong>Id</strong></label>
                                        <input type="text" class="form-control" id="sup_id"  placeholder="Enter Your Id" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row second_row">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_session"><strong>Session</strong></label>
                                        <select id="sup_session" class="form-control">
                                        <option value="0">-- Select --</option>
                                        <option value="2015-2016">2015-2016</option>
                                        <option value="2016-2017">2016-2017</option>
                                        <option value="2017-2018">2017-2018</option>
                                        <option value="2018-2019">2018-2019</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_semister"><strong>Semister</strong></label>
                                        <select id="sup_semister" class="form-control">
                                            <option value="0">-- Select --</option>
                                            <option value="first">first</option>
                                            <option value="second">second</option>
                                            <option value="third">third</option>
                                            <option value="fourth">fourth</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_name"><strong>Name</strong></label>
                                        <input type="text" class="form-control" id="sup_name"  placeholder="Enter Your Name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_email"><strong>Email</strong></label>
                                        <input type="email" class="form-control" id="sup_email"  placeholder="Enter Your Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_birth"><strong>Birth Date</strong></label>
                                        <input type="date" class="form-control" id="sup_birth" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_phone"><strong>Phone</strong></label>
                                        <input type="text" class="form-control" id="sup_phone"  placeholder="Enter Your Phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_pass"><strong>Password</strong></label>
                                        <input type="password" class="form-control" id="sup_pass" placeholder="Enter Your Password" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                        <label for="sup_cpass"><strong>Confirm Password</strong></label>
                                        <input type="password" class="form-control" id="sup_cpass" placeholder="Enter Your Confirm Password" />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mt-3 btn btn-info form-control" id="signup_btn">SignUp</button>
                            </form>
                            <!--======SignUp Form End======--->
                            
                            <!--======SignUp Form Bellow Link Section Start======-->
                            <p class="mt-3"> If You already an account ? <a style="cursor: pointer;" class="signin_link"><strong class="text-danger">SignIn</strong></a></p>
                            <!--======SignUp Form Bellow Link Section End======-->
                            </div>
                            <!--======Card Body End======-->
                        </div>
                    <!--======Card SignUp Form End======---->





                    <!--======Card Reset Form Start======-->
                        <div class="card card_reset">
                            <!--======Card Header Start======-->
                            <div class="card-header text-center bg-info">
                                <span class="h3">Send Reset Link </span>
                            </div>
                            <!--======Card Header End======-->

                            <!--======Card Body Start======-->
                            <div class="card-body">
                                <!--======Response Message Start======-->
                                <strong><div class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="reset_error"></div></strong>
                                <strong><div class='alert bg-success alert-dismissible fade show text-center' id="reset_success" role='alert'></div></strong>
                                <!--======Response Message End======-->

                                <!--======SignUp Form Start======-->
                                <form id="reset_form">
                                    <div class="form-group mt-2">
                                    <label for="reset_who"><strong>Who Are You ?</strong></label>
                                    <select id="reset_who" class="form-control">
                                    <option value="0">-- Select --</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="controller">Controller</option>
                                    </select>
                                    </div>

                                    <div class="form-group mt-2">
                                    <label for="reset_email"><strong>Email</strong></label>
                                    <input type="email" class="form-control" id="reset_email"  placeholder="Enter Your Email" />
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-info form-control" id="send_reset_link_btn">SignIn</button>
                                </form>
                                <!--======SignUp Form End======-->
                            
                                <!--======Reset Form Bellow Link Section Start======-->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mt-3"><a style="cursor: pointer;" class="signin_link"><strong class="text-danger">Back</strong></a></p>
                                    </div>
                                </div>
                                <!--======Reset Form Bellow Link Section End======-->
                            </div>
                            <!--======Card Body End======-->
                        </div>
                    <!--======Card Reset Form End======---->
                </div>
            <!--======Card Modal Body End======-->
        </div>
        <button type="button" class="btn btn-close" data-dismiss="modal" style="display: none;">Close</button>
        </div>
    </div>
<!--====== SignIn Or SignUp Modal End======---->


<!--====== Footer Section Start======-->
    <footer style="height: 70px;background-color: #083e73;display:flex;align-items:center;justify-content:center;
    ">
     <h6> <strong class="text-light">&copy;</strong> All Right Reserved By<strong class="text-light">&nbsp; shishirbhuiyan83@gmail.com</strong></h6>
    </footer>
<!--====== Footer Section End======-->


<!--====== Script Section Start ======-->
    <!--====== Jquery js ======-->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
        
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('assets/js/ajax-contact.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/my/app.js') }}"></script>
<!--====== Script Section End ======---->


</body>
</html>
