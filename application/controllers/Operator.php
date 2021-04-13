<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator_model');
        if($this->session->userdata('level') !='2'){
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $data['keluhan'] = $this->operator_model->search_keluhan();
        $data['selesai'] = $this->operator_model->get_keluhanSelesai();
        $this->load->view('template/header.php');
        $this->load->view('operator/home.php',$data);
        $this->load->view('template/footer.php');
    }

    public function teruskan($id)
    {
        $data['keluhan'] = $this->operator_model->search_teruskan($id);
        $data['bidang'] = $this->operator_model->search_bidang();
        $this->load->view('template/header.php');
        $this->load->view('operator/teruskan.php',$data);
        $this->load->view('template/footer.php');
    }

    public function tolak($id)
	{
		$this->operator_model->update_tolak($id);
		redirect('operator');
	}

    public function teruskanbidang()
	{
		$this->operator_model->update_teruskan();
		redirect('operator');
	}

    public function submit_data(){
        redirect('operator');
    }

    public function details($id_keluhan)
    {
        $data['feedback'] = $this->operator_model->monitor_feedback($id_keluhan);
        $data['keluhan'] = $this->operator_model->monitor_keluhan($id_keluhan);
        $this->load->view('template/header.php');
        $this->load->view('operator/details.php',$data);
        $this->load->view('template/footer.php');
    }

    public function user()
    {
        $data['user'] = $this->operator_model->search_user();
        $data['bidang'] = $this->operator_model->search_bidang();
        $this->load->view('template/header.php');
        $this->load->view('operator/user/home.php',$data);
        $this->load->view('template/footer.php');
    }
    
    public function add_form(){
        $data['level'] = $this->operator_model->search_level();
        $this->load->view('template/header.php');
        $this->load->view('operator/user/add_form.php',$data);
        $this->load->view('template/footer.php');
    }
    
    public function edit_form($id){
        $data['user'] = $this->operator_model->search_iduser($id);
        $data['level'] = $this->operator_model->search_level();
        $this->load->view('template/header.php');
        $this->load->view('operator/user/edit_form.php',$data);
        $this->load->view('template/footer.php');
    }

    public function edit_user($id)
	{
		$this->operator_model->update_user($id);
		redirect('operator/user');
	}

    // proses menambahkan user
    public function add_user(){
        
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[user.username]');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('operator/add_form');
        } else {
            $insert = $this->operator_model->create_user();
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil menambah akun. Silahkan login untuk mengakses data.");window.location.href="' . base_url('index.php/auth/login') . '";</script>';
            }
        }

        redirect('operator/user');
    }

    public function delete_user($id){
        $this->operator_model->delete_user($id);
        redirect('operator/user');
    }

    public function add_bidang(){
        $data['level'] = $this->operator_model->search_level();
        $this->load->view('template/header.php');
        $this->load->view('operator/user/add_bidang.php',$data);
        $this->load->view('template/footer.php');
    }

    public function edit_bidang($id){
        $data['bidang'] = $this->operator_model->search_idbidang($id);
        $data['level'] = $this->operator_model->search_level();
        $this->load->view('template/header.php');
        $this->load->view('operator/user/edit_bidang.php',$data);
        $this->load->view('template/footer.php');
    }

    public function delete_bidang($id){
        $this->operator_model->delete_bidang($id);
        redirect('operator/user');
    }
}
