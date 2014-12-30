<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/home');
	}

	function generate(){
		$data['jml'] = $_POST['jml'];
		$this->load->view('home/hasil',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */