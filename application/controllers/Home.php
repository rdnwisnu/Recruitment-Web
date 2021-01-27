<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status_login') == 'Admin'){
        redirect('/auth');
      }else if($this->session->userdata('status_login') == 'Users'){
        redirect('/users/home');
      }
  }

  function post(){
    $datenow = date("Y-m-d");
    $data_job_article = $this->db->query("SELECT * FROM job_article WHERE date_thru >= '".$datenow."' LIMIT 3");
    $data['data'] = $data_job_article->result();
    $this->load->view('r_home',$data);
  }

  function karir(){
    $datenow = date("Y-m-d");
    $data_job_article = $this->db->query("SELECT * FROM job_article WHERE date_thru >= '".$datenow."'");
    $data['data'] = $data_job_article->result();
    $this->load->view('r_karir',$data);  
  }

  function post_detail(){
      $id = $this->uri->segment(3);
      $data = $this->Recruitment_model->getByWhere('job_article',['id_job'=>$id]);
    if($data){
        $data_new = [];
        foreach($data as $key=>$value){
            $data_new[$key] = $value;
        }
    }
  }
  function apply_job(){
    $this->session->set_flashdata('alert-karir', 'error_karir');
    redirect('home/karir');
  }
}