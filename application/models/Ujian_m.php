<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian_m extends CI_Model {

	public function get_list_ujian($id_kelas,$id_jurusan,$id_mahasiswa) {
		$data=$this->ujian_m->get_hasil_ujian($id_mahasiswa)->result();
		// print_r($data);die;
		$this->db->select('*');
		$this->db->from('m_ujian');
		// if ($data==true) {
		// 	$this->db->from('hasil_ujian');
		// }
		// $this->db->from('hasil_ujian');
		// $this->db->join('mahasiswa', 'mahasiswa.id_msw = $id_mahasiswa');
		$this->db->join('mahasiswa', 'mahasiswa.class_id = m_ujian.class_id AND mahasiswa.prody_id = m_ujian.prody_id');		
		$this->db->join('dosen', 'm_ujian.dosen_id = dosen.id_dosen');
		$this->db->join('matkul', 'm_ujian.matkul_id = matkul.id_matkul');
		$this->db->join('hasil_ujian', 'hasil_ujian.msw_id = mahasiswa.id_msw AND m_ujian.id_ujian=hasil_ujian.ujian_id','left');
		// $this->db->where_not_in('m_ujian.id_ujian','10');

		$this->db->where('m_ujian.class_id',$id_kelas);
		$this->db->where('m_ujian.prody_id',$id_jurusan);
		$this->db->where('mahasiswa.id_msw',$id_mahasiswa);
		// $this->db->order_by('date_start', 'DESC');
		$query = $this->db->get()->result();
		// print_r($query);die;
		return $query;
		// return array($query,$data);
	}
	public function ujianId($id_mahasiswa) {
		$this->db->select('ujian_id');
		$this->db->where_not_in('msw_id', $id_mahasiswa);
		return $this->db->get('hasil_ujian');
	}
	public function ujianDone($id_mahasiswa) {
	$this->db->select('*');
		$this->db->from('hasil_ujian');
		$this->db->join('m_ujian', 'm_ujian.id_ujian = hasil_ujian.ujian_id');
		$this->db->join('dosen', 'dosen.id_dosen = m_ujian.dosen_id');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		// $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = hasil_ujian.id_mahasiswa');
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		return $this->db->get()->result();
	}

	public function get_m_ujian($id_dosen) {
		// $this->db->select('*');
		// // $this->db->from('m_ujian');
		// // $this->db->join('soal_m', 'soal_m.ujian_id = m_ujian.id_ujian');
		// $this->db->where('dosen_id', $id_dosen);
		
		// $this->db->select_max('id_ujian');
		// $this->db->order_by('id_ujian', 'DESC LIMIT 1');
		// // $query = $this->db->query("SELECT * FROM m_ujian AND soal_m where dosen_id	= $id_dosen ORDER BY id_ujian DESC LIMIT 1")->row();
		// return $this->db->get('m_ujian');
		// $this->db->where('dosen_id', $id_dosen);
		$this->db->select_max('id_ujian');
		$query = $this->db->query("SELECT * FROM m_ujian where dosen_id	= $id_dosen ORDER BY id_ujian DESC LIMIT 1")->row();
		return $query;
	}

	public function BankUtsM($uts,$id_dosen) {
		$this->db->select('*');
		$this->db->from('m_ujian');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->where('ujian_name',$uts);
		$this->db->where('dosen_id',$id_dosen);
		$this->db->order_by('id_ujian', 'DESC');
		return $this->db->get();
	}

	public function BankUasM($uas,$id_dosen) {
		$this->db->select('*');
		$this->db->from('m_ujian');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->where('ujian_name',$uas);
		$this->db->where('dosen_id',$id_dosen);
		$this->db->order_by('id_ujian', 'DESC');
		return $this->db->get();
	}

	public function h_ujian($data) {
		$this->db->insert('hasil_ujian', $data);
	}

	public function delete_hasil_m($id_hasil){
		$this->db->delete('hasil_ujian', array('id_hasil' => $id_hasil));
	}


	public function get_hasil_ujian($id_mahasiswa) {
		$this->db->select('*');
		$this->db->from('hasil_ujian');
		$this->db->join('m_ujian', 'm_ujian.id_ujian = hasil_ujian.ujian_id');
		$this->db->join('dosen', 'dosen.id_dosen = m_ujian.dosen_id');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->join('mahasiswa', 'mahasiswa.id_msw = hasil_ujian.msw_id');
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		return $this->db->get();
	}

	public function get_hasilFordosen($id_dosen) {
		$this->db->select('*');
		$this->db->from('hasil_ujian');
		$this->db->join('m_ujian', 'm_ujian.id_ujian = hasil_ujian.ujian_id');
		$this->db->join('mahasiswa', 'mahasiswa.id_msw = hasil_ujian.msw_id');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->where('m_ujian.dosen_id',$id_dosen);
		return $this->db->get();
	}

	public function get_jursansemester_by_id($matkul_id) {
		$this->db->where('id_matkul', $matkul_id);
		return $this->db->get('matkul')->row();
	}

	public function get_soal_by_matkulid($id_matkul, $id_ujian) {
		$this->db->where('matkul_id', $id_matkul);
		$this->db->where('ujian_id', $id_ujian);
		// $row =  $this->db->get('tb_soal')->num_rows();
		return $this->db->get('soal_m');
	}
	public function get_total_row_soal_by_matkulid($id_matkul1) {
		$this->db->where('matkul_id', $id_matkul1);
		// $row =  $this->db->get('tb_soal')->num_rows();
		return $this->db->get('soal_m')->num_rows();
	}

	public function get_matkul_byid($id_matkul) {
		$this->db->where('id_matkul', $id_matkul);
		return $this->db->get('matkul')->row();
	}
	public function get_jurusan() {
		// $this->db->select('*');
		// return $this->get_where('jurusan')->result();
		return $this->db->query("SELECT * FROM prody")->result();
	}
	public function get_jurusanbyid($id_jurusan) {
		$this->db->where('id_prody', $id_jurusan);
		return $this->db->get('prody')->row();
	}
	public function get_semester() {
		// $this->db->select('*');
		// return $this->get_where('jurusan')->result();
		return $this->db->query("SELECT * FROM kelas")->result();
	}

	public function create_m_ujian($data) {
		$this->db->insert('m_ujian', $data);
	}

	public function update_m_ujian($id_ujian) {
		$this->db->delete('m_ujian', array('id_ujian' => $id_ujian));
	}

	// public function buat_soal($post) {
	// 	$t_soal = [
	// 		'dosen_id' => $post['id_dosen'],
	// 		'matkul_id' => $post['matkul_dosen'],
	// 		'soal' => $post['soal'],
	// 		'opsi_a' => $post['jawaban_a'],
	// 		'opsi_b' => $post['jawaban_b'],
	// 		'opsi_c' => $post['jawaban_c'],
	// 		'opsi_d' => $post['jawaban_d'],
	// 		'opsi_e' => $post['jawaban_e'],
	// 		'jawaban' => $post['jawaban']
	// 	];
	// 	$ujian = [
	// 		'dosen_id' => $post['id_dosen'],
	// 		'matkul_id' => $post['matkul_dosen'],
	// 		'kelas_id' => $post['kelas'],
	// 		'jurusan_id' => $post['jurusan'],
	// 		'nama_ujian' => $post['nama_ujian'],
	// 		'jumlah_soal' =>1,
	// 		'waktu' =>$post['waktu']
			
	// 	];

	// 	$this->db->insert('tb_soal', $t_soal);
	// 	// $this->db->insert('m_ujian', $ujian);
	// }


	// 	public function get_list_ujian($id_kelas,$id_jurusan,$id_mahasiswa) {
	// 	$data=$this->ujian_m->get_hasil_ujian($id_mahasiswa)->result();
	// 	// print_r($data);die;
	// 	$this->db->select('*');
	// 	$this->db->from('m_ujian');
	// 	// if ($data==true) {
	// 	// 	$this->db->from('hasil_ujian');
	// 	// }
	// 	// $this->db->from('hasil_ujian');
	// 	$this->db->join('mahasiswa', 'mahasiswa.id_msw = 19');
	// 	// $this->db->join('mahasiswa', 'mahasiswa.class_id = m_ujian.class_id');
	// 	$this->db->join('dosen', 'm_ujian.dosen_id = dosen.id_dosen');
	// 	$this->db->join('matkul', 'm_ujian.matkul_id = matkul.id_matkul');
	// 	$this->db->join('hasil_ujian', 'hasil_ujian.msw_id = mahasiswa.id_msw');
	// 	$this->db->where_not_in('m_ujian.id_ujian','hasil_ujian.ujian_id');

	// 	$this->db->where('m_ujian.class_id',$id_kelas);
	// 	$this->db->where('m_ujian.prody_id',$id_jurusan);
	// 	// $this->db->where('mahasiswa.id_msw',$id_mahasiswa);
	// 	$this->db->order_by('date_start', 'DESC');
	// 	$query = $this->db->get()->result();
	// 	// print_r($query);die;
	// 	return $query;
	// 	// return array($query,$data);
	// }
}

?>