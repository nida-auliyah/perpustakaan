<?php

use GuzzleHttp\Client;


defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/tugas_projek/rest-server/api/'
        ]);
    }

    public function getAllBuku()
    {
        $response = $this->_client->request('GET', 'Buku', [
            'query' => [
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function searchBuku($keyword)
    {
        $response = $this->_client->request('GET', 'Buku', [
            'query' => [
                'keyword' => $keyword,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getBukuByID($id)
    {
        $response = $this->_client->request('GET', 'Buku', [
            'query' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function getBukuByKategori($id)
    {
        $response = $this->_client->request('GET', 'Buku', [
            'query' => [
                'id_kategori' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function hapusDataBuku($id)
    {
        $response = $this->_client->request('DELETE', 'Buku', [
            'form_params' => [
                'id' => $id,
                'api_key' => 'zxcvbnm'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function tambahDataBuku()
    {
        $foto = $_FILES['foto']['name'];

        if (!$foto) {
            $data = [
                "id_kategori" => $this->input->post('id_kategori', true),
                "judul" => $this->input->post('judul', true),
                "pengarang" => $this->input->post('pengarang', true),
                "penerbit" => $this->input->post('penerbit', true),
                "tahun_terbit" => $this->input->post('tahun_terbit', true),
                "isi" => $this->input->post('isi', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => "",
                'api_key' => 'zxcvbnm'
            ];
        } else {
            $config['upload_path'] = 'E:\Application\xampp\htdocs\rest-server\assets\book';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $data = [
                "id_kategori" => $this->input->post('id_kategori', true),
                "judul" => $this->input->post('judul', true),
                "pengarang" => $this->input->post('pengarang', true),
                "penerbit" => $this->input->post('penerbit', true),
                "tahun_terbit" => $this->input->post('tahun_terbit', true),
                "isi" => $this->input->post('isi', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => $foto,
                'api_key' => 'zxcvbnm'
            ];

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            }
        }

        // var_dump($data);

        $response = $this->_client->request('POST', 'Buku', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function ubahDataBuku($id)
    {
        $foto = $_FILES['foto']['name'];

        if (!$foto) {
            $data = [
                "id" => $this->input->post('id', true),
                "id_kategori" => $this->input->post('id_kategori', true),
                "judul" => $this->input->post('judul', true),
                "pengarang" => $this->input->post('pengarang', true),
                "penerbit" => $this->input->post('penerbit', true),
                "tahun_terbit" => $this->input->post('tahun_terbit', true),
                "isi" => $this->input->post('isi', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => $this->input->post('oldfoto', true),
                'api_key' => 'zxcvbnm'
            ];
        } else {
            $config['upload_path'] = 'E:\Application\xampp\htdocs\foodie\assets\Buku';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $data = [
                "id" => $this->input->post('id', true),
                "id_kategori" => $this->input->post('id_kategori', true),
                "judul" => $this->input->post('judul', true),
                "pengarang" => $this->input->post('pengarang', true),
                "penerbit" => $this->input->post('penerbit', true),
                "tahun_terbit" => $this->input->post('tahun_terbit', true),
                "isi" => $this->input->post('isi', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "foto" => $foto,
                'api_key' => 'zxcvbnm'
            ];

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            }
        }

        // var_dump($data);

        $response = $this->_client->request('PUT', 'Buku', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}

/* End of file Buku_mdodel.php */
