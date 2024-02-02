<?php
class Sertifikat_model extends CI_Model
{
    public function dapat_sertifikat($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_sertifikat');
        return $query->result();
    }

    public function dapat_sertifikat_detail($id)
    {
        $this->db->select('t_personil.*, t_sertifikat.nama_file'); // Pilih kolom yang Anda butuhkan
        $this->db->from('t_personil');
        $this->db->join('t_sertifikat', 't_personil.id_personil = t_sertifikat.id_personil');
        $this->db->where('t_sertifikat.id_personil', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function dapat_satu_sertifikat($id_sertifikat)
    {
        $this->db->where('id_sertifikat', $id_sertifikat);
        $query = $this->db->get('t_sertifikat');
        return $query->row();
    }
}
