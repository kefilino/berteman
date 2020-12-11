<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_post');
    }

    public function index()
    {
        redirect(base_url());
    }

    public function add()
    {
        $this->form_validation->set_rules('text', 'Teks', 'required');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">%s tidak boleh kosong!</div>');

        if ($this->form_validation->run() == TRUE) {
            $this->m_post->create();
            $this->index();
        } else {
            $this->index();
        }
    }

    public function edit($post_id)
    {
        $this->form_validation->set_rules('text', 'Teks', 'required');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">%s tidak boleh kosong!</div>');

        $this->db->set('text', $this->input->post('text'));
        $this->db->where('post_id', $post_id);
        $this->db->update('posts');

        $this->index();
    }

    public function delete($post_id)
    {
        $this->m_post->delete($post_id);
        $this->index();
    }
}
