<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bidang_model');
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
        $data['keluhan'] = $this->bidang_model->get_keluhan();
        $data['tinjauan'] = $this->bidang_model->get_tinjauan();
        $data['selesai'] = $this->bidang_model->get_keluhanSelesai();
        $this->load->view('template/header.php');
        $this->load->view('bidang/home.php',$data);
        $this->load->view('template/footer.php');
    }

    public function tanggapi_keluhan($id_keluhan)
    {
        $data['feedback'] = $this->bidang_model->monitor_feedback($id_keluhan);
        $data['keluhan'] =  $this->bidang_model->get_keluhanbyId($id_keluhan);
        $this->load->view('template/header.php');
        $this->load->view('bidang/tanggapi/tanggapi_feedback.php',$data);
        $this->load->view('template/footer.php');
    }

    public function details($id_keluhan)
    {
        $data['feedback'] = $this->bidang_model->monitor_feedback($id_keluhan);
        $data['keluhan'] = $this->bidang_model->monitor_keluhan($id_keluhan);
        $this->load->view('template/header.php');
        $this->load->view('bidang/details.php',$data);
        $this->load->view('template/footer.php');
    }

    public function submit_tanggapan(){
        

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
        }
        redirect('bidang');
    }
}
