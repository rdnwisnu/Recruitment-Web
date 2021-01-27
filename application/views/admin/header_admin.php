<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Recruitment</title>
    <link rel="icon" type="image/x-icon" href="assets/img/images.png" />
    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/'); ?>dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/summernote/summernote-bs4.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/AdminLTE/'); ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/'); ?>bootstrap-datepicker.css" rel="stylesheet">
    <link rel=”icon” href="<?php echo base_url('assets/img/'); ?>images.png">

    <link href="<?php echo base_url('assets/fonts/');?>open-sans.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/fonts/'); ?>metrophobic.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('admin/change_password') ?>" class="dropdown-item">
                            <i href="" class="fas fa-key mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('auth/logout?check_status=logout') ?>" class="dropdown-item">
                            <i class="fas fa-power-off mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo base_url('assets/img/'); ?>new-logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Your Company</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/img/'); ?>user.png" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['name'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin') ?>" class="nav-link">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('users/add_users') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('users/list_users') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    Data Job
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/create') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Jobs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/list_jobs') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Jobs</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Data Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('category/add_category') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('category/list_category') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Data Recruitment
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/list_recruitment') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Recruitment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/list_recruitment_approved') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Approved</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/list_recruitment_denied') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Denied</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('job/report_recruitment') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Recruitment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Data Message
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/create_message') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Message</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/list_message') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Message</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/setting_message') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setting Email</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>