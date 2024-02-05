<?php
class Rencana_operasi_model extends CI_Model
{
    public function dapat_rencana_operasi()
    {
        $query = $this->db->get('t_rencana_operasi');
        return $query->result();
    }

    public function dapat_satu_rencana_operasi($id_rencana_operasi)
    {
        $this->db->where('id_rencana_operasi', $id_rencana_operasi);
        $query = $this->db->get('t_rencana_operasi');
        return $query->row();
    }

    public function tambah_rencana_operasi($data)
    {
        $this->db->insert('t_rencana_operasi', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_rencana_operasi($id_rencana_operasi, $data)
    {
        $this->db->where('id_rencana_operasi', $id_rencana_operasi);
        $this->db->update('t_rencana_operasi', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function jumlah_semua_rencana_operasi_selesai()
    {
        $this->db->from('t_rencana_operasi');
        $this->db->where('status', '1');
        $total_rencana_operasi = $this->db->count_all_results();
        return $total_rencana_operasi;
    }


    public function jumlah_rencana_selesai_perbulan()
    {
        // Query untuk mendapatkan jumlah rencana_operasi yang tanggal_dikerjakan per bulan
        $this->db->select('MONTH(tanggal_dikerjakan) as bulan, COUNT(*) as jumlah_rencana_dikerjakan');
        $this->db->from('t_rencana_operasi');
        $this->db->where('tanggal_dikerjakan IS NOT NULL', null, false); // Menyaring yang memiliki tanggal_dikerjakan
        $this->db->group_by('MONTH(tanggal_dikerjakan)');
        $this->db->order_by('bulan');

        $query_dikerjakan = $this->db->get();
        $result_dikerjakan = $query_dikerjakan->result();

        // Query untuk mendapatkan jumlah rencana_operasi (status = '1') yang tanggal_selesai sesuai dengan bulan tanggal_dikerjakan
        $this->db->select('MONTH(tanggal_dikerjakan) as bulan, COUNT(*) as jumlah_rencana_selesai');
        $this->db->from('t_rencana_operasi');
        $this->db->where('status', '1');
        $this->db->where('MONTH(tanggal_selesai) = MONTH(tanggal_dikerjakan)');
        $this->db->where('YEAR(tanggal_selesai) = YEAR(tanggal_dikerjakan)');
        $this->db->group_by('MONTH(tanggal_dikerjakan)');
        $this->db->order_by('bulan');

        $query_selesai = $this->db->get();
        $result_selesai = $query_selesai->result();

        // Query untuk mendapatkan jumlah rencana_operasi (status = '0') yang tanggal_selesai tidak sesuai dengan bulan tanggal_dikerjakan atau tanggal_selesai NULL
        $this->db->select('MONTH(tanggal_dikerjakan) as bulan, COUNT(*) as jumlah_rencana_tidak_selesai');
        $this->db->from('t_rencana_operasi');
        $this->db->where('status', '0');
        $this->db->group_start();
        $this->db->where('MONTH(tanggal_selesai) != MONTH(tanggal_dikerjakan) OR tanggal_selesai IS NULL', null, false);
        $this->db->group_end();
        $this->db->group_by('MONTH(tanggal_dikerjakan)');
        $this->db->order_by('bulan');

        $query_tidak_selesai = $this->db->get();
        $result_tidak_selesai = $query_tidak_selesai->result();

        $bulan_indonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Menggabungkan hasil query untuk ketiga kategori rencana
        $merged_result = [];
        foreach ($bulan_indonesia as $index => $bulan) {
            $merged_result[] = (object) [
                'bulan' => $index + 1, // Ditambah 1 karena indeks dimulai dari 0
                'bulan_text' => $bulan,
                'jumlah_rencana_dikerjakan' => 0,
                'jumlah_rencana_selesai' => 0,
                'jumlah_rencana_tidak_selesai' => 0,
            ];
        }

        foreach ($result_dikerjakan as $data_dikerjakan) {
            $index = array_search($data_dikerjakan->bulan, array_column($merged_result, 'bulan'));
            $merged_result[$index]->jumlah_rencana_dikerjakan = $data_dikerjakan->jumlah_rencana_dikerjakan;
        }

        foreach ($result_selesai as $data_selesai) {
            $index = array_search($data_selesai->bulan, array_column($merged_result, 'bulan'));
            $merged_result[$index]->jumlah_rencana_selesai = $data_selesai->jumlah_rencana_selesai;
        }

        foreach ($result_tidak_selesai as $data_tidak_selesai) {
            $index = array_search($data_tidak_selesai->bulan, array_column($merged_result, 'bulan'));
            $merged_result[$index]->jumlah_rencana_tidak_selesai = $data_tidak_selesai->jumlah_rencana_tidak_selesai;
        }

        return [
            'result' => $merged_result,
            'bulan_indonesia' => $bulan_indonesia,
        ];
    }

    public function dapat_persentase_rencana_tahun_ini()
    {
        $this->db->select('COUNT(*) as jumlah_rencana_selesai');
        $this->db->from('t_rencana_operasi');
        $this->db->where('status', '1');
        $this->db->where('YEAR(tanggal_dikerjakan)', date('Y'));

        $query_selesai = $this->db->get();
        $result_selesai = $query_selesai->row();

        $this->db->select('COUNT(*) as jumlah_rencana_total');
        $this->db->from('t_rencana_operasi');
        $this->db->where('YEAR(tanggal_dikerjakan)', date('Y'));

        $query_total = $this->db->get();
        $result_total = $query_total->row();

        // Menghitung persentase
        $persentase = 0;
        if ($result_total->jumlah_rencana_total > 0) {
            $persentase = ($result_selesai->jumlah_rencana_selesai / $result_total->jumlah_rencana_total) * 100;
        }

        return $persentase;
    }
}
