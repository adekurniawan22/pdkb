<?php
class SPKI_model extends CI_Model
{
    public function dapat_spki()
    {
        $query = $this->db->get('t_spki');
        return $query->result();
    }

    public function dapat_satu_alat_kerja($id_alat_kerja)
    {
        $this->db->where('id_alat_kerja', $id_alat_kerja);
        $query = $this->db->get('t_alat_kerja');
        return $query->row();
    }

    public function jumlah_alat_kerja()
    {
        $this->db->from('t_alat_kerja');
        $total_alat_kerja = $this->db->count_all_results();
        return $total_alat_kerja;
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
