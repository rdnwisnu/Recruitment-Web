<?php 
if ($this->session->flashdata('alert-email-set') == 'error_save'){
            $alert = 'error';
            $message = 'Error Save Email';
  }else if($this->session->flashdata('alert-email-set') == 'success_save'){
            $alert = 'success';
            $message = 'Success Save Email';
  }else if($this->session->flashdata('alert-email-set') == 'success_update'){
    $alert = 'success';
    $message = 'Success Update Email';
}else if($this->session->flashdata('alert-email-set') == 'error_update'){
  $alert = 'error';
  $message = 'Error Update Email';
}else if($this->session->flashdata('alert-email-set') == 'not_match_password'){
  $alert = 'error';
  $message = 'Failed Password Not Match';
}else{
      $alert = '';
      $message = '';
  }
  ?>
<?php if (!empty($alert) && !empty($message)) { ?>
<script>
function sweet (){
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
                Configuration Email
              </h1>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
            <h3> Current Email Active </h3>
            <div class="input-group mb-3 col-md-6">
          <input type="email" name="email_disabled" class="form-control" placeholder="Email" value="<?php echo $email ?>" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <h3> Entered data email for add or update </h3>
              <div class="mb-3">
<form action="<?php echo site_url("admin/setting_message")?>" method="post">
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="email" name="email_config" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="password" name="password_config" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="password" name="re_password_config" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-md-2">
            <button type="submit" name="btnSettingEmail" id="btnSettingEmail" class="btn btn-primary btn-block" value="1">Save</button>
          </div>
          <div class="col-md-2">
            <button type="rest" name="btnReset" id="btnReset" class="btn btn-danger btn-block" value="1">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
</div>