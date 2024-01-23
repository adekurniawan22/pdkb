<?php
class Profil_model extends CI_Model
{
    public function dapat_profil($id_personil)
    {
        $this->db->select('t_personil.*, t_jabatan.*'); // Gunakan * untuk memilih semua kolom
        $this->db->from('t_personil');
        $this->db->join('t_jabatan', 't_personil.id_jabatan = t_jabatan.id_jabatan');
        $this->db->group_by('t_personil.id_personil');
        $this->db->where('t_personil.id_personil', $id_personil);
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_profil($id_personil, $data)
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
