<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Job extends CI_Controller
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

  function create(){
    $data = $this->input->post();
    if($this->input->post('btnReset')){
      redirect('admin/create');
    }else if($this->input->post('btnPost')){
      unset($data['btnPost']);
      unset($data['files']);
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('job_category', 'Job_category', 'required');
      $this->form_validation->set_rules('date_from', 'Date_from', 'required');
      $this->form_validation->set_rules('date_thru', 'Date_thru', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');
      $this->form_validation->set_rules('contents', 'Contents', 'required');
      if ($this->form_validation->run()){
      $dataCategory = $this->recruitment_model->getByWhere('category',['code_category' => $data['job_category']]);
      $result = [];
      foreach ($dataCategory as $key => $value)
        {
            $result[$key] = $value;
        }
      unset($data['job_category']);
      $data['id_category'] = $result['id_category'];
      $data['id_users'] = $this->session->userdata('id_users');
      $this->recruitment_model->insert('job_article',$data);
      $id = $this->db->insert_id();
      $result =$this->recruitment_model->countAll('job_article',['id_job' => $id]);
      if($result > 0){
          $this->session->set_flashdata('alert-jobs', 'Success_jobs');
          redirect('job/create');
      }else{
          $this->session->set_flashdata('alert-jobs', 'Error_jobs');
          redirect('job/create');
      }
    }else{
      $this->session->set_flashdata('alert-jobs', 'Error_jobs');
      redirect('job/create');
    }
    }else{
      $this->load->view('admin/header_admin');
      $this->load->view('admin/job_admin');
      $this->load->view('admin/footer_admin');
    }
  }

  function upload_image(){
    if(isset($_FILES["image"]["name"])){
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('image')){
            $this->upload->display_errors();
            return FALSE;
        }else{
            $data = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '60%';
            $config['width']= 500;
            $config['height']= 200;
            $config['new_image']= './assets/images/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            echo base_url().'assets/images/'.$data['file_name'];
        }
    }
}

function delete_image(){
  $src = $this->input->post('src');
  $file_name = str_replace(base_url(), '', $src);
  if(unlink($file_name)){
      echo 'File Delete Successfully';
  }
}

function list_jobs(){
  $this->load->view('admin/header_admin');
  $this->load->view('admin/list_job_admin');
  $this->load->view('admin/footer_admin');
}

function delete_jobs(){
  $id_job = $this->uri->segment(3);
  $hasil=$this->db->query("DELETE FROM job_article WHERE id_job=".$id_job);
  if($hasil){
    $this->session->set_flashdata('alert-job', 'Success_delete_jobs');
    redirect('job/list_jobs');
  }else{
    $this->session->set_flashdata('alert-job', 'Error_delete_jobs');
    redirect('job/list_jobs');
  }
}

function get_jobs(){
  $hasil=$this->db->query("SELECT * FROM job_article");
  $data = $hasil->result();
  $i=0;
  foreach ($data as $val){
    $data[$i]->date_from = date("d-m-Y", strtotime($data[$i]->date_from));
    $data[$i]->date_thru = date("d-m-Y", strtotime($data[$i]->date_thru));
    $i += 1;
  }
  echo json_encode($data);
}
function list_recruitment(){
  $this->load->view('admin/header_admin');
  $this->load->view('admin/list_recruitment_admin');
  $this->load->view('admin/footer_admin');
}
  function list_recruitment_data(){
		$query = $this->db->query("SELECT * FROM recruitment WHERE status_recruitment='new'");
		$data = $query->result();
		$no = 0;
		$base_url = base_url();
		$output = '';
		foreach ($data as $row)
		{
		$query_job = $this->db->query("SELECT title FROM job_article WHERE id_job=$row->id_job");
    $jobs = $query_job->result_array();
		$output .='
				<tr>
					<td>'.($no+1).'</td>
          <td>'.$row->no_ktp.'</td>
          <td>'.$jobs[0]['title'].'</td>
					<td>'.$row->nama.'</td>
					<td>'.$row->tempat_lahir.'</td>
					<td>'.$row->institusi_pendidikan.'</td>
					<td>'.$row->NEM_IPK.'</td>
					<td>'.$row->status_recruitment.'</td>
					<td><a class="btn btn-success btn-sm" href="'.$base_url.'job/view_data/'.$row->id_recruitment.'" target="_blank">View Data</a></td>
					<td><a class="btn btn-info btn-sm" href="'.$base_url.'job/recruitment_approve/'.$row->id_recruitment.'"><i class="fas fa-pencil-alt"></i>Approve</a>
					<a class="btn btn-danger btn-sm" href="'.$base_url.'job/recruitment_denied/'.$row->id_recruitment.'"><i class="fas fa-trash"></i>Denied</a>
				</td>
				</tr>
			';
		$no++;
    }
		echo $output;
}

function recruitment_approve(){
  $id = $this->uri->segment(3);
	$result = $this->db->query("UPDATE recruitment SET status_recruitment='approved' WHERE id_recruitment=$id");
	if($result){
		redirect('job/list_recruitment');
	}else{
		redirect('job/list_recruitment');
	}
}

function recruitment_denied(){
  $id = $this->uri->segment(3);
	$result = $this->db->query("UPDATE recruitment SET status_recruitment='denied' WHERE id_recruitment=$id");
	if($result){
		redirect('job/list_recruitment');
	}else{
		redirect('job/list_recruitment');
	}
}

function view_data(){
$id = $this->uri->segment(3);
$data['id'] = $id;
$this->load->view('admin/detail_data_admin',$data);
}

function list_recruitment_approved(){
  $this->load->view('admin/header_admin');
  $this->load->view('admin/list_recruitment_approved_admin');
  $this->load->view('admin/footer_admin');
}

function show_personal_admin(){
  $id = $this->uri->segment(3);
  $query = $this->db->query("SELECT * FROM recruitment WHERE id_recruitment=".$id);
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
  $tahun_lulus = date("-Y", strtotime($data[0]->tahun_lulus));
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

function list_recruitment_data_approved(){
  $query = $this->db->query("SELECT * FROM recruitment WHERE status_recruitment='approved'");
  $data = $query->result();
  $no = 0;
  $base_url = base_url();
  $output = '';
  foreach ($data as $row)
  {
  $query_job = $this->db->query("SELECT title FROM job_article WHERE id_job=$row->id_job");
  $jobs = $query_job->result_array();
  $output .='
      <tr>
        <td>'.($no+1).'</td>
        <td>'.$row->no_ktp.'</td>
        <td>'.$jobs[0]['title'].'</td>
        <td>'.$row->nama.'</td>
        <td>'.$row->tempat_lahir.'</td>
        <td>'.$row->institusi_pendidikan.'</td>
        <td>'.$row->NEM_IPK.'</td>
        <td>'.$row->status_recruitment.'</td>
        <td><a class="btn btn-success btn-sm" href="'.$base_url.'job/view_data/'.$row->id_recruitment.'" target="_blank">View Data</a></td>
        <td><a class="btn btn-info btn-sm" href="'.$base_url.'admin/form_send_email/'.$row->id_recruitment.'" target="_blank"><i class="fas fa-pencil-alt"></i>Send Email</a>
      </td>
      </tr>
    ';
  $no++;
  }
  echo $output;
}

function edit_job_data(){
  $id_job = $this->uri->segment(3);
  if($this->input->post('btnUpdateJob')){
    $job_category = $this->input->post('job_category');
    $dataCategory = $this->recruitment_model->getByWhere('category',['code_category' => $job_category]);
    $data = [
      'title' => $this->input->post('title'),
      'id_category' => $dataCategory->id_category,
      'contents' => $this->input->post('contents'),
      'date_from' =>  date("Y-m-d", strtotime($this->input->post('date_from'))),
      'date_thru' => date("Y-m-d", strtotime($this->input->post('date_thru')))
    ];
    
    $where = [
      'id_job' => $id_job
    ];

    $result = $this->recruitment_model->update('job_article',$data,$where);
   if($result){
      redirect('job/list_jobs');
    }else{
      $this->session->set_flashdata('alert-category', 'Error_category_duplicate_code');
      redirect('job/list_jobs');
    }
  }else{
    $data['id_job']= $id_job;  
    $this->load->view('admin/header_admin');
    $this->load->view('admin/edit_job_admin',$data);
    $this->load->view('admin/footer_admin');
  }
}

function edit_job_view(){
  $id_job = $this->uri->segment(3);
  $query = $this->db->query("SELECT * FROM job_article WHERE id_job=".$id_job);
  $data = $query->result();
  $data[0]->date_from =   date("d-m-Y", strtotime($data[0]->date_from));
  $data[0]->date_thru = date("d-m-Y", strtotime($data[0]->date_thru));
  echo json_encode($data);
}

function list_recruitment_denied(){
  $this->load->view('admin/header_admin');
  $this->load->view('admin/list_recruitment_denied_admin');
  $this->load->view('admin/footer_admin');
}

function list_recruitment_data_denied(){
  $query = $this->db->query("SELECT * FROM recruitment WHERE status_recruitment='denied'");
  $data = $query->result();
  $no = 0;
  $base_url = base_url();
  $output = '';
  foreach ($data as $row)
  {
  $query_job = $this->db->query("SELECT title FROM job_article WHERE id_job=$row->id_job");
  $jobs = $query_job->result_array();
  $output .='
      <tr>
        <td>'.($no+1).'</td>
        <td>'.$row->no_ktp.'</td>
        <td>'.$jobs[0]['title'].'</td>
        <td>'.$row->nama.'</td>
        <td>'.$row->tempat_lahir.'</td>
        <td>'.$row->institusi_pendidikan.'</td>
        <td>'.$row->NEM_IPK.'</td>
        <td>'.$row->status_recruitment.'</td>
        <td><a class="btn btn-success btn-sm" href="'.$base_url.'job/view_data/'.$row->id_recruitment.'" target="_blank">View Data</a></td>
      </tr>
    ';
  $no++;
  }
  echo $output;
}

  function report_recruitment(){
    $query_job = $this->db->query("SELECT id_job,title FROM job_article");
    $jobs = $query_job->result_array();
    $data['job'] = $jobs;
    $this->load->view('admin/header_admin');
    $this->load->view('admin/report_recruitment_admin', $data);
    $this->load->view('admin/footer_admin');
  }

  function report_recruitment_action(){
    if ($this->input->post('btnGenerate')){
    $styleArray = [
      'font' => [
          'bold' => true,
          'size' => 10,
      ],
      'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
      ],
      'borders' => [
          'allBorders' => [
              'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          ],
        ],
      ];

      $styleArrayBody = [
        'font' => [
            'size' => 8,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
          ],
        ];
      $job = $this->input->post('job');
      $status = $this->input->post('status');
      $column_query = $this->db->query("SHOW COLUMNS FROM recruitment");
      $column = $column_query->result_array();
      $fields = array();
      foreach ($column as $field){
        if(
          $field['Field'] !== 'id_recruitment' 
          AND
          $field['Field'] !== 'id_users' 
          AND
          $field['Field'] !== 'upload_ktp' 
          AND
          $field['Field'] !== 'upload_cv' 
          AND
          $field['Field'] !== 'upload_ijazah' 
          AND
          $field['Field'] !== 'upload_transkip' 
          AND
          $field['Field'] !== 'upload_kartu_keluarga' 
          AND
          $field['Field'] !== 'upload_akte_lahir'
          AND
          $field['Field'] !== 'id_personal' 
          AND
          $field['Field'] !== 'foto_diri'
        ){
        array_push($fields, $field['Field']);
        }
      }
      $query = $this->db->query("SELECT 
                                      nama,
                                      jenis_kelamin,
                                      tempat_lahir,
                                      tanggal_lahir,
                                      no_ktp,
                                      no_sim,
                                      status,
                                      agama,
                                      gol_darah,
                                      tinggi_badan,
                                      berat_badan,
                                      alamat_ktp,
                                      RT_RW,
                                      kelurahan,
                                      kecamatan,
                                      kota_kabupaten,
                                      provinsi,
                                      kode_pos,
                                      email,
                                      no_telepon,
                                      no_handphone,
                                      nama_ibu_kandung,
                                      hubungan_keluarga,
                                      nama_keluarga,
                                      jenis_kelamin_keluarga,
                                      alamat_keluarga,
                                      no_telp_keluarga,
                                      institusi_pendidikan,
                                      jenjang_pendidikan,
                                      fakultas,
                                      jurusan,
                                      akreditasi,
                                      tahun_masuk,
                                      tahun_lulus,
                                      NEM_IPK,
                                      kompetensi,
                                      perusahaan,
                                      industri,
                                      bagian,
                                      spesialisasi,
                                      jabatan,
                                      masuk_perusahaan,
                                      berakhir_perusahaan,
                                      bersedia_berpergian,
                                      gaji_diharapkan,
                                      tanggal_siap_bekerja,
                                      status_recruitment,
                                      id_job,
                                      kode_bukti,
                                      tanggal_apply 
                                  FROM 
                                    recruitment
                                  WHERE 
                                      id_job=$job 
                                  AND 
                                      status_recruitment = '".$status."'");
      $result = $query->result_array();
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->fromArray($fields,NULL, 'A1');
      $query_job = $this->db->query("SELECT title FROM job_article WHERE id_job=$job");
      $jobs = $query_job->result_array();

      $i = 2;
      $start = 2;
      $count_row = 0;
      $title = '';
      foreach ($result as $value){
        if($value['jenis_kelamin'] == '1'){
          $value['jenis_kelamin'] = 'Pria';
        }else if($value['jenis_kelamin'] == '2'){
          $value['jenis_kelamin'] = 'Wanita';
        }

        if($value['agama'] == '1'){
          $value['agama'] = 'Islam';
        }else if($value['agama'] == '2'){
          $value['agama'] = 'Kristen';
        }else if($value['agama'] == '3'){
          $value['agama'] = 'Protestan';
        }else if($value['agama'] == '4'){
          $value['agama'] = 'Budha';
        }else if($value['agama'] == '5'){
          $value['agama'] = 'Hindu';
        }

        if($value['status'] == '1'){
          $value['status'] = 'Lajang';
        }else if($value['status'] == '2'){
          $value['status'] = 'Menikah';
        }else if($value['status'] == '3'){
          $value['status'] = 'Cerai';
        }

        if($value['gol_darah'] == '1'){
          $value['gol_darah'] = 'A';
        }else if($value['gol_darah'] == '2'){
          $value['gol_darah'] = 'B';
        }else if($value['gol_darah'] == '3'){
          $value['gol_darah'] = 'O';
        }else if($value['gol_darah'] == '4'){
          $value['gol_darah'] = 'A/B';
        }

        if($value['hubungan_keluarga'] == '1'){
          $value['hubungan_keluarga'] = 'Suami';
        }else if($value['hubungan_keluarga'] == '2'){
          $value['hubungan_keluarga'] = 'Istri';
        }else if($value['hubungan_keluarga'] == '3'){
          $value['hubungan_keluarga'] = 'Ayah';
        }else if($value['hubungan_keluarga'] == '4'){
          $value['hubungan_keluarga'] = 'Ibu';
        }else if($value['hubungan_keluarga'] == '5'){
          $value['hubungan_keluarga'] = 'Anak Kandung';
        }

        if($value['jenis_kelamin_keluarga'] == '1'){
          $value['jenis_kelamin_keluarga'] = 'Laki-laki';
        }else if($value['jenis_kelamin_keluarga'] == '2'){
          $value['jenis_kelamin_keluarga'] = 'Perempuan';
        }

        if($value['jenjang_pendidikan'] == '1'){
          $value['jenjang_pendidikan'] = 'SMA/SMK';
        }else if($value['jenjang_pendidikan'] == '2'){
          $value['jenjang_pendidikan'] = 'D-III';
        }else if($value['jenjang_pendidikan'] == '3'){
          $value['jenjang_pendidikan'] = 'S1';
        }else if($value['jenjang_pendidikan'] == '4'){
          $value['jenjang_pendidikan'] = 'S2';
        }

        if($value['akreditasi'] == '1'){
          $value['akreditasi'] = 'A';
        }else if($value['akreditasi'] == '2'){
          $value['akreditasi'] = 'B';
        }else if($value['akreditasi'] == '3'){
          $value['akreditasi'] = 'C';
        }

        if($value['bersedia_berpergian'] == '1'){
          $value['bersedia_berpergian'] = 'Ya';
        }else if($value['bersedia_berpergian'] == '2'){
          $value['bersedia_berpergian'] = 'Tidak';
        }

        if($value['id_job']){
          $value['id_job'] = $jobs[0]['title'];
        }

        $count_row = count($value);
        $sheet->fromArray($value,NULL, 'A'.(string)$i);
        $sheet->getStyle('A'.$i.':AX'.$i)->applyFromArray($styleArrayBody);
        $i += 1;
      }
      $sheet->getStyle('A1:AX1')->applyFromArray($styleArray);
      $writer = new Xlsx($spreadsheet);
      $timestamp = time();
      $filename = $jobs[0]['title'].'_' .$status.'_'. $timestamp;

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
      header('Cache-Control: max-age=0');
      
      $writer->save('php://output'); // download file 
    }else{
      redirect('job/report_recruitment');
    }
  }
}