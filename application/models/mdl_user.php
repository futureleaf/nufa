<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogmodel extends Model {
	var$title='';
	var$content='';
	var$date='';
	function Blogmodel() {
		parent::Model();
	}
	function get_data() {
		$query=$this->db->get('entries',10);
		Return $query->result();
	}
}

?>