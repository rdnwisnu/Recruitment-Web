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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="Nav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Back to home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Peluang Karir -->

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
            </div>
    </section>


    <footer class="footer fixed-bottom bg-dark text-center text-white py-4">
        <div class="container">
            Copyright © Your Website 2020
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="../assets/js/jquery.min.js "></script>
    <script src="../assets/js/bootstrap.bundle.min.js "></script>
    <!-- Third party plugin JS-->
    <script src="../assets/js/jquery.easing.min.js "></script>
    <!-- Contact form JS-->
    <script src="../assets/mail/jqBootstrapValidation.js "></script>
    <script src="../assets/mail/contact_me.js "></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js "></script>
    <script src="../custom.js"></script>
    <script src="../assets/js/sweet.js "></script>
    <script type="text/javascript">
    $("#message").on('click', function() {
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
            icon: "error",
            title: "Please Login Before Apply"
        })
    }
    window.onload = sweet;

    });
    </script>
</body>

</html>