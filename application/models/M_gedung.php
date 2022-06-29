<?php

class M_gedung extends CI_model
{
    public function lihat()
    {
        return $this->db->get('gedung')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_gedung" => $this->input->post('nama_gedung', true),
            "kode_gedung" => $this->input->post('kode_gedung', true),
            "register" => $this->input->post('register', true),
            "tingkat" => $this->input->post('tingkat', true),
            "beton" => $this->input->post('beton', true),
            "luas" => $this->input->post('luas', true),
            "lokasi" => $this->input->post('lokasi', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('gedung', $data);
    }

    public function jumlah()
    {
        return $this->db->get('gedung')->num_rows();
    }

    public function totalKas()
    {
        return $this->db->select_sum('harga')->from('gedung')->get()->result()[0]->harga;
    }

    public function tampilgedung()
    {
        $this->db->select('gedung.nama_gedung, gedung.kode_gedung, gedung.tingkat, gedung.beton, gedung.luas, gedung.kondisi');
        $this->db->from('gedung');
        $this->db->order_by('gedung.id_gedung', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getGdgById($id)
    {
        return $this->db->get_where('gedung', ['id_gedung' => $id])->row_array();
    }

    public function getBrgByIdCetak($id)
    {
        return $this->db->get_where('gedung', ['id_gedung' => $id])->result_array();
    }


    public function edit_gedung($id)
    {
        $data = [
            "nama_gedung" => $this->input->post('nama_gedung', true),
            "kode_gedung" => $this->input->post('kode_gedung', true),
            "register" => $this->input->post('register', true),
            "tingkat" => $this->input->post('tingkat', true),
            "beton" => $this->input->post('beton', true),
            "luas" => $this->input->post('luas', true),
            "lokasi" => $this->input->post('lokasi', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_gedung', $id);
        $this->db->update('gedung', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_gedung', $id);
        $this->db->delete('gedung');
    }

    public function nama_gedung()
    {
        $this->db->select('nama_gedung');
        $this->db->from('gedung');
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_gedung');
        $this->db->from('gedung');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->from('gedung');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('gedung');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_gedung)
    {
        $this->db->from('gedung');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        $this->db->where("nama_gedung", "$nama_gedung" );
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_gedung)
    {
        $this->db->from('gedung');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->where("nama_gedung", "$nama_gedung" );
        return $this->db->get()->result_array();
    }

    public function kode()
    {
        $this->db->select('RIGHT(gedung.kode_gedung,2) as kode_gedung', FALSE);
        $this->db->order_by('kode_gedung', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('gedung');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_gedung) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "2.8.6." . $batas;
        return $kodetampil;
    }
}
