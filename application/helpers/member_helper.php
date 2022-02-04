<?php
defined('BASEPATH') or exit('No direct script access allowed');

function getuser()
{
    $CI = get_instance();
    $CI->load->model('M_member');
    return $CI->M_member->lihatuser($CI->session->userdata('email'));
}

function getrole($role): bool
{
    $is = getuser();
    return $is['role_id'] == $role;
}
