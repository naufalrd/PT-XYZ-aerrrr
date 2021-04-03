<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    //ambil id bidang
    public function get_bidangId(){
        $this->db->select('id_bidang');
        $this->db->from('level');
        $this->db->where('id_level', $this->session->userdata('level'));
        return $this->db->get()->result();
    }

    //atas
    public function get_keluhan($id_bidang){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_bidang', $id_bidang);
        $this->db->where('keluhan.status', 'Diteruskan');
        return $this->db->get()->result_array();
    }

    //bawah
    public function get_keluhanDitangani($id_bidang){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        // $this->db->join('feedback',' feedback.id_keluhan = keluhan.id_keluhan');
        $this->db->where('keluhan.id_bidang', $id_bidang);
        $this->db->where('keluhan.status', 'Ditinjau');
        return $this->db->get()->result_array();
    }

    //tangapan
    public function get_keluhanbyId($id_keluhan){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_keluhan', $id_keluhan);
        return $this->db->get()->result_array();
    }

    public function insertFeedback($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update_ditinjau($id_keluhan)
    {   
        $data = array(
            'status' => 'Ditinjau'
        );
        $this->db->where('id_keluhan',$id_keluhan)->update('keluhan', $data);
    }

    // public function get_riwayatKeluhanbyId($id_keluhan){
    //     $this->db->select('*');
    //     $this->db->from('keluhan');
    //     $this->db->join('user',"user.id_user = keluhan.id_user");
    //     $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
    //     $this->db->join('feedback',' feedback.id_keluhan = keluhan.id_keluhan');
    //     $this->db->where('keluhan.id_keluhan', $id_keluhan);
    //     return $this->db->get()->result_array();
    // }

    public function monitor_feedback($id_keluhan){
        $this->db->select('*');
		$this->db->from('feedback');
        $this->db->join('keluhan', 'feedback.id_keluhan = keluhan.id_keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_keluhan', $id_keluhan);
        $this->db->order_by('feedback.id_feedback', 'asc');
        return $this->db->get()->result_array();
    }

    public function monitor_keluhan($id_keluhan){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->where('keluhan.id_keluhan', $id_keluhan);
        return $this->db->get()->result_array();
    }
}
