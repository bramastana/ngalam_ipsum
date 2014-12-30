<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_cms extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(isLogin()){
			redirect('home_cms');
		}
	}

	public function index()
	{
		$this->form_validation->set_error_delimiters("<div class=\"error\">", "</div>");
		$this->form_validation->set_rules('username', 'username', 'trim|strip_tags|required|alpha_numeric|alpha_dash');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == TRUE){
			loadModel("login_cms/login_cms_model");
			
			$optionWhere = "where username='".escapeStr(postInput("username"))."' AND password=md5('".escapeStr(postInput("password"))."')";
			
			$getData = $this->login_cms_model->getData($optionWhere);
			if($getData->num_rows() > 0){
				$getData = $getData->result_array();
				$getData = $getData[0];
				$arrayUserData = array(
					"id" 		=> $getData["id"],
					"username" 		=> $getData["username"],
					"password" 		=> $getData["password"],
					"level" 		=> $getData["tingkat"]
				);
				setSession($arrayUserData);
				
				redirect('/home_cms/', 'refresh');
			}else{
				$this->session->set_flashdata('message', 'USERNAME ATAU PASSWORD TIDAK SESUAI');//Kirim message ke form login
            	redirect('login_cms');
			}
		}else{
			goLogin();
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */