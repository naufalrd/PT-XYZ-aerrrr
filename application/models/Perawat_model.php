<?php
class Perawat_model extends CI_Model
{
    
    public function search_id($id){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->join('antrian', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->where('rekam_medis.tensi', '');
        return $this -> db -> where('rekam_medis.id_pasien',$id) -> get() -> result_array();
        // return $this->db->get()->result_array();
       //$query = $this->db->get_where('pasien.id_pasien', array('rekam_medis.id_pasien' => $id));
    //    $query = $this -> db -> get_where('rekam_medis.id_pasien',$id);
    //     return $query->result();
    }

    public function search_pasien(){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->join('antrian', 'antrian.id_pasien = rekam_medis.id_pasien');
        $this->db->where('rekam_medis.diagnosis', '');
        $this->db->where('rekam_medis.tensi', '');
        $this->db->order_by('antrian.no_antri', 'asc');
        return $this->db->get()->result_array();
    }

    public function search_data($id){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        return $this -> db -> where('rekam_medis.id_pasien',$id) -> get() -> result_array();
    }

    public function data_pasien(){
        $this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = rekam_medis.id_dokter');
        $this->db->where('rekam_medis.diagnosis', 0);
        $this->db->where('rekam_medis.tensi !=', 0);
        $this->db->order_by('rekam_medis.id_rekammedis', 'asc');
        return $this->db->get()->result_array();
    }

    public function search_perawat($id, $username){
        $this->db->select('id_perawat');
		$this->db->from('rekam_medis');
		$this->db->join('perawat', 'perawat.id_perawat = rekam_medis.id_perawat');
        $this->db->join('akun', 'akun.id_perawat = perawat.id_perawat');
        return $this -> db -> where('perawat.username_perawat',$id) -> get() -> result_array();
    }

    public function update_tensi()
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d');
        $this->db->select('id_perawat');
        $this->db->from('perawat');
        $id_perawat = $this -> db -> where('username_perawat',$this->session->userdata('username')) -> get() -> result_array();
        
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'diagnosis' => $this->input->post('diagnosis'),
            'obat' => $this->input->post('obat'),
            'tensi' => $this->input->post('tensi'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_perawat' => $id_perawat[0]['id_perawat'],
            'tanggal' => $now
        );
        $this->db-> where('id_pasien', $data['id_pasien'])->update('rekam_medis', $data);
        $this -> db -> where('no_antri',$this->input->post('no_antri')) -> delete('antrian');
    }

    public function update_data()
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d');
        $this->db->select('id_perawat');
        $this->db->from('perawat');
        $id_perawat = $this -> db -> where('username_perawat',$this->session->userdata('username')) -> get() -> result_array();
        
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'diagnosis' => $this->input->post('diagnosis'),
            'obat' => $this->input->post('obat'),
            'tensi' => $this->input->post('tensi'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_perawat' => $id_perawat[0]['id_perawat'],
            'tanggal' => $now
        );
        $this->db->update('rekam_medis', $data);
    }
    
}
