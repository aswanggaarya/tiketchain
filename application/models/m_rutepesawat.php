<?php 
 
class M_rutepesawat extends CI_Model{
	public function tampil_data(){
		return $this->db->get('rutepesawat');
	}

	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}