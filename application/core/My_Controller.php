<?php 

class My_Controller extends CI_Controller {
	
	public function __construct(){
	parent:: __construct();
	$this->load->database();
	$this->load->library(array('session','form_validation','email'));
	$this->load->helper(array('my','form','url','text')); 
	$this->load->model(array('user_m', 'ujian_m', 'soal_m', 'admin_m'));
	}

	public $parsedata = [
		'navbar' => 'inc/navbar',
		'sidebar' => 'inc/sidebar',
		'content' => '',
		'title' => ''
	];
}
function _remap($func)
 {
 
  $nama_controller = get_class($this);
         $this->load->library('breadcrumb');
  $this->breadcrumb->add(  ucwords(($nama_controller)), site_url($nama_controller));
  if (method_exists($this,$func))
  {
      $URI =& load_class('URI');
             if ($func!='index')
   $this->breadcrumb->add(  ucwords(($func)),site_url( $nama_controller.'/'.$func));  
   call_user_func_array(array(&$this, $func), array_slice($URI->rsegments, 2));
  }
  else
  {
      show_404(get_class($this).'/'.$func);
  }
   }

class Dashboard_Controller extends My_Controller {
	//check autentikas
	public function __construct() {
		parent::__construct();
		//jika userdata('logged_id') false maka redirect ke admin/login 
		if (! $this->session->userdata('nim')) redirect('login');
	}
}

// class Login_Controller extends My_Controller {
	
// 	public function __construct() {
// 		parent::__construct();
// 		//jika userdata('logged_id') true maka redirect ke admin/dashboard 
// 		if ($this->session->userdata('logged_id')) redirect('mahasiswa/dashboard');
// 	}
// }

class Login_Controller extends My_Controller {
	
	public function __construct() {
		parent::__construct();
		//jika userdata('logged_id') true maka redirect ke admin/dashboard 
		if (@$this->session->userdata('logged_mahasiswa')) {
			redirect('mahasiswa'); 
		}elseif (@$this->session->userdata('logged_dosen')) {
			redirect('dosen/dashboard');
		}elseif (@$this->session->userdata('logged_admin')) {
			redirect('admin');
		// }else{
		// 	$this->load->view('templates/login/login');
		}
	}
}

?>