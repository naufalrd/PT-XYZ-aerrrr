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
    public function data_pasien()
    {
        $this->db->select('*');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->where('rekam_medis.obat !=', '');
        $this->db->where('rekam_medis.tensi !=', '');
        $this->db->order_by('rekam_medis.id_rekammedis', 'asc');
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
        return $this->db->get()->result_array();
    }

    public function update_user($id)
    {
        $this->db->select('id_user');
        $this->db->from('user');
        #$id_dokter = $this -> db -> where('username_dokter',$this->session->userdata('username')) -> get() -> result_array();

        $data = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
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
            'id_user' => $this->input->post('id_user'),
            'judul' => $this->input->post('judul'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal_keluhan' => $this->input->post('tanggal_keluhan'),
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
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $pass,
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
