<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getKategori($id = null)
    {
        if ($id === null) {
            return $this->db->get('kategori')->result_array();
        } else {
            return $this->db->get_where('kategori', ['id_kategori' => $id])->result_array();
        }
    }

    public function deleteKategori($id)
    {
        $this->db->delete('kategori', ['id_kategori' => $id]);
        return $this->db->affected_rows();
    }

    public function createKategori($data)
    {
        $this->db->insert('kategori', $data);
        return $this->db->affected_rows();
    }

    public function updateKategori($data, $id)
    {
        $this->db->update('kategori', $data, ['id_kategori' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Menu_model.php */
