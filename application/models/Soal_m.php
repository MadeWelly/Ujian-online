<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_m extends CI_Model {
//model soal untuk mahasiswa
	public function get_soal($id) {

		$this->db->select('*');
		$this->db->from('m_ujian');
		$this->db->join('tb_soal', 'm_ujian.dosen_id = tb_soal.dosen_id');
		$this->db->where('m_ujian.dosen_id',$id);
		return $this->db->get();

		// $this->db->select('*');
		// return $this->get_where('jurusan')->result();
		// return $this->db->query("SELECT * FROM jurusan")->result();
	}

	public function koreksi_soal($nomor,$jawaban) {
		$this->db->where('id_soal', $nomor);
		$this->db->where('jawaban', $jawaban);
		return $this->db->get('soal_m');
	}

	// public function delete_soal_m($id_soal) {
	// 	$this->db->delete('soal_m', array('id_soal' => $id_soal));
	// }
	public function delete_soal_m($id,$soal) {
		if ($soal == 'pg') {
			$query=$this->db->delete('soal_m', array('id_soal' => $id));
			if($query){
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Soal Pg berhasil dihapus !!
				</div>');
			}
		} elseif($soal == 'essay') {
			$query=$this->db->delete('essay', array('id_essay' => $id));
			if($query){
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Soal Essay berhasil dihapus !!
				</div>');
			}
		}


	}

// model soal untuk dosen
	public function buatSoalPg($post) {
		// print_r( $_FILES['file_soal']['name']);die;
			// print_r($post);
			$soal_p = [
				'ujian_id' => $post['ujianId'],
				'dosen_id' => $post['id_dosen'],
				'matkul_id' => $post['matkul_dosen'],
				'soal' => $post['soal'],
				'file_soal' => $_FILES['file_soal']['name'],
				'opsi_a' => $post['jawaban_a'],
				'opsi_b' => $post['jawaban_b'],
				'opsi_c' => $post['jawaban_c'],
				'opsi_d' => $post['jawaban_d'],
				'opsi_e' => $post['jawaban_e'],
				'file_a' => $_FILES['file_a']['name'],
				'file_b' => $_FILES['file_b']['name'],
				'file_c' => $_FILES['file_c']['name'],
				'file_d' => $_FILES['file_d']['name'],
				'file_e' => $_FILES['file_e']['name'],
				'jawaban' => $post['jawaban']
			];
			// print_r($soal_p);die;
			$this->db->insert('soal_m', $soal_p);
		}

	public function buatSoalEssay($post){
			// print_r([$post, $_FILES]);
			$soal_e = [
				'ujian_id' => $post['ujianId'],
				'dosen_id' => $post['id_dosen'],
				'matkul_id' => $post['matkul_dosen'],
				'soal_essay' => $post['soal_essay'],
				'file_essay' => $_FILES['file_essay']['name']
			];
			$this->db->insert('essay', $soal_e);
		// $this->db->insert('m_ujian', $ujian);
	}

	public function viewMsoal($id) {
		// $this->db->select('*');
		// $this->db->from('soal_m');
		// $this->db->join('essay','essay.ujian_id = soal_m.ujian_id');
		// $this->db->where('ujian_id'= $id);
		// $query = $this->db->get();
		$query = $this->db->query("SELECT * FROM soal_m where ujian_id = $id");
		if ($query) {
			$nul =$this->session->set_flashdata('nul', '<div class="alert alert-info alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Soal Belum di Buat !!
			</div>');
			return $query;
		}else{
			return $query;
		}

	}
	public function soalEssay($id) {
		// $this->db->select('*');
		// $this->db->from('soal_m');
		// $this->db->join('essay','essay.ujian_id = soal_m.ujian_id');
		// $this->db->where('ujian_id'= $id);
		// $query = $this->db->get();
		$query = $this->db->query("SELECT * FROM essay where ujian_id = $id");
		if ($query) {
			$nul =$this->session->set_flashdata('nul', '<div class="card-body" style="background-color: #aaaaaa">
                    <div class="">
                      <i class="fa fa-bullhorn"></i> No data available in table
                    </div>
                  </div>');
			return $query;
		}else{
			return $query;
		}

	}
	public function navSoal($id) {
		$this->db->where('id_soal', $id);
		return $this->db->get('soal_m');
	}
}
?>