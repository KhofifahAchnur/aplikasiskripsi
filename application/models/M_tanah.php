<?php

class M_tanah extends CI_model
{
    public function lihat()
    {
        return $this->db->get('tanah')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_tanah" => $this->input->post('nama_tanah', true),
            "kode_tanah" => $this->input->post('kode_tanah', true),
            "register" => $this->input->post('register', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "lokasi" => $this->input->post('lokasi', true),
            "hak" => $this->input->post('hak', true),
            "nomer" => $this->input->post('nomer', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('tanah', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('tanah', ['id_tanah' => $id])->row_array();
    }

    public function edit_tanah($id)
    {
        $data = [
            "nama_tanah" => $this->input->post('nama_tanah', true),
            "kode_tanah" => $this->input->post('kode_tanah', true),
            "register" => $this->input->post('register', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "lokasi" => $this->input->post('lokasi', true),
            "hak" => $this->input->post('hak', true),
            "nomer" => $this->input->post('nomer', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_tanah', $id);
        $this->db->update('tanah', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_tanah', $id);
        $this->db->delete('tanah');
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->from('tanah');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('tanah');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function kode()
    {
        $this->db->select('RIGHT(tanah.kode_tanah,2) as kode_tanah', FALSE);
        $this->db->order_by('kode_tanah', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tanah');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_tanah) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "2.3.7." . $batas;
        return $kodetampil;
    }
}
