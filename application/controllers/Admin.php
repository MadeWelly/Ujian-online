<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_admin') != true) {
			redirect('login/admin');
			// $this->load->view('templates/login/login_dosen');
		}
		$noinduk = $this->session->userdata('nim');
		$this->admin = $this->user_m->getAdmin($noinduk);
		
	}

	public function index() {
		$this->admin;
		$data['page'] = 'templates/admin/dashboard';
		$this->load->view('main_view', $data);
	}

	public function dashboard() {
		$this->admin;
		$data['page'] = 'templates/admin/dashboard';
		$this->load->view('main_view', $data);
	}

	public function userNotactive() {
		$status = 0;
		$data['get_mahasiswa_jurusan'] = $this->admin_m->get_all_mahasiswa($status);
		$data['get_dosen'] = $this->admin_m->get_all_dosen($status);
		// print_r($data);die;
		$data['get_jurusan'] = $this->ujian_m->get_jurusan();
		// print_r($data);
		$data['page'] = 'templates/admin/usernot_active';
		$this->load->view('main_view', $data);
	}

	public function master_mahasiswa() {
		if ($this->uri->segment(3)) {
			$jurusan_id = $this->uri->segment(3);
			// print_r($jurusan_id);die;
			$data['get_mahasiswa_jurusan'] = $this->admin_m->get_mahasiswa_by_jurusan($jurusan_id);
			$data['get_jurusan'] = $this->admin_m->get_jurusan();
			$data['page'] = 'templates/admin/master_mahasiswa';
			$this->load->view('main_view', $data);
		}else{
			$status = 1;
			$data['get_mahasiswa_jurusan'] = $this->admin_m->get_all_mahasiswa($status);

			$data['get_jurusan'] = $this->ujian_m->get_jurusan();
			// print_r($data);
			$data['page'] = 'templates/admin/master_mahasiswa';
			$this->load->view('main_view', $data);
		}
	}

	public function add_mahasiswa() {
		$data['get_jurusan'] = $this->admin_m->get_jurusan();
		$data['get_semester'] = $this->admin_m->get_semester();
		$data['page'] = 'templates/admin/add_mahasiswa';
		$this->load->view('main_view', $data);
	}
	public function save_mhs(){
		$hash_password = hash_password($this->input->post('password'));
		// print_r($hash_password);die;
		$post = [
			'msw_name' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'email' => $this->input->post('email'),	
			'password' => $hash_password,
			'class_id' => $this->input->post('semester'),
			'prody_id' => $this->input->post('jurusan'),
			'status' => $this->input->post('status')
		];
		$this->admin_m->insert_mahasiswa($post);
		// echo $this->db->last_query();die;
		redirect('admin/master_mahasiswa');
		// print_r($post);
	}

	public function update_mahasiswa() {
		if ($_POST) {
					// print_r($_POST);die;

			$post = $this->input->post(null, TRUE);
			$this->admin_m->update_mahasiswa($post);
			redirect('admin/master_mahasiswa');
		}
		$id_mahasiswa = $this->uri->segment(3);
		$data['get_jurusan'] = $this->admin_m->get_jurusan();
		$data['get_semester'] = $this->admin_m->get_semester();
		$data['mhs'] = $this->admin_m->get_mahasiswabyid($id_mahasiswa);
		// print_r($data);die;
		$data['page'] = 'templates/admin/update_mahasiswa';
		$this->load->view('main_view', $data);
	}

	public function delete_mahasiswa() {
		$id_mahasiswa = $this->input->post('hapus');
		// print_r($id_mahasiswa);die;
		$this->admin_m->hapus_mahasiswa($id_mahasiswa,'admin/master_mahasiswa');
	}

	public function master_dosen() {
		$status = 1;
		$data['get_dosen'] = $this->admin_m->get_all_dosen($status);
		// print_r($data);die; 

		$data['page'] = 'templates/admin/master_dosen';
		$this->load->view('main_view', $data);
	}

	public function add_dosen() {
		$data['get_jurusan'] = $this->admin_m->get_jurusan();
		$data['get_semester'] = $this->admin_m->get_semester();
		// print_r($data);die;
		$data['page'] = 'templates/admin/add_dosen';
		$this->load->view('main_view', $data);
	}

	public function save_dosen(){

	$post = $this->input->post(null, TRUE);
	// print_r($post);die;

	$this->admin_m->insert_matkul($post);
	$this->admin_m->insert_dosen($post);	
	// echo $this->db->last_query();die;
	redirect('admin/master_dosen');
	}

	public function update_dosen() {
		if($_POST) {
			$post = $this->input->post(null, TRUE);
			// print_r($post);die;
			$this->admin_m->update_matkul($post);
			$this->admin_m->update_dosen($post);
			redirect('admin/master_dosen');
		}

		$id_dosen = $this->uri->segment(3);
		$data['dosen_byid'] = $this->admin_m->get_dosenbyid($id_dosen);
		$matkul_dosen = $data['dosen_byid']->matkul_id;
		$data['jurusan'] = $this->admin_m->get_jurusan();
		// print_r($data);die;
		$data['semester'] = $this->admin_m->get_semester();
		$data['matkul'] = $this->admin_m->get_matkulDosen($matkul_dosen);
	// print_r($data['matkul']); die;
		$data['page'] = 'templates/admin/update_dosen';
		$this->load->view('main_view', $data);
	}

	public function delete_dosen() {
		$id_dosen = $this->input->post('hapus');
		$this->admin_m->hapus_dosen($id_dosen);
		redirect('admin/master_dosen');
	}

	public function ujian() {
		$ujian = $this->uri->segment(3);
		// print_r($ujian);die;
		// $uas = 'uas';
		$data['uts'] = $this->admin_m->m_utsDosen($ujian)->result();
		// print_r($data);die;
		$data['page'] = 'templates/admin/ujian_dosen';
		$this->load->view('main_view', $data);
	}

	public function ujianDosen() {
		$id_dosen = $this->uri->segment(3);
		$data['ujian'] = $this->admin_m->m_ujianDosen($id_dosen)->result();
		$data['page'] = 'templates/admin/ujian_dosen';
		$this->load->view('main_view', $data);
	}

	public function soalDosen() {
		$id_ujian = $this->uri->segment(3);
		$data['get_soal'] = $this->soal_m->viewMsoal($id_ujian)->result();
		// print_r($data);die;
		$data['page'] = 'templates/admin/soal_dosen';
		$this->load->view('main_view', $data);
	}

	public function hasil_ujian() {
		$data['hasil'] = $this->admin_m->get_hasil_ujian()->result();
		// print_r($data);die;
		$data['page'] = 'templates/admin/hasil_ujian';
		$this->load->view('main_view', $data);
	}

	public function invoice_ujian() {
		$id_mahasiswa = $this->uri->segment(3);
		$smstr = array(1,2,3,4,5,6,7,8);
		// print_r($smstr);die;
		// $smstr2 = 2;
		$data['hasil']= $this->admin_m->smstr1($id_mahasiswa,$smstr['0'])->result();
		$data['hasil2']= $this->admin_m->smstr2($id_mahasiswa,$smstr['1'])->result();
		$data['hasil3']= $this->admin_m->smstr3($id_mahasiswa,$smstr['2'])->result();
		$data['hasil4']= $this->admin_m->smstr4($id_mahasiswa,$smstr['3'])->result();
		$data['hasil5']= $this->admin_m->smstr5($id_mahasiswa,$smstr['4'])->result();
		$data['hasil6']= $this->admin_m->smstr6($id_mahasiswa,$smstr['5'])->result();
		$data['hasil7']= $this->admin_m->smstr7($id_mahasiswa,$smstr['6'])->result();
		$data['hasil8']= $this->admin_m->smstr8($id_mahasiswa,$smstr['7'])->result();
		$data['mahasiswa'] = $this->admin_m->get_hasil_ujian($id_mahasiswa)->row();
		// $data['hasil'] = $this->admin_m->get_hasil_ujian()->result();
		// print_r($data);die;
		$data['page'] = 'templates/admin/invoice';
		$this->load->view('main_view', $data);
		// if ($this->db->affected_rows() == null) {
	 //        $data['page'] = 'templates/admin/invoice';
		// 	// $this->load->view('main_view', $data);
		// 	redirect('admin');
		// }
	}
	public function invoicePrint() {
		$id_mahasiswa = $this->uri->segment(3);
		$smstr = $this->uri->segment(4);

		// $smstr = array(1,2,3,4,5,6,7,8);
		// print_r($smstr);die;
		// $smstr2 = 2;
		$data['hasil']= $this->admin_m->smstr1($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr2($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr3($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr4($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr5($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr6($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr7($id_mahasiswa,$smstr)->result();
		$data['hasil']= $this->admin_m->smstr8($id_mahasiswa,$smstr)->result();
		$data['mahasiswa'] = $this->admin_m->get_hasil_ujian($id_mahasiswa)->row();
		// print_r($data);die;
		// $data = 'templates/admin/invoice_print';
		$this->load->view('templates/admin/invoice_print', $data);
	}

	public function test(){
		$data['row_admin'] = $this->admin;

		$matkul_id = $data['row_dosen']->matkul_id;
			$data['semester_jurusan'] = $this->ujian_m->get_jursansemester_by_id($matkul_id);
			$info = $this->session->set_flashdata('update_ujian', '<div class="alert alert-info"><strong> Silahkan Anda Buat 
					Ujian Terlebih Dahulu !.</strong></div>');
			$data['page'] = 'templates/dosen/buat_ujian';
			$this->load->view('main_view', $data);
	}

	public function logout() {
		$this->session->unset_userdata(array(
			'id_admin',
			'user_name',
			'logged_admin',
			'nim'
		));
		redirect('login/admin');
	}
}

?>