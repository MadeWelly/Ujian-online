<?php 

class Soal extends My_Controller{

	public function get_soa() {
		$id = $this->uri->segment(3); 
		echo $id;

		// $data['page'] = 'templates/mahasiswa/soal';	
		// $this->load->view('templates/template_mahasiswa', $data);
	}
}

?>