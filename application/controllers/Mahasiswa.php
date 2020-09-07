<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends My_Controller {

	// public $mahasiswa;

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('logged_mahasiswa') != true) {
			redirect('login/mahasiswa');
			// $this->load->view('templates/login/login_mahasiswa');
		}
		$noinduk = $this->session->userdata('nim');
		$this->mahasiswa = $this->user_m->getMahasiswa($noinduk);
		// $data = $this->mahasiswa;
		// print_r($data);die;
	}

	public function index(){
		$data['row_mahasiswa'] = $this->mahasiswa;
		$id_jurusan = $data['row_mahasiswa']->prody_id;
		$data['jurusan'] = $this->ujian_m->get_jurusanbyid($id_jurusan);
		//dari direct login
		$data['page'] = 'templates/mahasiswa/dashboard';
		$this->load->view('main_view', $data);
	}

	public function dashboard() {
		$data['row_mahasiswa'] = $this->mahasiswa;
		$id_jurusan = $data['row_mahasiswa']->prody_id;
		$data['jurusan'] = $this->ujian_m->get_jurusanbyid($id_jurusan);
		//dari direct login
		$data['page'] = 'templates/mahasiswa/dashboard';
		$this->load->view('main_view', $data);
		
	}

	public function ujian() {
		$data['row_mahasiswa'] = $this->mahasiswa;
		$id_kelas = $this->mahasiswa->class_id;
		$id_jurusan =$this->mahasiswa->prody_id;
		$id_mahasiswa =$this->mahasiswa->id_msw;
		$data['id_u']= $this->ujian_m->get_hasil_ujian($id_mahasiswa)->result();
		// print_r($data['id_u']);die;
		$ta = $this->ujian_m->ujianId($id_mahasiswa)->result();
		// print_r($ta);die;
		$data['get_list'] = $this->ujian_m->get_list_ujian($id_kelas,$id_jurusan,$id_mahasiswa);
		// print_r($data['get_list']);die;
		$data['uDone'] = $this->ujian_m->ujianDone($id_mahasiswa);
				

		$data['page'] = 'templates/mahasiswa/list_ujian';
		$this->load->view('main_view', $data);

	}

	public function time() {
	  	// print_r($_SESSION["end_tim"]);die;
		// session_start();
		$from_time1= date('Y-m-d H:i:s');
		$to_time1= $this->session->userdata('end_tim');
		// print_r($to_time1);
		$timefirst=strtotime($from_time1);
		$timesecond=strtotime($to_time1);

		$differenceinseconds=$timesecond-$timefirst;
		echo gmdate("H:i:s",$differenceinseconds);
	}

	public function get_soal() {
		 // print_r($this->session->userdata('end_time'));die;
  		$duratio = $this->input->post('waktu');
  		// print_r($duratio);die;
	  	$this->session->set_userdata(array(
		    'duratio' => $duratio,
		    'start_tim' => date("Y-m-d H:i:s")
	  	));
	  	$end_tim=$end_tim=date('Y-m-d H:i:s', strtotime('+'.$this->session->userdata('duratio').'minutes', strtotime($this->session->userdata('start_tim'))));
	  	$_SESSION["end_tim"]=$end_tim;
	  	// print_r($_SESSION["end_tim"]);die;

		$id_dosen = $this->input->post('id_d');
		$id_matkul = $this->input->post('id_m');
		$id_ujian = $this->input->post('id_u');
		$data['smstr'] = $this->mahasiswa->class_id;
		$data['duration'] = $this->input->post('waktu');
		$data['get_soal'] = $this->ujian_m->get_soal_by_matkulid($id_matkul, $id_ujian)->result();
		// print_r($data1);die;
		$data['row'] = $this->ujian_m->get_total_row_soal_by_matkulid($id_matkul);
		// print_r($data['get_soal']);die;
		$data['id_ujian'] = $this->ujian_m->get_m_ujian($id_dosen);

		$data['page'] = 'templates/mahasiswa/soal';
		$this->load->view('main_view', $data);
	}

	public function koreksi() {

		$id_mahasiswa =$this->mahasiswa->id_msw;
		$post = $this->input->post();
		$pilihan = $post['opsi_1'];
		$id_soal = $post['id'];
		$jumlah = $post['jumlah'];
 
		$score = 0 ;
		$benar = 0 ;
		$salah = 0 ;
		$kosong = 0 ;

		for ($i=0;$i<$jumlah;$i++) {
			$nomor = $id_soal[$i];
			if (empty($pilihan[$nomor])) {
				$kosong++;
				// print_r($kosong);die;
			}else {
				$jawaban = $pilihan[$nomor];
				// echo $jawaban;die;

				$cek = $this->soal_m->koreksi_soal($nomor,$jawaban)->num_rows();
				// print_r($cek);die;

				if ($cek) {
					$benar++;
				}else{
					$salah++;
				}
			}

			$score = 100 / $jumlah * $benar;
		}
		$data = [
			'msw_id' => $id_mahasiswa,		
			'class_id' => $post['smstr'],
			'ujian_id' => $post['id_ujian'],
			'nilai' => $score,
			'j_benar' => $benar,
			'j_salah' => $salah,
			'date' => date("Y-m-d H:i:s")
		];
		// print_r($data);die;
		$this->ujian_m->h_ujian($data);
		redirect('mahasiswa/hasil');
	}

	public function hasil() {
		$data['row_mahasiswa'] = $this->mahasiswa;
		$id_mahasiswa = $this->session->userdata('id_mahasiswa');
		$data['get_hasil'] = $this->ujian_m->get_hasil_ujian($id_mahasiswa)->result();
		// echo $this->db->last_query();
		// print_r($data);die;
		$data['page'] = 'templates/mahasiswa/hasil';
		$this->load->view('main_view', $data);
	}

	public function delete_hasil() {
		$id_hasil = $this->input->post('hapus');
		// print_r($id_hasil);die;
		$query = $this->ujian_m->delete_hasil_m($id_hasil);
		if ($query = true) {
			$this->session->set_flashdata('delete_success', '<div class="alert alert-danger alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    Data Soal berhasil dihapus !!
		  	</div>');
			redirect('mahasiswa/hasil');
		}
	}

	public function logout() {
		$this->session->unset_userdata(array(
			'id_mahasiswa',
			'user_name',
			'nim',
			'logged_mahasiswa',	
		));
		redirect('login/mahasiswa');
    }

	

}

?>