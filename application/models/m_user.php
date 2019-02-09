<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {
    public function masuk(){
        $username=$this->input->post('username');
        $nama_user=$this->input->post('nama_user');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $email=$this->input->post('email');
        $divisi_bagian=$this->input->post('divisi_bagian');
        $password=$this->input->post('password');
        $datasimpan=array(
            'username'=>$username,
            'nama_user'=>$nama_user,
            'tgl_lahir'=>$tgl_lahir,
            'divisi_bagian'=>$divisi_bagian,            
            'email'=>$email,           
            'password'=>$password
        );
        $this->db->insert('user',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_login(){
        return $this->db->where('username',$this->input->post('username'))
            ->where('password',$this->input->post('password'))
            ->get('user');
    }
}
?>