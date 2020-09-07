<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {

	// public function index() {
	// 		// echo hash_password('123');

	// 	$this->form_validation->set_rules('noinduk', 'Noinduk', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('templates/login/login');
	// 	} else {
	// 		//buat session
	// 		$noinduk =	$this->input->post('noinduk');
	// 		$password = $this->input->post('password');

	// 		$admin = $this->user_m->getAdmin($noinduk);
	// 		// print_r($admin);die;
	// 		$mahasiswa = $this->user_m->getMahasiswa($noinduk);
	// 		$dosen = $this->user_m->getDosen($noinduk);

	// 		if ($mahasiswa) {
	// 			if($mahasiswa->status == 0){
	// 				$this->session->set_flashdata('failed', 'akun anda tidak aktif !');
	// 				redirect('login');

	// 			}elseif (check_password($password, $mahasiswa->password)) {
	// 				$this->session->set_userdata(array(
	// 					'id_mahasiswa' => $mahasiswa->id_msw,
	// 					'user_name' => $mahasiswa->msw_name,
	// 					'nim' => $mahasiswa->nim,
	// 					'logged_mahasiswa' => TRUE
	// 				));	
	// 				 redirect('mahasiswa/dashboard');	
	// 			} else {
	// 				$this->session->set_flashdata('failed', 'password anda salah!');
	// 				redirect('login');
	// 			}

	// 		}elseif ($dosen) {
	// 			if($dosen->status == 0){
	// 				$this->session->set_flashdata('failed', 'akun anda tidak aktif !');
	// 				redirect('login');
	// 			}elseif (check_password($password, $dosen->password)) {
	// 				$this->session->set_userdata(array(
	// 					'id_dosen' => $dosen->id_dosen,
	// 					'user_name' => $dosen->dosen_name,
	// 					'nidn' => $dosen->nidn,
	// 					'logged_dosen' => TRUE
	// 				));	
	// 				 redirect('dosen/dashboard');	
	// 			} else {
	// 				$this->session->set_flashdata('failed', 'password anda salah!');
	// 				redirect('login');
	// 			}

	// 		}elseif ($admin) {
	// 			// print_r($admin);die;
	// 			if (check_password($password, $admin->login_pass)) {
	// 				$this->session->set_userdata(array(
	// 					'id_admin' => $admin->id_admin,
	// 					'user_name' => $admin->admin_name,
	// 					'nim' => $admin->login_id,
	// 					'logged_admin' => TRUE
	// 				));	
	// 				 redirect('admin');	
	// 			} else {
	// 				$this->session->set_flashdata('failed', 'password anda salah!');
	// 				redirect('login');
	// 			}
	// 		}else{
	// 				$this->session->set_flashdata('failed', 'Nomor Induk anda salah!');
	// 				redirect('login');
	// 		}
	// 	}
	// }

	public function admin(){
		$this->form_validation->set_rules('noinduk', 'Noinduk', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/login/login_m');
		} else {
			//buat session
			$noinduk =	$this->input->post('noinduk');
			$password = $this->input->post('password');

			$admin = $this->user_m->getAdmin($noinduk);
			if($admin == null){	
				$this->session->set_flashdata('failed', 'Nomor Induk anda salah!');
				redirect('login/admin');
			}elseif (check_password($password, $admin->login_pass)) {
				$this->session->set_userdata(array(
					'id_admin' => $admin->id_admin,
					'user_name' => $admin->admin_name,
					'nim' => $admin->login_id,
					'logged_admin' => TRUE
				));	
				 redirect('admin/dashboard');	
			} else {
				$this->session->set_flashdata('failed', 'password anda salah!');
				redirect('login/admin');
			}
		}
	}

	public function mahasiswa(){
		$this->form_validation->set_rules('noinduk', 'Noinduk', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/login/login_m');
		} else {
			//buat session
			$noinduk =	$this->input->post('noinduk');
			$password = $this->input->post('password');

			// print_r($admin);die;
			$mahasiswa = $this->user_m->getMahasiswa($noinduk);
			// print_r($mahasiswa);die;	
			if($mahasiswa == null){	
				$this->session->set_flashdata('failed', 'Nomor Induk anda salah!');
				redirect('login/mahasiswa');
			}elseif($mahasiswa->status == 0){
				$this->session->set_flashdata('failed', 'akun anda tidak aktif !');
				redirect('login/mahasiswa');

			}elseif (check_password($password, $mahasiswa->password)) {
				$this->session->set_userdata(array(
					'id_mahasiswa' => $mahasiswa->id_msw,
					'user_name' => $mahasiswa->msw_name,
					'nim' => $mahasiswa->nim,
					'logged_mahasiswa' => TRUE
				));	
					redirect('mahasiswa/dashboard');	
			} else {
				$this->session->set_flashdata('failed', 'password anda salah!');
				redirect('login/mahasiswa');
			}
			
		}
		
	}

	public function dosen(){
		$this->form_validation->set_rules('noinduk', 'Noinduk', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/login/login_m');
		} else {
			//buat session
			$noinduk =	$this->input->post('noinduk');
			$password = $this->input->post('password');
			$dosen = $this->user_m->getDosen($noinduk);

			if($dosen == null) {
				$this->session->set_flashdata('failed', 'Nomor Induk anda salah!');
				redirect('login/dosen');
			}elseif($dosen->status == 0){
				$this->session->set_flashdata('failed', 'akun anda tidak aktif !');
				redirect('login/dosen');
			}elseif (check_password($password, $dosen->password)) {
				$this->session->set_userdata(array(
					'id_dosen' => $dosen->id_dosen,
					'user_name' => $dosen->dosen_name,
					'nidn' => $dosen->nidn,
					'logged_dosen' => TRUE
				));	
					redirect('dosen/dashboard');	
			} else {
				$this->session->set_flashdata('failed', 'password anda salah!');
				redirect('login/dosen');
			}
		}
	}
}

?>