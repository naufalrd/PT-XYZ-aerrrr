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
}
