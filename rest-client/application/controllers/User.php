<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != 'user') {
            redirect('login', 'refresh');
        }

        $this->load->model('Buku_model', 'buku');
        $this->load->model('User_model', 'user');
        $this->load->model('Peminjaman_model', 'peminjaman');
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index()
    {
        $data['title'] = 'User Dashboard';
        $data['buku'] = $this->buku->getAllBuku();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function profil()
    {
        $data['title'] = 'Profil Saya';
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('template/footer');
    }

    public function edit_profil()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->user->getuserByID($this->session->userdata('id_user'));
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profil';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit_profil', $data);
            $this->load->view('template/footer');
        } else {
            $this->user->ubahDataUser($this->session->userdata('id_user'));
            $data = $this->user->getuserByID($this->session->userdata('id_user'));
            $this->session->set_userdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Data berhasil diedit!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('user/edit_profil');
        }
    }

    public function pinjaman()
    {
        $data['title'] = 'Pinjaman Saya';
        $data['pinjaman'] = $this->peminjaman->getAllPeminjaman();
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
        $data['detail_pinjaman'] = $this->peminjaman->getDetailPeminjamanByID($id);
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('template/footer');
    }

    public function kategori($id)
    {
        $data['id'] = $id;
        $data['title'] = 'Kategori';
        $data['buku'] = $this->buku->getBukuByKategori($id);
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/kategori', $data);
        $this->load->view('template/footer');
    }

    public function pencarian()
    {
        $keyword = $this->input->post('keyword');
        $data['title'] = 'Hasil Pencarian';
        $data['buku'] = $this->buku->searchBuku($keyword);
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/pencarian', $data);
        $this->load->view('template/footer');
    }

    public function addToCart($id)
    {
        $buku = $this->buku->getBukuByID($id);

        $data = array(
            'id' => $buku['id'],
            'name'    => $buku['judul'],
            'image' => $buku['foto'],
            'qty' => 1,
            'price' => 0
        );

        $this->cart->insert($data);
        // var_dump($this->cart->contents());
        redirect('user', 'refresh');
    }

    public function updateCart($rowid)
    {
        $cart = $this->cart->get_item($rowid);

        $data = array(
            'rowid' => $rowid,
            'qty'   => $cart['qty'] - 1
        );

        $this->cart->update($data);

        redirect('user', 'refresh');
    }

    public function pinjam()
    {
        $result_id = $this->peminjaman->tambahDataPeminjaman();

        foreach ($this->cart->contents() as $item) {
            $this->peminjaman->tambahDetail_pesanan($item, $result_id);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Pesanan kamu berhasil dibuat! Klik Peminjaman Saya untuk info lebih lanjut
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        $this->cart->destroy();
        redirect('user', 'refresh');
    }

    public function clearCart()
    {
        $this->cart->destroy();

        redirect('user', 'refresh');
    }
}


/* End of file Menu.php */
