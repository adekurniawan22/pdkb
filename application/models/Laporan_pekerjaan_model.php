<?php
class Laporan_pekerjaan_model extends CI_Model
{
    public function dapat_laporan_pekerjaan()
    {
        $query = $this->db->get('t_laporan_pekerjaan');
        return $query->result();
    }

    public function dapat_laporan_pekerjaan_jtc($id_personil)
    {
        $this->db->where('id_personil', $id_personil);
        $query = $this->db->get('t_laporan_pekerjaan');
        return $query->result();
    }

    public function tambah_laporan_pekerjaan($data)
    {
        $this->db->insert('t_laporan_pekerjaan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function dapat_lampiran_laporan_pekerjaan()
    {
        $query = $this->db->get('t_lampiran_laporan_pekerjaan');
        return $query->result();
    }

    public function tambah_lampiran_laporan_pekerjaan($data)
    {
        $this->db->insert('t_lampiran_laporan_pekerjaan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_laporan_pekerjaan($id_laporan_pekerjaan, $data)
    {
        $this->db->where('id_laporan_pekerjaan', $id_laporan_pekerjaan);
        $this->db->update('t_laporan_pekerjaan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
