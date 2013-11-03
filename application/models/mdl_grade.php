<?php
class mdl_grade extends CI_Model {
	private $pk='id_grade';
	private $tb='grade';
	
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
	
	function record($id_grade) {
		return $this->db->query("
			SELECT grd.* FROM
			grade grd
			WHERE grd.id_grade = $id_grade
		;");
	}
	
	function user_grade_records($name_grade) {
		return $this->db->query("
			SELECT usr.*, grd.* FROM user usr 
			JOIN grade grd ON grd.id_user = usr.id_user 
			WHERE grd.name_grade = " . $this->db->escape($name_grade) . "
		;");
	}
	
	function teach_records($id_user, $id_semester, $id_edu) {
		$result = "";
		if($id_semester == 1 || $id_semester == 2) {
			$result .= " AND usr.id_class = 1";
		}
		else if($id_semester == 3 || $id_semester == 4) {
			$result .= " AND usr.id_class = 2";
		}
		else if($id_semester == 5 || $id_semester == 6) {
			$result .= " AND usr.id_class = 3";
		}
		return $this->db->query("
			SELECT edu.*, grd.*, usr.* FROM education edu 
			JOIN grade grd ON grd.id_edu = edu.id_edu 
			JOIN user usr ON usr.id_user = grd.id_user 
			WHERE edu.id_edu = $id_edu 
			AND grd.id_semester = $id_semester 
			$result
			GROUP BY grd.name_grade
		;");
	}
	
	function edu_records($id_user, $id_semester, $id_edu) {
		return $this->db->query("
			SELECT usr.*, rusr.*, ct.*, ucl.*, edu.*, grd.* FROM
			education AS edu,
			grade AS grd, 
			user AS usr,
			ruser AS rusr, 
			city AS ct,
			class AS ucl 
			WHERE rusr.id_ruser = 4
			AND usr.id_ruser = rusr.id_ruser
			AND usr.id_city = ct.id_city
			AND ucl.id_class = usr.id_class
			AND grd.id_edu = edu.id_edu
			AND edu.id_edu = $id_edu
			AND grd.id_semester = $id_semester
			AND usr.id_user = grd.id_user
			AND usr.id_user = $id_user
		;");
	}
	
	function save($data_record){
		$this->db->query("INSERT INTO grade SET 
						id_edu=$data_record[id_edu],
						name_grade=".$this->db->escape($data_record['name_grade']).", 
						grade=".$this->db->escape($data_record['grade']).", 
						desc_grade=".$this->db->escape($data_record['desc_grade']).", 
						id_user=".$data_record['id_user'].", 
						id_semester=".$data_record['id_semester']."
		;");
	}
	
	function saves($data_record){
		$results = array();
		if($data_record['id_semester'] == 1 || $data_record['id_semester'] == 2) {
			$this->db->where('id_class =', 1);
		}
		if($data_record['id_semester'] == 3 || $data_record['id_semester'] == 4) {
			$this->db->where('id_class =', 2);
		}
		if($data_record['id_semester'] == 5 || $data_record['id_semester'] == 6) {
			$this->db->where('id_class =', 3);
		}
		$this->db->where('id_ruser =', 4);
		$results = $this->db->get("user")->result();
		foreach($results as $result) {
			$this->db->query("INSERT INTO grade SET 
							id_edu=$data_record[id_edu],
							name_grade=".$this->db->escape($data_record['name_grade']).", 
							grade=".$this->db->escape($data_record['grade']).", 
							desc_grade=".$this->db->escape($data_record['desc_grade']).", 
							id_user=".$result->id_user.", 
							id_semester=".$data_record['id_semester']."
			;");
		}
	}
	
	function update_name($name_grade, $data_record) {
		$this->db->query("UPDATE grade SET 
						id_edu=$data_record[id_edu],
						name_grade=".$this->db->escape($data_record['name_grade']).", 
						grade=".$this->db->escape($data_record['grade']).", 
						desc_grade=".$this->db->escape($data_record['desc_grade'])." 
						WHERE name_grade = '$name_grade'
		;");
	}
	
	function update($id_grade, $data_record) {
		$this->db->query("UPDATE grade SET 
						id_edu=$data_record[id_edu],
						name_grade=".$this->db->escape($data_record['name_grade']).", 
						grade=".$this->db->escape($data_record['grade']).", 
						desc_grade=".$this->db->escape($data_record['desc_grade'])." 
						WHERE id_grade = $id_grade
		;");
	}
	
	function update_grade($data_record) {
		$this->db->query("UPDATE grade SET 
						$data_record[field]=$data_record[value]
						WHERE id_grade = $data_record[id];
		;");
	}
	
	function update_desc_grade($data_record) {
		$this->db->query("UPDATE grade SET 
						$data_record[field]=".$this->db->escape($data_record['value']) ."
						WHERE id_grade = $data_record[id];
		;");
	}
	
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}