<?php
if ($this->session->flashdata('alert-register') == 'Error_register') {
    $alert = 'error';
    $message = 'Failed register account';
} elseif ($this->session->flashdata('alert-register') == 'Success_register') {
    $alert = 'success';
    $message = 'Success register account';
} elseif ($this->session->flashdata('alert') == 'Error_login') {
    $alert = 'error';
    $message = 'Username or password wrong';
} else {
    $alert = '';
    $message = '';
}
  ?>
<?php if (!empty($alert) && !empty($message)) { ?>
<script>
function sweet() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: "<?php echo $alert; ?>",
        title: "<?php echo $message; ?>"
    })
}
</script>
<script>
window.onload = sweet;
</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Web Recruitment</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/');?>favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free/css/all.min.css">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/');?>styles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/fonts/');?>open-sans.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/fonts/'); ?>metrophobic.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Your Company</a><button
                class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger font-weight-bold"
                            href="#page-top">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger font-weight-bold" href="#about">About
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger font-weight-bold" href="#services">Career
                            Opportunity</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger font-weight-bold"
                            href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger font-weight-bold btn-sign"
                            data-toggle="modal" data-target="#ModalLogin">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <h1>We are hiring</h1>
            <h3>Lets Join With Us!</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br> Aliquid voluptatem incidunt quasi
                veritatis voluptates tempore.</p>
            <a href="#ModalSignUp" data-toggle="modal" class="btn btn-primary btn-sign">Sign Up</a>
        </div>
    </header>


    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading">About Us</h3>
                <p class="line1"></p>
                <p class="line2"></p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-img">
                        <img src="assets/img/bg-4.jpg" class="rounded img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-review">
                        <h2>Company Review</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium minima, illo molestiae
                            impedit, quos inventore sequi voluptatem necessitatibus tempore quidem ut? Facere nesciunt,
                            deleniti laudantium, eaque cum saepe magni eos, quam nemo et nobis aliquam culpa quisquam.
                            Expedita quos quas corporis iusto voluptatem. Facilis culpa ab vero voluptate dolores?
                            Laudantium.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Peluang Karir -->
    <section class="page-section" id="services">
        <div class="container ">
            <div class="text-center">
                <h3 class="section-heading text-uppercase">career opportunity</h3>
                <p class="line1"></p>
                <p class="line2 mb-3"></p>
            </div>
            <div class="row mt-5">
                <?php foreach ($data as $value) { ?>
                <div class="col-md-4 col-sm-12 mb-3" id="accordion<?php echo $value->id_job ?>" role="tablist"
                    aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header text-center"><?php echo $value->title; ?>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <b>Qualification :</b><br>
                                <?php
                                echo $value->contents;
                                ?>
                                <div id="collapse<?php echo $value->id_job ?>" class="collapse" role="tabpanel"
                                    aria-labelledby="footerThree" data-parent="#accordion<?php echo $value->id_job ?>">
                                    <b>Deskripsi Pekerjaan :</b>
                                    <p><?php echo $value->description; ?>
                                    </p>
                                </div>

                                <a href="#" class="btn btn-info btn-sm mb-3" role="button">Apply</a><br>
                                <b>Close Date :</b><br>
                                <span
                                    class="badge badge-info"><?php echo  date("d-M-Y", strtotime($value->date_thru)); ?></span>
                            </div>
                        </div>
                        <div class="card-footer" id="footerThree" role="tab">
                            <a href="#collapse<?php echo $value->id_job ?>" data-toggle="collapse"
                                data-parent="#accordion<?php echo $value->id_job ?>" aria-expanded="true"
                                aria-controls="collapseThree">
                                <small class="text-muted">See more</small>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="<?php echo site_url('home/karir'); ?>" class="btn btn-send mt-5">See All</a>
                    </div>
                </div>
            </div>
    </section>


    <!-- Register - Login -->
    <section class="page-section" id="testimonial">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading text-uppercase ">Employee Review</h3>
                <p class="line1"></p>
                <p class="line2"></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-center m-auto">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="img-box"><img src="assets/img/avatar-1.jpg" alt=""></div>
                                <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu
                                    sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel,
                                    semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius
                                    nibh non aliquet.</p>
                                <p class="overview"><b>Jennifer Smith</b>, Office Worker</p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="assets/img/avatar-2.jpg" alt=""></div>
                                <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque
                                    eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra
                                    sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh,
                                    facilisis gravida odio.</p>
                                <p class="overview"><b>Dauglas McNun</b>, Financial Advisor</p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="assets/img/avatar-3.jpg" alt=""></div>
                                <p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id
                                    lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan
                                    tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa.
                                    Etiam hendrerit dolor eget rutrum.</p>
                                <p class="overview"><b>Hellen Wright</b>, Developer</p>
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact-->
    <section class="page-section bg-white" id="contact">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading text-uppercase text-dark">Contact Us</h3>
                <p class="line1"></p>
                <p class="line2 mb-3"></p>
            </div>
            <div class="row" style="margin-top: 50px;">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">Indonesia</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-globe text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Website</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">Not Available</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Telephone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">(021) 8981041</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-dark text-center text-white py-4">
        <div class="container">
            Copyright © Your Website 2020
        </div>
    </footer>

    <!-- Modal Login-->

    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalLoginLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-outline">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="ModalLoginLabel">Your Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?php echo site_url("Auth/login")?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" name="email_users" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_users" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" name="btnLogin" id="btnLogin" class="btn btn-block btn-sign-in"
                                    value="1">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->


    <!-- Modal Sign Up -->

    <div class="modal fade" id="ModalSignUp" tabindex="-1" role="dialog" aria-labelledby="ModalSignUpLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-outline">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="ModalSignUpLabel">Your Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form action="<?php echo site_url("Auth/register")?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="name_users" class="form-control" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email_users" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_users" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="re_password_users" class="form-control"
                                placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnRegister" id="btnRegister" class="btn btn-regist"
                        value="1">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sign Up -->

    <!-- Bootstrap core JS-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js "></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js ">
    </script>
    <!-- Third party plugin JS-->
    <script src="<?php echo base_url() ?>assets/js/jquery.easing.min.js ">
    </script>
    <!-- Contact form JS-->
    <script src="<?php echo base_url() ?>assets/mail/jqBootstrapValidation.js ">
    </script>
    <script src="<?php echo base_url() ?>assets/mail/contact_me.js "></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/js/scripts.js "></script>
    <script src="<?php echo base_url() ?>assets/js/sweet.js "></script>

    <script>
    $(document).ready(function() {
        // executes when HTML-Document is loaded and DOM is ready
        console.log("document is ready");


        $(".card").hover(
            function() {
                $(this).addClass('shadow-lg').css('cursor', 'pointer');
            },
            function() {
                $(this).removeClass('shadow-lg');
            }
        );

        // document ready  
    });

    /*!
     * Start Bootstrap - Agency v6.0.0 (https://startbootstrap.com/template-overviews/agency)
     * Copyright 2013-2020 Start Bootstrap
     * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-agency/blob/master/LICENSE)
     */
    (function($) {
        "use strict"; // Start of use strict

        // Smooth scrolling using jQuery easing
        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            if (
                location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                target = target.length ?
                    target :
                    $("[name=" + this.hash.slice(1) + "]");
                if (target.length) {
                    $("html, body").animate({
                            scrollTop: target.offset().top - 72,
                        },
                        1000,
                        "easeInOutExpo"
                    );
                    return false;
                }
            }
        });

        // Closes responsive menu when a scroll trigger link is clicked
        $(".js-scroll-trigger").click(function() {
            $(".navbar-collapse").collapse("hide");
        });

        // Activate scrollspy to add active class to navbar items on scroll
        $("body").scrollspy({
            target: "#Nav",
            offset: 74,
        });

        // Collapse Navbar
        var navbarCollapse = function() {
            if ($("#Nav").offset().top > 100) {
                $("#Nav").addClass("navbar-shrink");
            } else {
                $("#Nav").removeClass("navbar-shrink");
            }
        };
        // Collapse now if page is not at top
        navbarCollapse();
        // Collapse the navbar when page is scrolled
        $(window).scroll(navbarCollapse);
    })(jQuery);
    // End of use strict
    </script>
</body>

</html>