<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Peminjaman extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model', 'peminjaman');
    }

    public function index_get()
    {

        $id = $this->get('id_peminjaman');
        if ($id === null) {
            $peminjaman = $this->peminjaman->getPeminjaman();
        } else {
            $peminjaman = $this->peminjaman->getPeminjaman($id);
        }

        if ($peminjaman) {
            $this->response([
                'status' => TRUE,
                'data' => $peminjaman
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function index_post()
    {
        $data = [
            'id_user' => $this->post('id_user'),
            'tanggal_peminjaman' => $this->post('tanggal_peminjaman'),
            'tanggal_pengembalian' => $this->post('tanggal_pengembalian'),
            'status_peminjaman' => 0
        ];

        $id = $this->peminjaman->createPeminjaman($data);

        if ($id != null) {
            $this->response([
                'status' => TRUE,
                'message' => 'added',
                'id' => $id
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id_peminjaman');

        if ($this->peminjaman->konfirmasiPengembalian($id) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'confirmed'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
