<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey_Model extends CI_Model {

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

	function select_join($var,$like=false,$where=false){
		$this->db->select('*');
		$this->db->from($var['tab1']);
		$this->db->join($var['tab2'], $var['id1'].'='.$var['id2']);
		//$this->db->where('city', array('city.city_name' => 'Bangalore'));
		if($like != false){
			$this->db->like($like);
		}
		if ($where != false) {
			$this->db->where($where);
		}
		$query = $this->db->get();
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

	function insert_batch($table,$data){
		$query = $this->db->insert_batch($table,$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	function update($table_name,$where=false,$data){
		if ($where != false) {
			$this->db->where($where);
		}

	  $this->db->update($table_name,$data);

	  if ($this->db->affected_rows() > 0) {
		  return true;
	  }else{
		  return false;
	  }
  	}

	function delete($table_name,$where){
		$this->db->where($where);
		$this->db->delete($table_name);

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}
