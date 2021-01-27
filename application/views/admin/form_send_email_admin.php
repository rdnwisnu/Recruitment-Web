<?php 
if ($this->session->flashdata('alert-category') == 'Error_category'){
            $alert = 'error';
            $message = 'Failed Add Category';
  }else if($this->session->flashdata('alert-category') == 'Success_category'){
            $alert = 'success';
            $message = 'Success Add Category';
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
                Send Email
              </h1>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
              <form action="<?php echo site_url("admin/send_email_recruitment")?>" method="post">
            <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
        <div class="row">
        <div class="col-md-4">
        <label>Email To</label>
              <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" disabled="disabled">
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
                        <label>Choose Code Message :</label>
                        <select class="custom-select" name="code_message" id="code_message">
                      
                        </select>
                      </div>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-md-2">
        <button type="submit" name="btnSend" class="btn btn-block btn-primary" value='1'>Send Email</button>
        </div>
        <div class="col-md-2">
        <button type="submit" name="btnReset" class="btn btn-block btn-danger" value='2'>Reset</button>
        </div>
        </div>
            </table>
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</nav>
