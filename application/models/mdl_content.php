<?php
class Mdl_Content extends CI_Model {
	private $pk='id_content';
	private $tb='content';
	
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
		return $this->db->get($this->tb);
	}
	
	function record($id){
		$this->db->where($this->pk,$id);
		return $this->db->get($this->tb);
	}
	
	function save($data_record){
		$this->db->insert($this->tb,$data_record);
		return $this->db->insert_id();
	}
	
	function update($id,$data_record){
		$this->db->where($this->pk,$id);
		$this->db->update($this->tb,$data_record);
	}
	function delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
	
	
	
	
	
	
	
	// all_recent
	function all_records($start=null, $end=null) {
		$result = "";
		if($start == 0 && $end != null) $result = "LIMIT $start,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 1 
			OR rct.id_rcontent = 2 
			OR rct.id_rcontent = 3 
			OR rct.id_rcontent = 4 
			OR rct.id_rcontent = 5 
			OR rct.id_rcontent = 6 
			ORDER BY ct.cd_content desc
			$result
		;");
	}
	function archieve_all_records($start=null, $end=null, $group=null, $month_year=null) {
		$result = "";
		$result .= ($month_year!=null)?"AND cd_content like '%$month_year' ":"";
		$result .= ($group == null)?"GROUP BY ct.cd_content desc ":"";
		if($start == 0 && $end != null) $result .= "LIMIT $start,$end ";
		//echo(
		return $this->db->query(
		"
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user 
			WHERE (rct.id_rcontent = 1 
			OR rct.id_rcontent = 2 
			OR rct.id_rcontent = 3 
			OR rct.id_rcontent = 4 
			OR rct.id_rcontent = 5 
			OR rct.id_rcontent = 6) 
			$result
		;");
	}
	
	function archieve_filter_records($start=null, $end=null, $group=null, $month_year=null) {
		$result = "";
		$result .= ($month_year!=null)?"AND cd_content like '$month_year%' ":"";
		$result .= ($group == null)?"GROUP BY ct.cd_content desc ":"";
		if($start == 0 && $end != null) $result .= "LIMIT $start,$end ";
		//echo(
		return $this->db->query(
		"
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user 
			WHERE (rct.id_rcontent = 1 
			OR rct.id_rcontent = 2 
			OR rct.id_rcontent = 3 
			OR rct.id_rcontent = 4 
			OR rct.id_rcontent = 5 
			OR rct.id_rcontent = 6) 
			$result
		;");
	}
	
	function filter_all_records($role="", $data="") {
		$result = "";
		if($role=="newses") $result .= "rct.id_rcontent = 1 ";
		else if($role=="articles") $result .= "rct.id_rcontent = 2 ";
		else if($role=="achievements") $result .= "rct.id_rcontent = 3 ";
		else if($role=="facilitys") $result .= "rct.id_rcontent = 4 ";
		else if($role=="notifications") $result .= "rct.id_rcontent = 4 ";
		else if($role=="events") $result .= "rct.id_rcontent = 4 ";
		else $result .= "(rct.id_rcontent = 1 OR rct.id_rcontent = 2 OR rct.id_rcontent = 3 OR rct.id_rcontent = 4 OR rct.id_rcontent = 5 OR rct.id_rcontent = 6) ";
		//echo(
		return $this->db->query(
		"
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user 
			WHERE 
			$result 
			AND (name_content like '%$data%'
			OR desc_content like '%$data%'
			OR ud_content like '%$data%'
			OR name_rcontent like '%$data%')
		;");
	}
	
	// news
	function news_records($start=null, $end=null) {
		$result = "";
		if($start!=null && $end!=null) $result = "LIMIT $start,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 1
			$result
			ORDER BY ct.cd_content desc
		;");
	}
	
	function news_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 1
			AND id_content=$id
		;");
	}
	
	function news_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 1,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function news_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 1,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}

	function toogle_is_acontent($id, $is_acontent){
		$this->db->query("
			UPDATE content SET
			is_acontent = $is_acontent
			WHERE id_content = $id
		;");
	}
	
	function news_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// article
	function article_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, tct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN tcontent tct ON ct.id_tcontent = tct.id_tcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 2
			ORDER BY ct.cd_content desc
		");
	}
	function count_article_records($month_year) {
		$this->db->where('id_rcontent =', 2);
		$this->db->like('cd_content', $month_year, 'after'); 
		$this->db->from('content');
		return $this->db->count_all_results();
	}
	
	function article_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, tct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN tcontent tct ON ct.id_tcontent = tct.id_tcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 2
			AND id_content=$id
		;");
	}
	
	function article_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 2,
			id_tcontent = $dataRecord[id_tcontent],
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function article_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 2,
			id_tcontent = $dataRecord[id_tcontent],
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function article_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// achievement
	function achievement_records($start=null, $end=null) {
		$result = "";
		if($start == 0 && $end != null) $result = "LIMIT $start,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 3
			ORDER BY ct.cd_content desc
			$result
		;");
	}
	
	function achievement_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 3
			AND id_content=$id
		;");
	}
	
	function achievement_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 3,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function achievement_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 3,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function achievement_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// facility
	function facility_records($start=null, $end=null) {
		$result = "";
		if($start == 0 && $end != null) $result = "LIMIT $start,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 4
			ORDER BY ct.cd_content desc
			$result
		;");
	}
	
	function facility_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 4
			AND id_content=$id
		;");
	}
	
	function facility_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 4,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function facility_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 4,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function facility_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// notification
	function notification_records($start=null, $end=null) {
		$result = "";
		if($start!=null && $end!=null) $result = "LIMIT $start,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 5
			$result
			ORDER BY ct.cd_content desc
		;");
	}
	function limit_notification_records($start=0, $after=3) {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 5
			ORDER BY ct.cd_content desc
			LIMIT $start,$after
		;");
	}
	
	function notification_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 5
			AND id_content=$id
		;");
	}
	
	function notification_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 5,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function notification_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 5,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function notification_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// event
	function event_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 6
			ORDER BY ct.cd_content desc
		");
	}
	function limit_event_records($begin=0, $end=0) {
		$result = "";
		if($end != 0) $result = "LIMIT $begin,$end";
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 6
			ORDER BY ct.cd_content DESC 
			$result
		;");
	}
	
	function event_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 6
			AND id_content=$id
		;");
	}
	
	function event_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 6,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function event_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 6,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function event_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// history
	function history_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 7
			ORDER BY ct.cd_content desc
		");
	}
	
	function history_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 7
			AND id_content=$id
		;");
	}
	
	function history_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 7,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	
	
	
	
	
	
	
	// visionAndMission
	function visionAndMission_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 8
			ORDER BY ct.cd_content desc
		");
	}
	
	function visionAndMission_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 8
			AND id_content=$id
		;");
	}
	
	function visionAndMission_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 8,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	
	
	
	
	
	
	
	// gallery
	function gallery_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 9
			ORDER BY ct.cd_content desc
		");
	}
	
	function gallery_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 9
			AND id_content=$id
		;");
	}
	
	function gallery_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 9,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function gallery_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 9,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function gallery_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
	
	
	
	// link
	function link_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 10
			ORDER BY ct.cd_content desc
		");
	}
	
	function link_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 10
			AND id_content=$id
		;");
	}
	
	function link_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 10,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function link_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 10,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function link_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
	}
	
	
	
	
	
	
	
	
	// support
	function support_records() {
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 11
			ORDER BY ct.cd_content desc
		");
	}
	
	function support_record($id){
		return $this->db->query("
			SELECT ct.*, rct.*, usr.* 
			FROM content ct 
			LEFT JOIN rcontent rct ON ct.id_rcontent = rct.id_rcontent
			LEFT JOIN user usr ON ct.id_user = usr.id_user
			WHERE rct.id_rcontent = 11
			AND id_content=$id
		;");
	}
	
	function support_save($dataRecord){
		$this->db->query("
			INSERT INTO content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 11,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
		;");
	}
	
	function support_update($dataRecord){
		$this->db->query("
			UPDATE content SET
			id_user = $dataRecord[id_user],
			id_rcontent = 11,
			name_content = ".$this->db->escape($dataRecord['name_content']).",
			desc_content = ".$this->db->escape($dataRecord['desc_content']).",
			picture_content = ".$this->db->escape($dataRecord['picture_content']).",
			is_acontent = $dataRecord[is_acontent],
			is_dcontent = $dataRecord[is_dcontent],
			cd_content = NOW(),
			ud_content = NOW()
			WHERE id_content = $dataRecord[id_content]
		;");
	}
	
	function support_delete($id){
		$this->db->where($this->pk,$id);
		$this->db->delete($this->tb);
		$this->db->where($this->pk,$id);
		$this->db->delete("comment");
	}
	
	
	
	
	
}
