<?php 

class Ujian extends My_Controller{

	public function index() {
		
		// print_r($data['list']);

		// $userid = $this->session->userdata('user_id');
		// $data_siswa = $this->user_m->get_mahasiswa_by_userid($userid);
		// $ata = $data_siswa->kelas_id;
		// $ata1 = $data_siswa->jurusan_id;		

		// print_r($ata);
		// print_r($ata1);

		// $data['get_list'] = $this->ujian_m->get_list_ujian($ata,$ata1);
		// print_r($data);

		$data['page'] = 'templates/mahasiswa/list_ujian';
		$this->load->view('templates/template_mahasiswa', $data);
	}
	public function get_soal() {
		$id_matkul = $this->uri->segment(3); 

		$data['soal'] = $this->ujian_m->get_soal_by_matkulid($id_matkul);

		$data['page'] = 'templates/mahasiswa/soal';	
		$this->load->view('templates/template_mahasiswa', $data);
		
	}
}

?>