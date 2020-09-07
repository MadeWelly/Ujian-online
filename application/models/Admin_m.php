<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

	public function get_mahasiswa_by_jurusan($jurusan_id) {
		$this->db->select('mahasiswa.*, prody.prody_name');
		$this->db->from('mahasiswa');
		$this->db->join('prody', 'mahasiswa.prody_id = prody.id_prody');
		$this->db->where('mahasiswa.prody_id', $jurusan_id);
		return $this->db->get()->result();
	}

	public function get_all_mahasiswa($status) {
		$this->db->select('mahasiswa.*, prody.prody_name');
		$this->db->from('mahasiswa');
		$this->db->join('prody', 'mahasiswa.prody_id = prody.id_prody');
		$this->db->where('status',$status);
		return $this->db->get()->result();	
	}

	public function get_all_dosen($status) {
		// return $this->db->query("SELECT * FROM dosen ORDER BY id_dosen DESC LIMIT 1");
		$this->db->select('dosen.*, matkul.matkul_name');
		$this->db->from('dosen');
		$this->db->join('matkul', 'dosen.matkul_id = matkul.id_matkul');
		$this->db->where('status',$status);
		return $this->db->get()->result();	
	}

	public function get_mahasiswabyid($id_mahasiswa) {
		return $this->db->get_where('mahasiswa', array('id_msw' => $id_mahasiswa))->row();
	}
	public function get_dosenbyid($id_dosen) {
		return $this->db->get_where('dosen', array('id_dosen' => $id_dosen))->row();
	}
	public function get_jurusan() {
		return $this->db->query("SELECT * FROM prody")->result();
	}
	public function get_semester() {
		return $this->db->query("SELECT * FROM class")->result();
	}
	public function get_matkul() {
		return $this->db->query("SELECT * FROM matkul");
	}
	public function get_matkulDosen($matkul_dosen) {
		return $this->db->get_where('matkul', array('id_matkul' => $matkul_dosen))->row();
	}

	public function insert_matkul($post) {
		$matkul = [
			'matkul_name' => $post['matkul'],
			'prody_id' => $post['jurusan'],
			'class_id' => $post['semester']
		];

		
		// print_r($matkul);die;
		$this->db->insert('matkul', $matkul);
	}

	public function insert_dosen($post) {
		$id = $this->db->query("SELECT * FROM matkul ORDER BY id_matkul DESC LIMIT 1")->row();
		// print_r($data->id_matkul);die;
		$hash_password = hash_password($post['password']);
		$dosen = [
			'nidn' => $post['nip'],
			'dosen_name' => $post['nama'],
			'password' => $hash_password,
			'email' => $post['email'],	
			'matkul_id' => $id->id_matkul,
			'status' => $post['status']
		];
		// print_r($dosen);die;

		$this->db->insert('dosen', $dosen);	
	}

	public function update_matkul($post) {
		$matkul = [
			'matkul_name' => $post['matkul'],
			'class_id' => $post['semester'],
			'prody_id' => $post['jurusan']
		];
		$where = [
			'id_matkul' => $post['matkul_id']
		];
		$this->db->update('matkul', $matkul, $where);
	}

	public function update_dosen($post) {
		$data = $this->db->query("SELECT * FROM matkul ORDER BY id_matkul DESC LIMIT 1")->row();
		// print_r($data->id_matkul);die;
		$dosen = [
			'nidn' => $post['nip'],
			'dosen_name' => $post['nama'],
			'email' => $post['email'],	
			'password' => $post['password'],
			'matkul_id' => $post['matkul_id'],
			'status' => $post['status']
		];
		$where = [
			'id_dosen' => $post['id_dosen']
		];

		$this->db->update('dosen', $dosen, $where);	
	}

	public function hapus_dosen($id_dosen) {
		$this->db->delete('dosen', array('id_dosen' => $id_dosen));
	}

	public function m_utsDosen($ujian) {
		$this->db->select('*');
		$this->db->from('m_ujian');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->join('dosen', 'dosen.id_dosen = m_ujian.dosen_id');
		$this->db->where('ujian_name',$ujian);
		$this->db->order_by('id_ujian', 'DESC');
		return $this->db->get();
	}

	public function insert_mahasiswa($post) {
		$this->db->insert('mahasiswa', $post);
	}

	public function update_mahasiswa($post) {
		$mhs = [
			'msw_name' => $post['nama'],
			'nim' => $post['nim'],
			'email' => $post['email'],
			'password' => $post['password'],
			'class_id' => $post['semester'],
			'prody_id' => $post['jurusan'],
			'status' => $post['status']
		];
		$where = [
			'id_msw' => $post['id_mahasiswa']
		];
		$this->db->update('mahasiswa', $mhs, $where);
	}

	public function hapus_mahasiswa($id_mahasiswa,$redirect) {
		$query = $this->db->delete('mahasiswa', array('id_mahasiswa' => $id_mahasiswa));
		if ($query) {
			$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Data Mahasiswa berhasil dihapus !!
  </div>');

			redirect($redirect);
		}
	}

		public function get_hasil_ujian($id_mahasiswa) {
		$this->db->select('*');
		$this->db->from('m_ujian');
		$this->db->join('hasil_ujian', 'hasil_ujian.ujian_id = m_ujian.id_ujian');
		$this->db->join('mahasiswa', 'mahasiswa.id_msw = hasil_ujian.msw_id');
		$this->db->join('dosen', 'dosen.id_dosen = m_ujian.dosen_id');
		$this->db->join('matkul', 'matkul.id_matkul = m_ujian.matkul_id');
		$this->db->join('prody', 'prody.id_prody = mahasiswa.prody_id');
		$this->db->join('class', 'class.id_class = mahasiswa.class_id');
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		// $this->db->where('hasil_ujian.semester',$smstr);
		return $this->db->get();
	}

	public function smstr1($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr2($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr3($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr4($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr5($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr6($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr7($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
	public function smstr8($id_mahasiswa,$smstr) {
		$this->db->where('hasil_ujian.msw_id',$id_mahasiswa);
		$this->db->where('hasil_ujian.class_id',$smstr);
		return $this->admin_m->get_hasil_ujian($id_mahasiswa);
	}
}

 ?>