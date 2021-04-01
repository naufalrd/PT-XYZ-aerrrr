<?php
class Dokter_model extends CI_Model{

    public function search_id($id){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        return $this -> db -> where('rekam_medis.id_rekammedis',$id) -> get() -> result_array();
    }
// atas
    public function search_pasien(){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->where('rekam_medis.obat', '');
        $this->db->where('rekam_medis.tensi !=', '');
        $this->db->where('dokter.username_dokter', $this->session->userdata('username'));
        $this->db->order_by('rekam_medis.id_rekammedis', 'asc');
        return $this->db->get()->result_array();
    }
// bawah
    public function data_pasien(){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->where('rekam_medis.obat !=', '');
        $this->db->where('rekam_medis.tensi !=', '');
        $this->db->order_by('rekam_medis.id_rekammedis', 'asc');
        return $this->db->get()->result_array();
    }

    public function search_data($id){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        return $this -> db -> where('rekam_medis.id_rekammedis',$id) -> get() -> result_array();
    }


    public function editPostQuery($id){
        $this->db->select('id_dokter');
        $this->db->from('dokter');
        $id_dokter = $this -> db -> where('username_dokter',$this->session->userdata('username')) -> get() -> result_array();
        
        $data = array(
            'id_rekammedis' => $this -> input -> post('id_rekammedis'),
            'id_pasien' => $this -> input -> post('id_pasien'),
            'diagnosis' => $this -> input -> post('diagnosis'),
            'obat' => $this -> input -> post('obat'),
            'tensi' => $this -> input -> post('tensi'),
            'id_dokter' => $id_dokter[0]['id_dokter'],
            'id_perawat' => $this -> input -> post('id_perawat'),
            'tanggal' => $this -> input -> post('tanggal')
            
        );
        $this -> db -> where('id_rekammedis',$id) -> update('rekam_medis',$data);
    }

    public function update_data($id)
    {
        $this->db->select('id_dokter');
        $this->db->from('dokter');
        $id_dokter = $this -> db -> where('username_dokter',$this->session->userdata('username')) -> get() -> result_array();
        
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'diagnosis' => $this->input->post('diagnosis'),
            'obat' => $this->input->post('obat'),
            'tensi' => $this->input->post('tensi'),
            'id_dokter' => $id_dokter[0]['id_dokter'],
            'id_perawat' => $this->input->post('id_dokter'),
            'tanggal' => $this->input->post('tanggal')
        );
        $this->db-> where('id_rekammedis',$id) -> update('rekam_medis', $data);
    }

    public function deletePostQuery($id){
        $this -> db -> where('id_pasien',$id) -> delete('rekam_medis');
    }
}