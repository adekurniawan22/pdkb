<?php
class Personil_model extends CI_Model
{
    public function dapat_personil()
    {
        $this->db->select('t_personil.*, t_jabatan.*'); // Gunakan * untuk memilih semua kolom
        $this->db->from('t_personil');
        $this->db->join('t_jabatan', 't_personil.id_jabatan = t_jabatan.id_jabatan');
        $this->db->where('t_personil.id_jabatan !=', 1);
        $this->db->group_by('t_personil.id_personil'); // Gunakan GROUP BY agar tidak ada duplikat
        $query = $this->db->get();
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
