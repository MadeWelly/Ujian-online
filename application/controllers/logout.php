<?php

class logout extends My_controller {
    public function mahasiswa() {
		$this->session->unset_userdata(array(
			'msw_id',
			'user_name',
			'logged_mahasiswa',	
		));
		redirect('login');
    }

    public function dosen() {
		$this->session->unset_userdata(array(
			'dosen_id',
			'user_name',
			'logged_dosen',	
		));
		redirect('login');
    }
    public function admin() {
		$this->session->unset_userdata(array(
			'admin_id',
			'user_name',
			'logged_mahasiswa',	
		));
		redirect('login');
    }
}
    
?>