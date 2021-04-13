<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    // go to login pages 
    public function login()
    {
        if ($this->session->userdata('level')) {
			redirect('auth/check_level');
		}
        $data = [
            'title' => 'Login'
        ];
        $this->load->view('template/auth/header.php', $data);
        $this->load->view('auth/login.php');
        $this->load->view('template/auth/footer.php');
    }

    // go to register pages
    public function register()
    {
        if ($this->session->userdata('level')) {
			redirect('auth/check_level');
		}
        $data = [
            'title' => 'Register'
        ];
        $this->load->view('template/auth/header.php', $data);
        $this->load->view('auth/register.php');
        $this->load->view('template/auth/footer.php');
    }

    // check register user
    public function check_register()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[user.username]');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/register');
        } else {
            // data untuk tabel akun
            $username = $this->input->post('username');
            $email_user = $this->input->post('email_user');
            $level = '1';
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');
            $data = [
                'email_user' => $email_user,
                'username' => $username,
                'id_level' => $level,
                'password' => $pass,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
            ];
            $insert = $this->auth_model->register("user", $data);
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('index.php/auth/login') . '";</script>';
            }
        }
    }

    // check login
    public function check_login()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('/auth/login'); // LOGIN

        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $pass = htmlspecialchars($this->input->post('password'));

            // CEK KE DATABASE BERDASARKAN EMAIL
            $cek_login = $this->auth_model->cek_login($username);

            if ($cek_login == FALSE) {
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('/auth/login') . '";</script>';
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    // if the username and password is a match
                    $this->session->set_userdata('id_user', $cek_login->id_user);
                    $this->session->set_userdata('username', $cek_login->username);
                    $this->session->set_userdata('nama_depan', $cek_login->nama_depan);
                    $this->session->set_userdata('nama_belakang', $cek_login->nama_belakang);
                    $this->session->set_userdata('level', $cek_login->id_level);
                    $this->session->set_userdata('id_bidang', $this->auth_model->cek_bidang($this->session->userdata('username')));
                    
                    if ($this->session->userdata('level') == '1') {
                        redirect('/pelanggan');
                    } else if ($this->session->userdata('level') == '2') {
                        redirect('/operator');
                    } else if ($this->session->userdata('level') == '3') {
                        redirect('/direktur');
                    } else if ($this->session->userdata('level') >= '4') {
                        redirect('/bidang');
                    }
                } else {
                    echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="' . base_url('auth/login') . '";</script>';
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function check_level(){
        if($this->session->userdata('level')){
            if ($this->session->userdata('level') == '1') {
                redirect('/pelanggan');
            } else if ($this->session->userdata('level') == '2') {
                redirect('/operator');
            } else if ($this->session->userdata('level') == '3') {
                redirect('/direktur');
            } else if ($this->session->userdata('level') >= '4') {
                // var_dump($this->auth_model->cek_bidang($this->session->userdata('id_user')));
                redirect('/bidang');
            } 
        } else {
            redirect('auth/login');
        }
    }
}
