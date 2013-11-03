<?php
class mdl_login extends CI_Model {
	
	function __construct(){
		 parent::__construct();
	}
	
	function login($dataRecord) {
		$query = "SELECT usr.* FROM user usr
			WHERE 
			usr.email = " . $this->db->escape($dataRecord['email']) . "
			AND usr.password = " . $this->db->escape($dataRecord['password']) . "
		;";
		return $this->db->query($query)->result();
	}
	
	function email_check($email) {
		$query = "SELECT usr.* FROM user usr
			WHERE 
			usr.email = " . $this->db->escape($email) . "
		;";
		return $this->db->query($query)->result();
	}
	
	function get_password($email) {
		$query = "SELECT usr.* FROM user usr
			WHERE 
			usr.email = " . $this->db->escape($email) . "
		;";
		$datas = $this->db->query($query)->result();
		$pass = "";
		foreach($datas as $data):
			$pass = $data->password;
		endforeach;
		return $pass;
	}
	
	function update($id){
		$this->db->query("UPDATE user SET ll_user=NOW() WHERE id_user=$id;");
	}
	
}