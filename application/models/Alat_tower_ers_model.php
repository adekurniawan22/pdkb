<?php
class Alat_tower_ers_model extends CI_Model
{
    public function dapat_alat_tower_ers()
    {
        $query = $this->db->get('t_alat_tower_ers');
        return $query->result();
    }

    public function dapat_satu_alat_tower_ers($id_alat_tower_ers)
    {
        $this->db->where('id_alat_tower_ers', $id_alat_tower_ers);
        $query = $this->db->get('t_alat_tower_ers');
        return $query->row();
    }

    public function jumlah_alat_tower_ers()
    {
        $this->db->from('t_alat_tower_ers');
        $total_alat_tower_ers = $this->db->count_all_results();
        return $total_alat_tower_ers;
    }

    public function tambah_alat_tower_ers($data)
    {
        $this->db->insert('t_alat_tower_ers', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_alat_tower_ers($id_alat_tower_ers, $data)
    {
        $this->db->where('id_alat_tower_ers', $id_alat_tower_ers);
        $this->db->update('t_alat_tower_ers', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
