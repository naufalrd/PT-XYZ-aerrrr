<?php
class Direktur_model extends CI_Model{
    public function search_keluhan(){
        $this->db->select('*');
		$this->db->from('keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $where = "keluhan.status = 'Ditinjau' OR keluhan.status ='Selesai'";
        $this->db->where($where);
        $this->db->order_by('keluhan.tanggal_keluhan', 'asc');
        return $this->db->get()->result_array();
    }

    public function search_selesai(){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.status', 'Selesai');
        return $this->db->get()->result_array();
    }

    public function search_diteruskan(){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $where = "status='Diteruskan' OR status='Ditinjau' ";
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

    public function keluhan_selesai(){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->where('status', 'Selesai');
        return $this->db->get()->result_array();
    }

    public function search_jaminankeluhan(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('id_bidang','2');
        $this->db->where('rating !=',NULL);
        return $this->db->get()->result_array();
    }
    public function search_pembelian(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('id_bidang','3');
        $this->db->where('rating !=',NULL);
        return $this->db->get()->result_array();
    }
    public function search_distribusi(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('id_bidang','4');
        $this->db->where('rating !=',NULL);
        return $this->db->get()->result_array();
    }

    public function jumlahRating($bidang){
        $this->db->select('SUM(keluhan.rating) as jumlah, bidang.nama_bidang');
        $this->db->from('keluhan');
		$this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_bidang',$bidang);
        return $this->db->get()->row();
    }

    public function search_bidang(){
        $this->db->select('nama_bidang');
        $this->db->from('bidang');
        $this->db->where('id_bidang >','1');
        return $this->db->get()->result_array();
    }
}