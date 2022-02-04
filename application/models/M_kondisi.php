<?php

class M_kondisi extends CI_model
{
	public function lihat()
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, history_kondisi.kondisi, history_kondisi.tanggal');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
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

	public function updatekondisi($id)
	{
		$data = [
			"kondisi" => $this->input->post('kondisi', true)
		];
		$this->db->where('id', $id);
		$this->db->update('aset', $data);
	}


	public function getKondisiById($id)
	{
		return $this->db->get_where('history_kondisi', ['id' => $id])->row_array();
	}

	// public function jumlah()
	// {
	//     return $this->db->get('history_kondisi')->num_rows();
	// }
}
