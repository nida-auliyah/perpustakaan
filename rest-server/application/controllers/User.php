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

        $this->load->model('Menu_model', 'menu');
        $this->load->model('User_model', 'user');
        $this->load->model('Pemesanan_model', 'pemesanan');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->model('Resto_model', 'resto');
    }

    public function index()
    {
        $data['title'] = 'User Dashboard';
        $data['menu'] = $this->menu->getAllMenu();
        $data['resto'] = $this->resto->getAllResto();
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
        $data['resto'] = $this->resto->getAllResto();
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
        $data['resto'] = $this->resto->getAllResto();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->form_validation->set_rules('nama_user', 'Name', 'required');
        $this->form_validation->set_rules('telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
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
            redirect('user/profil');
        }
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan Saya';
        $data['pesanan'] = $this->pemesanan->getAllPemesanan();
        $data['resto'] = $this->resto->getAllResto();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/pesanan', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pemesanan';
        $data['pemesanan'] = $this->pemesanan->getPemesananByID($id);
        $data['detail_pesanan'] = $this->pemesanan->getDetailPemesananByID($id);
        $data['resto'] = $this->resto->getAllResto();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('template/footer');
    }

    public function resto($id)
    {
        $data['id'] = $id;
        $data['title'] = 'Menu Resto';
        $data['menu'] = $this->menu->getAllMenu();
        $data['resto'] = $this->resto->getAllResto();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/resto', $data);
        $this->load->view('template/footer');
    }

    public function kategori($id)
    {
        $data['id'] = $id;
        $data['title'] = 'Menu Kategori';
        $data['menu'] = $this->menu->getAllMenu();
        $data['resto'] = $this->resto->getAllResto();
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
        $data['menu'] = $this->menu->searchMenu($keyword);
        $data['resto'] = $this->resto->getAllResto();
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/pencarian', $data);
        $this->load->view('template/footer');
    }

    public function addToCart($id)
    {
        $menu = $this->menu->getMenuByID($id);

        $data = array(
            'id'      => $menu['id_menu'],
            'qty'     => 1,
            'price'   => $menu['harga'],
            'name'    => $menu['nama_menu'],
            'image' => $menu['foto']
        );

        $this->cart->insert($data);

        redirect('user', 'refresh');
    }

    public function updateCartMin($rowid)
    {
        $cart = $this->cart->get_item($rowid);

        $data = array(
            'rowid' => $rowid,
            'qty'   => $cart['qty'] - 1
        );

        $this->cart->update($data);

        redirect('user', 'refresh');
    }

    public function updateCartPlus($rowid)
    {
        $cart = $this->cart->get_item($rowid);

        $data = array(
            'rowid' => $rowid,
            'qty'   => $cart['qty'] + 1
        );

        $this->cart->update($data);

        redirect('user', 'refresh');
    }

    public function clearCart()
    {
        $this->cart->destroy();

        redirect('user', 'refresh');
    }

    public function checkout()
    {
        $result_id = $this->pemesanan->tambahDataPemesanan();

        foreach ($this->cart->contents() as $item) {
            $this->pemesanan->tambahDetail_pesanan($item, $result_id);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Pesanan kamu berhasil dibuat! Klik Pesanan untuk info lebih lanjut
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        $this->cart->destroy();
        redirect('user', 'refresh');
    }

    public function upload($id)
    {
        $foto = $_FILES['bukti_bayar']['name'];
        if (!$foto) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" roles="alert" >Kamu belum menginput bukti pembayaran
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user/detail/' . $id, 'refresh');
        } else {
            $this->pemesanan->uploadBuktiPembayaran($foto, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Bukti pembayaran berhasil diupload
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user/detail/' . $id, 'refresh');
        }
    }
}


/* End of file Menu.php */
