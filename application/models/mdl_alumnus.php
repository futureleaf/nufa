<?php
class mdl_alumnus extends CI_Model {
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
			SELECT usr.*, rusr.*, ct.*, ucl.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class ucl ON ucl.id_class = usr.id_class
			WHERE rusr.id_ruser = 5
			
		;");
	}
	
	function ll_records() {
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, cls.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class cls ON usr.id_class = cls.id_class
			WHERE rusr.id_ruser = 5
			ORDER BY ll_user limit 0,5
		;");
	}
	
	function count_records() {
		$this->db->where('id_ruser =', 5);
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	
	function count_year_records($school_year) {
		$this->db->where('id_ruser =', 5);
		$this->db->like('school_year', $school_year, 'after'); 
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	
	function count_class_records($class) {
		$this->db->where('id_ruser =', 5);
		$this->db->where('id_class =', $class);
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	
	function record($id){
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, ucl.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class ucl ON ucl.id_class = usr.id_class
			WHERE rusr.id_ruser = 5
			AND usr.id_user = $id
		;");
	}
	
	function save($data_record){
		$this->db->query("INSERT INTO user SET 
						id_ruser=5,
						full_name=".$this->db->escape($data_record['full_name']).", 
						parent_name=".$this->db->escape($data_record['parent_name']).", 
						no_jenjang=".$this->db->escape($data_record['no_jenjang']).", 
						nis=".$this->db->escape($data_record['nis']).", 
						nisn=".$this->db->escape($data_record['nisn']).", 
						id_city=".$this->db->escape($data_record['id_city']).", 
						gender=".$this->db->escape($data_record['gender']).", 
						email=".$this->db->escape($data_record['email']).", 
						password=".$this->db->escape($data_record['password']).",
						picture_user=".$this->db->escape($data_record['picture_user']).",
						born_date=".$this->db->escape($data_record['born_date']).", 
						address=".$this->db->escape($data_record['address']).", 
						desc_user=".$this->db->escape($data_record['desc_user']).", 
						id_class=".$data_record['id_class'].",
						school_year='".$data_record['school_year']."',
						is_auser=".$data_record['is_auser'].",
						cd_user=NOW(),
						ud_user=NOW()
		");
	}
	
	function update($id, $data_record){
		$this->db->query("UPDATE user SET 
						id_ruser=5,
						full_name=".$this->db->escape($data_record['full_name']).", 
						parent_name=".$this->db->escape($data_record['parent_name']).", 
						no_jenjang=".$this->db->escape($data_record['no_jenjang']).", 
						nis=".$this->db->escape($data_record['nis']).", 
						nisn=".$this->db->escape($data_record['nisn']).", 
						id_city=".$this->db->escape($data_record['id_city']).", 
						gender=".$this->db->escape($data_record['gender']).", 
						born_date=".$this->db->escape($data_record['born_date']).", 
						address=".$this->db->escape($data_record['address']).", 
						desc_user=".$this->db->escape($data_record['desc_user']).", 
						school_year='".$data_record['school_year']."',
						is_auser=".$data_record['is_auser'].",
						ud_user=NOW()
						WHERE id_user=$id
		");
		if($data_record['change_email'] == TRUE)
			$this->db->query("UPDATE user SET email=".$this->db->escape($data_record['email'])." WHERE id_user=$id");
		if($data_record['change_pass'] == TRUE)
			$this->db->query("UPDATE user SET password=".$this->db->escape($data_record['password'])." WHERE id_user=$id");
		if($data_record['change_photo'] == TRUE)
			$this->db->query("UPDATE user SET picture_user=".$this->db->escape($data_record['picture_user'])." WHERE id_user=$id");
	}
	
	function upAll($id){
		if($id == 1)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year=".$this->method->school_year().",
						id_class=2,
						ud_user=NOW()
						WHERE id_class=1
		");
		else if($id == 2)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=3,
						ud_user=NOW()
						WHERE id_class=2
		");
		else if($id == 3)
		$this->db->query("UPDATE user SET 
						id_ruser=5,
						school_year='".$this->method->school_year()."',
						is_auser=0,
						id_class=0,
						ud_user=NOW()
						WHERE id_class=3;
						
						DELETE FROM grade
						WHERE id_user = 3
		");
	}
	
	function downAll($id){
		if($id == 2)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=1,
						ud_user=NOW()
						WHERE id_class=2
		");
		else if($id == 3)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=2,
						ud_user=NOW()
						WHERE id_class=3
		");
	}
	
	function up($id_class, $id_user){
		if($id_class == 1)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year=".$this->method->school_year().",
						id_class=2,
						ud_user=NOW()
						WHERE id_class=1
						AND id_user=$id_user
		");
		else if($id_class == 2) {
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=3,
						is_auser=1,
						ud_user=NOW()
						WHERE id_user=$id_user
		");
		}
		else if($id_class == 3)
		$this->db->query("UPDATE user SET 
						id_ruser=5,
						school_year='".$this->method->school_year()."',
						is_auser=0,
						id_class=0,
						ud_user=NOW()
						WHERE id_class=3
						AND id_user=$id_user
		");
	}
	
	function down($id_class, $id_user){
		if($id_class == 2)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=1,
						ud_user=NOW()
						WHERE id_class=2
						AND id_user=$id_user
		");
		else if($id_class == 3)
		$this->db->query("UPDATE user SET 
						id_ruser=4,
						school_year='".$this->method->school_year()."',
						id_class=2,
						ud_user=NOW()
						WHERE id_class=3
						AND id_user=$id_user
		");
	}
	
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}