<?php
class Mdl_Common extends CI_Model {
	private $pk='';
	private $tb='';
	
	function __construct(){
		 parent::__construct();
	}
	
	
	public function set_login($data_record) {
		$data_record['hahaha'] = "";
	}
	
	public function set_pk($primary_key) {
		$this->pk = $primary_key;
	}
	
	public function set_tb($table_name) {
		$this->tb = $table_name;
	}
	
	function records($order=null) {
		if($order != null) {
			return $this->db->get($this->tb);
		}
		else
			return $this->db->get($this->tb);
	}
	
	function record($id){
		$this->db->where($this->pk,$id);
		return $this->db->get($this->tb);
	}
	
	function save($data_record){
		$this->db->insert($this->tb,$data_record);
		return $this->db->insert_id();
	}
	
	function update($id,$data_record){
		$this->db->where($this->pk,$id);
		$this->db->update($this->tb,$data_record);
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}