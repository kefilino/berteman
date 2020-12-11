<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        if ($this->m_user->logged_id()) {
            redirect(base_url('index.php/home'));
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '<div class="alert alert-danger">%s tidak boleh kosong!</div>');
                
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));
                $user = $this->db->get_where('users', ['username' => $username])->row_array();
                if ($password == $user['password']) {
                    foreach ($user as $apps) {
                        $this->session->set_userdata('username', $username);
                        $this->session->set_userdata('userpass', $password);
                        $this->session->set_userdata('fullname', $user['fullname']);
                        redirect('home');
                    }
                } else {
                    $data['error'] = '<div class="alert alert-danger">
                            <b><i class="fa fa-exclamation-circle"></i>ERROR!</b> Username atau password salah!
                        </div>';

                    $this->load->view('v_login', $data);
                }
            } else {
                $this->load->view('v_login');
            }
        }
    }
    
}
