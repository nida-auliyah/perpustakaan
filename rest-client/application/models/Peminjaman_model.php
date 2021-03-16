<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/tugas_projek/rest-server/api/'
        ]);
    }

    public function getAllPeminjaman()
    {
        $response = $this->_client->request('GET', 'Peminjaman', [
            'query' => [
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getPeminjamanByID($id)
    {
        $response = $this->_client->request('GET', 'Peminjaman', [
            'query' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function getDetailPeminjamanByID($id)
    {
        $response = $this->_client->request('GET', 'Detail_peminjaman', [
            'query' => [
                'id_peminjaman' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function konfirmasiPeminjamanByID($id)
    {
        $response = $this->_client->request('PUT', 'Peminjaman', [
            'form_params' => ['id_peminjaman' => $id, 'api_key' => 'zxcvbnm']
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function tambahDataPeminjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $data = [
            "id_user" => $this->session->userdata('id_user'),
            "tanggal_peminjaman" => $tanggal,
            "tanggal_pengembalian" => date('Y-m-d H:i:s', strtotime(('+7 days'), strtotime($tanggal))),
            "status_peminjaman" => 0,
            'api_key' => 'zxcvbnm'
        ];

        // var_dump($data);

        $response = $this->_client->request('POST', 'Peminjaman', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['id'];
    }

    public function tambahDetail_pesanan($item, $result_id)
    {
        $data = [
            'id_peminjaman' => $result_id,
            'id_buku' => $item['id'],
            'api_key' => 'zxcvbnm'
        ];

        // var_dump($data);
        $response = $this->_client->request('POST', 'Detail_peminjaman', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}

/* End of file Peminjaman_mdodel.php */
