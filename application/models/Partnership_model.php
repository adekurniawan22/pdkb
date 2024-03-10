<?php
class Partnership_model extends CI_Model
{
    public function dapat_partnership()
    {
        $query = $this->db->get('t_partnership');
        return $query->result();
    }

    public function dapat_satu_partnership($id_partnership)
    {
        $this->db->where('id_partnership', $id_partnership);
        $query = $this->db->get('t_partnership');
        return $query->row();
    }

    public function jumlah_partnership()
    {
        $this->db->from('t_partnership');
        $total_partnership = $this->db->count_all_results();
        return $total_partnership;
    }

    public function tambah_partnership($data)
    {
        $this->db->insert('t_partnership', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_partnership($id_partnership, $data)
    {
        $this->db->where('id_partnership', $id_partnership);
        $this->db->update('t_partnership', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
