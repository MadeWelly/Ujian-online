<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends My_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('form', 'url'));
		if ($this->session->userdata('logged_dosen') != true) {
			redirect('login/dosen');
			// $this->load->view('templates/login/login_dosen');

		}
		$noinduk = $this->session->userdata('nidn');
		$this->dosen = $this->user_m->getDosen($noinduk);
	}
	public function index()
	{
		$data['row_dosen'] = $this->dosen;
		$id_matkul = $data['row_dosen']->matkul_id;
		// print_r($data);
		$data['matkul'] = $this->ujian_m->get_matkul_byid($id_matkul);

		$data['page'] = 'templates/dosen/dashboard';
		$this->load->view('main_view', $data);
	}

	public function dashboard()
	{
		$data['row_dosen'] = $this->dosen;
		$id_matkul = $data['row_dosen']->matkul_id;
		// print_r($data);
		$data['matkul'] = $this->ujian_m->get_matkul_byid($id_matkul);

		$data['page'] = 'templates/dosen/dashboard';
		$this->load->view('main_view', $data);
	}

	public function bank()
	{
		$id_dosen = $this->dosen->id_dosen;
		// $m_ujian = $this->ujian_m->get_m_ujian($id_dosen);
		// $data['ujian'] = $m_ujian;
		// print_r($this->uri->segment(3));die;
		if ($this->uri->segment(3) == 'uts') {

			$uts = 'UTS';
			$data['bankUts'] = $this->ujian_m->BankUtsM($uts, $id_dosen)->result();
			$data['page'] = 'templates/dosen/bank_ujian';
			$this->load->view('main_view', $data);
		} else {
			$uts = 'UAS';
			$data['bankUas'] = $this->ujian_m->BankUasM($uts, $id_dosen)->result();
			// print_r($bankUts);die;

			// $data['row_dosen'] = $this->dosen;
			// $id = $this->session->userdata('id_dosen');

			// $data['soal_dosen'] = $this->soal_m->get_soal($id)->result();
			// $data['soal_detail'] = $this->soal_m->get_soal($id)->row();

			// print_r($data1);die;

			$data['page'] = 'templates/dosen/bank_ujian';
			$this->load->view('main_view', $data);
		}
	}

	public function viewSoal()
	{
		$id = $this->uri->segment(3);
		$data['get_soal'] = $this->soal_m->viewMsoal($id)->result();
		// print_r($data);die;
		$data['soal'] = $this->soal_m->viewMsoal($id)->row();

		$data['soal_e'] = $this->soal_m->soalEssay($id)->result();
		// print_r($data);die;

		// print_r($data);die;
		$data['page'] = 'templates/dosen/view_soal';
		$this->load->view('main_view', $data);
	}

	public function delete_soal()
	{
		$id_soal = $this->input->post('hapus');
		$query = $this->soal_m->delete_soal_m($id_soal);
		if ($query = true) {
			$this->session->set_flashdata('success_soal', '<div class="alert alert-danger alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    Data Soal berhasil dihapus !!
		  	</div>');
			redirect('dosen/bank_soal');
		}
	}

	public function deleteSoal()
	{
		$id_s = $this->input->post('hapus');
		$soal = $this->input->post('soal');
		if ($soal == 'essay') {
			$id = $id_s;
			$this->soal_m->delete_soal_m($id, $soal);
		} elseif ($soal == 'pg') {
			$id = $id_s;
			$this->soal_m->delete_soal_m($id, $soal);
		}
		// $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
		// <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		// Data Soal berhasil dihapus !!
		// 	</div>');
		redirect('dosen/buat_ujian');
	}

	public function proses_buat_soal()
	{
		// print_r($this->input->post());die;
		// if($_POST['soal_essay']==true){

		// }
		// $this->form_validation->set_rules('soal', 'Soal', 'required');
		// $this->form_validation->set_rules('kelas', 'Kelas', 'required');
		// $this->form_validation->set_rules('upload_soal', 'Upload_soal', 'required');
		// $this->form_validation->set_rules('upload_a', 'Upload_a', 'required');

		

			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png|doc|docx|ppt|pptx';
			$config['max_size']             = 0;

			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);

			$abjad = ['a', 'b', 'c', 'd', 'e'];

			$post = $this->input->post(null, TRUE);
			// $get = $_FILES;
			// print_r($_FILES['file_a']);die;

			if (@$post['jawaban'] != null) {
				// print_r("success");die;
				// if ($this->upload->do_upload('file_a') == true) {
				$this->upload->do_upload('file_soal');

				foreach ($abjad as $abj) {
					$this->upload->do_upload('file_'.$abj, true);
				}
				// $this->upload->data('file_name');
					// print_r($post);die;
				$this->soal_m->buatSoalPg($post);


				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    Anda Telah Berhasil Membuat Soal !!!
				 </div>');
					redirect('dosen/buat_ujian');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('dosen/buat_ujian');
				}
			} elseif (@$post['soal_essay'] || $_FILES['file_essay']['name'] != null) {
				// $post['file_soal'] = null;
				$this->upload->do_upload('file_essay');
				$this->soal_m->buatSoalEssay($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible mt-2">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    Soal berhasil di buat !!
					 </div>');
					redirect('dosen/buat_ujian');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('dosen/buat_soal');
				}
			}
		


		$data['row_dosen'] = $this->dosen;

		$matkul_id = $data['row_dosen']->matkul_id;


		$data['semester_jurusan'] = $this->ujian_m->get_jursansemester_by_id($matkul_id);
		// print_r($data1); die;

		// $data['get_jurusan'] = $this->ujian_m->get_jurusan();
		// $data['get_kelas'] = $this->ujian_m->get_semester();
		// print_r($data);

		$data['page'] = 'templates/dosen/buat_soal';
		$this->load->view('main_view', $data);
	}

	public function buat_ujian()
	{
		$id_dosen = $this->dosen->id_dosen;
		$m_ujian = $this->ujian_m->get_m_ujian($id_dosen);
		if ($_POST) {
			$post = $this->input->post(null, TRUE);
			// print_r($post);die;
			$data = [
				'ujian_name' => $post['nama_ujian'],
				'dosen_id' => $post['id_dosen'],
				'matkul_id' => $post['matkul_dosen'],
				'prody_id' => $post['jurusan'],
				'class_id' => $post['kelas'],
				'jumlah_soal' => $post['jumlah_soal'],
				'waktu' => $post['waktu'],
				'date_start' => $post['start'],
				'date_exp' => $post['end']
			];
			// print_r($data);die;
			$query = $this->ujian_m->create_m_ujian($data);
			$ts = $this->db->affected_rows();
			// }elseif ($query = true) {
			$this->session->set_flashdata('update_ujian', '<div class="alert alert-success alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    Ujian Berhasil dibuat, Silahakan Anda Buat Soal !!
			  	</div>');
			$id_dosen = $this->dosen->id_dosen;
			$m_ujian = $this->ujian_m->get_m_ujian($id_dosen);
			$data['ujian'] = $m_ujian;
			$id = $m_ujian->id_ujian;
			$data['soal_p'] = $this->soal_m->viewMsoal($id)->result();
			$data['soal_e'] = $this->soal_m->soalEssay($id)->result();
			$data['page'] = 'templates/dosen/buat_soal';
			$this->load->view('main_view', $data);
		} elseif ($m_ujian == null) {
			redirect('dosen/buat_baru');
		} elseif ($m_ujian != null) {
			$data['ujian'] = $m_ujian;
			$id = $m_ujian->id_ujian;
			$data['soal_p'] = $this->soal_m->viewMsoal($id)->result();
			$data['soal_e'] = $this->soal_m->soalEssay($id)->result();
			// print_r($data);die;
			// echo $this->db->last_query();
			// echo $this->db->affected_rows();die;
			$data['page'] = 'templates/dosen/buat_soal';

			$this->load->view('main_view', $data);
		} else {
			$data['row_dosen'] = $this->dosen;

			$matkul_id = $data['row_dosen']->matkul_id;
			$data['semester_jurusan'] = $this->ujian_m->get_jursansemester_by_id($matkul_id);
			$info = $this->session->set_flashdata('update_ujian', '<div class="callout callout-success">
                  Silahkan Anda Buat 
					Ujian Terlebih Dahulu !.
                </div>');
			$data['page'] = 'templates/dosen/buat_ujian';
			$this->load->view('main_view', $data);
		}
	}

	public function buat_baru()
	{
		$data['row_dosen'] = $this->dosen;

		$matkul_id = $data['row_dosen']->matkul_id;
		$data['semester_jurusan'] = $this->ujian_m->get_jursansemester_by_id($matkul_id);
		$info = $this->session->set_flashdata('update_ujian', '
                  <i class="fas fa-bullhorn"></i> Silahkan Anda Buat 
					Ujian Terlebih Dahulu !.
                ');
		$data['page'] = 'templates/dosen/buat_ujian';
		$this->load->view('main_view', $data);
	}

	public function update_ujian()
	{
		$id_dosen = $this->dosen->id_dosen;
		$m_ujian = $this->ujian_m->get_m_ujian($id_dosen);
		// print_r($m_ujian->id_ujian);die;
		$query = $this->ujian_m->update_m_ujian($m_ujian->id_ujian);
		if ($query = true) {
			$this->session->set_flashdata('update_ujian', '<div class="alert alert-info"><strong> Silahkan Anda Buat Ujian!.</strong></div>');
			redirect('dosen/buat_ujian');
		}
	}

	public function hasil_ujian()
	{
		$id_dosen = $this->dosen->id_dosen;
		// print_r($id_dosen);	die;
		$data['get_hasil'] = $this->ujian_m->get_hasilFordosen($id_dosen)->result();
		// print_r($data);die;

		$data['page'] = 'templates/dosen/hasil_ujian';
		$this->load->view('main_view', $data);
	}

	public function login()
	{ }
	public function logout()
	{
		$this->session->unset_userdata(array(
			'id_dosen',
			'user_name',
			'nidn',
			'logged_dosen',
		));
		redirect('dosen/login');
	}
}
