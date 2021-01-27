  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="edit-admin-users">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h1 class="card-title">
                Edit Users
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
<form action="<?php echo site_url("users/edit_users/".$id_users)?>" method="post">
        <div class="input-group mb-3 col-md-6">
          <input type="text" name="name_users" id="name_users" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="email" name="email_users" id="email_users" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="password" name="password_users" id="password_users" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-6">
          <input type="password" name="re_password_users" id="re_password_users" class="form-control" placeholder="Retype new password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3 col-md-6">
                        <label>Permision Level :</label>
                        <select class="custom-select" name="level_users" name="level_users">
                          <option value='1'>Admin</option>
                          <option value='2'>Users</option>
                        </select>
                      </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-md-2">
            <button type="submit" name="btnUpdateUsers" id="btnUpdateUsers" class="btn btn-primary btn-block" value="1">Update</button>
          </div>
          <div class="col-md-2">
            <button type="rest" name="btnReset" id="btnReset" class="btn btn-danger btn-block" value="1">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
          var checkusers = document.getElementsByClassName('content-wrapper > content > edit-users-admin');
            if(checkusers != undefined){
                $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('users/edit_users_view/'.$id_users); ?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                    console.log(data);
                    var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                      $('#name_users').val(data[i].name);
                      $('#email_users').val(data[i].email);
                      $('#level_users').val(data[i].level);
                     }
                 }
                });
            }
        });
</script>