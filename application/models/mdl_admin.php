<?php
class Mdl_Admin extends CI_Model {
	private $pk='id_user';
	private $tb='user';
	
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
	
	function records($status=FALSE) {
		if($status === FALSE)
		return $this->db->query("
			SELECT usr.*, rusr.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			WHERE rusr.id_ruser = 1 LIMIT 1,18446744073709551615
		;");
		else
		return $this->db->query("
			SELECT usr.*, rusr.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			WHERE rusr.id_ruser = 1
		;");
	}
	
	function record($id){
		$this->db->where($this->pk,$id);
		return $this->db->get($this->tb);
	}
	
	function save($data_record){
		$this->db->query("INSERT INTO user SET 
			id_ruser=1, 
			full_name=".$this->db->escape($data_record['full_name']).", 
			email=".$this->db->escape($data_record['email']).", 
			password=".$this->db->escape($data_record['password']).", 
			cd_user=NOW(), 
			ud_user=NOW();
		");
		return $this->db->insert_id();
	}
	
	function update($id, $data_record, $change_email, $change_pass){
		$this->db->query("UPDATE user SET full_name=".$this->db->escape($data_record['full_name']).", ud_user=NOW() WHERE id_user=$id");
		if($change_email == 'TRUE')
			$this->db->query("UPDATE user SET email=".$this->db->escape($data_record['email'])." WHERE id_user=$id");
		if($change_pass == 'TRUE')
			$this->db->query("UPDATE user SET password=".$this->db->escape($data_record['password'])." WHERE id_user=$id");
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}