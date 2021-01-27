<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //cek Login
    if($this->session->userdata('status_login') !== 'Admin'
    && $this->session->userdata('status_login') !== 'Users'){
        $this->session->set_flashdata('alert', 'Error_login');
        redirect(base_url());
      }
  }

  function index(){
    $query_users = $this->db->query('SELECT * FROM users');
    $count_users = count($query_users->result());
    $query_job = $this->db->query('SELECT * FROM job_article');
    $count_job = count($query_job->result());
    $query_approve = $this->db->query('SELECT * FROM recruitment WHERE status_recruitment="approved"');
    $count_approve = count($query_approve->result());
    $query_new = $this->db->query('SELECT * FROM recruitment WHERE status_recruitment="new"');
    $count_new = count($query_new->result());
    $query_denied = $this->db->query('SELECT * FROM recruitment WHERE status_recruitment="denied"');
    $count_denied = count($query_denied->result());
    $query_category = $this->db->query('SELECT * FROM category');
    $count_category = count($query_category->result());
    $query_message = $this->db->query('SELECT * FROM message');
    $count_message = count($query_message->result());
    $data['count_users'] = $count_users;
    $data['count_job'] = $count_job;
    $data['count_approve'] = $count_approve;
    $data['count_new'] = $count_new;
    $data['count_denied'] = $count_denied;
    $data['count_category'] = $count_category;
    $data['count_message'] = $count_message;
      $this->load->view('admin/header_admin');
      $this->load->view('admin/home_admin',$data);
      $this->load->view('admin/footer_admin');
  }

  function create_message(){
    $this->load->view('admin/header_admin');
    $this->load->view('admin/message_admin');
    $this->load->view('admin/footer_admin');
  }

  function list_message(){
    $this->load->view('admin/header_admin');
    $this->load->view('admin/list_message_admin');
    $this->load->view('admin/footer_admin');
  }

  function create_message_save(){
    if($this->input->post('btnPost')){
      $this->form_validation->set_rules('code_message', 'Code_message', 'required');
      $this->form_validation->set_rules('content_message', 'Content_message', 'required');
      $this->form_validation->set_rules('title_message', 'Title_message', 'required');
      if ($this->form_validation->run()){
      $query_category = $this->db->query('SELECT * FROM message WHERE code_message="'.$data['code_message'].'"');
      $count_category = count($query_category->result_array());
      if($count_category == 0){
      $insert_message = [
        'code_message' => $this->input->post('code_message'),
        'content_message' => $this->input->post('content_message'),
        'title_message' => $this->input->post('title_message')
      ];
      $result = $this->recruitment_model->insert('message',$insert_message);
    if($result){
      $this->session->set_flashdata('alert', 'Success_message');
      redirect('admin/create_message');
    }else{
      $this->session->set_flashdata('alert', 'Error_message');
      redirect('admin/create_message');
    }
  }else{
    $this->session->set_flashdata('alert', 'Error_message');
      redirect('admin/create_message');
  }
}else{
  $this->session->set_flashdata('alert', 'Error_message');
      redirect('admin/create_message');
}
    }else{
      $this->session->set_flashdata('alert', 'Error_message');
      redirect('admin/create_message');
    }

  }

  function get_message(){
    $hasil=$this->db->query("SELECT * FROM message");
    echo json_encode($hasil->result());
  }

  function form_send_email(){
    $id = $this->uri->segment(3);
    $result=$this->db->query("SELECT * FROM recruitment WHERE id_recruitment=".$id);
    $email_recruitment = $result->result_array();
    $data['id'] = $id;
    $data['email'] = $email_recruitment[0]['email'];
    $this->load->view('admin/header_admin');
    $this->load->view('admin/form_send_email_admin',$data);
    $this->load->view('admin/footer_admin');
  }

  function send_email_recruitment(){
  if($this->input->post('btnSend')){
    $id = $this->input->post('id');
    $code = $this->input->post('code_message');

    $result_message=$this->db->query("SELECT * FROM message WHERE id_message=".$code);
    $data_message = $result_message->result_array();

    $result=$this->db->query("SELECT * FROM recruitment WHERE id_recruitment=".$id);
    $email_recruitment = $result->result_array();

    $result_set=$this->db->query("SELECT * FROM email_config");
    $email_set = $result_set->result_array();

    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => $email_set[0]['email'],
  'smtp_pass' => $email_set[0]['password'],
  'mailtype'  => 'html', 
  'charset'   => 'iso-8859-1'
);

    $this->load->library('email', $config); 
    $this->email->set_newline("\r\n");

    $this->email->from($email_set[0]['email'], 'PT NOK'); 
    $this->email->to($email_recruitment[0]['email']);
    $this->email->subject($data_message[0]['title_message']); 
    $this->email->message($data_message[0]['content_message']); 
    if($this->email->send()){
      redirect('job/list_recruitment_approved');
    }else {
      redirect('job/list_recruitment_approved');
    } 
  }else{
    redirect('job/list_recruitment_approved');
  }
}

function change_password(){
  if($this->input->post('btnChangePassword')){
    $password_lama = $this->input->post('password_lama');
    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password =$this->input->post('konfirmasi_password');
    if($password_baru == $konfirmasi_password){
    $data = $this->db->query('SELECT password FROM users WHERE id_users='.$_SESSION['id_users']);
    $data_password = $data->result();
          if(password_verify($password_lama,$data_password[0]->password)){
              $password_hash = password_hash($password_baru,PASSWORD_DEFAULT);
              $result = $this->db->query("UPDATE users SET password='$password_hash' WHERE  id_users=".$_SESSION['id_users']);
                  if($result){
                    $this->session->set_flashdata('alert-change-password', 'Success_change_password');
                          redirect('admin/change_password');    
                  }else{
                    $this->session->set_flashdata('alert-change-password', 'Error_change_password');
                          redirect('admin/change_password');
                  }
          }else{
            $this->session->set_flashdata('alert-change-password', 'Error_password_old');
                    redirect('admin/change_password');  
                }
  }else{
    $this->session->set_flashdata('alert-change-password', 'Error_not_match');
    redirect('admin/change_password');
  }
  }else{
    $this->load->view('admin/header_admin');
    $this->load->view('admin/ubah_password_admin');
    $this->load->view('admin/footer_admin');
  
  }
 }

 function delete_message(){
  $id_message = $this->uri->segment(3);
  $hasil=$this->db->query("DELETE FROM message WHERE id_message=".$id_message);
  if($hasil){
    $this->session->set_flashdata('alert-message', 'Success_delete_message');
    redirect('admin/list_message');
  }else{
    $this->session->set_flashdata('alert-message', 'Error_delete_message');
    redirect('admin/list_message');
  }
}

function edit_message(){
  $id_message = $this->uri->segment(3);
  if($this->input->post('btnUpdateMessage')){
    $data = [
      'code_message' => $this->input->post('code_message'),
      'title_message' => $this->input->post('title_message'),
      'content_message' => $this->input->post('content_message')
    ];
    
    $where = [
      'id_message' => $id_message
    ];

    $result = $this->recruitment_model->update('message',$data,$where);
   if($result){
      redirect('admin/list_message');
    }else{
      $this->session->set_flashdata('alert-message', 'Error_message_admin');
      redirect('admin/list_message');
    }
  }else{
    $data['id_message']= $id_message;  
    $this->load->view('admin/header_admin');
    $this->load->view('admin/edit_message_admin',$data);
    $this->load->view('admin/footer_admin');
  }
}

function edit_message_view(){
  $id_message = $this->uri->segment(3);
  $query = $this->db->query("SELECT * FROM message WHERE id_message=".$id_message);
  $data = $query->result();
  echo json_encode($data);
}

function setting_message(){
  if($this->input->post('btnSettingEmail')){
    if ($this->input->post('re_password_config') == $this->input->post('password_config')){
      $query_set = $this->db->query('SELECT * FROM email_config');
      $count_set = count($query_set->result());
        if(empty($count_set)){
          $insert_email = [
            'email' => $this->input->post('email_config'),
            'password' => $this->input->post('password_config')
          ];
          $result = $this->recruitment_model->insert('email_config',$insert_email);
          if($result){
            $this->session->set_flashdata('alert-email-set', 'success_save');
            redirect('admin/setting_message');
          }else{
            $this->session->set_flashdata('alert-email-set', 'error_save');
            redirect('admin/setting_message');
          }
        }else{
          $data = [
            'email' => $this->input->post('email_config'),
            'password' => $this->input->post('password_config')
          ];
          
          $where = [
            'email' => $this->input->post('email_config')
          ];
      
          $result = $this->recruitment_model->update('email_config',$data,$where);
          if($result){
            $this->session->set_flashdata('alert-email-set', 'success_update');
            redirect('admin/setting_message');
          }else{
            $this->session->set_flashdata('alert-email-set', 'error_update');
            redirect('admin/setting_message');
          }
        }
    }else{
      $this->session->set_flashdata('alert-email-set', 'not_match_password');
      redirect('admin/setting_message');
    }
  }else{
    $query_set = $this->db->query('SELECT * FROM email_config');
    $result_set = $query_set->result();
    $data['email'] = $result_set[0]->email;
    $this->load->view('admin/header_admin');
    $this->load->view('admin/setting_email_admin',$data);
    $this->load->view('admin/footer_admin');
  
  }
}

}