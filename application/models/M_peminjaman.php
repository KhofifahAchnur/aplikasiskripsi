<?php

class M_peminjaman extends CI_model
{
    public function lihat()
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatpeminjamanbyid($id)
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->where('peminjaman.aset_id', $id);
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "keperluan" => $this->input->post('keperluan', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "tgl_pinjam" => $this->input->post('tgl_pinjam', true),
            "tgl_kembali" => $this->input->post('tgl_kembali', true)

        ];
        $this->db->insert('peminjaman', $data);
    }

    // public function tambahlok($id)
    // {
    //     $data = [
    //         "perpindahan_id" => $this->input->post('lokasi', true)
    //     ];
    //     $this->db->where('id', $id);
    //     $this->db->update('aset', $data);
    // }

    public function edit_barang($id)
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "keperluan" => $this->input->post('keperluan', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "tgl_pinjam" => $this->input->post('tgl_pinjam', true),
            "tgl_kembali" => $this->input->post('tgl_kembali', true)
        ];

        $this->db->where('id_pinjam', $id);
        $this->db->update('peminjaman', $data);
    }

    public function getpeminjamanById($id)
    {
        return $this->db->get_where('peminjaman', ['id_pinjam' => $id])->row_array();
    }

    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function getKondisiById($id)
    {
        return $this->db->get_where('history_perpindahan', ['id' => $id])->row_array();
    }

    public function jumlah()
    {
        return $this->db->get('history_perpindahan')->num_rows();
    }

    public function hapusData($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('peminjaman');
    }

    public function nama_barang()
    {
        $this->db->select('nama_barang');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id ');
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_barang');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id ');
        $this->db->where("tgl_pinjam >=", "$tgl_awal");
        $this->db->where("tgl_pinjam <=", "$tgl_akhir");
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        $this->db->where("tgl_pinjam >=", "$tgl_awalcetak");
        $this->db->where("tgl_pinjam <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        $this->db->where("tgl_pinjam >=", "$tgl_awal");
        $this->db->where("tgl_pinjam <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang)
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tgl_pinjam >=", "$tgl_awalcetak");
        $this->db->where("tgl_pinjam <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_barang)
    {
        $this->db->select('peminjaman.id_pinjam, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, peminjaman.keperluan, penanggung_jawab.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali');
        $this->db->from('peminjaman');
        $this->db->join('aset', 'aset.id = peminjaman.aset_id');
        $this->db->join('lokasi', 'lokasi.id = peminjaman.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = peminjaman.penanggung_jawab_id');
        $this->db->order_by('peminjaman.id_pinjam', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tgl_pinjam >=", "$tgl_awal");
        $this->db->where("tgl_pinjam <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }
}
