<?php
class Mdl_Comment extends CI_Model {
	private $pk='id_comment';
	private $tb='comment';
	
	function __construct(){
		 parent::__construct();
	}
	
	
	public function set_pk($primary_key) {
		$this->pk = $primary_key;
	}
	
	public function set_tb($table_name) {
		$this->tb = $table_name;
	}
	
	function records() {
		return $this->db->query("
			SELECT cmt.*, usr.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
		;");
	}
	
	function rcomment_records($id_rcomment) {
		return $this->db->query("
			SELECT cmt.*, usr.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
			WHERE cmt.id_rcomment = $id_rcomment
		;");
	}
	
	function count_new_records($month_year) {
		$this->db->or_where('id_rcomment !=', 1);
		$this->db->or_where('id_rcomment !=', 2);
		$this->db->or_where('id_rcomment !=', 3);
		$this->db->like('cd_comment', $month_year, 'after'); 
		$this->db->from('comment');
		return $this->db->count_all_results();
	}
	
	function aspiration_records($is_acomment=null) {
		if($is_acomment == null)$result="AND (cmt.is_acomment = 0 OR cmt.is_acomment = 1)";
		else if($is_acomment == 1)$result="AND cmt.is_acomment = 1";
		else $result="AND (cmt.is_acomment = 0)";
		return $this->db->query("
			SELECT cmt.*, usr.*, rcmt.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
			LEFT JOIN rcomment rcmt ON cmt.id_rcomment = rcmt.id_rcomment
			WHERE cmt.id_rcomment = 1
			$result
		;");
	}
	
	function aspiration_save($dataRecord){
		$this->db->query("
			INSERT INTO comment SET
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			name_comment = ".$this->db->escape($dataRecord['name_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			cd_comment = NOW(),
			is_acomment = 0,
			id_rcomment = 1,
			parent_comment = $dataRecord[parent_comment]
		;");
	}
	
	
	// diamond word begin
	function diamondWord_records($is_acomment=null) {
		if($is_acomment == null)$result="AND (cmt.is_acomment = 0 OR cmt.is_acomment = 1)";
		else if($is_acomment == 1)$result="AND cmt.is_acomment = 1";
		else $result="AND (cmt.is_acomment = 0)";
		return $this->db->query("
			SELECT cmt.*, usr.*, rcmt.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
			LEFT JOIN rcomment rcmt ON cmt.id_rcomment = rcmt.id_rcomment
			WHERE cmt.id_rcomment = 12
			$result
		;");
	}
	
	function diamondWord_save($dataRecord){
		$this->db->query("
			INSERT INTO comment SET
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			name_comment = ".$this->db->escape($dataRecord['name_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['name_comment']) .",
			cd_comment = NOW(),
			is_acomment = 0,
			id_rcomment = 12,
			parent_comment = $dataRecord[parent_comment]
		;");
	}
	
	function diamondWord_update($dataRecord){
		$this->db->query("
			UPDATE comment SET
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			name_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			cd_comment = NOW(),
			id_rcomment = 12,
			parent_comment = $dataRecord[parent_comment]
			WHERE id_comment = $dataRecord[id_comment]
		;");
	}
	// diamond word end
	
	function contact_records() {
		return $this->db->query("
			SELECT cmt.*, usr.*, rcmt.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
			LEFT JOIN rcomment rcmt ON cmt.id_rcomment = rcmt.id_rcomment
			WHERE cmt.id_rcomment = 2
			OR cmt.id_rcomment = 3
			ORDER BY cd_comment DESC
		;");
	}
	
	function contact_save($dataRecord){
		$this->db->query("
			INSERT INTO comment SET
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			phone_comment = ".$this->db->escape($dataRecord['phone_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			cd_comment = NOW(),
			is_acomment = 0,
			id_rcomment = 3,
			parent_comment = $dataRecord[parent_comment]
		;");
	}
	
	function contact_update($dataRecord){
		$this->db->query("
			UPDATE comment SET
			id_content = $dataRecord[id_content],
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			phone_comment = ".$this->db->escape($dataRecord['phone_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			cd_comment = NOW(),
			parent_comment = $dataRecord[parent_comment]
			WHERE id_comment = $dataRecord[id_comment]
		;");
	}
	
	function toogle($id, $is_acomment){
		$this->db->query("
			UPDATE comment SET
			is_acomment = $is_acomment
			WHERE id_comment = $id
		;");
	}
	
	function record($id){
		return $this->db->query("
			SELECT cmt.*, usr.*
			FROM comment cmt 
			LEFT JOIN user usr ON cmt.id_user = usr.id_user
			WHERE id_comment=$id
		;");
	}
	
	function id_content_records($id){
		return $this->db->query("
			SELECT cmt.*, usr.*
			FROM comment cmt 
			LEFT JOIN user usr ON usr.id_user = cmt.id_user
			WHERE id_content=$id
		;");
	}
	
	function count_id_content_records($id){
		$this->db->where('id_content =', $id);
		$this->db->from('comment');
		return $this->db->count_all_results();
	}
	
	function save($dataRecord, $id_rcomment){
		$result = "";
		if($dataRecord['id_user'] != null) $result = "id_user = $dataRecord[id_user],";
		$this->db->query("
			INSERT INTO comment SET
			id_content = $dataRecord[id_content],
			$result
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",
			cd_comment = NOW(),
			id_rcomment = $id_rcomment,
			parent_comment = $dataRecord[parent_comment]
		;");
	}
	
	function update($dataRecord){
		$result = "";
		if(isset($dataRecord['name_comment'])) $result .= "name_comment = ".$this->db->escape($dataRecord['name_comment']) .",";
		if(isset($dataRecord['desc_comment'])) $result .= "desc_comment = ".$this->db->escape($dataRecord['desc_comment']) .",";
		$this->db->query("
			UPDATE comment SET
			id_content = $dataRecord[id_content],
			author_comment = ".$this->db->escape($dataRecord['author_comment']) .",
			email_comment = ".$this->db->escape($dataRecord['email_comment']) .",
			$result
			cd_comment = NOW(),
			parent_comment = $dataRecord[parent_comment]
			WHERE id_comment = $dataRecord[id_comment]
		;");
	}
	
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}
