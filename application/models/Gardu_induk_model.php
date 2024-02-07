<?php
class Gardu_induk_model extends CI_Model
{
    public function dapat_gardu_induk()
    {
        $query = $this->db->get('t_gardu_induk');
        return $query->result();
    }

    public function dapat_satu_gardu_induk($id_gardu_induk)
    {
        $this->db->where('id_gardu_induk', $id_gardu_induk);
        $query = $this->db->get('t_gardu_induk');
        return $query->row();
    }

    public function tambah_gardu_induk($data)
    {
        $this->db->insert('t_gardu_induk', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_gardu_induk($id_gardu_induk, $data)
    {
        $this->db->where('id_gardu_induk', $id_gardu_induk);
        $this->db->update('t_gardu_induk', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
