<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey_Model extends CI_Model {
	function __constructor(){
		parent::__construct();
		$this->load->dbforge();
	}

	function check_multi_duplicate($table_name,$where=false,$return=false,$like=false,$join=false){
		$this->db->select('*');
		$this->db->from($table_name);

		if ($join != false) {
			foreach ($join as $value) {
				$this->db->join($value[0], $value[1].'.'.$value[2] .'='. $value[0].'.'.$value[2]);
			}
		}

		if ($where != false) {
			$this->db->where($where);
		}

		if($like != false){
			$this->db->like($like);
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			if ($return != false) {
				$row = $query->row_array();
				return array(true,$row[$return]);
			}else{
				return true;
			}

		}else{
			return false;
		}
	}

	function select($table,$like=false,$where=false,$order=false,$group=false,$where_or=false,$limit=false,$or_like=false,$where_not_in=false,$wni_column=false,$where_in=false){
		if($like != false){
			$this->db->like($like);
		}
		if ($or_like != false) {
			$this->db->or_like($or_like);
		}
		if ($where != false) {
			$this->db->where($where);
		}
		if ($where_or != false) {
			$this->db->or_where($where_or);
		}
		if ($where_not_in != false && $wni_column != false) {
			$this->db->where_not_in($wni_column,$where_not_in);
		}
		if ($where_in != false) {
			$this->db->where_in($where_in[0],$where[1]);
		}
		if ($order != false) {
			$this->db->order_by($order[0],$order[1]);
		}
		if ($group != false) {
			$this->db->group_by($group);
		}
		if ($limit != false) {
			$this->db->limit($limit);
		}

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function select_join($table,$join,$like=false,$where=false,$order=false,$group=false,$or_where=false,$or_like=false,$where_not_in=false,$wni_column=false,$where_in = false){
		$this->db->select('*');
		$this->db->from($table);

		foreach ($join as $value) {
			$this->db->join($value[0], $value[1].'.'.$value[2] .'='. $value[0].'.'.$value[2]);
		}
		if ($where != false) {
			$this->db->where($where);
		}
		if ($or_where != false) {
			foreach ($or_where as $column_name => $column_value) {
				$this->db->or_where($column_name, $column_value);
			}
		}
		if ($where_not_in != false && $wni_column != false) {
			$this->db->where_not_in($wni_column,$where_not_in);
		}
		if ($where_in != false) {
			$this->db->where_in($where_in);
		}
		if ($order != false) {
			$this->db->order_by($order[0], $order[1]);
		}
		if ($group != false) {
			$this->db->group_by($group);
		}
		if($like != false){
			$this->db->like($like);
		}
		if ($or_like != false) {
			$this->db->or_like($or_like);
		}

		$query = $this->db->get();

		if ($query->num_rows > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function single_select($table,$where=false,$join=false){
		if($join != false){
			foreach ($join as $value) {
				$this->db->join($value[0], $value[1].'.'.$value[2] .'='. $value[0].'.'.$value[2]);
			}
		}

		if ($where != false) {
			$this->db->where($where);
		}

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->row();
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

	function update($table_name,$col_id,$data,$id){
		$this->db->where($col_id,$id);
		$this->db->update($table_name,$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

  	function updateNew($table_name,$where=false,$data){
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

	function delete($table_name,$table_id,$id){
		$this->db->where($table_id,$id);
		$this->db->delete($table_name);

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function deleteNew($table_name,$where){
		$this->db->where($where);
		$this->db->delete($table_name);

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function countRows($table,$where=false){
		if ($where != false) {
			$this->db->where($where);
		}
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function check_numrows($table,$where=false){
		if ($where != false) {
			$this->db->where($where);
		}
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function create_db($db){
		$attr = array('ENGINE' => 'InnoDB');
		if ($this->dbforge->create_database($db,TRUE,$attr)) {
			return true;
		}else{
			return false;
		}
	}

	function create_table($array){

		foreach ($array as $value) {
			$this->db->query('use '.$value[3]);

			$this->dbforge->add_field($value[0]);
			$this->dbforge->add_key($value[1]);
			if ($this->dbforge->create_table($value[2],TRUE)) {
				return true;
			}else{
				return false;
			}
		}

	}
}
