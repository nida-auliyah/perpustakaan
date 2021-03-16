<?php


defined('BASEPATH') or exit('No direct script access allowed');

class PeminjamanUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model', 'peminjaman');
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index()
    {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->peminjaman->getAllPeminjaman();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/pinjaman', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Peminjaman';
        $data['kategori'] = $this->kategori->getAllKategori();
        $data['peminjaman'] = $this->peminjaman->getPeminjamanByID($id);
        $data['detail'] = $this->peminjaman->getDetailPeminjamanByID($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('template/footer');
    }

    public function konfirmasi($id)
    {
        $this->peminjaman->konfirmasiPeminjamanByID($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Peminjaman berhasil dikonfirmasi!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Peminjaman', 'refresh');
    }
}

/* End of file Peminjaman.php */
