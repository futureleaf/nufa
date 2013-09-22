<?php

class AppUserModel extends CI_Model {
	private $primary_key='id_user';
	private $table_name='app_user';
	
	function __construct(){
		parent::__construct();
		$this->load->database('timeline');
	}
	
	function getLoad($limit=10,$offset=0, $order_column='',$order_type='asc') {
		$query = "SELECT au.*, ac.*, ar.* FROM app_user au INNER JOIN app_category ac ON au.id_category = ac.id_category INNER JOIN app_role ar ON au.id_role = ar.id_role ORDER BY $order_column $order_type limit $offset, $limit";
		return $this->db->query($query);
	}
	
	function getLoginRole($username='',$password='') {
		$query = "SELECT au.*, ac.*, ar.* FROM app_user au INNER JOIN app_category ac ON au.id_category = ac.id_category INNER JOIN app_role ar ON au.id_role = ar.id_role WHERE au.username = '$username' AND au.password = '$password' AND au.is_active = 1";
		foreach($this->db->query($query)->result() as $result) {
			if($result->username != "") {
				echo "(".$result->id_role.")";
				return $result->id_role;
			}
			else {
				return FALSE;
			}
		}
	}
	
	function getLogin($username='',$password='') {
		$query = "SELECT au.*, ac.*, ar.* FROM app_user au INNER JOIN app_category ac ON au.id_category = ac.id_category INNER JOIN app_role ar ON au.id_role = ar.id_role WHERE au.username = '$username' AND au.password = '$password'";
		foreach($this->db->query($query)->result() as $result) {
			if($result->username != "") {
				return $this->db->query($query)->result();
			}
			else {
				return FALSE;
			}
		}
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