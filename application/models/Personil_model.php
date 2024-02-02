<?php
class Personil_model extends CI_Model
{
    public function dapat_personil()
    {
        $query = $this->db->get('t_personil');
        return $query->result();
    }

    public function dapat_satu_personil($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_personil');
        return $query->row();
    }

    public function jumlah_personil()
    {
        $this->db->from('t_personil');
        $total_personil = $this->db->count_all_results();
        return $total_personil;
    }


    public function tambah_personil($data)
    {
        $this->db->insert('t_personil', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_personil($id_personil, $data)
    {
        $this->db->where('id_personil', $id_personil);
        $this->db->update('t_personil', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
