<?php

class M_jalan extends CI_model
{
    public function lihat()
    {
        return $this->db->get('jalan')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_aset" => $this->input->post('nama_aset', true),
            "kode_aset" => $this->input->post('kode_aset', true),
            "register" => $this->input->post('register', true),
            "konstruksi" => $this->input->post('konstruksi', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('jalan', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('jalan', ['id_jalan' => $id])->row_array();
    }

    public function edit_jalan($id)
    {
        $data = [
            "nama_aset" => $this->input->post('nama_aset', true),
            "kode_aset" => $this->input->post('kode_aset', true),
            "register" => $this->input->post('register', true),
            "konstruksi" => $this->input->post('konstruksi', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            // "tanggal" => date('Y-m-d')
        ];

        $this->db->where('id_jalan', $id);
        $this->db->update('jalan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_jalan', $id);
        $this->db->delete('jalan');
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->from('jalan');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('jalan');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function kode()
    {
        $this->db->select('RIGHT(jalan.kode_aset,2) as kode_aset', FALSE);
        $this->db->order_by('kode_aset', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jalan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_aset) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "2.6.8." . $batas;
        return $kodetampil;
    }
}
