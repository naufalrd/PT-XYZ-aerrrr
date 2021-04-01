<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
        if($this->session->userdata('level') != 3){
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('direktur/home.php');
        $this->load->view('template/footer.php');
    }

    public function details()
    {
        $this->load->view('template/header.php');
        $this->load->view('direktur/details.php');
        $this->load->view('template/footer.php');
    }
}
