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

    public function index(){
        $data['keluhan'] = $this->pelanggan_model->get_keluhan();
        $data['riwayat'] = $this->pelanggan_model->get_riwayat();
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/home.php',$data);
        $this->load->view('template/footer.php');
    }

    public function addkeluhan()
    {
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/addkeluhan.php');
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

    public function add_keluhan(){
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $keluhan = $this->input->post('keluhan');
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul_keluhan'),
            'keluhan' => $this->input->post('keluhan'),
            'status' => "",
            'tanggal_keluhan' => $now
        ];
        $table = 'keluhan';
        $this->pelanggan_model->tambah_keluhan($table,$data);
        redirect('pelanggan');
    }

    public function details($id){
        $data['feedback'] = $this->pelanggan_model->monitor_feedback($id);
        $data['keluhan'] = $this->pelanggan_model->monitor_keluhan($id);
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/details.php',$data);
        $this->load->view('template/footer.php');
    }

    public function tambah_respon($id,$idkeluhan){
        $where=[
            'id_feedback'=>$id
        ];
        $data=[
            'feedback'=>$this->input->post('respon_pelanggan')
        ];
        $table='feedback';
        $this->pelanggan_model->update_data($where,$data,$table);
        redirect('pelanggan/details/'.$idkeluhan);
    }

    public function selesai($id,$id2){
        //ini buat tabel keluhan
        $where=[
            'id_keluhan'=>$id
        ];
        $data=[
            'status'=> "Selesai"
        ];
        $table='keluhan';
        //ini buat tabel feedback
        $where2=[
            'id_feedback'=>$id2
        ];
        $data2=[
            'feedback'=>"Baik,terima kasih saya sudah puas :)"
        ];
        $table2='feedback';
        $this->pelanggan_model->update_data($where2,$data2,$table2);
        $this->pelanggan_model->update_data($where,$data,$table);
        redirect('pelanggan/details/'.$id);
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

}
