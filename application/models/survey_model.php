<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey_Model extends CI_Model {
	function __constructor(){
		parent::__construct();
		$this->load->dbforge();
	}

	function select($table,$like=false,$where=false){
		if($like != false){
			$this->db->like($like);
		}
		
		if ($where != false) {
			$this->db->where($where);
		}		

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function insert($table,$data,$return=false){
		$this->db->insert($table,$data);

		if ($this->db->affected_rows() > 0) {
			if ($return != false) {
				return array(true,$this->db->insert_id());
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
}
