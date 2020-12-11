<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_post extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function view()
    {
        return $this->db->get('posts')->result();
    }

    public function create()
    {
        $data = [
            'text' => $this->input->post('text'),
            'date' => date('Y-m-d H:i:s'),
            'author' => $this->session->userdata('username')
        ];
        $this->db->insert('posts', $data);
    }

    public function delete($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
    }

    public function feeds_post($users)
    {
        $sql = "SELECT posts.*, users.fullname, users.profile_pic, images.image FROM berteman.posts 
                INNER JOIN berteman.users on posts.author = users.username
                LEFT JOIN berteman.images on users.profile_pic = images.image_id WHERE author IN ('";
        $sql .= $this->session->userdata('username');

        $sql .= empty($users) ? "'" : "',";

        foreach ($users as $user) {
            $sql .= "'$user->username'";
            if ($user != end($users)) {
                $sql .= ",";
            }
        }
        $sql .= ") ORDER BY date DESC LIMIT 10;";
        return $this->db->query($sql)->result();
    }

    public function post_images($users)
    {
        if ($users) {
            $sql = "SELECT posts.post_id, images.image FROM berteman.posts 
                INNER JOIN berteman.images on posts.images = images.image_id WHERE author IN (";
            foreach ($users as $user) {
                $sql .= "'$user->username'";
                if ($user != end($users)) {
                    $sql .= ", ";
                } else $sql .= ") ORDER BY date DESC LIMIT 10;";
            }
            return $this->db->query($sql)->result();
        } else return NULL;
    }
}
