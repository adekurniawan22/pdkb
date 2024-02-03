<?php
class SPKI_model extends CI_Model
{
    public function dapat_spki()
    {
        $query = $this->db->get('t_spki');
        return $query->result();
    }

    public function dapat_satu_spki($id_spki)
    {
        $this->db->where('id_spki', $id_spki);
        $query = $this->db->get('t_spki');
        return $query->row();
    }


    public function tambah_spki($data)
    {
        $this->db->insert('t_spki', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_spki($id_spki, $data)
    {
        $this->db->where('id_spki', $id_spki);
        $this->db->update('t_spki', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
