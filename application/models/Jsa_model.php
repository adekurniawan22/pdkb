<?php
class Jsa_model extends CI_Model
{
    public function dapat_jsa()
    {
        $query = $this->db->get('t_jsa');
        return $query->result();
    }

    public function dapat_jsa_jtc($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_jsa');
        return $query->result();
    }

    public function tambah_jsa($data)
    {
        $this->db->insert('t_jsa', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_jsa($id_jsa, $data)
    {
        $this->db->where('id_jsa', $id_jsa);
        $this->db->update('t_jsa', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function dapat_temuan_jsa()
    {
        $query = $this->db->get('t_temuan_jsa');
        return $query->result();
    }

    public function tambah_temuan_jsa($data)
    {
        $this->db->insert('t_temuan_jsa', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
