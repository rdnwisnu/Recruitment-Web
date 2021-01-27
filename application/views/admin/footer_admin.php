</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../assets/js2/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({
                height: "300px",
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImage(target[0].src);
                    }
                }
            });
            
            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('job/upload_image')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#summernote').summernote("insertImage", url);
                    },
                    error: function(data) {

                    }
                });
            }
 
            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('job/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 
    tampil_data_job();   //pemanggilan fungsi tampil job.
         
    $("#mydatajob").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
         //fungsi tampil data job
         function tampil_data_job(){
             $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('job/get_jobs')?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                     var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                         html += '<tr>'+
                                 '<td>'+(i+1)+'</td>'+ 
                                 '<td>'+data[i].title+'</td>'+
                                 '<td>'+data[i].date_from+'</td>'+
                                 '<td>'+data[i].date_thru+'</td>'+
                                 '<td class="project-actions text-center">'+
                          '<a class="btn btn-info btn-sm" href="<?php echo site_url('job/edit_job_data/'); ?>'+data[i].id_job+'"><i class="fas fa-pencil-alt"></i>Edit</a>&nbsp;'+
                          '<a class="btn btn-danger btn-sm" onclick="return confirm_click();" href="<?php echo site_url('job/delete_jobs/'); ?>'+data[i].id_job+'"><i class="fas fa-trash"></i>Delete</a>'+
                      '</td>'+
                     '</tr>';
                     }
                     $('#show_data_job').html(html);
                 }
  
             });
         }
         tampil_data_category();
         function tampil_data_category(){
             $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('category/get_category')?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                     var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                         html += '<tr>'+
                                 '<td>'+(i+1)+'</td>'+ 
                                 '<td>'+data[i].code_category+'</td>'+
                                 '<td>'+data[i].name_category+'</td>'+
                               '<td class="project-actions text-center">'+
                          '<a class="btn btn-info btn-sm" href="<?php echo site_url('category/edit_category/'); ?>'+data[i].id_category+'"><i class="fas fa-pencil-alt"></i>Edit</a>&nbsp;'+
                          '<a class="btn btn-danger btn-sm" onclick="return confirm_click();" href="<?php echo site_url('category/delete_category/'); ?>'+data[i].id_category+'"><i class="fas fa-trash"></i>Delete</a>'+
                      '</td>'+
                     '</tr>';
                     }
                     $('#show_data_category').html(html);
                 }
  
             });
         }
         $("#mydatacategory").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
         tampil_data_message();
         function tampil_data_message(){
             $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('admin/get_message')?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                     var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                         html += '<tr>'+
                                 '<td>'+(i+1)+'</td>'+ 
                                 '<td>'+data[i].code_message+'</td>'+
                                 '<td>'+data[i].title_message+'</td>'+
                               '<td class="project-actions text-center">'+
                          '<a class="btn btn-info btn-sm" href="<?php echo site_url('admin/edit_message/'); ?>'+data[i].id_message+'"><i class="fas fa-pencil-alt"></i>Edit</a>&nbsp;'+
                          '<a class="btn btn-danger btn-sm" onclick="return confirm_click();" href="<?php echo site_url('admin/delete_message/'); ?>'+data[i].id_message+'"><i class="fas fa-trash"></i>Delete</a>'+
                      '</td>'+
                     '</tr>';
                     }
                     $('#show_data_message').html(html);
                 }
  
             });
         }
         $("#mydatamessage").DataTable({
      "responsive": true,
      "autoWidth": true,
    });

    tampil_data_users();   //pemanggilan fungsi tampil users.
         
    $("#mydatausers").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
         //fungsi tampil data job
         function tampil_data_users(){
             $.ajax({
                 type  : 'ajax',
                 url   : "<?php echo site_url('users/get_users')?>",
                 async : false,
                 dataType : 'json',
                 success : function(data){
                     var html = '';
                     var i;
                     for(i=0; i<data.length; i++){
                        var badge= '';
                        var permit=''; 
                        if(data[i].level == 1){
                            badge = 'info';
                            permit = 'admin';
                        }else if(data[i].level == 2){
                            badge = 'warning';
                            permit = 'users';
                        }
                         html += '<tr>'+
                                 '<td>'+(i+1)+'</td>'+ 
                                 '<td>'+data[i].name+'</td>'+
                                 '<td>'+data[i].email+'</td>'+
                                 '<td class="project-state"><span class="badge badge-'+badge+'">'+permit+'</span></td>'+
                                 '<td class="project-actions text-center">'+
                         '<a class="btn btn-info btn-sm" href="<?php echo site_url('users/edit_users/'); ?>'+data[i].id_users+'"><i class="fas fa-pencil-alt"></i>Edit</a>&nbsp;'+
                          '<a class="btn btn-danger btn-sm" onclick="return confirm_click();" href="<?php echo site_url('users/delete_users/'); ?>'+data[i].id_users+'"><i class="fas fa-trash"></i>Delete</a>'+
                      '</td>'+
                     '</tr>';
                     }
                     $('#show_data_users').html(html);
                 }
             });
         }

         get_selected_category(); //get selected category

        function get_selected_category(){
         $.ajax({
             type  : 'ajax',
             url   : "<?php echo site_url('category/get_category')?>",
             async : false,
             dataType : 'json',
             success : function(data){
                 var html = '';
                 var i;
                 for(i=0; i<data.length; i++){
                     html += '<option value="'+data[i].code_category+'">'+data[i].name_category+'</option>';
                 }

                 $('#job_category').html(html);
             }

         });
     }

     get_selected_message(); //get selected message

     function get_selected_message(){
         $.ajax({
             type  : 'ajax',
             url   : "<?php echo site_url('admin/get_message')?>",
             async : false,
             dataType : 'json',
             success : function(data){
                 var html = '';
                 var i;
                 for(i=0; i<data.length; i++){
                     html += '<option value="'+data[i].id_message+'">'+data[i].code_message+'</option>';
                 }
                 $('#code_message').html(html);
             }

         });
     }
     show_recruitment();
        function show_recruitment(){
              $.ajax({
                   type  : 'ajax',
                   url   : "<?php echo site_url('job/list_recruitment_data')?>",
                   async : false,
                   success : function(data){
                       $('#show_data_recruitment').html(data);
                   }
  
              });
           }
           $('#mydatarecruitment').DataTable(); 

    show_recruitment_denied();
    
    function show_recruitment_denied(){
              $.ajax({
                   type  : 'ajax',
                   url   : "<?php echo site_url('job/list_recruitment_data_denied')?>",
                   async : false,
                   success : function(data){
                       $('#show_data_recruitment_denied').html(data);
                   }
  
              });
           }
           $('#mydatarecruitmentdenied').DataTable(); 

    show_recruitment_approved();
    function show_recruitment_approved(){
              $.ajax({
                   type  : 'ajax',
                   url   : "<?php echo site_url('job/list_recruitment_data_approved')?>",
                   async : false,
                   success : function(data){
                       $('#show_data_recruitment_approved').html(data);
                   }
  
              });
           }
           $('#mydatarecruitmentapproved').DataTable(); 
    });
  
  function confirm_click()
{
return confirm("Are you sure delete this data ?");
}
    </script>
</body>
</html>