<?php

class M_kondisi extends CI_model
{
	public function lihat()
	{
		$this->db->select('history_kondisi.id, aset.id,aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->order_by('history_kondisi.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function lihatkondisibyid($id)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->where('history_kondisi.aset_id', $id);
		$this->db->order_by('history_kondisi.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function proses_tambah()
	{
		$data = [
			"aset_id" => $this->input->post('nama_barang', true),
			"tanggal" => date('Y-m-d'),
			"kondisi" => $this->input->post('kondisi', true)
		];

		$this->db->insert('history_kondisi', $data);
	}

	public function updatekondisimesin($id)
	{
		$data = [
			"kondisi" => $this->input->post('kondisi', true)
		];
		$this->db->where('id', $id);
		$this->db->update('aset', $data);
	}

	public function updatekondisi($id)
	{
		$data = [
			"kondisi" => $this->input->post('kondisi', true)
		];
		$this->db->where('aset_id', $id);
		$this->db->update('history_kondisi', $data);
	}


	public function getKondisiById($id)
	{
		return $this->db->get_where('history_kondisi', ['id' => $id])->row_array();
	}

	public function nama_barang()
	{
		$this->db->select('nama_barang');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->group_by('nama_barang');
		return $this->db->get()->result_array();
	}

	public function nama_tanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->select('nama_barang');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->where("tanggal >=", "$tgl_awal");
		$this->db->where("tanggal <=", "$tgl_akhir");
		$this->db->group_by('nama_barang');
		return $this->db->get()->result_array();
	}

	public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->order_by('history_kondisi.id', 'DESC');
		$this->db->where("tanggal >=", "$tgl_awalcetak");
		$this->db->where("tanggal <=", "$tgl_akhircetak");
		$this->db->group_by('nama_barang');
		return $this->db->get()->result_array();
	}

	public function databytanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->order_by('history_kondisi.id', 'DESC');
		$this->db->where("tanggal >=", "$tgl_awal");
		$this->db->where("tanggal <=", "$tgl_akhir");
		return $this->db->get()->result_array();
	}

	public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->order_by('history_kondisi.id', 'DESC');
		$this->db->where("aset.nama_barang", "$nama_barang");
		$this->db->where("tanggal >=", "$tgl_awalcetak");
		$this->db->where("tanggal <=", "$tgl_akhircetak");
		return $this->db->get()->result_array();
	}

	public function databynama($tgl_awal, $tgl_akhir, $nama_barang)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->order_by('history_kondisi.id', 'DESC');
		$this->db->where("aset.nama_barang", "$nama_barang");
		$this->db->where("tanggal >=", "$tgl_awal");
		$this->db->where("tanggal <=", "$tgl_akhir");
		return $this->db->get()->result_array();
		// die($this->db->get()->result_array());
	}



	public function hapusData($id)
    {
        $this->db->where('aset_id', $id);
        $this->db->delete('history_kondisi');
}
	// public function jumlah()
	// {
	//     return $this->db->get('history_kondisi')->num_rows();
	// }
}
