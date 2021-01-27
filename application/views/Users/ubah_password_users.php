<?php
if ($this->session->flashdata('alert-change-password') == 'Success_change_password') {
    $alert = 'success';
    $message = 'Success change password';
} elseif ($this->session->flashdata('alert-change-password') == 'Error_change_password') {
    $alert = 'error';
    $message = 'Failed change password';
} elseif ($this->session->flashdata('alert-change-password') == 'Error_password_old') {
    $alert = 'error';
    $message = 'Failed password wrong';
} elseif ($this->session->flashdata('alert-change-password') == 'Error_not_match') {
    $alert = 'error';
    $message = 'Failed password not match new and confirm';
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
        timer: 2000,
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
    <nav class="navbar navbar-expand-lg fixed-top" id="Nav">
        <div class="container">
            <a class="navbar-brand" href="#">Your Company</a><button class="navbar-toggler navbar-toggler-right"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('users/home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('users/karir'); ?>">Career
                            Opportunities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('users/personal'); ?>">Personal
                            Data</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle font-weight-bold" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Setting User</a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo site_url('users/change_password'); ?>">Change
                                Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Peluang Karir -->
    <section class="page-section mt-5">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading text-uppercase">Ubah Password</h3>
                <p class="line1"></p>
                <p class="line2 mb-3"></p>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto mt-5">
                    <div class="card">
                        <p class="text-center p-3">Isi form dibawah ini hanya bila Anda hendak mengubah password Anda.
                        </p>
                        <div class="card-body login-card-body">
                            <form action="<?php echo site_url('users/change_password'); ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="password" name="password_lama" id="password_lama" class="form-control"
                                        placeholder="Password Lama">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_baru" id="password_baru" class="form-control"
                                        placeholder="Password Baru">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="konfirmasi_password" id="konfirmasi_password"
                                        class="form-control" placeholder="Konfirmasi Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="btnChangePassword" id="btnChangePassword"
                                            class="btn btn-primary btn-block" value="1">Ubah password</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
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
    <script src="../assets/js2/custom.js"></script>
    <!-- Plugin JS -->
    <script src="../assets/js2/jquery.steps.js"></script>
    <script src="../assets/js2/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/sweet.js "></script>
</body>

</html>