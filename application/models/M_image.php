<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_image extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
    }
    
    public function view()
    {
        return $this->db->get('images')->result();
    }

    public function add_image()
    {
        $config['upload_path'] = './assets/img/usr/';
        $config['allowed_types'] = 'gif|jpg|png';
        
        $this->load->library('upload');
    }

    public function get_image($image_id)
    {
        if($image_id) {
            return $this->db->query("SELECT image FROM berteman.images WHERE image_id=$image_id")->row()->image;
        }
        else return "/assets/img/usr/default.jpg";
    }
}
