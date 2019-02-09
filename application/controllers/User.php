<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index(){
        $data['konten']="login";
        $data['judul']="Login DriCo-Tech";
        $this->load->view('login',$data);

    }

    public function register(){
       $data['konten']="login";
        $data['judul']="Login DriCo-Tech";
        $this->load->view('register',$data);
    }
    public function simpan(){
        if($this->input->post('daftar')){
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('nama_user','Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('email','email', 'trim|required');
            $this->form_validation->set_rules('divisi_bagian','divisi_bagian', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');

            if($this->form_validation->run() ==TRUE){
                $this->load->model('m_user');
                if($this->m_user->masuk()==TRUE){
                    $this->session->set_flashdata('pesan','Sukses Mendaftarkan Diri');
                    redirect('user','refresh');
                }else{
                    $this->session->set_flashdata('pesan','Gagal Mendaftarkan Diri');
                    redirect('user/register','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('user/register','refresh');
            }

        }
    }
    public function proses_login(){
        if($this->input->post('login')){
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
                 $this->load->model('m_user');
                if($this->m_user->get_login()->num_rows()>0){
                    $data=$this->m_user->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'username'=>$data->username,
                        'tgl_lahir'=>$data->tgl_lahir,
                        'divisi_bagian'=>$data->divisi_bagian,
                        'email'=>$data->email,
                        'password'=>$data->password,
                    );
                    $this->session->set_userdata($array);
                    redirect('bunga','refresh');
                }else{
                    $this->session->set_flashdata('pesan','Username atau Password salah');
                    redirect('user','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('user','refresh');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user','refresh');
    }
}
?>
