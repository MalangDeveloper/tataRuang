<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('M_Welcome');
	}

	public function index()
	{
		$data['pesan'] = $this->M_Welcome->getDataPemesanan();
		$this->load->view('home',$data);
	}

	public function Konsultasi()
	{
		$data['gejala']=$this->M_Welcome->getDataGejala();
		$this->load->view('konsultasi', $data);
	}

	public function Penyakit()
	{
		$data['penyakit']=$this->M_Welcome->getDataPenyakit();
		$this->load->view('penyakit', $data);
	}

	function aksi_login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$cek=$this->M_Welcome->cek_login($email,$password);
		$tes=count((array)$cek);
		if ($tes > 0 ) 
		{
			$data_login=$this->M_Welcome->cek_login($email,$password);
			$level=$data_login->level;
			$nama=$data_login->nama;
			$id_fakultas=$data_login->id_fakultas;
			$id=$data_login->id_users;
			$created_at=$data_login->created_at;
			$updated_at=$data_login->updated_at;
			$email=$data_login->email;
			$data=array('level' => $level,
				'nama' => $nama,
				'id_fakultas' => $id_fakultas,
				'id_users' => $id,
				'created_at' => $created_at,
				'updated_at' => $updated_at,
				'email' => $email);
			$this->session->set_userdata($data);
			
			if ($level=='Admin')
			{
				redirect('Home');
			}
			elseif ($level=='Staf')
			{
				redirect('Staff');
			}			
		}
		else
		{
			echo "<script>alert('email atau Password salah!!');history.go(-1);</script>";
		}
	}

	function aksi_login_mhs()
	{
		$nim=$this->input->post('nim');
		$password=$this->input->post('password');
		$cek=$this->M_Welcome->cek_login_mhs($nim,$password);
		$tes=count((array)$cek);
		if ($tes > 0 ) 
		{
			$data_login=$this->M_Welcome->cek_login_mhs($nim,$password);
			$nama_mahasiswa=$data_login->nama_mahasiswa;
			$id_fakultas=$data_login->id_fakultas;
			$tgl_lahir=$data_login->tgl_lahir;
			$id_mahasiswa=$data_login->id_mahasiswa;
			$nim=$data_login->nim;			
			$data=array(
				'nama_mahasiswa' => $nama_mahasiswa,
				'id_fakultas' => $id_fakultas,
				'tgl_lahir' => $tgl_lahir,
				'id_mahasiswa' => $id_mahasiswa,
				'nim' => $nim);
			$this->session->set_userdata($data);			
			redirect('mhs');	
		}
		else
		{
			echo "<script>alert('NIM atau Password salah!!');history.go(-1);</script>";
		}
	}

	function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect(base_url('Welcome'));
	}
}
