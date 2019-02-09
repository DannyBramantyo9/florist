<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bunga extends CI_Model {
    public function tampil()
    {
        $tm_bunga=$this->db
                      ->join('kategori','kategori.id_kategori=bunga.id_kategori')
                      ->get('bunga')
                      ->result();
        return $tm_bunga;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_bunga($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'kode_bunga' => $this->input->post('kode_bunga'),
                'tipe_bunga' => $this->input->post('tipe_bunga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
             );
        }
        else
        {
            $object = array(
                'kode_bunga' => $this->input->post('kode_bunga'),
                'tipe_bunga' => $this->input->post('tipe_bunga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
             );
        }
        return $this->db->insert('bunga', $object);
    }

    public function detail($a)
    {
        $tm_bunga=$this->db
                      ->join('kategori', 'kategori.id_kategori=bunga.id_kategori')
                      ->where('kode_bunga', $a)
                      ->get('bunga')
                      ->row();
        return $tm_bunga;

    }
    public function edit_bunga()
    {
        $data = array(
                'kode_bunga' => $this->input->post('kode_bunga'),
                'tipe_bunga' => $this->input->post('tipe_bunga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
        );
        return $this->db->where('kode_bunga', $this->input->post('kode_bunga_lama'))
                        ->update('bunga', $data);
    }

    public function hapus_bunga($kode_bunga='')
    {
        return $this->db->where('kode_bunga', $kode_bunga)
                        ->delete('bunga');
    }
}
?>
