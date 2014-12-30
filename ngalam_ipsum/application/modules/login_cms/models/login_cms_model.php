<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_cms_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData($options=null){
		$sql = "select  
				* 
				from pengurus
				$options
				";
		$query = $this->db->query($sql);
		return $query;
	}
     
}