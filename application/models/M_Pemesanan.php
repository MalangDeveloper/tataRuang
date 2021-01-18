<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pemesanan extends CI_Model {


	function getDataPemesanan()
	{
		$id_users=$this->session->userdata['id_users'];
		$query = $this->db->query("SELECT ruang.id_ruang, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, ins.id_instruktur, ins.nama_instruktur, kursus.id_kursus, kursus.nama_kursus, fakultas.id_fakultas, fakultas.nama_fakultas, staff.nama, pesan.* from pemesanan as pesan JOIN ruang as ruang ON pesan.id_ruang = ruang.id_ruang JOIN instruktur as ins ON pesan.id_instruktur = ins.id_instruktur JOIN kursus as kursus ON pesan.id_kursus = kursus.id_kursus JOIN fakultas as fakultas ON pesan.id_fakultas = fakultas.id_fakultas JOIN users as staff ON pesan.id_user = staff.id_users");
		return $query->result();
	}

	public function ambilFakultas()
	{
		$query = $this->db->query("SELECT * FROM fakultas");
		return $query->result();
	}

	public function ambilKursus()
	{
		$query = $this->db->query("SELECT * FROM kursus");
		return $query->result();
	}

	public function ambilInstruktur()
	{
		$query = $this->db->query("SELECT * FROM instruktur");
		return $query->result();
	}

	public function ambilRuang()
	{
		$query = $this->db->query("SELECT * FROM ruang");
		return $query->result();
	}

	public function updatePemesanan($id){
		$data = array(
			'id_fakultas'=>$this->input->post('id_fakultas'),
			'id_kursus'=>$this->input->post('kursus'),
			'id_instruktur'=>$this->input->post('instruktur'),
			'id_ruang'=>$this->input->post('ruang'),
			'tanggal'=>$this->input->post('tanggal'),
			'jam_awal'=>$this->input->post('jam_awal'),
			'jam_akhir'=>$this->input->post('jam_akhir')
		);
		$data = $this->input->post();
		$this->db->where('id_pemesanan',$id);
		if($this->db->update("pemesanan",$data)){
			return "Berhasil";
		}
	}

	public function simpanPemesanan(){
		// $query = $this->db->select('*')
  //                     ->from('ruang')
  //                     ->get();
		$object=array
		(
			'nama_ruang'=>$this->input->post('nama_ruang'),
			'nama_gedung'=>$this->input->post('nama_gedung'),
			'tanggal'=>$this->input->post('tanggal'),
			'jam_awal'=>$this->input->post('jam_awal'),
			'jam_akhir'=>$this->input->post('jam_akhir')
			'id_fakultas'=>$this->input->post('id_fakultas'),
			'id_kursus'=>$this->input->post('kursus'),
			'id_instruktur'=>$this->input->post('instruktur'),			
		);
		$this->db->insert('pemesanan',$object);
	}
	
	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}


	public function getUserId()
	{
		$id_users=$this->session->userdata['id_users'];
		$level=$this->session->userdata['level'];
		$query = $this->db->query("Select * from users where id_users='$id_users' and level='$level'");
		return $query->result();
	}

    function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function view_ruang(){ 
		$query = $this->db->query("SELECT * FROM ruang");
		return $query->result();
	}

	public function view_komputer(){ 
		$query = $this->db->query("SELECT ruang.nama_ruang, kom.* FROM komputer as kom JOIN ruang as ruang ON kom.id_ruang = ruang.id_ruang");
		return $query->result();
	}
}