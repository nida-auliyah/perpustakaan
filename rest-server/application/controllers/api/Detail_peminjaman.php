<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Detail_peminjaman extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_peminjaman_model', 'detail');
    }

    public function index_get()
    {
        $id = $this->get('id_peminjaman');
        if ($id === null) {
            $detail = $this->detail->getDetail_peminjaman();
        } else {
            $detail = $this->detail->getDetail_peminjaman($id);
        }

        if ($detail) {
            $this->response([
                'status' => TRUE,
                'data' => $detail
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'id_peminjaman' => $this->post('id_peminjaman'),
            'id_buku' => $this->post('id_buku')
        ];

        if ($this->detail->createDetail_peminjaman($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'added'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
