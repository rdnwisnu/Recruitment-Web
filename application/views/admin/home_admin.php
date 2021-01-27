   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1 class="m-0 text-dark"></h1>
           </div><!-- /.col -->
         </div><!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>

     <section class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-12">
             <!-- Default box -->
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title"></h3>

                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                     title="Collapse">
                     <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                     title="Remove">
                     <i class="fas fa-times"></i></button>
                 </div>
               </div>
               <div class="card-body">
                 <h1> WELCOME TO WEBSITE RECRUITMENT </h1>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">

               </div>
               <!-- /.card-footer-->
             </div>
             <!-- /.card -->
           </div>
         </div>
       </div>
     </section>
     <section class="content">
       <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-info">
               <div class="inner">
                 <h3><?php echo $count_users; ?>
                 </h3>

                 <p>Data Users</p>
               </div>
               <div class="icon">
                 <i class="ion ion-person"></i>
               </div>
               <a href="<?php echo site_url('users/list_users') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
               <div class="inner">
                 <h3><?php echo $count_job; ?>
                 </h3>

                 <p>Data Job Article</p>
               </div>
               <div class="icon">
                 <i class="ion ion-stats-bars"></i>
               </div>
               <a href="<?php echo site_url('job/list_jobs') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-success">
               <div class="inner">
                 <h3><?php echo $count_new; ?>
                 </h3>

                 <p>Data Recruitment New</p>
               </div>
               <div class="icon">
                 <i class="ion ion-person-add"></i>
               </div>
               <a href="<?php echo site_url('job/list_recruitment') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>

           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-primary">
               <div class="inner">
                 <h3><?php echo $count_approve; ?>
                 </h3>

                 <p>Data Recruitment Approve</p>
               </div>
               <div class="icon">
                 <i class="ion ion-email"></i>
               </div>
               <a href="<?php echo site_url('job/list_recruitment_approved') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>

           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-danger">
               <div class="inner">
                 <h3><?php echo $count_denied; ?>
                 </h3>

                 <p>Data Recruitment Denied</p>
               </div>
               <div class="icon">
                 <i class="ion ion-email"></i>
               </div>
               <a href="<?php echo site_url('job/list_recruitment_denied') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-secondary">
               <div class="inner">
                 <h3><?php echo $count_category; ?>
                 </h3>

                 <p>Data Category</p>
               </div>
               <div class="icon">
                 <i class="ion ion-pie-graph"></i>
               </div>
               <a href="<?php echo site_url('category/list_category') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <!-- ./col -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-dark">
               <div class="inner">
                 <h3><?php echo $count_message; ?>
                 </h3>

                 <p>Data Email</p>
               </div>
               <div class="icon">
                 <i class="ion ion-email"></i>
               </div>
               <a href="<?php echo site_url('admin/list_message') ?>"
                 class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>

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