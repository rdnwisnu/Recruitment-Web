<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
      $this->load->library('upload');
  }

  function add_users(){
    $data = $this->input->post();
    if($this->input->post('btnReset')){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/users_admin');
        $this->load->view('admin/footer_admin');
    }else if($this->input->post('btnAdd')){
      $this->form_validation->set_rules('name_users', 'Name_users', 'required');
      $this->form_validation->set_rules('email_users', 'Email_users', 'required');
      $this->form_validation->set_rules('password_users', 'Password_users', 'required');
      $this->form_validation->set_rules('level_users', 'Level_users', 'required');
      if ($this->form_validation->run()){
        if ($this->recruitment_model->countAll('users',['email' => $data['email_users']])){
            $this->session->set_flashdata('alert-add-users', 'Error_add_users');
            redirect('/users/add_users');
        }else{
        $data_insert = [
            'name' => $data['name_users'],
            'email' => $data['email_users'],
            'password' => password_hash($data['password_users'],PASSWORD_DEFAULT),
            'level' => (int)$data['level_users']
            ];
            $status = $this->recruitment_model->insert('users',$data_insert);
            if($status){
                $this->session->set_flashdata('alert-add-users', 'Success_add_users');
                redirect('/users/add_users');
            }else{
                $this->session->set_flashdata('alert-add-users', 'Error_add_users');
                redirect('/users/add_users');
            }
          }
          }else{
            $this->session->set_flashdata('alert-add-users', 'Error_add_users');
            redirect('/users/add_users'); 
          }
      }else{
          $this->load->view('admin/header_admin');
          $this->load->view('admin/users_admin');
          $this->load->view('admin/footer_admin');
      }
  }

  function list_users(){
    $this->load->view('admin/header_admin');
    $this->load->view('admin/list_users_admin');
    $this->load->view('admin/footer_admin');
  }
  
  function get_users(){
    $hasil=$this->db->query("SELECT * FROM users");
    echo json_encode($hasil->result());
  }

  function delete_users(){
    $id_users = $this->uri->segment(3);
    $hasil=$this->db->query("DELETE FROM users WHERE id_users=".$id_users);
    if($hasil){
      $this->session->set_flashdata('alert-input-personal', 'Success_delete_users');
      redirect('users/list_users');
    }else{
      $this->session->set_flashdata('alert-input-personal', 'Error_delete_users');
      redirect('users/list_users');
    }
  }

  function karir(){
    $query_personal = $this->db->query('SELECT * FROM personal WHERE id_users='.$_SESSION['id_users']);
    $count = count($query_personal->result());
    if($count == 0){
      $this->session->set_flashdata('alert-input-personal', 'Error_input_personal');
      redirect('/users/home');
    }else{
    // load package libarary   
     $this->load->library('Pagination_bootstrap');
 
     $links = array('next' => 'Next','prev' => 'Previous');
 
     $datenow = date('Y-m-d');
     $sql =  $this->db->query("SELECT * FROM job_article WHERE date_thru >= '".$datenow."'");
     if(empty($sql->result())){
      $data['results'] = FALSE;
    }else{
      $data['results'] = $this->pagination_bootstrap->config("/Users/post", $sql); 
    }
     $this->load->view('users/karir_users', $data);
  }
   }

   function home(){
     $this->load->view('users/home_users');
   }

   function personal(){
     $query_personal = $this->db->query('SELECT * FROM personal WHERE id_users='.$_SESSION['id_users']);
     $count = count($query_personal->result());
     if($count > 0){
      $this->load->view('users/personal_users');
     }else{
      $this->load->view('users/personal_users');
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
                            redirect('users/change_password');    
                    }else{
                      $this->session->set_flashdata('alert-change-password', 'Error_change_password');
                            redirect('users/change_password');
                    }
            }else{
              $this->session->set_flashdata('alert-change-password', 'Error_password_old');
                      redirect('users/change_password');  
                  }
    }else{
      $this->session->set_flashdata('alert-change-password', 'Error_not_match');
      redirect('users/change_password');
    }
    }else{
      $this->load->view('users/ubah_password_users');
    }
   }

   function insert_personal(){
  if($this->input->post('btnPersonal')){
    $query_personal = $this->db->query('SELECT * FROM personal WHERE id_users='.$_SESSION['id_users']);
     $count = count($query_personal->result());
     if($count > 0){
      $insert = array();
      $config['upload_path'] = './assets/images/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
      if(!empty($_FILES['upload_ktp']['size']) AND !empty($_FILES['upload_cv']['size']) AND !empty($_FILES['upload_ijazah']['size']) AND !empty($_FILES['upload_transkip']['size'])
      AND !empty($_FILES['upload_kartu_keluarga']['size']) AND !empty($_FILES['upload_akte_lahir']['size']) AND !empty($_POST['nama']) AND !empty($_POST['no_ktp'])){
      $this->upload->initialize($config);
      if($this->upload->do_upload('foto_diri')){
          $ktp = $this->upload->data();
          $insert['foto_diri'] = $ktp['file_name'];
      }
          $this->upload->initialize($config);
          if($this->upload->do_upload('upload_ktp')){
              $ktp = $this->upload->data();
              $insert['upload_ktp'] = $ktp['file_name'];
          }

          if($this->upload->do_upload('upload_cv')){
              $cv = $this->upload->data();
              $insert['upload_cv'] = $cv['file_name'];
          }

          if($this->upload->do_upload('upload_ijazah')){
              $ijazah = $this->upload->data();
              $insert['upload_ijazah'] = $ijazah['file_name'];
          }

          if($this->upload->do_upload('upload_transkip')){
              $transkip = $this->upload->data();
              $insert['upload_transkip'] = $transkip['file_name'];
          }

          if($this->upload->do_upload('upload_kartu_keluarga')){
              $kartu_keluarga = $this->upload->data();
              $insert['upload_kartu_keluarga'] = $kartu_keluarga['file_name'];
          }

          if($this->upload->do_upload('upload_akte_lahir')){
              $akte_lahir = $this->upload->data();
              $insert['upload_akte_lahir'] = $akte_lahir['file_name'];
          }

      $insert['nama'] = isset($_POST['nama']) ? $_POST['nama'] : NULL; 
      $insert['jenis_kelamin'] = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : NULL; 
      $insert['tempat_lahir'] = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : NULL; 
      $insert['tanggal_lahir'] = isset($_POST['tanggal_lahir']) ? date("Y-m-d", strtotime($_POST['tanggal_lahir'])) : NULL; 
      $insert['no_ktp'] = isset($_POST['no_ktp']) ? $_POST['no_ktp'] : NULL; 
      $insert['no_sim'] = isset($_POST['no_sim']) ? $_POST['no_sim'] : NULL; 
      $insert['status'] = isset($_POST['status']) ? $_POST['status'] : NULL; 
      $insert['agama'] = isset($_POST['agama']) ? $_POST['agama'] : NULL; 
      $insert['gol_darah'] = isset($_POST['gol_darah']) ? $_POST['gol_darah'] : NULL; 
      $insert['tinggi_badan'] = isset($_POST['tinggi_badan']) ? $_POST['tinggi_badan'] : NULL; 
      $insert['berat_badan'] = isset($_POST['berat_badan']) ? $_POST['berat_badan'] : NULL; 
      $insert['alamat_ktp'] = isset($_POST['alamat_ktp']) ? $_POST['alamat_ktp'] : NULL; 
      $insert['RT_RW'] = isset($_POST['RT_RW']) ? $_POST['RT_RW'] : NULL; 
      $insert['kelurahan'] = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : NULL; 
      $insert['kecamatan'] = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : NULL; 
      $insert['kota_kabupaten'] = isset($_POST['kota_kabupaten']) ? $_POST['kota/kabupaten'] : NULL; 
      $insert['provinsi'] = isset($_POST['provinsi']) ? $_POST['provinsi'] : NULL; 
      $insert['kode_pos'] = isset($_POST['kode_pos']) ? $_POST['kode_pos'] : NULL; 
      $insert['email'] = isset($_POST['email']) ? $_POST['email'] : NULL; 
      $insert['no_telepon'] = isset($_POST['no_telepon']) ? $_POST['no_telepon'] : NULL; 
      $insert['no_handphone'] = isset($_POST['no_handphone']) ? $_POST['no_handphone'] : NULL; 
      $insert['nama_ibu_kandung'] = isset($_POST['nama_ibu_kandung']) ? $_POST['nama_ibu_kandung'] : NULL; 
      $insert['hubungan_keluarga'] = isset($_POST['hubungan_keluarga']) ? $_POST['hubungan_keluarga'] : NULL; 
      $insert['nama_keluarga'] = isset($_POST['nama_keluarga']) ? $_POST['nama_keluarga'] : NULL; 
      $insert['jenis_kelamin_keluarga'] = isset($_POST['jenis_kelamin_keluarga']) ? $_POST['jenis_kelamin_keluarga'] : NULL; 
      $insert['alamat_keluarga'] = isset($_POST['alamat_keluarga']) ? $_POST['alamat_keluarga'] : NULL; 
      $insert['no_telp_keluarga'] = isset($_POST['no_telp_keluarga']) ? $_POST['no_telp_keluarga'] : NULL; 
      $insert['institusi_pendidikan'] = isset($_POST['institusi_pendidikan']) ? $_POST['institusi_pendidikan'] : NULL; 
      $insert['jenjang_pendidikan'] = isset($_POST['jenjang_pendidikan']) ? $_POST['jenjang_pendidikan'] : NULL; 
      $insert['fakultas'] = isset($_POST['fakultas']) ? $_POST['fakultas'] : NULL; 
      $insert['jurusan'] = isset($_POST['jurusan']) ? $_POST['jurusan'] : NULL; 
      $insert['akreditasi'] = isset($_POST['akreditasi']) ? $_POST['akreditasi'] : NULL; 
      $insert['tahun_masuk'] = isset($_POST['tahun_masuk']) ? date("Y-m-d", strtotime($_POST['tahun_masuk'])) : NULL; 
      $insert['tahun_lulus'] = isset($_POST['tahun_lulus']) ? date("Y-m-d", strtotime($_POST['tahun_lulus'])) : NULL;
      $insert['NEM_IPK'] = isset($_POST['NEM_IPK']) ? $_POST['NEM_IPK'] : NULL; 
      $insert['kompetensi'] = isset($_POST['kompetensi']) ? $_POST['kompetensi'] : NULL; 
      $insert['perusahaan'] = isset($_POST['perusahaan']) ? $_POST['perusahaan'] : NULL; 
      $insert['industri'] = isset($_POST['industri']) ? $_POST['industri'] : NULL; 
      $insert['bagian'] = isset($_POST['bagian']) ? $_POST['bagian'] : NULL; 
      $insert['spesialisasi'] = isset($_POST['spesialisasi']) ? $_POST['spesialisasi'] : NULL; 
      $insert['jabatan'] = isset($_POST['jabatan']) ? $_POST['jabatan'] : NULL; 
      $insert['masuk_perusahaan'] = isset($_POST['masuk_perusahaan']) ? date("Y-m-d", strtotime($_POST['masuk_perusahaan'])) : NULL; 
      $insert['berakhir_perusahaan'] = isset($_POST['berakhir_perusahaan']) ? date("Y-m-d", strtotime($_POST['berakhir_perusahaan'])) : NULL; 
      $insert['bersedia_berpergian'] = isset($_POST['bersedia_berpergian']) ? $_POST['bersedia_berpergian'] : NULL;
      $insert['gaji_diharapkan'] = isset($_POST['gaji_diharapkan']) ? $_POST['gaji_diharapkan'] : NULL;
      $insert['tanggal_siap_bekerja'] = isset($_POST['tanggal_siap_bekerja']) ? date("Y-m-d", strtotime($_POST['tanggal_siap_bekerja'])) : NULL;
      $insert['id_users'] = $_SESSION['id_users'];
      $result = $this->recruitment_model->update('personal',$insert,array('id_users' => $_SESSION['id_users']));
      if($result){
        $this->session->set_flashdata('alert-personal', 'Success_personal');
        redirect('users/personal');
      }else{
        $this->session->set_flashdata('alert-personal', 'Error_personal');
        redirect('users/personal');
      }
    }else{
      $this->session->set_flashdata('alert-personal', 'Error_personal');
      redirect('users/personal');
    }
     }else{
    if(!empty($_FILES['upload_ktp']['size']) AND !empty($_FILES['upload_cv']['size']) AND !empty($_FILES['upload_ijazah']['size']) AND !empty($_FILES['upload_transkip']['size'])
      AND !empty($_FILES['upload_kartu_keluarga']['size']) AND !empty($_FILES['upload_akte_lahir']['size']) AND !empty($_POST['nama']) AND !empty($_POST['no_ktp'])){
        $insert = array();
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if($this->upload->do_upload('foto_diri')){
            $ktp = $this->upload->data();
            $insert['foto_diri'] = $ktp['file_name'];
        }
            $this->upload->initialize($config);
            if($this->upload->do_upload('upload_ktp')){
                $ktp = $this->upload->data();
                $insert['upload_ktp'] = $ktp['file_name'];
            }

            if($this->upload->do_upload('upload_cv')){
                $cv = $this->upload->data();
                $insert['upload_cv'] = $cv['file_name'];
            }

            if($this->upload->do_upload('upload_ijazah')){
                $ijazah = $this->upload->data();
                $insert['upload_ijazah'] = $ijazah['file_name'];
            }

            if($this->upload->do_upload('upload_transkip')){
                $transkip = $this->upload->data();
                $insert['upload_transkip'] = $transkip['file_name'];
            }

            if($this->upload->do_upload('upload_kartu_keluarga')){
                $kartu_keluarga = $this->upload->data();
                $insert['upload_kartu_keluarga'] = $kartu_keluarga['file_name'];
            }

            if($this->upload->do_upload('upload_akte_lahir')){
                $akte_lahir = $this->upload->data();
                $insert['upload_akte_lahir'] = $akte_lahir['file_name'];
            }

        $insert['nama'] = isset($_POST['nama']) ? $_POST['nama'] : NULL; 
        $insert['jenis_kelamin'] = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : NULL; 
        $insert['tempat_lahir'] = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : NULL; 
        $insert['tanggal_lahir'] = isset($_POST['tanggal_lahir']) ? date("Y-m-d", strtotime($_POST['tanggal_lahir'])) : NULL; 
        $insert['no_ktp'] = isset($_POST['no_ktp']) ? $_POST['no_ktp'] : NULL; 
        $insert['no_sim'] = isset($_POST['no_sim']) ? $_POST['no_sim'] : NULL; 
        $insert['status'] = isset($_POST['status']) ? $_POST['status'] : NULL; 
        $insert['agama'] = isset($_POST['agama']) ? $_POST['agama'] : NULL; 
        $insert['gol_darah'] = isset($_POST['gol_darah']) ? $_POST['gol_darah'] : NULL; 
        $insert['tinggi_badan'] = isset($_POST['tinggi_badan']) ? $_POST['tinggi_badan'] : NULL; 
        $insert['berat_badan'] = isset($_POST['berat_badan']) ? $_POST['berat_badan'] : NULL; 
        $insert['alamat_ktp'] = isset($_POST['alamat_ktp']) ? $_POST['alamat_ktp'] : NULL; 
        $insert['RT_RW'] = isset($_POST['RT_RW']) ? $_POST['RT_RW'] : NULL; 
        $insert['kelurahan'] = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : NULL; 
        $insert['kecamatan'] = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : NULL; 
        $insert['kota_kabupaten'] = isset($_POST['kota_kabupaten']) ? $_POST['kota/kabupaten'] : NULL; 
        $insert['provinsi'] = isset($_POST['provinsi']) ? $_POST['provinsi'] : NULL; 
        $insert['kode_pos'] = isset($_POST['kode_pos']) ? $_POST['kode_pos'] : NULL; 
        $insert['email'] = isset($_POST['email']) ? $_POST['email'] : NULL; 
        $insert['no_telepon'] = isset($_POST['no_telepon']) ? $_POST['no_telepon'] : NULL; 
        $insert['no_handphone'] = isset($_POST['no_handphone']) ? $_POST['no_handphone'] : NULL; 
        $insert['nama_ibu_kandung'] = isset($_POST['nama_ibu_kandung']) ? $_POST['nama_ibu_kandung'] : NULL; 
        $insert['hubungan_keluarga'] = isset($_POST['hubungan_keluarga']) ? $_POST['hubungan_keluarga'] : NULL; 
        $insert['nama_keluarga'] = isset($_POST['nama_keluarga']) ? $_POST['nama_keluarga'] : NULL; 
        $insert['jenis_kelamin_keluarga'] = isset($_POST['jenis_kelamin_keluarga']) ? $_POST['jenis_kelamin_keluarga'] : NULL; 
        $insert['alamat_keluarga'] = isset($_POST['alamat_keluarga']) ? $_POST['alamat_keluarga'] : NULL; 
        $insert['no_telp_keluarga'] = isset($_POST['no_telp_keluarga']) ? $_POST['no_telp_keluarga'] : NULL; 
        $insert['institusi_pendidikan'] = isset($_POST['institusi_pendidikan']) ? $_POST['institusi_pendidikan'] : NULL; 
        $insert['jenjang_pendidikan'] = isset($_POST['jenjang_pendidikan']) ? $_POST['jenjang_pendidikan'] : NULL; 
        $insert['fakultas'] = isset($_POST['fakultas']) ? $_POST['fakultas'] : NULL; 
        $insert['jurusan'] = isset($_POST['jurusan']) ? $_POST['jurusan'] : NULL; 
        $insert['akreditasi'] = isset($_POST['akreditasi']) ? $_POST['akreditasi'] : NULL; 
        $insert['tahun_masuk'] = isset($_POST['tahun_masuk']) ? date("Y-m-d", strtotime($_POST['tahun_masuk'])) : NULL; 
        $insert['tahun_lulus'] = isset($_POST['tahun_lulus']) ? date("Y-m-d", strtotime($_POST['tahun_lulus'])) : NULL;
        $insert['NEM_IPK'] = isset($_POST['NEM_IPK']) ? $_POST['NEM_IPK'] : NULL; 
        $insert['kompetensi'] = isset($_POST['kompetensi']) ? $_POST['kompetensi'] : NULL; 
        $insert['perusahaan'] = isset($_POST['perusahaan']) ? $_POST['perusahaan'] : NULL; 
        $insert['industri'] = isset($_POST['industri']) ? $_POST['industri'] : NULL; 
        $insert['bagian'] = isset($_POST['bagian']) ? $_POST['bagian'] : NULL; 
        $insert['spesialisasi'] = isset($_POST['spesialisasi']) ? $_POST['spesialisasi'] : NULL; 
        $insert['jabatan'] = isset($_POST['jabatan']) ? $_POST['jabatan'] : NULL; 
        $insert['masuk_perusahaan'] = isset($_POST['masuk_perusahaan']) ? date("Y-m-d", strtotime($_POST['masuk_perusahaan'])) : NULL; 
        $insert['berakhir_perusahaan'] = isset($_POST['berakhir_perusahaan']) ? date("Y-m-d", strtotime($_POST['berakhir_perusahaan'])) : NULL; 
        $insert['bersedia_berpergian'] = isset($_POST['bersedia_berpergian']) ? $_POST['bersedia_berpergian'] : NULL;
        $insert['gaji_diharapkan'] = isset($_POST['gaji_diharapkan']) ? $_POST['gaji_diharapkan'] : NULL;
        $insert['tanggal_siap_bekerja'] = isset($_POST['tanggal_siap_bekerja']) ? date("Y-m-d", strtotime($_POST['tanggal_siap_bekerja'])) : NULL;
        $insert['id_users'] = $_SESSION['id_users'];
        $result = $this->recruitment_model->insert('personal',$insert);
        if($result){
          $this->session->set_flashdata('alert-personal', 'Success_personal');
          redirect('users/personal');
        }else{
          $this->session->set_flashdata('alert-personal', 'Error_personal');
          redirect('users/personal');
        }
    }else{
      $this->session->set_flashdata('alert-personal', 'Error_personal');
          redirect('users/personal');
    } 
  }      
    }else{
      redirect('users/personal');
    }
   }


   function show_personal(){
    $query = $this->db->query("SELECT * FROM personal WHERE id_users=".$_SESSION['id_users']);
    $data = $query->result();
    if(!empty($data[0]->tanggal_lahir)){
    $tanggal_lahir = date("d-m-Y", strtotime($data[0]->tanggal_lahir));
    $data[0]->tanggal_lahir = $tanggal_lahir;
    }
    if(!empty($data[0]->tahun_masuk)){
    $tahun_masuk = date("d-m-Y", strtotime($data[0]->tahun_masuk));
    $data[0]->tahun_masuk = $tahun_masuk;
    }
    if(!empty($data[0]->tahun_lulus)){
    $tahun_lulus = date("d-m-Y", strtotime($data[0]->tahun_lulus));
    $data[0]->tahun_lulus = $tahun_lulus;
    }
    if(!empty($data[0]->masuk_perusahaan)){
    $masuk_perusahaan = date("d-m-Y", strtotime($data[0]->masuk_perusahaan));
    $data[0]->masuk_perusahaan = $masuk_perusahaan;
    }
    if(!empty($data[0]->berakhir_perusahaan)){
    $berakhir_perusahaan = date("d-m-Y", strtotime($data[0]->berakhir_perusahaan));
    $data[0]->berakhir_perusahaan = $berakhir_perusahaan;
    }
    if(!empty($data[0]->tanggal_siap_bekerja)){
    $tanggal_siap_bekerja = date("d-m-Y", strtotime($data[0]->tanggal_siap_bekerja));
    $data[0]->tanggal_siap_bekerja = $tanggal_siap_bekerja;
    }
    echo json_encode($data);
}

function apply_job(){
  $id_job = $this->uri->segment(3);
  $id_user = $this->uri->segment(4);
  $query_recruitment = $this->db->query('SELECT * FROM recruitment WHERE id_users='.$_SESSION['id_users'].' AND id_job='.$id_job.'');
  $count = count($query_recruitment->result());
  if($count == 0){
  $data_personal = $this->db->query('SELECT * FROM personal WHERE id_users='.$id_user);
  $insert_recruitment = $data_personal->result_array();
  $insert_recruitment[0]['id_job'] = $id_job;
  $insert_recruitment[0]['status_recruitment'] = 'new';
  $insert_recruitment[0]['tanggal_apply'] = date("Y-m-d");
  $result = $this->recruitment_model->insert('recruitment',$insert_recruitment[0]);
  $lastid = $this->db->insert_id();
      if($result){
        $hash_md5 = substr(md5((string)$lastid), 0, 11);
        $update = $this->db->query("UPDATE recruitment SET kode_bukti='".$hash_md5."' WHERE id_recruitment=".$lastid);
        $this->session->set_flashdata('kode_bukti', $hash_md5);
        redirect('users/print_bukti_apply');  
      }else{
        $this->session->set_flashdata('alert-recruitment', 'Failed_recruitment_data');
        redirect('users/karir');
      }
  }else{
    $this->session->set_flashdata('alert-recruitment', 'Failed_recruitment');
    redirect('users/karir');
  }
}


function print_bukti_apply(){
$bukti_data = $this->session->flashdata('kode_bukti');
if(!empty($bukti_data)){
  $data = ['kode_bukti' => $bukti_data];
  $this->load->view('users/bukti_apply_users',$data);
}else{
  redirect('users/home');
}
}

function print_bukti_view(){
  $kode_bukti = $this->uri->segment(3);
  if(!empty($kode_bukti)){
    $query_bukti_view = $this->db->query("SELECT * FROM recruitment as t1 LEFT JOIN job_article as t2 ON t2.id_job = t1.id_job  WHERE kode_bukti='".$kode_bukti."'");
    $data_view = $query_bukti_view->result_array();
    $data = $data_view[0];
    $this->load->view('users/view_bukti_apply_users',$data);
  }else{
    redirect('users/home');
  }
}

function edit_users(){
  $id_users = $this->uri->segment(3);
  if($this->input->post('btnUpdateUsers')){
    $data = [
      'name' => $this->input->post('name_users'),
      'email' => $this->input->post('email_users'),
      'level' => $this->input->post('level_users')
    ];

    if(!empty($this->input->post('password_users')) == !empty($this->input->post('re_password_users'))){
      if($this->input->post('password_users') == $this->input->post('re_password_users') ){
        $data['password'] = password_hash($this->input->post('password_users'),PASSWORD_DEFAULT);
      }
    }
    $where = [
      'id_users' => $id_users
    ];
    $result = $this->recruitment_model->update('users',$data,$where);
   if($result){
      redirect('users/list_users');
    }else{
      $this->session->set_flashdata('alert-message', 'Error_message_admin');
      redirect('users/list_users');
    }
  }else{
    $data['id_users']= $id_users;  
    $this->load->view('admin/header_admin');
    $this->load->view('admin/edit_users_admin',$data);
    $this->load->view('admin/footer_admin');
  }
}

function edit_users_view(){
  $id_users = $this->uri->segment(3);
  $query = $this->db->query("SELECT * FROM users WHERE id_users=".$id_users);
  $data = $query->result();
  echo json_encode($data);
}
}