<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add()
    {
        $data = [
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'password' => MD5($this->input->post('password')),
            'username' => $this->input->post('username')
        ];
        $this->db->insert('users', $data);
    }

    public function add_friend($username)
    {
        if (isset($username)) {
            $data = array(
                'username_1' => $this->m_user->logged_id(),
                'username_2' => $username
            );
            $this->db->insert('pertemanan', $data);
        }
    }

    public function edit()
    {
        $data = [
            'fullname' => $this->input->post('fullname'),
            'address' => $this->input->post('address'),
            'password' => MD5($this->input->post('password')),
            'username' => $this->input->post('username')
        ];
        $this->db->where('username', $data['username']);
        $this->db->update('users', $data);
    }

    public function get_friend($username)
    {
        $sql = "SELECT DISTINCT username_1 as username, username_2 as username FROM berteman.pertemanan 
            WHERE username_1 = '$username' OR username_2 = '$username';";
        return $this->db->query($sql)->result();
    }

    public function get_data($users)
    {
        if (is_array($users)) {
            $sql = "SELECT * FROM berteman.users WHERE username IN (";
            foreach ($users as $user) {
                $sql .= "'$user->username'";
                if ($user != end($users)) {
                    $sql .= ", ";
                } else $sql .= ");";
            }
            return $this->db->query($sql)->result();
        } else return $this->db->query("SELECT * FROM berteman.users WHERE username = '$users';")->row();
    }

    public function logged_id()
    {
        return $this->session->userdata('username');
    }

    public function search_record($key)
    {
        $this->db->select('users.*, images.image');
        $this->db->from('users');
        $this->db->join('images', 'images.image_id = users.profile_pic', 'left');
        $this->db->like('username', $key);
        $this->db->or_like('email', $key);
        $this->db->or_like('fullname', $key);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    public function view()
    {
        return $this->db->get('users')->result();
    }
}
