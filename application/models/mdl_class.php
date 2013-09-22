<?php
class mdl_class extends CI_Model {
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
	
	function common_records() {
		return $this->db->query("
			SELECT cls.* FROM class cls
		;");
	}
	function records() {
		return $this->db->query("
			SELECT cls.*, usr.* FROM class cls
			JOIN user usr ON usr.id_user = cls.id_user_class
		;");
	}
	
	function record($id){
		return $this->db->query("
			SELECT cls.*, usr.*, scy.*  FROM class cls
			JOIN user usr ON usr.id_user = cls.id_user
			JOIN school_year scy ON scy.id_school_year = cls.id_class_year
			WHERE cls.id_user = $id
		;");
	}
	
	function update($id, $data_record){
		$this->db->query("UPDATE class SET  
						name_class=".$this->db->escape($data_record[name_class]).",
						id_class_year=$data_record[id_class_year]
						WHERE id_class=$id
						;");
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}