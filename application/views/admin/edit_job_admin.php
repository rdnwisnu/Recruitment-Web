<?php 
if ($this->session->flashdata('alert-jobs') == 'Error_jobs'){
            $alert = 'error';
            $message = 'Failed post job';
  }else if($this->session->flashdata('alert-jobs') == 'Success_jobs'){
            $alert = 'success';
            $message = 'Success post job';
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
    <div class="edit-job-admin">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h1 class="card-title">
                Create Jobs
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
              <form action="<?php echo site_url("job/edit_job_data/".$id_job);?>" method="post">
            <div class="form-group">
        <div class="row">
        <div class="col-md-6">
        <label>Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter Name Job's">
        </div>
        <div class="form-group mb-3 col-md-6">
                        <label>Category :</label>
                        <div class="view_category">
                        <select class="custom-select" name="job_category" id="job_category">
                      
                        </select>
                        </div>
                      </div>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="col-md-4 font-weight-bold">Date From</label>
                                        <div class="col-md-6">
                                            <div class="datepicker date input-group date_from">
                                                <input type="text" name="date_from" id="date_from" class="form-control"">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
        </div>
        <div class="col-md-6">
                                        <label class="col-md-4 font-weight-bold">Date Thru</label>
                                        <div class="col-md-6">
                                            <div class="datepicker date input-group date_thru">
                                                <input type="text" name="date_thru" id="date_thru" class="form-control"">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
                                            </div>
                                        </div>
        </div>
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
        <div class="form-group">
                        <label>Descrition</label>
                        <div class="view_description">
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Description"></textarea>
                      </div>
                      </div>
</div>
      </div>
        <br>
              <label>Article</label>
              <div class="view_summernote">
                <textarea class="textarea" id="summernote" placeholder="Place some text here" name="contents"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <table>
              <td>
                      <button type="submit" name="btnUpdateJob" class="btn btn-block btn-primary" value='1'>Update</button>
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
      </div>
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
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
          var checkjob = document.getElementsByClassName('content-wrapper > content > edit-job-admin');
            if(checkjob != undefined){
              $('.input-group.date_from').datepicker({
                format: "dd-mm-yyyy"
                });
              $('.input-group.date_thru').datepicker({
                format: "dd-mm-yyyy"
                });
                $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('job/edit_job_view/'.$id_job); ?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                    var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                      $('#title').val(data[i].title);
                      $('.date_from').datepicker('update', data[i].date_from);
                      $('.date_thru').datepicker('update', data[i].date_thru);
                      $("#description").val(data[i].description);
                      $('#summernote').summernote('code', data[i].contents);
                     }
                 }
                });
            }
        });
</script>