<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('direktur_model');
        if($this->session->userdata('level') != '3'){
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $data['keluhan'] = $this->direktur_model->search_keluhan();
        $this->load->view('template/header.php');
        $this->load->view('direktur/home.php',$data);
        $this->load->view('template/footer.php');
    }

    public function details($id)
    {
        $data['feedback'] = $this->direktur_model->monitor_feedback($id);
        $data['keluhan'] = $this->direktur_model->monitor_keluhan($id);
        $this->load->view('template/header.php');
        $this->load->view('direktur/details.php',$data);
        $this->load->view('template/footer.php');
    }
}
