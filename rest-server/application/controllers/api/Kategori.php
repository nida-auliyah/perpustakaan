<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Kategori extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori');
    }

    public function index_get()
    {
        $id = $this->get('id_kategori');
        if ($id === null) {
            $kategori = $this->kategori->getKategori();
        } else {
            $kategori = $this->kategori->getKategori($id);
        }

        if ($kategori) {
            $this->response([
                'status' => TRUE,
                'data' => $kategori
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->kategori->deleteKategori($id) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama_kategori' => $this->post('nama_kategori'),
            'detail_kategori' => $this->post('detail_kategori')
        ];

        if ($this->kategori->createKategori($data) > 0) {
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

    public function index_put()
    {
        $id = $this->put('id_kategori');

        $data = [
            'nama_kategori' => $this->put('nama_kategori'),
            'detail_kategori' => $this->put('detail_kategori')
        ];

        if ($this->kategori->updateKategori($data, $id) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
