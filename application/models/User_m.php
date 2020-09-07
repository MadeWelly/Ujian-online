<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	// public function get_user_by_email($email) {
	// 	return $this->db->get_where('users', array('email' => $email))->row();
	// }
	// public function get_mahasiswa_by_userid($userid) {
	// 	return $this->db->get_where('mahasiswa', array('users_id' => $userid))->row();
	// }

	public function getAdmin($noinduk) {
		$this->db->where('login_id', $noinduk);
		$query = $this->db->get('admin');
		return $query->row();
		
		// return $this->db->get_where('users', array('email' => $email))->row();
	}
	public function getDosen($noinduk) {
		$this->db->where('nidn', $noinduk);
		return $this->db->get('dosen')->row();
	}
	public function getMahasiswa($noinduk) {
		$this->db->where('nim', $noinduk);
		return $this->db->get('mahasiswa')->row();
	}



	// public function get_mahasiswa_by_userid($userid) {
	// 	return $this->db->get_where('mahasiswa', array('users_id' => $userid))->row();
	// }
}

?>