<?php

use GuzzleHttp\Client;


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/tugas_projek/rest-server/api/'
        ]);
    }

    public function login($username, $password)
    {
        $response = $this->_client->request('GET', 'User', [
            'query' => [
                'username' => $username,
                'password' => $password,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function registrasiDataUser()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password1'),
            'level' => 'user',
            'api_key' => 'zxcvbnm'
        ];

        // var_dump($data);

        $response = $this->_client->request('POST', 'User', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getAllUser()
    {
        $response = $this->_client->request('GET', 'User', [
            'query' => [
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getUserByID($id)
    {
        $response = $this->_client->request('GET', 'User', [
            'query' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    // public function verifikasiuserByID($id)
    // {
    //     $response = $this->_client->request('PUT', 'User', [
    //         'form_params' => ['id' => $id]
    //     ]);

    //     $result = json_decode($response->getBody()->getContents(), true);

    //     return $result;
    // }

    public function ubahDataUser($id)
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "telepon" => $this->input->post('telepon'),
            "alamat" => $this->input->post('alamat'),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "level" => "user",
            "id_user" => $id,
            'api_key' => 'zxcvbnm'
        ];
        // var_dump($data);
        $response = $this->_client->request('PUT', 'User', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}

/* End of file User_mdodel.php */
