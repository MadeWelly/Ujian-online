<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba_m extends CI_Model {
	public function admin() {
		// $this->db->select('*');
		// return $this->get_where('jurusan')->result();
		return $this->db->query("SELECT * FROM admin")->result();
	}
}
	?>
