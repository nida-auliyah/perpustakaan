<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Detail_peminjaman_model extends CI_Model
{
    public function getDetail_peminjaman($id = null)
    {
        if ($id === null) {
            $sql = "SELECT `detail`.*, `buku`.*
                FROM `detail` JOIN `buku` ON `detail`.`id_buku` = `buku`.`id`";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT `detail`.*, `buku`.*
                FROM `detail` JOIN `buku` ON `detail`.`id_buku` = `buku`.`id`
                WHERE `detail`.`id_peminjaman` = $id";
            return $this->db->query($sql)->result_array();
        }
    }

    public function createDetail_peminjaman($data)
    {
        $this->db->insert('detail', $data);
        return $this->db->affected_rows();
    }
}

/* End of file Detail_peminjaman_model.php */
