<?php
class mdl_head_master extends CI_Model {
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
	
	function records() {
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			WHERE rusr.id_ruser = 2
		;");
	}
	
	function record($id){
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			WHERE rusr.id_ruser = 2
			AND id_user = $id
		;");
	}
	
	function save($data_record){
		$this->db->query("INSERT INTO user SET 
			id_ruser=2, 
			full_name=" . $this->db->escape($data_record['full_name']) . ", 
			email=" . $this->db->escape($data_record['email']) . ", 
			password=" . $this->db->escape($data_record['password']) . ", 
			cd_user=NOW(), 
			ud_user=NOW();
		");
		return $this->db->insert_id();
	}
	
	function update($id, $data_record){
		$this->db->query("UPDATE user SET 
						full_name=" . $this->db->escape($data_record['full_name']) . ", 
						id_city=" . $this->db->escape($data_record['id_city']) . ", 
						gender=" . $this->db->escape($data_record['gender']) . ", 
						born_date=" . $this->db->escape($data_record['born_date']) . ", 
						address=" . $this->db->escape($data_record['address']) . ", 
						desc_user=" . $this->db->escape($data_record['desc_user']) . ", 
						ud_user=NOW() 
						WHERE id_user=$id
						;");
		if($data_record['change_email'] == TRUE)
			$this->db->query("UPDATE user SET email=" . $this->db->escape($data_record['email']) . " WHERE id_user=$id");
		if($data_record['change_pass'] == TRUE)
			$this->db->query("UPDATE user SET password=" . $this->db->escape($data_record['password']) . " WHERE id_user=$id");
		if($data_record['change_photo'] == TRUE)
			$this->db->query("UPDATE user SET picture_user=" . $this->db->escape($data_record['picture_user']) . " WHERE id_user=$id");
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}