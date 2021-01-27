<?php
if ($this->session->flashdata('alert-personal') == 'Error_personal') {
    $alert = 'error';
    $message = 'Failed input personal data';
} elseif ($this->session->flashdata('alert-personal') == 'Success_personal') {
    $alert = 'success';
    $message = 'Success input personal data';
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
                        <a class="nav-link active font-weight-bold"
                            href="<?php echo site_url('users/personal'); ?>">Personal
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
    <section class="page-section">
        <div class="container">
            <div class="text-center mt-5">
                <h3 class="section-heading text-uppercase">Form Recruitment</h3>
                <p class="line1"></p>
                <p class="line2 mb-5"></p>
            </div>
            <div class="row">
                <div class="col-md-12 form-wizard">

                    <!-- Form Wizard -->
                    <form role="form" action="<?php echo site_url('users/insert_personal'); ?>" method="post"
                        class="form-horizontal" enctype="multipart/form-data">
                        <!-- Form progress -->
                        <div class="form-wizard-steps form-wizard-tolal-steps-5">
                            <div class="form-wizard-progress">
                                <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="6"
                                    style="width: 12.25%;"></div>
                            </div>
                            <!-- Step 1 -->
                            <div class="form-wizard-step active">
                                <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <p>Data Pribadi</p>
                            </div>
                            <!-- Step 1 -->

                            <!-- Step 2 -->
                            <div class="form-wizard-step">
                                <div class="form-wizard-step-icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                                </div>
                                <p>Informasi Kontak</p>
                            </div>
                            <!-- Step 2 -->

                            <!-- Step 3 -->
                            <div class="form-wizard-step">
                                <div class="form-wizard-step-icon"><i class="fa fa-university" aria-hidden="true"></i>
                                </div>
                                <p>Data Pendidikan</p>
                            </div>
                            <!-- Step 3 -->

                            <!-- Step 4 -->
                            <div class="form-wizard-step">
                                <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <p>Pengalaman Kerja</p>
                            </div>
                            <!-- Step 4 -->

                            <!-- Step 5 -->
                            <div class="form-wizard-step">
                                <div class="form-wizard-step-icon"><i class="fa fa-upload" aria-hidden="true"></i></div>
                                <p>Upload Data</p>
                            </div>
                            <!-- Step 5 -->

                        </div>
                        <!-- Form progress -->


                        <!-- Form Step 1 -->
                        <fieldset>
                            <h4 class="mt-2">Personal Information: <span>Step 1 - 5</span></h4>
                            <div class="d-inline-block mt-2 w-100">
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Unggah Pas Foto</label>
                                        <div class="col-md-8">
                                            <input type="file" accept="image/*">
                                            <div class="foto-diri">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold" for="nama">Nama Lengkap</label>
                                        <div class="col-md-6">
                                            <input type="text" name="nama" id="nama" class="form-control" id="nama"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Jenis Kelamin</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Pria</option>
                                                <option value="2">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Tempat lahir</label>
                                        <div class="col-md-3">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Tanggal Lahir</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group tanggallahir">
                                                <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                                    class="form-control" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">No. KTP</label>
                                        <div class="col-md-6">
                                            <input type="text" name="no_ktp" id="no_ktp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-md-4 font-weight-bold">No. SIM</label>
                                        <div class="col-md-6">
                                            <input type="text" name="no_sim" id="no_sim" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Status</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="status" name="status">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Lajang</option>
                                                <option value="2">Menikah</option>
                                                <option value="3">Cerai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Agama</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="agama" name="agama">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Islam</option>
                                                <option value="2">Kristen</option>
                                                <option value="3">Protestan</option>
                                                <option value="3">Budha</option>
                                                <option value="3">Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Gol. Darah</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="gol_darah" name="gol_darah">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">O</option>
                                                <option value="4">A/B</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-md-4 font-weight-bold">Tinggi Badan</label>
                                        <div class="col-md-2">
                                            <input type="number" id="tinggi_badan" name="tinggi_badan"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-md-4 font-weight-bold">Berat Badan</label>
                                        <div class="col-md-2">
                                            <input type="number" id="berat_badan" name="berat_badan"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
                        <!-- Form Step 1 -->

                        <!-- Form Step 2 -->
                        <fieldset>
                            <h4 class="mt-2">Contact Information : <span>Step 2 - 5</span></h4>
                            <div class="d-inline-block mt-2 w-100">
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Alamat KTP</label>
                                        <div class="col-md-4">
                                            <input type="text" id="alamat_ktp" name="alamat_ktp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">RT/RW</label>
                                        <div class="col-md-2">
                                            <input type="text" id="RT_RW" name="RT_RW" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Kelurahan</label>
                                        <div class="col-md-2">
                                            <input type="text" id="kelurahan" name="kelurahan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Kecamatan</label>
                                        <div class="col-md-2">
                                            <input type="text" id="kecamatan" name="kecamatan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Kota/Kabupaten</label>
                                        <div class="col-md-2">
                                            <input type="text" id="kota_kabupaten" name="kota_kabupaten"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Provinsi</label>
                                        <div class="col-md-2">
                                            <input type="text" id="provinsi" name="provinsi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Kode Pos</label>
                                        <div class="col-md-2">
                                            <input type="text" id="kode_pos" name="kode_pos" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Email</label>
                                        <div class="col-md-3">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">No Telepon</label>
                                        <div class="col-md-2">
                                            <input type="text" id="no_telepon" name="no_telepon" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">No Handphone</label>
                                        <div class="col-md-2">
                                            <input type="text" id="no_handphone" name="no_handphone"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <p class="text-uppercase font-weight-bold text-danger" style="font-size: 1.3rem;">
                                        Keluarga yang bisa di hubungi</p>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Nama Ibu Kandung</label>
                                        <div class="col-md-3">
                                            <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Hubungan Keluarga</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="hubungan_keluarga"
                                                name="hubungan_keluarga">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Suami</option>
                                                <option value="2">Istri</option>
                                                <option value="3">Ayah</option>
                                                <option value="4">Ibu</option>
                                                <option value="5">Anak Kandung</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Nama</label>
                                        <div class="col-md-3">
                                            <input type="text" id="nama_keluarga" name="nama_keluarga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Jenis Kelamin</label>
                                        <div class="col-md-3">
                                            <select class="custom-select" id="jenis_kelamin_keluarga"
                                                name="jenis_kelamin_keluarga">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Alamat</label>
                                        <div class="col-md-6">
                                            <input type="text" name="alamat_keluarga" id="alamat_keluarga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">No Telp</label>
                                        <div class="col-md-3">
                                            <input type="text" name="no_telp_keluarga" id="no_telp_keluarga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
                        <!-- Form Step 2 -->

                        <!-- Form Step 3 -->
                        <fieldset>
                            <h4 class="mt-2">Education: <span>Step 3 - 5</span></h4>
                            <div class="d-inline-block mt-2 w-100">
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Institusi Pendidikan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="institusi_pendidikan" id="institusi_pendidikan"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Jenjang Pendidikan</label>
                                        <div class="col-md-2">
                                            <select class="custom-select" id="jenjang_pendidikan"
                                                name="jenjang_pendidikan">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">SMA/SMK</option>
                                                <option value="2">D-III</option>
                                                <option value="3">S1</option>
                                                <option value="4">S2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Fakultas</label>
                                        <div class="col-md-6">
                                            <input type="text" id="fakultas" name="fakultas" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Jurusan</label>
                                        <div class="col-md-6">
                                            <input type="text" id="jurusan" name="jurusan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 font-weight-bold">Akreditasi</label>
                                        <div class="col-2">
                                            <select class="custom-select" id="akreditasi" name="akreditasi">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Tahun Masuk</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group tahunmasuk">
                                                <input type="text" id="tahun_masuk" name="tahun_masuk"
                                                    class="form-control" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Tahun Lulus</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group tahunlulus">
                                                <input type="text" id="tahun_lulus" name="tahun_lulus"
                                                    class="form-control" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">NEM/IPK</label>
                                        <div class="col-md-1">
                                            <input type="text" id="NEM_IPK" name="NEM_IPK" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Kompetensi</label>
                                        <div class="col-md-5">
                                            <input type="text" id="kompetensi" name="kompetensi" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
                        <!-- Form Step 3 -->

                        <!-- Form Step 4 -->
                        <fieldset>
                            <h4 class="mt-2">Experience : <span>Step 4 - 5</span></h4>
                            <div class="d-inline-block mt-2 w-100">
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Perusahaan</label>
                                        <div class="col-md-3">
                                            <input type="text" id="perusahanaan" name="perusahaan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Industri</label>
                                        <div class="col-md-3">
                                            <input type="text" id="industri" name="industri" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Bagian</label>
                                        <div class="col-md-3">
                                            <input type="text" id="bagian" name="bagian" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Speliasisai</label>
                                        <div class="col-md-3">
                                            <input type="text" id="spesialisasi" name="spesialisasi"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Jabatan</label>
                                        <div class="col-md-3">
                                            <input type="text" id="jabatan" name="jabatan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Masuk</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group masukperusahaan">
                                                <input type="text" name="masuk_perusahaan" id="masuk_perusahaan"
                                                    class="form-control" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Berakhir</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group berakhirperusahaan">
                                                <input type="text" name="berakhir_perusahaan" id="berakhir_perusahaan"
                                                    class="form-control" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-uppercase font-weight-bold" style="font-size: 1.3rem;">Minat Kerja
                                    </p>
                                    <div class="form-group row">
                                        <label class="col-4 font-weight-bold">Bersedia Berpergian</label>
                                        <div class="col-2">
                                            <select class="custom-select" id="bersedia_berpergian"
                                                name="bersedia_berpergian">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Gaji Yang Diharapkan</label>
                                        <div class="col-md-3">
                                            <input type="number" name="gaji_diharapkan" id="gaji_diharapkan"
                                                class="form-control"><small>IDR</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Tanggal Dapat / Siap Mulai
                                            Bekerja</label>
                                        <div class="col-md-2">
                                            <div class="datepicker date input-group tanggalsiapbekerja">
                                                <input type="text" class="form-control" id="tanggal_siap_bekerja"
                                                    name="tanggal_siap_bekerja">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
                        <!-- Form Step 4 -->

                        <!-- Form Step 5 -->

                        <fieldset>
                            <h4 class="mt-2">Document Upload <span>Step 5 - 5</span></h4>
                            <div class="d-inline-block mt-2 w-100">
                                <div class="container">
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload KTP</label>
                                        <div class="col-md-8">
                                            <input type="file" id="upload_ktp" name="upload_ktp" accept="image/*">
                                            <div class="ktp-info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload CV</label>
                                        <div class="col-md-8">
                                            <input type="file" id="upload_cv" name="upload_cv" accept="pdf/*">
                                            <div class="cv-info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload Ijazah</label>
                                        <div class="col-md-8">
                                            <input type="file" name="upload_ijazah" id="upload_ijazah" accept="image/*">
                                            <div class="ijazah-info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload Transkip</label>
                                        <div class="col-md-8">
                                            <input type="file" id="upload_transkip" name="upload_transkip"
                                                accept="image/*">
                                            <div class="transkip-info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload Kartu Keluarga</label>
                                        <div class="col-md-8">
                                            <input type="file" id="upload_kartu_keluarga" name="upload_kartu_keluarga"
                                                accept="image/*">
                                            <div class="kk-info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 font-weight-bold">Upload Akte Lahir</label>
                                        <div class="col-md-8">
                                            <input type="file" id="upload_akter_lahir" name="upload_akte_lahir"
                                                accept="image/*">
                                            <div class="akte-info">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="submit" name="btnPersonal" id="btnPersonal" value="1"
                                    class="btn btn-next">Save</button>
                            </div>
                        </fieldset>

                        <!-- Form Step 5 -->
                    </form>
                    <!-- Form Wizard -->
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

    <script>
    $(document).ready(function() {
        get_personal();

        function get_personal() {
            $.ajax({
                type: 'ajax',
                url: "<?php echo site_url('users/show_personal')?>",
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if (data[i].foto_diri !== null) {
                            $('.foto-diri').append("");
                            $('.foto-diri').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].foto_diri +
                                "' value='view_image' target='_blank' class='button'>view photo</a>"
                            );
                        } else {
                            $('.foto-diri').append("");
                        }
                        if (data[i].upload_ktp !== null) {
                            $('.ktp-info').append("");
                            $('.ktp-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_ktp +
                                "' value='view_image' target='_blank' class='button'>view ktp</a>"
                            );
                        } else {
                            $('.ktp-info').append("");
                        }
                        if (data[i].upload_cv !== null) {
                            $('.cv-info').append("");
                            $('.cv-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_cv +
                                "' value='view_image' target='_blank' class='button'>view cv</a>"
                            );
                        } else {
                            $('.cv-info').append("");
                        }
                        if (data[i].upload_ijazah !== null) {
                            $('.ijazah-info').append("");
                            $('.ijazah-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_ijazah +
                                "' value='view_image' target='_blank' class='button'>view ijazah</a>"
                            );
                        } else {
                            $('.ijazah-info').append("");
                        }
                        if (data[i].upload_transkip !== null) {
                            $('.transkip-info').append("");
                            $('.transkip-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_transkip +
                                "' value='view_image' target='_blank' class='button'>view transkip</a>"

                            );
                        } else {
                            $('.transkip-info').append("");
                        }
                        if (data[i].upload_akte_lahir !== null) {
                            $('.akte-info').append("");
                            $('.akte-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_akte_lahir +
                                "' value='view_image' target='_blank' class='button'>view akte</a>"
                            );
                        } else {
                            $('.akte-info').append("");
                        }
                        if (data[i].upload_kartu_keluarga !== null) {
                            $('.kk-info').append("");
                            $('.kk-info').append(
                                "<a type='button' href='<?php echo base_url('assets/images/');?>" +
                                data[i].upload_kartu_keluarga +
                                "' value='view_image' target='_blank' class='button'>view akte</a>"
                            );
                        } else {
                            $('.kk-info').append("");
                        }
                        $("#nama").val(data[i].nama);
                        $("#jenis_kelamin").val(data[i].jenis_kelamin);
                        $("#tempat_lahir").val(data[i].tempat_lahir);
                        $('.tanggallahir').datepicker('update', data[i].tanggal_lahir);
                        $("#no_ktp").val(data[i].no_ktp);
                        $("#no_sim").val(data[i].no_sim);
                        $("#status").val(data[i].status);
                        $("#agama").val(data[i].agama);
                        $("#gol_darah").val(data[i].gol_darah);
                        $("#tinggi_badan").val(data[i].tinggi_badan);
                        $("#berat_badan").val(data[i].berat_badan);
                        $("#alamat_ktp").val(data[i].alamat_ktp);
                        $("#RT_RW").val(data[i].RT_RW);
                        $("#kelurahan").val(data[i].kelurahan);
                        $("#kecamatan").val(data[i].kecamatan);
                        $("#kota_kabupaten").val(data[i].kota_kabupaten);
                        $("#provinsi").val(data[i].provinsi);
                        $("#kode_pos").val(data[i].kode_pos);
                        $("#email").val(data[i].email);
                        $("#no_handphone").val(data[i].no_handphone);
                        $("#no_telepon").val(data[i].no_telepon);
                        $("#nama_ibu_kandung").val(data[i].nama_ibu_kandung);
                        $("#hubungan_keluarga").val(data[i].hubungan_keluarga);
                        $("#nama_keluarga").val(data[i].nama_keluarga);
                        $("#jenis_kelamin_keluarga").val(data[i].jenis_kelamin_keluarga);
                        $("#alamat_keluarga").val(data[i].alamat_keluarga);
                        $("#no_telp_keluarga").val(data[i].no_telp_keluarga);
                        $("#institusi_pendidikan").val(data[i].institusi_pendidikan);
                        $("#jenjang_pendidikan").val(data[i].jenjang_pendidikan);
                        $("#fakultas").val(data[i].fakultas);
                        $("#jurusan").val(data[i].jurusan);
                        $("#akreditasi").val(data[i].akreditasi);
                        $('.tahunmasuk').datepicker('update', data[i].tahun_masuk);
                        $('.tahunlulus').datepicker('update', data[i].tahun_lulus);
                        $("#NEM_IPK").val(data[i].NEM_IPK);
                        $("#kompetensi").val(data[i].kopetensi);
                        $("#perusahaan").val(data[i].perusahaan);
                        $("#industri").val(data[i].industri);
                        $("#bagian").val(data[i].bagian);
                        $("#spesialisasi").val(data[i].spesialisasi);
                        $("#jabatan").val(data[i].jabatan);
                        $('.masukperusahaan').datepicker('update', data[i].masuk_perusahaan);
                        $('.berakhirperusahaan').datepicker('update', data[i]
                            .berakhir_perusahaan);
                        $("#bersedia_berpergian").val(data[i].bersedia_berpergian);
                        $("#gaji_diharapkan").val(data[i].gaji_diharapkan);
                        $('.tanggalsiapbekerja').datepicker('update', data[i]
                            .tanggal_siap_bekerja);
                    }
                }

            });
        }
    });
    </script>

</html>