<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function getPeminjaman($id = null)
    {
        if ($id === null) {
            $sql = "SELECT `peminjaman`.*, `user`.*
                FROM `peminjaman` JOIN `user` ON `peminjaman`.`id_user` = `user`.`id_user`";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT `peminjaman`.*, `user`.*
                FROM `peminjaman` JOIN `user` ON `peminjaman`.`id_user` = `user`.`id_user`
                WHERE `peminjaman`.`id_peminjaman` = $id";
            return $this->db->query($sql)->result_array();
        }
    }

    public function konfirmasiPengembalian($id)
    {
        $this->db->set('status_peminjaman', 1);
        $this->db->where('id_peminjaman', $id);
        $this->db->update('peminjaman');
        return $this->db->affected_rows();
    }

    public function createPeminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }
}

/* End of file Pemesanan_model.php */
