<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        if ($this->session->userdata('level') != '1') {
            redirect('auth/check_level');
        }
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


    public function biodata($username){
        $where=[
            'username'=>$username
        ];
        $data['pelanggan'] = $this->pelanggan_model->edit_pelanggan($where)->result();
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/biodata.php',$data);
        $this->load->view('template/footer.php');
    }
    public function add_keluhan()
    {
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/addkeluhan.php');
        $this->load->view('template/footer.php');
    }

    public function update_biodata(){
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $alamat = $this->input->post('alamat');
        $data = [
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'alamat' => $alamat
        ];
        $where =[
            'username' => $this->input->post('username')
        ];
        $table = 'user';
        $this->pelanggan_model->update_data($where,$data,$table);
        redirect('pelanggan');
    }

    public function end_keluhan()
    {
        redirect('pelanggan');
    }
}
