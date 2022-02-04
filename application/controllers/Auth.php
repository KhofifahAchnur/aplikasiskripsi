<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->M_login->cek_login($username, $password);

            if ($cek == false) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Wrong password! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
                redirect('auth');
            } else {
                $this->session->set_userdata('hak_akses', $cek->hak_akses);
                $this->session->set_userdata('username', $cek->username);
                switch ($cek->hak_akses) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('member/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">You have been logout! 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
		</button> </div>');
        redirect('auth');
    }
}