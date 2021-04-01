<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
        if($this->session->userdata('level') !='2'){
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $this->load->view('template/header.php');
        $this->load->view('operator/home.php');
        $this->load->view('template/footer.php');
    }

    public function teruskan()
    {
        $this->load->view('template/header.php');
        $this->load->view('operator/teruskan.php');
        $this->load->view('template/footer.php');
    }

    public function submit_data(){
        redirect('operator');
    }

    public function user()
    {
        $this->load->view('template/header.php');
        $this->load->view('operator/user/home.php');
        $this->load->view('template/footer.php');
    }
    
    public function add_form(){
        $this->load->view('template/header.php');
        $this->load->view('operator/user/add_form.php');
        $this->load->view('template/footer.php');
    }
    
    public function edit_form(){
        $this->load->view('template/header.php');
        $this->load->view('operator/user/edit_form.php');
        $this->load->view('template/footer.php');
    }

    // proses menambahkan user
    public function add_user(){
        redirect('operator');
    }
}
