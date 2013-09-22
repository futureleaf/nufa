<?php
class Mdl_Picture extends CI_Model {
	private $pk='id_picture';
	private $tb='picture';
	
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
			SELECT ptr.* FROM picture ptr
		;");
	}
	
	function record($id){
		return $this->db->query("
			SELECT ptr.* FROM picture ptr
			WHERE ptr.id_picture=$id
		;");
	}
	
	function id_content_records($id){
		return $this->db->query("
			SELECT ptr.* FROM picture ptr
			WHERE ptr.id_content=$id
		;");
	}
	
	function id_content_save($dataRecord){
		$this->db->query("
			INSERT INTO picture SET
			id_content = $dataRecord[id_content],
			name_picture = ".$this->db->escape($dataRecord['name_picture']) ."
		;");
	}
	
	function id_user_records($id){
		return $this->db->query("
			SELECT ptr.* FROM picture ptr
			WHERE ptr.id_user=$id
		;");
	}
	
	function id_user_save($dataRecord){
		$this->db->query("
			INSERT INTO picture SET
			id_content = $dataRecord[id_content],
			name_picture = ".$this->db->escape($dataRecord['name_picture']) ."
		;");
	}
	
	function zero_records(){
		return $this->db->query("
			SELECT ptr.* FROM picture ptr
			WHERE ptr.id_content=0
		;");
	}
	
	function zero_true_records(){
		return $this->db->query("
			SELECT ptr.* FROM picture ptr
			WHERE ptr.id_content=0
			AND is_apicture = 1
		;");
	}
	
	function zero_save($dataRecord){
		$this->db->query("
			INSERT INTO picture SET
			id_content = 0,
			name_picture = ".$this->db->escape($dataRecord['name_picture']) ."
		;");
	}

	function toogle($id, $is_apicture){
		$this->db->query("
			UPDATE picture SET
			is_apicture = $is_apicture
			WHERE id_picture = $id
		;");
	}
	
	function update($dataRecord){
		$this->db->query("
			UPDATE picture SET
			name_picture = ".$this->db->escape($dataRecord['name_picture']) ."
			WHERE id_picture = $dataRecord[id_picture]
		;");
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}
