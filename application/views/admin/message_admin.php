<?php 
if ($this->session->flashdata('alert') == 'Error_message'){
            $alert = 'error';
            $message = 'Failed input message';
  }else if($this->session->flashdata('alert') == 'Success_message'){
            $alert = 'success';
            $message = 'Success input message';
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
                Create Message
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
              <div class="mb-3">
              <form action="<?php echo site_url("admin/create_message_save");?>" method="post">
            <div class="form-group">
        <div class="row">
        <div class="col-md-6">
        <label>Code</label>
              <input type="text" name="code_message" class="form-control" placeholder="Enter Name Code Messages">
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <label>Title Message</label>
              <input type="text" name="title_message" class="form-control" placeholder="Enter Name Title Messages">
        </div>
        </div>
              <label>Message</label>
            <textarea class="textarea" id="summernote" placeholder="Place some text here" name="content_message"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              <table>
        <br>
              <td>
                      <button type="submit" name="btnPost" class="btn btn-block btn-primary" value='1'>Save</button>
              </td>
              <td>
                      <button type="submit" name="btnReset" class="btn btn-block btn-danger" value='2'>Reset</button>
              </td>
            </table>
            </form>
            </div>
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
