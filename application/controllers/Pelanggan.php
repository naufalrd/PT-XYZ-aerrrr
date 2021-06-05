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
        $data['declined'] = $this->pelanggan_model->get_declined();
        $data['keluhan']  = $this->pelanggan_model->get_keluhan();
        $data['riwayat']  = $this->pelanggan_model->get_riwayat();
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/home.php', $data);
        $this->load->view('template/footer.php');
    }

    public function addkeluhan()
    {
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/addkeluhan.php');
        $this->load->view('template/footer.php');
    }

    public function biodata($username)
    {
        $where = [
            'username' => $username
        ];
        $data['pelanggan'] = $this->pelanggan_model->edit_pelanggan($where)->result();
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/biodata.php', $data);
        $this->load->view('template/footer.php');
    }


    public function add_keluhan()
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'judul' => $this->input->post('judul_keluhan'),
            'keluhan' => $this->input->post('keluhan'),
            'status' => "",
            'status_pesan' => "pelanggan",
            'tanggal_keluhan' => $now
        ];
        $table = 'keluhan';
        $this->pelanggan_model->tambah_keluhan($table, $data);
        redirect('pelanggan');
    }

    public function details($id)
    {
        $data['feedback'] = $this->pelanggan_model->monitor_feedback($id);
        $data['keluhan'] = $this->pelanggan_model->monitor_keluhan($id);
        $this->load->view('template/header.php');
        $this->load->view('pelanggan/details.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tambah_respon($id, $idkeluhan)
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        // ini buat tabel feedback
        $where = [
            'id_feedback' => $id
        ];
        $data = [
            'feedback' => $this->input->post('respon_pelanggan'),
            'tanggal_feedback' => $now
        ];
        $table = 'feedback';
        // ini buat tabel keluhan
        $where2 = [
            'id_keluhan' => $idkeluhan
        ];
        $data2 = [
            'status_pesan' => 'pelanggan'
        ];
        $table2 = 'keluhan';
        $this->pelanggan_model->update_data($where, $data, $table);
        $this->pelanggan_model->update_data($where2, $data2, $table2);
        redirect('pelanggan/details/' . $idkeluhan);
    }

    public function selesai($keluhan, $feedback)
    {
        // mabil tgl hr ini
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');

        //ini buat tabel keluhan
        $where = [
            'id_keluhan' => $keluhan
        ];
        $data = [
            'status' => "Selesai",
            'rating' => $this->input->post('rating'),
            'rating_desc' => $this->input->post('rating_desc'),
            'status_pesan' => ''
        ];
        $table = 'keluhan';
        //ini buat tabel feedback
        $where2 = [
            'id_feedback' => $feedback
        ];
        $data2 = [
            'feedback' => "Baik, terimakasih !",
            'tanggal_feedback' => $now
        ];
        $table2 = 'feedback';
        $this->pelanggan_model->update_data($where, $data, $table);
        $this->pelanggan_model->update_data($where2, $data2, $table2);
        redirect('pelanggan/details/' . $keluhan);
    }

    public function update_biodata()
    {
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $email_user = $this->input->post('email_user');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $data = [
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'email_user' => $email_user,
            'no_hp' => $no_hp,
            'nama_belakang' => $nama_belakang,
            'alamat' => $alamat
        ];
        $where = [
            'username' => $this->input->post('username')
        ];
        $table = 'user';
        $update = $this->pelanggan_model->update_data($where, $data, $table);
        if($update){
            echo '<script>alert("Update Biodata Berhasil");window.location.href="' . base_url('pelanggan/') . '";</script>';
        }else{
            echo '<script>alert("Update Biodata GAGAL");window.location.href="' . base_url('pelanggan/') . '";</script>';
        }
    }

    public function update_password()
    {
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $re_password = $this->input->post('re_password');

        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        if (password_verify($old_password, $password)) {
            $data = [
                'password' => $new_password,
            ];
            $where = [
                'id_user' => $id_user
            ];
            $table = 'user';
            $update = $this->pelanggan_model->update_data($where, $data, $table);
            if($update){
                echo '<script>alert("Update Password Berhasil");window.location.href="' . base_url('pelanggan/') . '";</script>';
            }else{
                echo '<script>alert("Update Password GAGAL");window.location.href="' . base_url('pelanggan/') . '";</script>';
            }
        } else {
            // $data = [
            //     'type' => 'error',
            //     'msg' => 'maaf password yang anda masukkan salah.'
            // ];
            // echo json_encode($data);
            echo '<script>alert("Maaf password lama yang anda masukkan salah.");window.location.href="' . base_url('pelanggan/') . '";</script>';
        }
    }

    public function rating(){
        $rating = $this->input->post('rate');
        $review = $this->input->post('review');
        $user = $this->session->userdata('id_user');
        
        $give_rate = $this->pelanggan_model->update_rating($rating, $review, $user);
        if($give_rate){
            echo '<script>alert("Ulasan anda berhasil kami terima, Terimakasih atas masukan anda.");window.location.href="' . base_url('pelanggan/') . '";</script>';
        }else{
            echo '<script>alert("Maaf Sistem Sedang ada sedikit kendala sementara tidak bisa menerima ulasan.");window.location.href="' . base_url('pelanggan/') . '";</script>';
        }
    }
}
