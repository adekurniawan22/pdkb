<?php
class Wo_model extends CI_Model
{
    public function dapat_wo()
    {
        $query = $this->db->get('t_wo');
        return $query->result();
    }

    public function dapat_satu_wo($id_wo)
    {
        $this->db->where('id_wo', $id_wo);
        $query = $this->db->get('t_wo');
        return $query->row();
    }


    public function tambah_wo($data)
    {
        $this->db->insert('t_wo', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_wo($id_wo, $data)
    {
        $this->db->where('id_wo', $id_wo);
        $this->db->update('t_wo', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
