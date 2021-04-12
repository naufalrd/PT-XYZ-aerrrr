<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model{
    public function edit_pelanggan($where){
        return $this->db->get_where('user',$where);
    }
    
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function tambah_keluhan($table,$data){
        $this->db->insert($table,$data);
    }

    public function get_keluhan(){
        $this->db->from('keluhan');
        $id_user = $this->session->userdata('id_user');
        $where = "id_user='$id_user' AND (status = '' OR status = 'Ditinjau' OR status ='Diteruskan')";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function get_riwayat(){
        $this->db->from('keluhan');
        $id_user = $this->session->userdata('id_user');
        $where = "id_user='$id_user' AND status = 'Selesai'";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    
    public function monitor_feedback($id){
        $this->db->select('*');
		$this->db->from('feedback');
        $this->db->join('keluhan', 'feedback.id_keluhan = keluhan.id_keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_keluhan', $id);
        $this->db->order_by('feedback.id_feedback', 'asc');
        return $this->db->get()->result_array();
    }

    public function monitor_keluhan($id){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->where('keluhan.id_keluhan', $id);
        return $this->db->get()->result_array();
    }
}
