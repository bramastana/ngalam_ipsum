<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_cms extends CI_Controller {

	public function index()
	{
		$data['menu2'] = null;
		$data['menu3'] = null;

		$data['link2'] = null;
		$data['link3'] = null;

		$data['title'] = "home_cms";
		$data['content'] = "home_cms/home_cms";
		$this->load->view('skin-cms/atas',$data);
		$this->load->view('skin-cms/bawah',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */