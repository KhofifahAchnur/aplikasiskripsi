<?php

class M_kondisi_gedung extends CI_model
{
    public function lihat()
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatkondisibyid($id)
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, 
		gedung.kode_gedung, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, gedung.register, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id ');
        $this->db->where('kondisi_gedung.gedung_id', $id);
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "tanggal" => date('Y-m-d'),
            "kondisi" => $this->input->post('kondisi', true)
        ];

        $this->db->insert('kondisi_gedung', $data);
    }

    public function updatekondisigedung($id)
    {
        $data = [
            "kondisi" => $this->input->post('kondisi', true)
        ];
        $this->db->where('id_gedung', $id);
        $this->db->update('gedung', $data);
    }

    public function updatekondisi($id)
	{
		$data = [
			"kondisi" => $this->input->post('kondisi_buku', true)
		];
		$this->db->where('id', $id);
		$this->db->update('kondisi_buku', $data);
	}


    public function getKondisiById($id)
    {
        return $this->db->get_where('kondisi_gedung', ['id' => $id])->row_array();
    }

    // public function jumlah()
    // {
    //     return $this->db->get('history_kondisi')->num_rows();
    // }

    public function nama_gedung()
    {
        $this->db->select('nama_gedung');
		$this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

	public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_gedung');
		$this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
		$this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

	public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
		$this->db->where("tanggal >=", "$tgl_awalcetak");
        $this->db->where("tanggal <=", "$tgl_akhircetak");
        $this->db->group_by('nama_gedung');
        return $this->db->get()->result_array();
    }

	public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        $this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }
    
    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_gedung)
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        $this->db->where("gedung.nama_gedung", "$nama_gedung");
        $this->db->where("tanggal >=", "$tgl_awalcetak");
        $this->db->where("tanggal <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_gedung)
    {
		$this->db->select('kondisi_gedung.id, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id_gedung = kondisi_gedung.gedung_id');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        $this->db->where("gedung.nama_gedung", "$nama_gedung");
        $this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        return $this->db->get()->result_array();
        // die($this->db->get()->result_array());
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kondisi_gedung');
}
}
