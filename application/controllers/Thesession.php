<?php 
//cara menggunakan library pada CI
class Thesession extends My_Controller{

	public function index() {
		$user = $this->user_m->get_user();

		$data = [
			'username' => $user->id,
			'role' => $user->role
		];
		$this->session->set_userdata($data);
		//$_SESSION['username'] = 'Well';
				echo $this->session->username.'<br>';

	}

	public function show() {
		echo $this->session->username.'<br>';
				echo $this->session->role.'<br>';

	}
}