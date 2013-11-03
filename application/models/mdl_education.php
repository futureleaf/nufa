<?php
class mdl_education extends CI_Model {
	private $pk='id_edu';
	private $tb='education';
	
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
	
	function user_records($id_user, $id_semester) {
		$result = $this->get_mode($id_semester);
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, ucl.*, edu.* FROM user usr
			LEFT JOIN ruser rusr ON usr.id_ruser = rusr.id_ruser
			LEFT JOIN city ct ON usr.id_city = ct.id_city
			LEFT JOIN class ucl ON ucl.id_class = usr.id_class,
			education edu
			WHERE rusr.id_ruser = 4
			AND usr.id_user=$id_user
			$result
		;");
	}
	
	function rnedu_smt_records($id_user, $id_semester) {
		$result = $this->get_mode($id_semester);
		return $this->db->query("
			SELECT redu.*, edu.*, usr.* FROM redu redu
			LEFT JOIN education edu ON redu.id_edu = edu.id_edu
			LEFT JOIN user usr ON usr.id_user = redu.id_user
			WHERE redu.id_user = redu.id_user 
			$result
		;");
	}
	
	function pure_records() {
		return $this->db->query("
			SELECT edu.* FROM education edu
		;");
	}
	
	function records() {
		return $this->db->query("
			SELECT redu.*, edu.*, usr.* FROM education edu
			LEFT JOIN redu redu ON redu.id_edu = edu.id_edu
			LEFT JOIN user usr ON usr.id_user = redu.id_user
		;");
	}
	
	function record($id_edu) {
		return $this->db->query("
			SELECT redu.*, edu.*, usr.* FROM education edu
			LEFT JOIN redu redu ON redu.id_edu = edu.id_edu
			LEFT JOIN user usr ON usr.id_user = redu.id_user
			WHERE edu.id_edu = $id_edu
		;");
	}
	
	function redu_records() {
		return $this->db->query("
			SELECT redu.* FROM redu redu
		;");
	}
	
	function semester_records($id_user) {
		return $this->db->query("
			SELECT redu.*, edu.* FROM redu redu
			LEFT JOIN education edu ON redu.id_edu = edu.id_edu
			WHERE redu.id_user = $id_user
			GROUP BY edu.id_edu, redu.id_edu
		;");
	}
	
	function save($dataRecord) {
		$this->db->query("
			INSERT INTO education SET 
			name_edu = ".$this->db->escape($dataRecord['name_edu']) .",
			mode_edu = $dataRecord[mode_edu],
			kkm = $dataRecord[kkm],
			desc_edu = ".$this->db->escape($dataRecord['desc_edu']) ."
		;");
		$edus = $this->db->query("SELECT edu.* FROM education edu WHERE edu.name_edu = ".$this->db->escape($dataRecord[name_edu]) .";")->result();
		$id_edu = 0;
		foreach($edus as $edu) {
			$id_edu = $edu->id_edu;
		}
		$this->db->query("
			INSERT INTO redu SET
			id_user = $dataRecord[id_user],
			id_edu = $id_edu
		;");
	}
	
	function update($dataRecord) {
		$this->db->query("
			UPDATE education SET 
			name_edu = ".$this->db->escape($dataRecord['name_edu']). ",
			mode_edu = $dataRecord[mode_edu],
			kkm = $dataRecord[kkm],
			desc_edu = ".$this->db->escape($dataRecord['desc_edu']). "
			WHERE id_edu = $dataRecord[id_edu]
		;");
		$this->db->query("
			UPDATE redu SET
			id_user = $dataRecord[id_user]
			WHERE id_edu = $dataRecord[id_edu]
		;");
	}
	
	function delete($id_edu){
		$this->db->where("id_edu",$id_edu);
		$this->db->delete("education");
		
		$this->db->where("id_edu",$id_edu);
		$this->db->delete("redu");
	}
	
	
	
	
	
	
	
	
	
	
	function get_mode($id_semester) {
	
		if($id_semester == 1) {
			return "AND (
					edu.mode_edu = 1 
					OR edu.mode_edu = 3 
					OR edu.mode_edu = 5 
					OR edu.mode_edu = 7
					OR edu.mode_edu = 9
					OR edu.mode_edu = 11
					OR edu.mode_edu = 13
					OR edu.mode_edu = 15
					OR edu.mode_edu = 17
					OR edu.mode_edu = 19
					OR edu.mode_edu = 21
					OR edu.mode_edu = 23
					OR edu.mode_edu = 25
					OR edu.mode_edu = 27
					OR edu.mode_edu = 29
					OR edu.mode_edu = 31
					OR edu.mode_edu = 33
					OR edu.mode_edu = 35
					OR edu.mode_edu = 37
					OR edu.mode_edu = 39
					OR edu.mode_edu = 41
					OR edu.mode_edu = 43
					OR edu.mode_edu = 45
					OR edu.mode_edu = 47
					OR edu.mode_edu = 49
					OR edu.mode_edu = 51
					OR edu.mode_edu = 53
					OR edu.mode_edu = 55
					OR edu.mode_edu = 57
					OR edu.mode_edu = 59
					OR edu.mode_edu = 61
					OR edu.mode_edu = 63
					)";
		}
		else if($id_semester == 2) {
			return "AND (
					edu.mode_edu = 2 
					OR edu.mode_edu = 3 
					OR edu.mode_edu = 6 
					OR edu.mode_edu = 7
					OR edu.mode_edu = 10
					OR edu.mode_edu = 11
					OR edu.mode_edu = 14
					OR edu.mode_edu = 15
					OR edu.mode_edu = 18
					OR edu.mode_edu = 19
					OR edu.mode_edu = 22
					OR edu.mode_edu = 23
					OR edu.mode_edu = 26
					OR edu.mode_edu = 27
					OR edu.mode_edu = 30
					OR edu.mode_edu = 31
					OR edu.mode_edu = 34
					OR edu.mode_edu = 35
					OR edu.mode_edu = 38
					OR edu.mode_edu = 39
					OR edu.mode_edu = 42
					OR edu.mode_edu = 43
					OR edu.mode_edu = 46
					OR edu.mode_edu = 47
					OR edu.mode_edu = 50
					OR edu.mode_edu = 51
					OR edu.mode_edu = 54
					OR edu.mode_edu = 55
					OR edu.mode_edu = 58
					OR edu.mode_edu = 59
					OR edu.mode_edu = 62
					OR edu.mode_edu = 63
					)";
		}
		else if($id_semester == 3) {
			return "AND (
					edu.mode_edu = 4 
					OR edu.mode_edu = 5 
					OR edu.mode_edu = 6 
					OR edu.mode_edu = 7
					OR edu.mode_edu = 12
					OR edu.mode_edu = 13
					OR edu.mode_edu = 14
					OR edu.mode_edu = 15
					OR edu.mode_edu = 20
					OR edu.mode_edu = 21
					OR edu.mode_edu = 22
					OR edu.mode_edu = 23
					OR edu.mode_edu = 28
					OR edu.mode_edu = 29
					OR edu.mode_edu = 30
					OR edu.mode_edu = 31
					OR edu.mode_edu = 36
					OR edu.mode_edu = 37
					OR edu.mode_edu = 38
					OR edu.mode_edu = 39
					OR edu.mode_edu = 44
					OR edu.mode_edu = 45
					OR edu.mode_edu = 46
					OR edu.mode_edu = 47
					OR edu.mode_edu = 52
					OR edu.mode_edu = 53
					OR edu.mode_edu = 54
					OR edu.mode_edu = 55
					OR edu.mode_edu = 60
					OR edu.mode_edu = 61
					OR edu.mode_edu = 62
					OR edu.mode_edu = 63
					)";
		}
		else if($id_semester == 4) {
			return "AND (
					edu.mode_edu = 8 
					OR edu.mode_edu = 9 
					OR edu.mode_edu = 10 
					OR edu.mode_edu = 11
					OR edu.mode_edu = 12
					OR edu.mode_edu = 13
					OR edu.mode_edu = 14
					OR edu.mode_edu = 15
					OR edu.mode_edu = 24
					OR edu.mode_edu = 25
					OR edu.mode_edu = 26
					OR edu.mode_edu = 27
					OR edu.mode_edu = 28
					OR edu.mode_edu = 29
					OR edu.mode_edu = 30
					OR edu.mode_edu = 31
					OR edu.mode_edu = 40
					OR edu.mode_edu = 41
					OR edu.mode_edu = 42
					OR edu.mode_edu = 43
					OR edu.mode_edu = 44
					OR edu.mode_edu = 45
					OR edu.mode_edu = 46
					OR edu.mode_edu = 47
					OR edu.mode_edu = 56
					OR edu.mode_edu = 57
					OR edu.mode_edu = 58
					OR edu.mode_edu = 59
					OR edu.mode_edu = 60
					OR edu.mode_edu = 61
					OR edu.mode_edu = 62
					OR edu.mode_edu = 63
					)";
		}
		else if($id_semester == 5) {
			return "AND (
					edu.mode_edu = 16 
					OR edu.mode_edu = 17 
					OR edu.mode_edu = 18 
					OR edu.mode_edu = 19
					OR edu.mode_edu = 20
					OR edu.mode_edu = 21
					OR edu.mode_edu = 22
					OR edu.mode_edu = 23
					OR edu.mode_edu = 24
					OR edu.mode_edu = 25
					OR edu.mode_edu = 26
					OR edu.mode_edu = 27
					OR edu.mode_edu = 28
					OR edu.mode_edu = 29
					OR edu.mode_edu = 30
					OR edu.mode_edu = 31
					OR edu.mode_edu = 48
					OR edu.mode_edu = 49
					OR edu.mode_edu = 50
					OR edu.mode_edu = 51
					OR edu.mode_edu = 52
					OR edu.mode_edu = 53
					OR edu.mode_edu = 54
					OR edu.mode_edu = 55
					OR edu.mode_edu = 56
					OR edu.mode_edu = 57
					OR edu.mode_edu = 58
					OR edu.mode_edu = 59
					OR edu.mode_edu = 60
					OR edu.mode_edu = 61
					OR edu.mode_edu = 62
					OR edu.mode_edu = 63
					)";
		}
		else if($id_semester == 6) {
			return "AND (
					edu.mode_edu = 32 
					OR edu.mode_edu = 33 
					OR edu.mode_edu = 34 
					OR edu.mode_edu = 35
					OR edu.mode_edu = 36
					OR edu.mode_edu = 37
					OR edu.mode_edu = 38
					OR edu.mode_edu = 39
					OR edu.mode_edu = 40
					OR edu.mode_edu = 41
					OR edu.mode_edu = 42
					OR edu.mode_edu = 43
					OR edu.mode_edu = 44
					OR edu.mode_edu = 45
					OR edu.mode_edu = 46
					OR edu.mode_edu = 47
					OR edu.mode_edu = 48
					OR edu.mode_edu = 49
					OR edu.mode_edu = 50
					OR edu.mode_edu = 51
					OR edu.mode_edu = 52
					OR edu.mode_edu = 53
					OR edu.mode_edu = 54
					OR edu.mode_edu = 55
					OR edu.mode_edu = 56
					OR edu.mode_edu = 57
					OR edu.mode_edu = 58
					OR edu.mode_edu = 59
					OR edu.mode_edu = 60
					OR edu.mode_edu = 61
					OR edu.mode_edu = 62
					OR edu.mode_edu = 63
					)";
		}
		else {
			return "AND edu.mode_edu = 0";
		}
	}
	
}
