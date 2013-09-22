<?php
class mdl_review extends CI_Model {
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
	
	function count_records($month_year, $id_rreview) {
		$this->db->where('id_rreview =', $id_rreview);
		$this->db->like('cd_review', $month_year, 'after'); 
		$this->db->from('review');
		return $this->db->count_all_results();
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
	
	function save($month_year, $id_rreview){
		$this->db->query("DELETE FROM review WHERE cd_review not like '$month_year%';");
		$this->db->query("INSERT INTO review SET id_rreview = $id_rreview;");
	}
	
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
}