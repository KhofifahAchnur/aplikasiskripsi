<?php

class M_pemeliharaan extends CI_model
{
    public function lihat()
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai, pemeliharaan.bukti');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        return $this->db->get()->result_array();

    }

    public function lihatpemeliharaanbyid($id)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->where('pemeliharaan.gedung_id', $id);
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        return $this->db->get()->result_array();

    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function proses_tambah()
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "nama" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_pemeliharaan" => $this->input->post('tgl_pemeliharaan', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)
           
        ];
        $this->db->insert('pemeliharaan', $data);
    }

    public function totalKas()
    {
        return $this->db->select_sum('biaya')->from('pemeliharaan')->get()->result()[0]->biaya;
    }

    public function getpemeliharaanById($id)
    {
        return $this->db->get_where('pemeliharaan', ['id_pemeliharaan' => $id])->row_array();
    }
    
    public function edit_barang($id)
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "nama" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_pemeliharaan" => $this->input->post('tgl_pemeliharaan', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)
        ];

        $this->db->where('id_pemeliharaan', $id);
        $this->db->update('pemeliharaan', $data);
    }
    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }
 
    

    public function jumlah()
    {
        return $this->db->get('pemeliharaan')->num_rows();
    }

    public function hapusData($id)
    {
        $this->db->where('id_pemeliharaan', $id);
        $this->db->delete('pemeliharaan');
}

public function nama_gedung()
    {
        $this->db->select('nama_gedung');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id ');
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_gedung');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id ');
        $this->db->where("tgl_pemeliharaan >=", "$tgl_awal");
        $this->db->where("tgl_pemeliharaan <=", "$tgl_akhir");
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        $this->db->where("tgl_pemeliharaan >=", "$tgl_awalcetak");
        $this->db->where("tgl_pemeliharaan <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        $this->db->where("tgl_pemeliharaan >=", "$tgl_awal");
        $this->db->where("tgl_pemeliharaan <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_gedung)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        $this->db->where("gedung.nama_gedung", "$nama_gedung");
        $this->db->where("tgl_pemeliharaan >=", "$tgl_awalcetak");
        $this->db->where("tgl_pemeliharaan <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_gedung)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, pemeliharaan.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        $this->db->where("gedung.nama_gedung", "$nama_gedung");
        $this->db->where("tgl_pemeliharaan >=", "$tgl_awal");
        $this->db->where("tgl_pemeliharaan <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }
}