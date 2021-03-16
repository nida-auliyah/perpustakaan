<?php

use GuzzleHttp\Client;


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/tugas_projek/rest-server/api/'
        ]);
    }

    public function getAllKategori()
    {
        $response = $this->_client->request('GET', 'Kategori', [
            'query' => [
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getKategoriByID($id)
    {
        $response = $this->_client->request('GET', 'Kategori', [
            'query' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function hapusDataKategori($id)
    {
        $response = $this->_client->request('DELETE', 'Kategori', [
            'form_params' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function tambahDataKategori()
    {

        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "detail_kategori" => $this->input->post('detail_kategori', true),
            'api_key' => 'zxcvbnm'
        ];

        // var_dump($data);

        $response = $this->_client->request('POST', 'Kategori', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function ubahDataKategori($id)
    {
        $data = [
            "id_kategori" => $this->input->post('id_kategori', true),
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "detail_kategori" => $this->input->post('detail_kategori', true),
            'api_key' => 'zxcvbnm'
        ];

        $response = $this->_client->request('PUT', 'Kategori', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}

/* End of file Kategori_mdodel.php */
