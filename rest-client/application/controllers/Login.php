<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login Akun';
                $this->load->view('template/header_login', $data);
                $this->load->view('login/login');
                $this->load->view('template/footer_login');
            }
        } else {
            $this->proses_login();
        }
    }

    public function proses_login()
    {
        $this->load->model('User_model', 'user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->user->login($username, $password);

        if ($login) {
            $this->session->set_userdata($login);
            if ($login['level'] == 'admin') {
                redirect('admin');
                // echo "admin";
            } else {
                redirect('user');
                // echo "user";
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password yang anda masukkan salah!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    public function registrasi()
    {
        $this->load->model('User_model');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';
            $this->load->view('template/header_login', $data);
            $this->load->view('login/registrasi');
            $this->load->view('template/footer_login');
        } else {
            $this->User_model->registrasiDataUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda Telah Dibuat. Tunggu hingga akun anda diverifikasi</div>');
            redirect('login');
        }
    }
}


/* End of file Menu.php */
