<?php
class Method {
	
	protected $_ci;

	function __construct() {
		$this->_ci =&get_instance();
	}
	
	function encrypt($keyword="") {
		return md5(md5(md5(md5(md5(md5(md5($keyword."kk1412")))))));
	}
	
	function backend($template, $data=null) {
		$data['_content']=$this->_ci->load->view('backend/' . $template, $data, true);
		$data['_header']=$this->_ci->load->view('backend/header',$data, true);
		$data['_top_menu']=$this->_ci->load->view('backend/top_menu',$data, true);
		$data['_left_menu']=$this->_ci->load->view('backend/left_menu',$data, true);
		$data['_right_menu']=$this->_ci->load->view('backend/right_menu',$data, true);
		$data['_bottom_menu']=$this->_ci->load->view('backend/bottom_menu',$data, true);
		$data['_footer']=$this->_ci->load->view('backend/footer',$data, true);
		$this->_ci->load->view('/backend/template.php',$data);
	}
	function backendContentOnly($template, $data=null) {
		$data['_content']=$this->_ci->load->view('backend/' . $template, $data, true);
		$this->_ci->load->view('/backend/template.php',$data);
	}
	
	// date
	function dateToDatabase($date) {
		return substr($date, 6, 4) . "-" . substr($date, 0, 2) . "-" . substr($date, 3, 2);
	}
	
	function dateFromDatabaseText($date) {
		$result = substr($date, 8, 2) . " ";
		if(substr($date,5,2) == "01") $result .= "Januari";
		else if(substr($date,5,2) == "02") $result .= "Febuari";
		else if(substr($date,5,2) == "03") $result .= "Maret";
		else if(substr($date,5,2) == "04") $result .= "April";
		else if(substr($date,5,2) == "05") $result .= "Mei";
		else if(substr($date,5,2) == "06") $result .= "Juni";
		else if(substr($date,5,2) == "07") $result .= "Juli";
		else if(substr($date,5,2) == "08") $result .= "Agustus";
		else if(substr($date,5,2) == "09") $result .= "September";
		else if(substr($date,5,2) == "10") $result .= "Oktober";
		else if(substr($date,5,2) == "11") $result .= "Nopember";
		else if(substr($date,5,2) == "12") $result .= "Desember";
		$result .= " " . substr($date, 0, 4);
		return $result;
	}
	
	function dateMonthYearFromDatabaseText($date) {
		$result = "";
		if(substr($date,5,2) == "01") $result .= "Januari";
		else if(substr($date,5,2) == "02") $result .= "Febuari";
		else if(substr($date,5,2) == "03") $result .= "Maret";
		else if(substr($date,5,2) == "04") $result .= "April";
		else if(substr($date,5,2) == "05") $result .= "Mei";
		else if(substr($date,5,2) == "06") $result .= "Juni";
		else if(substr($date,5,2) == "07") $result .= "Juli";
		else if(substr($date,5,2) == "08") $result .= "Agustus";
		else if(substr($date,5,2) == "09") $result .= "September";
		else if(substr($date,5,2) == "10") $result .= "Oktober";
		else if(substr($date,5,2) == "11") $result .= "Nopember";
		else if(substr($date,5,2) == "12") $result .= "Desember";
		$result .= " " . substr($date, 0, 4);
		return $result;
	}
	
	function dateMonthYearToDatabase($date) {
		return substr($date, 0, 4) . "-" . substr($date,5,2);
	}
	
	function dateFromDatabase($date) {
		return substr($date, 5, 2) . "/" . substr($date, 8, 2) . "/" . substr($date, 0, 4);
	}
	
	// picture
	function deleteUserPicture($file) {
		if($file == "") $file = "hohoho";
		if(file_exists("uploads/thumbs/thumb_" . $file)) {unlink("uploads/thumbs/thumb_" . $file);}
		if(file_exists("uploads/" . $file)) {unlink("uploads/" . $file);}
	}
	function getImage($location) {
		if($location != null || $location != "") return $location;
		else return "no_image.jpg";
	}
	
	// school year
	function school_year() {
		if(date('m') > 6) return date('Y') ."/". (date('Y')+1);
		else return (date('Y')-1) . "/" . date('Y');
	}
	
	function month_year() {
		 return date('Y')."-".date('m');
	}
	
	// export exel
	function getReportExel($datas) {
		// filename for download 
		$filename = "website_data_" . date('Ymd') . ".xlsx"; 
		header("Content-Disposition: attachment; filename=\"$filename\""); 
		header("Content-Type: application/vnd.ms-excel"); 
		$flag = false; 
		foreach($datas as $row) { 
			if(!$flag) { 
				// display field/column names as first row 
				echo implode("\t", array_keys($row)) . "\r\n"; $flag = true; 
			} array_walk($row, 'cleanData'); 
			echo implode("\t", array_values($row)) . "\r\n"; 
		}
		exit;
	}
}

function cleanData(&$str) {
	$str = preg_replace("/\t/", "\\t", $str); 
	$str = preg_replace("/\r?\n/", "\\n", $str); 
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}
