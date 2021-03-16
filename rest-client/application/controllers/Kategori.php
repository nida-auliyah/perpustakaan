<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index()
    {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama', 'required');
        $this->form_validation->set_rules('detail_kategori', 'detail', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Kategori';
            $data['kategori'] = $this->kategori->getAllKategori();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->kategori->tambahDataKategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('kategori', 'refresh');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama', 'required');
        $this->form_validation->set_rules('detail_kategori', 'detail', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Kategori';
            $data['kategori'] = $this->kategori->getAllKategori();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->kategori->ubahDataKategori($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Data berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('kategori', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->kategori->hapusDataKategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Kategori berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('kategori', 'refresh');
    }
}


/* End of file Kategori.php */
