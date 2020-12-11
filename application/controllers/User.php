<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_image');
    }

    public function index()
    {
        redirect(base_url());
    }

    public function add_friend($username)
    {
        $this->m_user->add_friend($username);
        $this->index();
    }

    public function edit()
    {
        $data['user'] = $this->m_user->get_data($this->m_user->logged_id());
        $this->input->post('username') != $this->m_user->logged_id() 
        ? $is_unique = '|is_unique[users.username]' : $is_unique =  '';
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required'.$is_unique);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_message('is_unique', '%s ini sudah digunakan!');
        $this->form_validation->set_message('matches', 'Field %s tidak cocok dengan field %s.');
        $this->form_validation->set_message('min_length', 'Panjang %s setidaknya harus %s karakter.');
        $this->form_validation->set_message('required', '%s tidak boleh kosong!');

        if ($this->form_validation->run() == TRUE) {
            $this->m_user->edit();
            $data['success'] = 
                '<div class="alert alert-success">
                    <b>Profil akun anda berhasil diubah!</b>
                </div>';
        
            $this->load->view('v_edit', $data);
        } else $this->load->view('v_edit', $data);
    }

    public function myprofile()
    {
        $data['user'] = $this->m_user->get_data($this->m_user->logged_id());
        $data['image'] = $this->m_image->get_image($data['user']->profile_pic);
        $data['myprofile'] = TRUE;
        $this->load->view('v_profile', $data);
    }

    public function profile($username)
    {
        $data['user'] = $this->m_user->get_data($username);
        $data['image'] = $this->m_image->get_image($data['user']->profile_pic);
        $this->load->view('v_profile', $data);
    }

    public function search_user()
    {
        $key = $this->input->post('search');

        if (isset($key) && !empty($key)) {
            $data['error'] = 'User tidak ditemukan!';
            $data['records'] = $this->m_user->search_record($key);
            $data['session'] = $this->session->userdata();
            $this->load->view('v_search', $data);
        } else $this->index();
    }
}
