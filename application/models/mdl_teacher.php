<?php
class mdl_teacher extends CI_Model {
	private $pk='id_user';
	private $tb='user';
	
	function __construct(){
		 parent::__construct();
	}
	
	public function set_pk($primary_key) {
		$this->pk = $primary_key;
	}
	
	public function set_tb($table_name) {
		$this->tb = $table_name;
	}
	
	function records($order_by="id_user") {
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, cls.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class cls ON usr.id_class = cls.id_class
			WHERE (rusr.id_ruser = 3 OR rusr.id_ruser = 2 OR rusr.id_ruser = 6 OR rusr.id_ruser = 7 OR rusr.id_ruser = 8)
			ORDER BY usr.$order_by
		;");
	}
	
	function staff_records() {
		return $this->db->query("
			SELECT rusr.* FROM ruser rusr
			WHERE rusr.id_ruser != 1
			AND rusr.id_ruser != 4
			AND rusr.id_ruser != 5
			
		;");
	}
	
	function count_records() {
		$this->db->or_where('id_ruser =', 2);
		$this->db->or_where('id_ruser =', 3);
		$this->db->or_where('id_ruser =', 6);
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	
	function ll_records() {
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, cls.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class cls ON usr.id_class = cls.id_class
			WHERE (rusr.id_ruser = 3 OR rusr.id_ruser = 2 OR rusr.id_ruser = 6 OR rusr.id_ruser = 7 OR rusr.id_ruser = 8)
			ORDER BY ll_user limit 0,5
		;");
	}
	
	function record($id){
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			WHERE (rusr.id_ruser = 3 OR rusr.id_ruser = 2 OR rusr.id_ruser = 6 OR rusr.id_ruser = 7 OR rusr.id_ruser = 8)
			AND id_user = $id
		;");
	}
	
	function update_redu($id_user) {
		$this->db->where($this->pk, $id_user);
		$this->db->delete("redu");
		if(isset($_POST['edu'])) {
			for($i = 0 ; $i < sizeof($_POST['edu']); $i++) {
				if($_POST['edu'][$i] != null) {
					$id_edu = $_POST['edu'][$i];
					$this->db->query("INSERT INTO redu SET 
									id_user = $id_user,
									id_edu = $id_edu
					;");
				}
			}
		}
	}
	
	function save($data_record){
		$result = "";
		if($data_record['id_class'] != "0") {
			$this->db->query("UPDATE user SET
						id_class = 0
						WHERE id_class = $data_record[id_class]
						AND (rusr.id_ruser = 3 OR rusr.id_ruser = 2 OR rusr.id_ruser = 6 OR rusr.id_ruser = 7 OR rusr.id_ruser = 8);
						");
			$result = "id_class = $data_record[id_class],";
		}
		$this->db->query("INSERT INTO user SET 
						id_ruser=$data_record[id_ruser], 
						is_auser=1, 
						nip=" . $this->db->escape($data_record['nip']) . ", 
						full_name=" . $this->db->escape($data_record['full_name']) . ", 
						id_city=" . $this->db->escape($data_record['id_city']) . ", 
						$result
						gender=" . $this->db->escape($data_record['gender']) . ", 
						email=" . $this->db->escape($data_record['email']) .", 
						password=" . $this->db->escape($data_record['password']) .",
						picture_user=" . $this->db->escape($data_record['picture_user']) . ",
						born_date=" . $this->db->escape($data_record['born_date']) . ", 
						address=" . $this->db->escape($data_record['address']) . ", 
						desc_user=" . $this->db->escape($data_record['desc_user']) . ", 
						ud_user=NOW()
		");
	}
	
	function update($id, $data_record){
		$result = "";
		if($data_record['id_class'] != "0") {
			$this->db->query("UPDATE user SET
						id_class = 0
						WHERE id_class = $data_record[id_class]
						AND (user.id_ruser = 3 OR user.id_ruser = 2 OR user.id_ruser = 6 OR user.id_ruser = 7 OR user.id_ruser = 8);
						");
			$result = "id_class = $data_record[id_class],";
		}
		if($data_record['id_ruser'] == "2") {
			$this->db->query("UPDATE user SET
						id_ruser = 3
						WHERE id_ruser = $data_record[id_ruser]
						AND (user.id_ruser = 3 OR user.id_ruser = 2 OR user.id_ruser = 6 OR user.id_ruser = 7 OR user.id_ruser = 8);
						");
			$result .= "id_ruser = $data_record[id_ruser],";
		}
		$this->db->query("UPDATE user SET 
						is_auser=1, 
						id_ruser=$data_record[id_ruser], 
						nip=" . $this->db->escape($data_record['nip']) . ", 
						full_name=" . $this->db->escape($data_record['full_name']) . ", 
						id_city=" . $this->db->escape($data_record['id_city']) . ", 
						$result
						gender=" . $this->db->escape($data_record['gender']) . ", 
						born_date=" . $this->db->escape($data_record['born_date']) . ", 
						address=" . $this->db->escape($data_record['address']) . ", 
						desc_user=" . $this->db->escape($data_record['desc_user']) . ", 
						ud_user=NOW() 
						WHERE id_user=$id");
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
