<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bidang_model');
        if ($this->session->userdata('level') < '4') {
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $data['keluhan'] = $this->bidang_model->get_keluhan();
        $data['tinjauan'] = $this->bidang_model->get_tinjauan();
        $data['selesai'] = $this->bidang_model->get_keluhanSelesai();
        $data['penanganan'] = $this->bidang_model->get_time();
        $this->load->view('template/header.php');
        $this->load->view('bidang/home.php', $data);
        $this->load->view('template/footer.php');
    }

    public function tanggapi_keluhan($id_keluhan)
    {
        $data['feedback'] = $this->bidang_model->monitor_feedback($id_keluhan);
        $data['keluhan'] =  $this->bidang_model->get_keluhanbyId($id_keluhan);
        $this->load->view('template/header.php');
        $this->load->view('bidang/tanggapi/tanggapi_feedback.php', $data);
        $this->load->view('template/footer.php');
    }

    public function details($id_keluhan)
    {
        $data['feedback'] = $this->bidang_model->monitor_feedback($id_keluhan);
        $data['keluhan'] = $this->bidang_model->get_keluhanbyId($id_keluhan);
        $this->load->view('template/header.php');
        $this->load->view('bidang/details.php', $data);
        $this->load->view('template/footer.php');
    }

    public function submit_tanggapan()
    {


        $this->load->library('form_validation');
        $this->form_validation->set_rules('respon', 'respon', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();

            $this->session->set_flashdata('errors', $errors);
        } else {
            // data untuk tabel feedback

            $this->load->helper('date');
            date_default_timezone_set('Asia/Jakarta');
            $now = date('Y-m-d');

            $id_keluhan = $this->input->post('id_keluhan');
            $respon = $this->input->post('respon');
            $data = [
                'respon' => $respon,
                'feedback' => '',
                'tanggal_feedback' => '0000-00-00',
                'tanggal_respon' => $now,
                'id_keluhan' => $id_keluhan
            ];
            $insert = $this->bidang_model->insertFeedback("feedback", $data);
            $updateStatus = $this->bidang_model->update_ditinjau($id_keluhan);
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil Menanggapi keluhan.");window.location.href="' . base_url('index.php/bidang/') . '";</script>';
            }
            $this->coba($id_keluhan);
        }
        redirect('bidang');
    }

    public function coba($id_keluhan)
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d');
        $keluhan = $this->bidang_model->ambildata($id_keluhan);
        $data = `Hai, ` . $keluhan['nama_depan'] . " " . $keluhan['nama_belakang'] . "</br>Keluhanmu Dengan Judul " . $keluhan['judul'] . " Telah dibalas oleh " . $keluhan['nama_bidang'] . " Pada Tanggal " . date_indo($now). " Silahkan anda buka websitenya atau silahkan pergi ke halaman <a href='".site_url()."pelanggan/details/".$keluhan['id_keluhan']."'>berikut ini</a>";
        $this->kirimemail($keluhan['email_user'], $data);
    }

    public function kirimemail($email, $data)
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'lfteamupnyk@gmail.com',  // Email gmail
            'smtp_pass'   => 'Lfteamupnyk123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('PT XYZ', 'Keluhanair.com');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Balasan keluhan');

        // Isi email
        $this->email->message($data);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
            redirect('bidang');
        } else {
            echo 'Error! email tidak dapat dikirim.';
            redirect('bidang');
        }
    }
}
