<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Ruang');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['ruang']=$this->M_Ruang->getDataRuang();
		$data['page']='Ruang.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Ruang setelah menambah data baru
	function simpanRuang(){
		$this->M_Ruang->inputRuang();
		$this->session->set_flashdata('success','Ruang Berhasil Ditambah');
		redirect('Ruang','refresh');
    }

	// proses update data Ruang
	public function ubahRuang($id){
		$where = array('id_ruang' => $id);
		$data['ruang'] = $this->M_Ruang->getDataID($where,'ruang')->result();
		$data['page']='ubahRuang.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahRuang($id)
	{
		$this->M_Ruang->updateRuang($id);
		$this->session->set_flashdata('success','Ruang Berhasil Diubah');
		redirect('Ruang','refresh');
	}

	function hapusRuang($id){
		$where = array('id_ruang' => $id);
		$this->M_Ruang->hapus($where,'Ruang');
		$this->session->set_flashdata('success',"Data Ruang Berhasil Dihapus");
		redirect('Ruang');
	}
}
?>