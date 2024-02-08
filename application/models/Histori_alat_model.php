<?php
class Histori_alat_model extends CI_Model
{
    public function dapat_histori_alat()
    {
        $query = $this->db->get('t_histori_alat');
        return $query->result();
    }

    public function dapat_histori_alat_jtc($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_histori_alat');
        return $query->result();
    }

    public function dapat_satu_histori_alat($id_histori_alat)
    {
        $this->db->where('id_histori_alat', $id_histori_alat);
        $query = $this->db->get('t_histori_alat');
        return $query->row();
    }

    public function tambah_histori_alat($data)
    {
        $this->db->insert('t_histori_alat', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
