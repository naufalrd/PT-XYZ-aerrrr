<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    //ambil id pasien
    public function get_pasienId($username){
        $this->db->select('id_pasien');
        $this->db->from('pasien');
        $this->db->where('username_pasien', $username);
        return $this->db->get()->result();
    }

    public function get_antrian($id_pasien){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien',"pasien.id_pasien = antrian.id_pasien");
        $this->db->join('dokter','antrian.id_dokter = dokter.id_dokter');
        $this->db->where('pasien.username_pasien', $this->session->userdata('username'));
        return $this->db->get()->result_array();
    }

    public function get_diagnosa($id_pasien){
        $this->db->select('*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien',"pasien.id_pasien = rekam_medis.id_pasien");
        $this->db->join('dokter','rekam_medis.id_dokter = dokter.id_dokter');
        $this->db->where('rekam_medis.tensi !=', '');
        $this->db->where('rekam_medis.diagnosis !=', '');
        $this->db->where('rekam_medis.obat !=', '');
        $this->db->where('pasien.username_pasien', $this->session->userdata('username'));
        return $this->db->get()->result_array();
    }

    public function get_lastAntri(){
        $this->db->select_max('no_antri');
        $this->db->from('antrian');
        return $this->db->get()->result();
    }

    public function get_dokter(){
        return $this->db->get('dokter')->result_array();
    }
    
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    
    public function get_antrianbyno($no_antri){
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('pasien',"antrian.id_pasien = pasien.id_pasien");
        $this->db->join('dokter','antrian.id_dokter = dokter.id_dokter');
        $this->db->where('no_antri', $no_antri);
        return $this->db->get()->result_array();
    }

    public function get_diagnosabyid($id_rekammedis){
        $this->db->select('*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien',"rekam_medis.id_pasien = pasien.id_pasien");
        $this->db->join('dokter','rekam_medis.id_dokter = dokter.id_dokter');
        // $this->db->join('perawat','perawat.id_perawat = rekam_medis.id_perawat');
        $this->db->where('id_rekammedis', $id_rekammedis);
        return $this->db->get()->result_array();
    }

}
