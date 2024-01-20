<?php
class Alat_kerja_model extends CI_Model
{
    public function dapat_alat_kerja()
    {
        $query = $this->db->get('t_alat_kerja');
        return $query->result();
    }

    public function dapat_satu_alat_kerja($id_alat_kerja)
    {
        $this->db->where('id_alat_kerja', $id_alat_kerja);
        $query = $this->db->get('t_alat_kerja');
        return $query->row();
    }

    public function jumlah_personil()
    {
        $this->db->from('t_personil');
        $total_personil = $this->db->count_all_results();
        return $total_personil;
    }

    public function tambah_alat_kerja($data)
    {
        $this->db->insert('t_alat_kerja', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_alat_kerja($id_alat_kerja, $data)
    {
        $this->db->where('id_alat_kerja', $id_alat_kerja);
        $this->db->update('t_alat_kerja', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
