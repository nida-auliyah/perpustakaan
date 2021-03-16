<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Buku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku');
    }

    public function index_get()
    {
        $id = $this->get('id');
        $id_kategori = $this->get('id_kategori');
        $keyword = $this->get('keyword');
        if ($id === null && $keyword === null && $id_kategori === null) {
            $buku = $this->buku->getBuku();
        } else if ($id && $keyword === null && $id_kategori === null) {
            $buku = $this->buku->getBuku($id);
        } else if ($id === null && $keyword && $id_kategori === null) {
            $buku = $this->buku->searchBuku($keyword);
        } else if ($id === null && $keyword === null && $id_kategori) {
            $buku = $this->buku->getBukuByKategori($id_kategori);
        }

        if ($buku) {
            $this->response([
                'status' => TRUE,
                'data' => $buku
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
            if ($this->buku->deleteBuku($id) > 0) {
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
            'id_kategori' => $this->post('id_kategori'),
            'judul' => $this->post('judul'),
            'pengarang' => $this->post('pengarang'),
            'penerbit' => $this->post('penerbit'),
            'tahun_terbit' => $this->post('tahun_terbit'),
            'isi' => $this->post('isi'),
            'foto' => $this->post('foto'),
            'deskripsi' => $this->post('deskripsi')
        ];

        if ($this->buku->createBuku($data) > 0) {
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
        $id = $this->put('id');

        $data = [
            'id' => $id,
            'id_kategori' => $this->put('id_kategori'),
            'judul' => $this->put('judul'),
            'pengarang' => $this->put('pengarang'),
            'penerbit' => $this->put('penerbit'),
            'tahun_terbit' => $this->put('tahun_terbit'),
            'isi' => $this->put('isi'),
            'foto' => $this->put('foto'),
            'deskripsi' => $this->put('deskripsi')
        ];

        if ($this->buku->updateBuku($data, $id) > 0) {
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
