<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout_cms extends CI_Controller{
	
	public function logout_cms(){
		parent::__construct();
		
	}
	
	public function index(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('level');
  		redirect('login_cms', 'refresh');
	}
}