<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
    }

    public function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/home.php');
        $this->load->view('template/footer.php');
    }

    public function details()
    {
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/details.php');
        $this->load->view('template/footer.php');
    }

    public function end_keluhan()
    {
        redirect('pelanggan');
    }
}
