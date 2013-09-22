<?php

class AppDivisionModel extends CI_Model {
	private $primary_key='id_division';
	private $table_name='app_division';
	
	function __construct(){
		parent::__construct();
		$this->load->database('timeline');
	}
	
	function getLoad($limit=1000,$offset=0, $order_column='',$order_type='asc') {
		$query = "SELECT ad.* FROM app_division ad ORDER BY $order_column $order_type limit $offset, $limit";
		return $this->db->query($query);
	}
	
	function countAll(){
		return $this->db->count_all($this->table_name);
	}
	
	function getById($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	
	function save($data){
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
	}
	
	function update($id,$data){
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
	}
	
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
	}
}