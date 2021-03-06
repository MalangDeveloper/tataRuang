<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Pemesanan');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

    public function ubahPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$data['pemesanan'] = $this->M_Pemesanan->getdataID($where,'pemesanan')->result();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='editPemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanPemesanan()
	{
		$jam1 = strtotime($_POST["jam_awal"]);
		$jam2 = strtotime($_POST["jam_akhir"]);

		$this->db->select('*');
    $this->db->from('pemesanan');
		$this->db->where('id_ruang', $this->input->post('id_ruang') );
		$this->db->where('tanggal', $this->input->post('tanggal') );

		$query = $this->db->get();
		$jumlah = 0;
		
		if ( $query->num_rows() > 0 )
    {
				$row = $query->result_array();
				$count = $query->num_rows();

				print_r("<br>");
				for ($i=0; $i < $count ; $i++) { 
					$jam_mulai_cek = strtotime($row[$i]['jam_awal']); 
					$jam_akhir_cek= strtotime($row[$i]['jam_akhir']);

					if (($jam_mulai_cek <= $jam1 && $jam1 >= $jam_akhir_cek && $jam_mulai_cek <= $jam2 && $jam2 >= $jam_akhir_cek)
							||	($jam_mulai_cek >= $jam1 && $jam1 <= $jam_akhir_cek && $jam_mulai_cek >= $jam2 && $jam2 <= $jam_akhir_cek))
					{
						// echo ="dapat Ditambahkan";	
					}
					else {
						$jumlah++;
						// echo "gagal Ditambahkan";
						$this->session->set_flashdata('error','Pemesanan Gagal Ditambah <br> Silakan Ganti Jam atau Tempat Penggunaan Ruang');
						redirect('Pemesanan/tambahPemesanan','refresh');
						return;
					}
					
				}
				if($jumlah == 0){
					$this->M_Pemesanan->simpanPemesanan();
					// print(" DAPAT DITAMBAH");
					$this->session->set_flashdata('success','Pemesanan Berhasil Ditambah');
					redirect('Pemesanan','refresh');
				}
		}
		else{
			$this->M_Pemesanan->simpanPemesanan();
			// print("bisa ditambah ");
			$this->session->set_flashdata('success','Pemesanan Berhasil Ditambah');
			redirect('Pemesanan','refresh');
			return;
		}

		$this->session->set_flashdata('success','Ruang Berhasil Ditambah');		
	}

	public function tambahPemesanan()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='addPemesanan.php';
		$this->load->view('Admin/menu', $data);
	}

	public function detailPemesanan($id)
	{
		
		$data['detailPemesanan']=$this->M_Pemesanan->getDataPemesananDetailPemesanan($id);		
		$data['page']='detailPemesanan.php';
		$this->load->view('admin/menu',$data);
	}

	public function detailPemesananStaff($id)
	{
		
		$data['detailPemesanan']=$this->M_Pemesanan->getDataPemesananDetailPemesanan($id);		
		$data['page']='detailPemesanan.php';
		$this->load->view('staff/menu',$data);
	}

}
?>