<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = 'Data Anggota';
        $data['user'] = $this->user->getAllUser();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/anggota', $data);
        $this->load->view('template/footer');
    }

    public function verifikasi($id)
    {
        $this->user->verifikasiuserByID($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Pelanggan berhasil diverifikasi!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Pelanggan', 'refresh');
    }
}


/* End of file User.php */
