<?php
if ($this->session->flashdata('alert-recruitment') == 'Failed_recruitment') {
    $alert = 'error';
    $message = 'Cannot Apply This Job Again !';
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

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Recruitment</title>
        <link rel="icon" type="image/x-icon" href="assets/img/download.png" />
        <!-- Font Awesome icons (free version)-->
        <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
            type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet"
            type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/custom.css">
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
            <a class="navbar-brand" href="#"><img src="../assets/img/download.png" /></a><button
                class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('users/home'); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold"
                            href="<?php echo site_url('users/karir'); ?>">Peluang
                            Karir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('users/personal'); ?>">Data
                            Personal</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Setting User</a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo site_url('users/change_password'); ?>">Ubah
                                Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="<?php echo site_url('logout'); ?>">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Peluang Karir -->
    <section class="page-section mt-5" id="services">
        <div class="container ">
            <div class="row mt-5" id="accordionExample" role="tablist" aria-multiselectable="true">
                <?php if (isset($results) and $results !== false) { ?>
                <?php foreach ($results as $value) { ?>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header text-center"><?php echo $value->title; ?>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <?php
                                echo $value->contents;
                                ?>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="footerOne"
                                    data-parent="#accordionExample">
                                    <b>Deskripsi Pekerjaan :</b>
                                    <p><?php echo $value->description; ?>
                                    </p>
                                    <a href="<?php echo base_url('users/apply_job/'.$value->id_job.'/'.$_SESSION['id_users']); ?>"
                                        class="btn btn-info btn-sm mb-3" role="button">Apply</a>
                                </div>
                                <b>Berlaku sampai :</b><br>
                                <span
                                    class="badge badge-info"><?php echo  date("d-M-Y", strtotime($value->date_thru)); ?></span>
                            </div>
                        </div>
                        <div class="card-footer" id="footerOne" role="tab">
                            <a href="#collapseOne" data-toggle="collapse" data-parent="#accordionExample"
                                aria-expanded="true" aria-controls="collapseOne">
                                <small class="text-muted">See more</small>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }
        } else {
            ?>
                <H1>PELUANG KARIR KOSONG</H1>
                <?php
        } ?>
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