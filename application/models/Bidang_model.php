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

    //home atas
    public function get_keluhan(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $id_bidang = $this->session->userdata('id_bidang');
        $where = "keluhan.id_bidang='$id_bidang' AND (status='Diteruskan' OR status='Ditinjau') AND status_pesan = 'pelanggan'";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    //home tengah
    public function get_tinjauan(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $id_bidang = $this->session->userdata('id_bidang');
        $where = "keluhan.id_bidang='$id_bidang' AND (status='Diteruskan' OR status='Ditinjau') AND status_pesan = 'bidang'";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    //home bawah
    public function get_keluhanSelesai(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $id_bidang = $this->session->userdata('id_bidang');
        $where = "keluhan.id_bidang='$id_bidang' AND (status='Selesai') AND status_pesan = ''";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function get_time(){
        $this->db->select('keluhan.id_keluhan,tanggal_keluhan,feedback.id_keluhan, tanggal_respon');
        $this->db->from('keluhan');
        $this->db->join('feedback','feedback.id_keluhan = keluhan.id_keluhan');
        $id_bidang = $this->session->userdata('id_bidang');
        $where = "keluhan.id_bidang='$id_bidang' AND (status='Selesai') ";
        $this->db->where($where);
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
            'status' => 'Ditinjau',
            'status_pesan' => 'bidang'
        );
        $this->db->where('id_keluhan',$id_keluhan)->update('keluhan', $data);
    }

    public function get_riwayatKeluhanbyId($id_keluhan){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $this->db->join('feedback',' feedback.id_keluhan = keluhan.id_keluhan');
        $this->db->where('keluhan.id_keluhan', $id_keluhan);
        return $this->db->get()->result_array();
    }



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

    public function ambildata($id_keluhan){
        $this->db->select('*');
		$this->db->from('keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_keluhan', $id_keluhan);
        return $this->db->get()->result_array()['0'];
    }
}
