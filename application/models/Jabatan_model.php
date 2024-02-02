<?php
class Jabatan_model extends CI_Model
{
    public function dapat_jabatan()
    {
        $query = $this->db->get('t_jabatan');
        return $query->result();
    }
}
