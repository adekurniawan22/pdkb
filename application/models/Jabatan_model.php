<?php
class Jabatan_model extends CI_Model
{
    public function dapat_jabatan()
    {
        $this->db->where('id_jabatan !=', 1);
        $query = $this->db->get('t_jabatan');
        return $query->result();
    }
}
