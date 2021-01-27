<?php 
if ($this->session->flashdata('alert-add-users') == 'Error_add_users'){
            $alert = 'error';
            $message = 'Failed Add Users';
  }else if($this->session->flashdata('alert-add-users') == 'Success_add_users'){
            $alert = 'success';
            $message = 'Success Add Users';
  }else{
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1 class="card-title">
                            Create Users
                        </h1>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <div class="mb-3">
                            <form action="<?php echo site_url("users/add_users")?>" method="post">
                                <div class="input-group mb-3 col-md-6">
                                    <input type="text" name="name_users" class="form-control" placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <input type="email" name="email_users" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <input type="password" name="password_users" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-md-6">
                            <input type="password" name="re_password_users" class="form-control"
                                placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label>Permision Level :</label>
                            <select class="custom-select" name="level_users">
                                <option value='1'>Admin</option>
                                <option value='2'>Users</option>
                            </select>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-2">
                                <button type="submit" name="btnAdd" id="btnAdd" class="btn btn-primary btn-block"
                                    value="1">Add</button>
                            </div>
                            <div class="col-md-2">
                                <button type="rest" name="btnReset" id="btnReset" class="btn btn-danger btn-block"
                                    value="1">Reset</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        </form>

                    </div>
                </div>