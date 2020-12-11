<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function submit()
    {
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim|is_unique[users.phone]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_message('is_unique', '%s ini sudah digunakan!');
        $this->form_validation->set_message('matches', 'Field %s tidak cocok dengan field %s.');
        $this->form_validation->set_message('min_length', 'Panjang %s setidaknya harus %s karakter.');
        $this->form_validation->set_message('required', '%s tidak boleh kosong!');
        $this->form_validation->set_message('valid_email', 'Field %s harus berisi alamat email yang valid.');

        if ($this->form_validation->run() == TRUE) {
            $this->m_user->add();
            $data['success'] = '<div class="alert alert-success">
                    <b><i class="fa fa-exclamation-circle"></i>Akun berhasil dibuat!</b> Silahkan login dengan akun anda
                </div>';
            $this->load->view('v_login', $data);
        } else {
            $this->load->view('v_register');
        }

    }
    
}
