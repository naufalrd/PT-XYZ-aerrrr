<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
        if($this->session->userdata('level') != '4'){
            if($this->session->userdata('level') != '5'){
                if($this->session->userdata('level') != '6'){
                    redirect('auth/check_level');
                }
            }
        }
    }

    public function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('bidang/home.php');
        $this->load->view('template/footer.php');
    }

    public function tanggapi()
    {
        $this->load->view('template/header.php');
        $this->load->view('bidang/tanggapi.php');
        $this->load->view('template/footer.php');
    }

    public function details()
    {
        $this->load->view('template/header.php');
        $this->load->view('bidang/details.php');
        $this->load->view('template/footer.php');
    }

    public function submit_tanggapan(){
        redirect('operator');
    }
}
