<?php
if ($this->session->flashdata('alert-input-personal') == 'Error_input_personal') {
    $alert = 'error';
    $message = 'Please Input Personal Data For To Apply Job !';
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
            timer: 3000,
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
    <link rel="icon" type="image/x-icon" href="../assets/img/images.png" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="../font/font-proxima.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="Nav">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../assets/img/images.png" /></a><button
                class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold"
                            href="<?php echo site_url('users/home'); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold"
                            href="<?php echo site_url('users/karir'); ?>">Peluang
                            Karir</a></li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold"
                            href="<?php echo site_url('users/personal'); ?>">Data
                            Personal</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Setting User</a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                                href="<?php echo site_url('users/change_password'); ?>">Ubah
                                Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold"
                            href="<?php echo site_url('logout'); ?>">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Peluang Karir -->
    <?php if (isset($kode_bukti) and $kode_bukti !== false) { ?>
    <section class="page-section mt-3">
        <div class="container">
            <h2>Success Apply Job</h2>
            <div class="card mt-5">
                <h5 class="card-header">Data Butki</h5>
                <div class="card-body">
                    <p>Silahkan Cetak Butki :</p>
                    <br>
                    <a href="<?php echo base_url('users/print_bukti_view/'.$kode_bukti); ?>"
                        class="btn btn-success">Cetak Bukti</a>
                </div>
            </div>
        </div>
    </section>
    <?php }
         ?>

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
    <script src="../custom.js"></script>
    <script src="../assets/js/sweet.js "></script>
</body>

</html>