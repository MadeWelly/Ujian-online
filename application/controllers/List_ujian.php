<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class List_ujian extends CI_Controller {
	public function index(){
		$data = $this->coba_m->admin();
		print_r($data);die;
	}
}
