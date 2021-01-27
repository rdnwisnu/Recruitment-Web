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
                        <a class="nav-link active font-weight-bold"
                            href="<?php echo site_url('users/home'); ?>">Home</a>
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
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <section class="page-section mt-3">
        <div class="container">
            <h4>Halo, <span><?php echo strtoupper($_SESSION['name']); ?></span>
            </h4>
            <br>
            <h1>SELAMAT DATANG DI WEBSITE WEB RECRUITMENT</h1>
            <div class="card mt-5">
                <h5 class="card-header">Cara Melamar di Web Recruitment</h5>
                <div class="card-body">
                    <p>1. Isi Data Personal Lengkap sesuai data diri anda.<br>
                        2. Lalu, buka peluang karir untuk melihat lowongan dan apply.<br>
                        3. Cetak bukti sebagai tanda bukti pelamar.<br>
                        4. Menunggu panggilan email tanggal psikotes apabila diterima.<br>
                        5. Membawa bukti pelamar.</p>
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
    <script src="../custom.js"></script>
    <script src="../assets/js/sweet.js "></script>
</body>

</html>