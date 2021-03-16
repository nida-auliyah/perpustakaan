<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index_get()
    {
        $id_user = $this->get('id_user');
        $username = $this->get('username');
        $password = $this->get('password');

        if ($id_user === null && $username === null && $password === null) {
            $user = $this->user->getUser();
        } else if ($username && $password) {
            $user = $this->user->getUserLogin($username, $password);
        } else {
            $user = $this->user->getUser($id_user);
        }

        if ($user) {
            $this->response([
                'status' => TRUE,
                'data' => $user
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
            'nama' => $this->post('nama'),
            'telepon' => $this->post('telepon'),
            'alamat' => $this->post('alamat'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'level' => 'user'
        ];

        if ($this->user->createUser($data) > 0) {
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
        $id_user = $this->put('id_user');

        $data = [
            'nama' => $this->put('nama'),
            'telepon' => $this->put('telepon'),
            'alamat' => $this->put('alamat'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'level' => 'user'
        ];

        if ($this->user->updateUser($data, $id_user) > 0) {
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
