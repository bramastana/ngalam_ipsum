<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_kata extends CI_Controller {

	public function index()
	{
		$data['menu2'] = 'sistem parameter';
		$data['menu3'] = 'Data Kata';

		$data['link2'] = null;
		$data['link3'] = base_url().'data_kata/';

		$data['title'] = "data kata";
		$data['content'] = "data_kata/data_kata";
		$this->load->view('skin-cms/atas',$data);
		$this->load->view('skin-cms/bawah',$data);
	}

	function tambah_data_kata(){
		$kata = strtolower($_POST['data_kata']);
		$sql = "SELECT * FROM data_kata WHERE kata='$kata'";
		$rows = $this->db->query($sql);
		$nums = $rows->num_rows();

		if($nums>0){
			echo "Kata Tersebut Sudah Ada";
		}else{
			$data = array(
						"kata" => $kata,
						"status" => 'ACTIVE'
					);
			if($this->db->insert('data_kata',$data)){
				echo "Terimakasih";
			}else{
				echo "Gagal Memasukkan Data";
			}
		}
	}

	function saran_data_kata(){
		$kata = strtolower($_POST['data_kata']);
		$sql = "SELECT * FROM data_kata WHERE kata='$kata'";
		$rows = $this->db->query($sql);
		$nums = $rows->num_rows();

		if($nums>0){
			echo "Kata Tersebut Sudah Ada";
		}else{
			$data = array(
						"kata" => $kata,
						"status" => 'NOT_ACTIVE'
					);
			if($this->db->insert('data_kata',$data)){
				echo "Terimakasih";
			}else{
				echo "Gagal Memasukkan Data";
			}
		}
	}	

	function tabel(){
		$this->load->view('data_kata/tabel');
	}

	function popHapus($id){
		$data['id'] = $id;
		$query = $this->db->query("SELECT * FROM data_kata WHERE id='".$id."'");
		$data['tmp'] = $query->result_array();
		$data['tmp'] = $data['tmp'][0];
		$this->load->view('data_kata/popHapus',$data);
	}

	function hapusProses(){
		$this->db->where('id',$_POST['id']);
		if($this->db->delete('data_kata')){
			$success = true;
		}else{
			$success = false;
		}
		echo json_encode(array("success"=>$success));
	}

	function dataEdit($id){
		$data['id'] = $id;
		$query = $this->db->query("SELECT * FROM data_kata WHERE id='".$id."'");
		$data['tmp'] = $query->result_array();
		$data['tmp'] = $data['tmp'][0];
		$this->load->view('data_kata/dataEdit',$data);
	}

	function ubah_data_kata(){
		$data = array(
					"kata" => $_POST['data_kata']
				);
		$this->db->where('id',$_POST['id']);
		if($this->db->update('data_kata',$data)){
			echo "success";
		}else{
			 echo "gagal";
		}
	}
}
