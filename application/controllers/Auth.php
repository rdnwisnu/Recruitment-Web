<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $checkUrl = $this->uri->segment(2);
    if($checkUrl !== 'logout'){
    //cek Login
    if($this->session->userdata('status_login') == 'Admin'){
        redirect(base_url().'Admin');
      }else if($this->session->userdata('status_login') == 'Users'){
        redirect(base_url().'users/post');
      }
    }
  }

    function index()
	{
        $datenow = date("Y-m-d");
        $data_job_article = $this->db->query("SELECT * FROM job_article WHERE date_thru >= '".$datenow."' ORDER BY id_job ASC LIMIT 3");
        $data['data'] = $data_job_article->result();
        $this->load->view('r_home',$data);
    }
    
    function register()
	{
		if($this->input->post('btnRegister')){
            $data = $this->input->post();
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name_users', 'Name', 'required');
            $this->form_validation->set_rules('email_users', 'Email', 'required');
            $this->form_validation->set_rules('password_users', 'Password', 'required');
            if ($this->form_validation->run()){
                 if ($this->recruitment_model->countAll('users',['email' => $data['email_users']])){
                    $this->session->set_flashdata('alert-register', 'Error_register');
                    redirect('/auth');
                 }else{
                    $data_insert = [
                    'name' => $data['name_users'],
                    'email' => $data['email_users'],
                    'password' => password_hash($data['password_users'],PASSWORD_DEFAULT),
                    'level' => 2
                    ];
                    $status = $this->recruitment_model->insert('users',$data_insert);
                    if($status){
                        $this->session->set_flashdata('alert-register', 'Success_register');
                        redirect('/auth');
                    }else{
                        $this->session->set_flashdata('alert-register', 'Error_register');
                        redirect('/auth');
                    }
                 }
                }else{
                    $this->session->set_flashdata('alert-register', 'Error_register');
                        redirect('/auth');
                }
        }else{
            $this->load->view('r_home');
        }
    }

    function login(){
        if($this->input->post('btnLogin')){
            $data = $this->input->post();
            $where =[
                'email' => $data['email_users']
            ];
            $data_users = $this->recruitment_model->getByWhere('users', $where);
            $new_users = NULL;

            foreach($data_users as $key => $value)
            {
                $new_users[$key] = $value;
            }
            if(password_verify($data['password_users'], $new_users['password'])){
                if($new_users['level'] == 1){
                    $new_users['status_login'] = 'Admin';
                    $this->session->set_userdata($new_users);    
                    redirect('/admin');
                }else if($new_users['level'] == 2){
                    $new_users['status_login'] = 'Users';
                    $this->session->set_userdata($new_users);
                    redirect('/users/home');
                }
            }else{
                $this->session->set_flashdata('alert', 'Error_login');
                redirect('/');
            }
        }else{
            redirect('/');
        }
    }

    function forgot_password(){
        $this->load->view('r_forgot_password');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url());
      }
}