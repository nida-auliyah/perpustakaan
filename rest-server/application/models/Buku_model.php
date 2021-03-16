<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getBuku($id = null)
    {
        if ($id === null) {
            $sql = "SELECT `buku`.*, `kategori`.*
                FROM `buku` JOIN `kategori` ON `kategori`.`id_kategori` = `buku`.`id_kategori`";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT `buku`.*, `kategori`.*
                FROM `buku` JOIN `kategori` ON `kategori`.`id_kategori` = `buku`.`id_kategori`
                WHERE `buku`.`id` = $id";
            return $this->db->query($sql)->result_array();
        }
    }

    public function getBukuByKategori($id)
    {
        return $this->db->get_where('buku', ['id_kategori' => $id])->result_array();
    }

    public function searchBuku($keyword)
    {
        $sql = "SELECT `buku`.*, `kategori`.*
                FROM `buku` JOIN `kategori` ON `kategori`.`id_kategori` = `buku`.`id_kategori`
                WHERE `buku`.`judul` LIKE '%$keyword%'";
        return $this->db->query($sql)->result_array();
    }

    public function deleteBuku($id)
    {
        $this->db->delete('buku', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createBuku($data)
    {
        $this->db->insert('buku', $data);
        return $this->db->affected_rows();
    }

    public function updateBuku($data, $id)
    {
        $this->db->update('buku', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file buku_model.php */
