<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->model('m_image');
          $this->load->model('m_post');
          $this->load->model('m_user');
     }

     public function index()
     {
          if ($this->m_user->logged_id()) {
               $user_friends = $this->m_user->get_friend($this->session->userdata['username']);
               $data['user'] = $this->session->userdata();
               $data['posts'] = $this->m_post->feeds_post($user_friends);
               $data['images'] = $this->m_post->post_images($user_friends);
               $this->load->view('v_home', $data);
          } else redirect(base_url());
     }

     public function logout()
     {
          $this->session->sess_destroy();
          redirect(base_url());
     }
}
