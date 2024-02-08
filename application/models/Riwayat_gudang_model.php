<?php
class Riwayat_gudang_model extends CI_Model
{
    public function dapat_riwayat_gudang()
    {
        $query = $this->db->get('t_riwayat_gudang');
        return $query->result();
    }

    public function dapat_riwayat_gudang_jtc($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_riwayat_gudang');
        return $query->result();
    }

    public function dapat_satu_riwayat_gudang($id_riwayat_gudang)
    {
        $this->db->where('id_riwayat_gudang', $id_riwayat_gudang);
        $query = $this->db->get('t_riwayat_gudang');
        return $query->row();
    }

    public function tambah_riwayat_gudang($data)
    {
        $this->db->insert('t_riwayat_gudang', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
