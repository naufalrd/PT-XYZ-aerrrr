<?php
class Operator_model extends CI_Model
{

    public function search_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level', 'user.id_level = level.id_level');
        $this->db->join('bidang', 'level.id_bidang = bidang.id_bidang');
        return $this->db->get()->result_array();
    }
    // atas
    public function search_keluhan()
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user', 'user.id_user = keluhan.id_user');
        //$this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.status', '');
        $this->db->or_where('keluhan.status !=', 'Ditolak');
        $this->db->where('keluhan.id_bidang', NULL);
        $this->db->order_by('keluhan.tanggal_keluhan', 'asc');
        return $this->db->get()->result_array();
    }
    // bawah
    
    public function get_keluhanSelesai(){
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->join('user',"user.id_user = keluhan.id_user");
        $this->db->join('bidang',' bidang.id_bidang = keluhan.id_bidang');
        $id_bidang = $this->session->userdata('id_bidang');
        $where = "status='Diteruskan' OR status='Selesai' OR status='Ditinjau' AND status_pesan = ''";
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function search_iduser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level', 'user.id_level = level.id_level');
        $this->db->join('bidang', 'level.id_bidang = bidang.id_bidang');
        return $this->db->where('user.id_user', $id)->get()->result_array();
    }

    public function search_level()
    {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->join('bidang', 'level.id_bidang = bidang.id_bidang');
        return $this->db->get()->result_array();
    }

    public function search_bidang()
    {
        $this->db->select('*');
        $this->db->from('bidang');
        $this->db->where('bidang.id_bidang >=', '2');
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

    public function update_user($id)
    {
        $this->db->select('id_user');
        $this->db->from('user');
        #$id_dokter = $this -> db -> where('username_dokter',$this->session->userdata('username')) -> get() -> result_array();

        $data = array(
            'email_user' => $this->input->post('email_user'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'id_level' => $this->input->post('id_level')
        );
        $this->db->where('id_user', $id)->update('user', $data);
    }

    public function update_tolak($id)
    {
        $data = array(
            'status' => 'Ditolak'
        );
        $this->db->where('id_keluhan', $id)->update('keluhan', $data);
    }

    public function search_teruskan($id)
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('keluhan.id_keluhan',$id);
        return $this->db->get()->result_array();
    }

    public function update_teruskan()
    {
        $this->db->select('id_keluhan');
        $this->db->from('keluhan');

        $data = array(
            'id_keluhan' => $this->input->post('id_keluhan'),
            'status' => 'Diteruskan',
            'id_bidang' =>   $this->input->post('id_bidang')
        );
        $this->db->where('id_keluhan', $data['id_keluhan'])->update('keluhan', $data);
    }

    public function create_user()
    {
        $this->db->select('id_user');
        $this->db->from('user');
        #$id_dokter = $this -> db -> where('username_dokter',$this->session->userdata('username')) -> get() -> result_array();
        $password = $this->input->post('password');
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'email_user' => $this->input->post('email_user'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $pass,
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'id_level' => $this->input->post('id_level')
        );
        return $this->db->insert('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id_user', $id)->delete('user');
    }
}
