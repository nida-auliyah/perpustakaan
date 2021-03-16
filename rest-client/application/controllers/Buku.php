<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'Buku');
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index()
    {
        $data['title'] = 'Data Buku';
        $data['buku'] = $this->Buku->getAllBuku();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/buku', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_kategori', 'kategori', 'required');
        $this->form_validation->set_rules('judul', 'Nama', 'required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun terbit', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Buku';
            $data['buku'] = $this->Buku->getAllBuku();
            $data['kategori'] = $this->kategori->getAllKategori();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/Buku', $data);
            $this->load->view('template/footer');
        } else {
            $this->Buku->tambahDataBuku();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Buku', 'refresh');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'required');
        $this->form_validation->set_rules('judul', 'Nama', 'required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun terbit', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Buku';
            $data['Buku'] = $this->Buku->getAllBuku();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/Buku', $data);
            $this->load->view('template/footer');
        } else {
            $this->Buku->ubahDataBuku($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Data berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Buku', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->Buku->hapusDataBuku($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Buku berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Buku', 'refresh');
    }
}


/* End of file Buku.php */
