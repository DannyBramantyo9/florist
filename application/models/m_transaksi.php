<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	 public function simpan_cart_db()
	 {
	 	for($i=0; $i<count($this->cart->contents()); $i++){

				$stok = $this->db->where('kode_bunga', $this->input->post('kode_bunga')[$i])
								 ->get('bunga')
								 ->row()
								 ->stok;

				$qty = $this->input->post('qty')[$i];
				$sisa = $stok - $qty;
				$updatestok = array('stok' => $sisa);
				$this->db->where('kode_bunga', $this->input->post('kode_bunga')[$i])
						 ->update('bunga', $updatestok);
		}

	 	$object=array(
			'tanggal_beli' => date('Y-m-d'),
			'pembeli' => $this->input->post('pembeli'),
			'total_harga' => $this->input->post('total_harga'),
			'username' => $this->input->post('username')
	 	);
	 	$this->db->insert('transaksi', $object);
	 	$tm_nota=$this->db->order_by('no_transaksi', 'desc')
	 					  ->limit(1)
	 					  ->get('transaksi')
	 					  ->row();
	 	$hasil=array();
	 	for ($i=0;$i<count($this->input->post('rowid')) ;$i++) {
	 		$hasil[]=array(
	 		'no_transaksi' =>$tm_nota->no_transaksi,
	 		'kode_bunga' =>$this->input->post('kode_bunga')[$i],
	 		'jumlah'=>$this->input->post('qty')[$i]
	 		);
	 	}
	 	$proses=$this->db->insert_batch('nota', $hasil);
	 	if ($proses) {
	 		return $tm_nota->no_transaksi;
	 	} else{
	 		return 0;
	 	}
	 }
	 public function detail_nota($no_transaksi)
	 {
	 	return $this->db->where('no_transaksi', $no_transaksi)
	 				    ->get('transaksi')
	 				    ->row();
	 }
	 public function detail_pembelian($no_transaksi)
	 {
	 	return $this->db->where('no_transaksi', $no_transaksi)
	 					->join('bunga','bunga.kode_bunga=nota.kode_bunga')
	 					->join('kategori','kategori.id_kategori=bunga.id_kategori')
	 					->get('nota')
	 					->result();
	 }
	 public function check(){

	$cek=1;

		for($i=0;$i<count($this->cart->contents());$i++){

				$stok = $this->db->where('kode_bunga', $this->input->post('kode_bunga')[$i])
								->get('bunga')
								->row()
								->stok;

				$qty = $this->input->post('qty')[$i];

				$sisa= $stok - $qty;

				if($sisa < 0){
					$oke = 0;
				}else{
					$oke = 1;
				}
				$cek = $oke * $cek;
		}

		return $cek;

	}
	public function cek($kode_bunga){

		$cek_stok = $this->db->where('kode_bunga', $kode_bunga)->get('bunga')->row()->stok;

		if($cek_stok == 0 ){
			return 0;
		}else{
			return 1;
		}
	}


}
?>
