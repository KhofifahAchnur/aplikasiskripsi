<?php

class M_buku extends CI_model
{
    public function lihat()
    {
        // return $this->db->get('buku')->result_array();
        $this->db->select('*');
        $this->db->order_by('buku.id_buku', 'DESC');
        return $this->db->get('buku')->result_array();
    }

    public function nama_buku()
    {
        $this->db->select('nama_buku');
        $this->db->from('buku');
        $this->db->group_by('nama_buku');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_buku');
        $this->db->from('buku');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->group_by('nama_buku');
        return $this->db->get()->result_array();
    }
    public function jumlah()
    {
        return $this->db->get('buku')->num_rows();
    }
    public function proses_tambah()
    {
        $data = [
            "nama_buku" => $this->input->post('nama_buku', true),
            "kode_buku" => $this->input->post('kode_buku', true),
            "register" => $this->input->post('register', true),
            "judul" => $this->input->post('judul', true),
            "spesifikasi" => $this->input->post('spesifikasi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('buku', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row_array();
    }

    public function getBrgByIdCetak($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->result_array();
    }

    public function tampilbuku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->order_by('buku.id_buku', 'DESC');
        return $this->db->get()->result_array();
    }

    public function edit_buku($id)
    {
        $data = [
            "nama_buku" => $this->input->post('nama_buku', true),
            "kode_buku" => $this->input->post('kode_buku', true),
            "register" => $this->input->post('register', true),
            "judul" => $this->input->post('judul', true),
            "spesifikasi" => $this->input->post('spesifikasi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_buku', $id);
        $this->db->update('buku', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->from('buku');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->from('buku');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama)
    {
        $this->db->from('buku');
        $this->db->where("buku.nama_buku", "$nama");
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama)
    {
        $this->db->from('buku');
        $this->db->where("buku.nama_buku", "$nama");
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function kode()
    {
        $this->db->select('RIGHT(buku.kode_buku,2) as kode_buku', FALSE);
        $this->db->order_by('kode_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_buku) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "2.4.9." . $batas;
        return $kodetampil;
    }

    public function totalKas()
    {
        return $this->db->select_sum('harga')->from('buku')->get()->result()[0]->harga;
    }
}
