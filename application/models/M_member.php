<?php

class M_member extends CI_model
{

    public function lihatmember()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('user.id', 'DESC');
        $this->db->where('role_id', '2');
        return $this->db->get()->result_array();
    }

    public function lihatuser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('user.id', 'DESC');
        return $this->db->get()->result_array();
    }
}

