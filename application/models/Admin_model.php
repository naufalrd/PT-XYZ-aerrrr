<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model{
    //CRUD ADMIN
    public function get_admin(){
        return $this->db->get('admin')->result_array();
    }
    public function hapus_admin($where,$whereakun){
        $this->db->where($where);
        $this->db->delete('admin');
        $this->db->where($whereakun);
        $this->db->delete('akun');
    }

    //CRUD DOKTER
    public function get_dokter(){
        return $this->db->get('dokter')->result_array();
    }
    public function hapus_dokter($where,$whereakun){
        $this->db->where($where);
        $this->db->delete('dokter');
        $this->db->where($whereakun);
        $this->db->delete('akun');
    }
    public function edit_data_dokter($where){
        return $this->db->get_where('dokter',$where);
    }
    //CRUD PERAWAT
    public function get_perawat(){
        return $this->db->get('perawat')->result_array();
    }
    public function hapus_perawat($where,$whereakun){
        $this->db->where($where);
        $this->db->delete('perawat');
        $this->db->where($whereakun);
        $this->db->delete('akun');
    }
    public function edit_data_perawat($where){
        return $this->db->get_where('perawat',$where);
    }
    //CRUD PASIEN
    public function get_pasien(){
        return $this->db->get('pasien')->result_array();
    }
    public function hapus_pasien($where,$whereakun){
        $this->db->where($where);
        $this->db->delete('pasien');
        $this->db->where($whereakun);
        $this->db->delete('akun');
    }
    public function edit_data_pasien($where){
        return $this->db->get_where('pasien',$where);
    }
    public function ganti_jadwal($table,$where,$data){
        $this->db->where($where);
        $this->db->update($table,$data);    
    }
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}
