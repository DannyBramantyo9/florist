<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bunga extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('Admin/login','refresh');
		}
		$this->load->model('m_bunga','bunga');
	}

	public function index()
	{
		$data['tampil_bunga']=$this->bunga->tampil();
		$data['kategori']=$this->bunga->data_kategori();
		$data['konten']="v_bunga";
		$data['judul']="Daftar bunga";
		$this->load->view('template', $data);
	}

	public function toko()
	{
		$data['tampil_bunga']=$this->bunga->tampil();
		$data['kategori']=$this->bunga->data_kategori();
		$data['konten']="toko";
		$data['judul']="DriCo-Tech";
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kode_bunga', 'kode_bunga', 'trim|required');
		$this->form_validation->set_rules('tipe_bunga', 'tipe_bunga', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		if($this->form_validation->run()==TRUE){
			// if ($this->input->post('tambah')) {
				if ($this->bunga->simpan_bunga('')) {
					$this->session->set_flashdata('pesan','Sukses Menambah bunga');
					redirect('bunga','refresh');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menambah bunga');
					redirect('bunga','refresh');
				}
		}
	}

	public function edit_bunga($id)
	{
		$data=$this->bunga->detail($id);
		echo json_encode($data);
	}
	public function bunga_update(){
		if ($this->input->post('edit')) {
			if ($this->bunga->edit_bunga()) {
				$this->session->set_flashdata('pesan','sukses update');
				redirect('bunga');
			}
			else {
				$this->session->set_flashdata('pesan','gagal update');
				redirect('bunga');
			}
		}
	}

	public function hapus($kode_bunga='')
	{
		if ($this->bunga->hapus_bunga($kode_bunga))
		{
			$this->session->set_flashdata('pesan', 'Sukses Hapus bunga');
			redirect('bunga','refresh');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Gagal Hapus bunga');
			redirect('bunga','refresh');
		}
	}
}
?>
