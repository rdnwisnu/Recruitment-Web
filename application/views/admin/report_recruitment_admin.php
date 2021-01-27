
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h1 class="card-title">
                Report Recruitment
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
              <form action="<?php echo site_url("job/report_recruitment_action")?>" method="post">
            <div class="form-group">
        <div class="row">
        <div class="col-md-4">
            <label>Select Job</label>
                <select class="custom-select" name="job">
                <?php 
                foreach ($job as $value) { 
                  ?>  
                    <option value='<?php echo $value['id_job'] ?>'><?php echo $value['title'] ?></option>
                <?php } ?>
                </select>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <label>Select Status</label>
                <select class="custom-select" name="status">
                    <option value='New'>New</option>
                    <option value='Approved'>Approved</option>
                    <option value='Denied'>Denied</option>
                </select>  
        </div>
        </div>
        <br>
        <br>
        <div class="row">
        <div class="col-md-2">
        <button type="submit" name="btnGenerate" class="btn btn-block btn-primary" value='1'>Generate</button>
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
