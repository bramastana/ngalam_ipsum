<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_web extends CI_Controller {

	public function index()
	{
		$data['menu2'] = 'menejemen aplikasi';
		$data['menu3'] = 'menu web';

		$data['link2'] = null;
		$data['link3'] = base_url().'menu_web/';

		$data['title'] = "menu web";
		$data['content'] = "menu_web/menu_web";
		$this->load->view('skin-cms/atas',$data);
		$this->load->view('skin-cms/bawah',$data);
	}

	function tambah_obat(){
		$kadaluarsa = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
		$data = array(
					"nama_obat" => $_POST['nama_obat'],
					"jenis" => $_POST['jenis'],
					"kadaluarsa" => $kadaluarsa,
					"jumlah" => $_POST['jumlah'],
					"flag" => "ACTIVE",
					"created_date" => mysqldatetime()
				);
		if($this->db->insert('obat',$data)){
			echo "success";
		}else{
			 echo "gagal";
		}
	}

	function tabel(){
		$this->load->view('menu_web/tabel');
	}

	function popHapus($id){
		$data['id'] = $id;
		$query = $this->db->query("SELECT * FROM obat WHERE id='".$id."'");
		$data['tmp'] = $query->result_array();
		$data['tmp'] = $data['tmp'][0];
		$this->load->view('menu_web/popHapus',$data);
	}

	function hapusProses(){
		$this->db->where('id',$_POST['id']);
		if($this->db->delete('obat')){
			$success = true;
		}else{
			$success = false;
		}
		echo json_encode(array("success"=>$success));
	}

	function dataEdit($id){
		$data['id'] = $id;
		$query = $this->db->query("SELECT * FROM obat WHERE id='".$id."'");
		$data['tmp'] = $query->result_array();
		$data['tmp'] = $data['tmp'][0];
		$this->load->view('menu_web/dataEdit',$data);
	}

	function ubah_obat(){
		$kadaluarsa = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
		$data = array(
					"nama_obat" => $_POST['nama_obat'],
					"jenis" => $_POST['jenis'],
					"kadaluarsa" => $kadaluarsa,
					"jumlah" => $_POST['jumlah']
				);
		$this->db->where('id',$_POST['id']);
		if($this->db->update('obat',$data)){
			echo "success";
		}else{
			 echo "gagal";
		}
	}
}
