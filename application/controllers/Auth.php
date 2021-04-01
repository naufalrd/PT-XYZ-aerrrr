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
        $this->load->view('template/auth/header.php');
        $this->load->view('auth/login.php');
        $this->load->view('template/auth/footer.php');
    }

    // go to register pages
    public function register()
    {
        if ($this->session->userdata('level')) {
			redirect('auth/check_level');
		}
        $this->load->view('template/auth/header.php');
        $this->load->view('auth/register.php');
        $this->load->view('template/auth/footer.php');
    }

    // check register pasien
    public function check_register_pasien()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username_pasien', 'Username', 'required|min_length[5]|max_length[15]|is_unique[akun.username]');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            // redirect('auth/register');
        } else {
            // data untuk tabel akun
            $username = $this->input->post('username_pasien');
            $level = 'pasien';
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            // data untuk tabel pasien
            $nama_pasien = $this->input->post('nama_pasien');
            $umur_pasien = $this->input->post('umur_pasien');
            $alamat_pasien = $this->input->post('alamat_pasien');
            $data = [
                'username' => $username,
                'level' => $level,
                'password' => $pass
            ];
            $insert = $this->auth_model->register("akun", $data);
            $data1 = [
                'username_pasien' => $username,
                'nama_pasien' => $nama_pasien,
                'umur_pasien' => $umur_pasien,
                'alamat_pasien' => $alamat_pasien,
            ];
            $insert = $this->auth_model->register("pasien", $data1);
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
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('/index.php/auth/login') . '";</script>';
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    // if the username and password is a match
                    $this->session->set_userdata('username', $cek_login->username);
                    $this->session->set_userdata('level', $cek_login->level);

                    if ($this->session->userdata('level') == 'admin') {
                        redirect('/admin');
                    } else if ($this->session->userdata('level') == 'dokter') {
                        redirect('/dokter');
                    } else if ($this->session->userdata('level') == 'perawat') {
                        redirect('/perawat');
                    }
                    if ($this->session->userdata('level') == 'pasien') {
                        redirect('pasien');
                    }
                } else {
                    echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="' . base_url('/index.php/auth/login') . '";</script>';
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
        if ($this->session->userdata('level') == 'admin') {
            redirect('/admin');
        } else if ($this->session->userdata('level') == 'dokter') {
            redirect('/dokter');
        } else if ($this->session->userdata('level') == 'perawat') {
            redirect('/perawat');
        }
        if ($this->session->userdata('level') == 'pasien') {
            redirect('pasien');
        }
    }
}
