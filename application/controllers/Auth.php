<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model',  'menu');
    }

    public function index()
    {
            $data['title'] = 'Profile Developer'; 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profileDev/index', $data);
            $this->load->view('templates/footer', $data);
    }
}
