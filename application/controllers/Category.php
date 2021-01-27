<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

  function add_category(){
    $data = $this->input->post();
    if($this->input->post('btnResetCategory')){
        redirect('/category/add_category');
    }  
    else if($this->input->post('btnAddCategory')){
      $this->form_validation->set_rules('code_category_admin', 'Code_category', 'required');
      $this->form_validation->set_rules('name_category_admin', 'Name_category', 'required');
      if ($this->form_validation->run()){
      $query_category = $this->db->query('SELECT * FROM category WHERE code_category="'.$data['code_category_admin'].'"');
      $count_category = count($query_category->result_array());
      if($count_category == 0){
        $data_insert = [
          'code_category' => $data['code_category_admin'],
          'name_category' => $data['name_category_admin']
          ];
          $status = $this->recruitment_model->insert('category',$data_insert);
          if($status){
              $this->session->set_flashdata('alert-category', 'Success_category');
              redirect('/category/add_category');
          }else{
              $this->session->set_flashdata('alert-category', 'Error_category');
              redirect('/category/add_category');
          }
      }else{
        $this->session->set_flashdata('alert-category', 'Error_category_duplicate_code');
        redirect('/category/add_category');
      }
    }else{
      $this->session->set_flashdata('alert-category', 'Error_category');
      redirect('/category/add_category');  
    }
      }else{
         $this->load->view('admin/header_admin');
         $this->load->view('admin/category_admin');
         $this->load->view('admin/footer_admin');
      }
    }

    function edit_category(){
      $id_category = $this->uri->segment(3);
      if(!empty($id_category)){
        $result=$this->db->query("SELECT * FROM category WHERE id_category=".$id_category);
        $data =  $result->result();
      }
      if($this->input->post('btnUpdateCategory')){
        $category_name = $this->input->post('name_category_admin');
        $category_code = $this->input->post('code_category_admin');
        $result=$this->db->query("UPDATE category SET name_category='".$category_name."' WHERE id_category=".$id_category);
        if($result){
          $this->session->set_flashdata('alert-category', 'Error_category_duplicate_code');
          redirect('category/list_category');
        }else{
          $this->session->set_flashdata('alert-category', 'Error_category_duplicate_code');
          redirect('category/list_category');
        }
      }else{
        $data[0]->id_category = $id_category;  
        $this->load->view('admin/header_admin');
        $this->load->view('admin/edit_category_admin',$data[0]);
        $this->load->view('admin/footer_admin');
      }
    }

  function list_category(){
    $this->load->view('admin/header_admin');
    $this->load->view('admin/list_category_admin');
    $this->load->view('admin/footer_admin');
  }

  function get_category(){
    $hasil=$this->db->query("SELECT * FROM category");
    echo json_encode($hasil->result());
  }

  function delete_category(){
    $id_category = $this->uri->segment(3);
    $hasil=$this->db->query("DELETE FROM category WHERE id_category=".$id_category);
    if($hasil){
      $this->session->set_flashdata('alert-job', 'Success_delete_category');
      redirect('category/list_category');
    }else{
      $this->session->set_flashdata('alert-job', 'Error_delete_category');
      redirect('category/list_category');
    }
  }
}