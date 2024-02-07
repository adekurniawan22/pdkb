<?php
class Jaringan_model extends CI_Model
{
    public function dapat_jaringan()
    {
        $query = $this->db->get('t_jaringan');
        return $query->result();
    }

    public function dapat_satu_jaringan($id_jaringan)
    {
        $this->db->where('id_jaringan', $id_jaringan);
        $query = $this->db->get('t_jaringan');
        return $query->row();
    }

    public function tambah_jaringan($data)
    {
        $this->db->insert('t_jaringan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_jaringan($id_jaringan, $data)
    {
        $this->db->where('id_jaringan', $id_jaringan);
        $this->db->update('t_jaringan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
