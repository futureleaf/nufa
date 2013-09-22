<?php
class Template {
	
	protected $_ci;

	function __construct() {
		$this->_ci =&get_instance();
	}
	// backend
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
	// frontend
	function frontend($template, $data=null) {
		$data['_content']=$this->_ci->load->view('frontend/' . $template, $data, true);
		$data['_header']=$this->_ci->load->view('frontend/header',$data, true);
		$data['_left_menu']=$this->_ci->load->view('frontend/left_menu',$data, true);
		$data['_bottom_menu']=$this->_ci->load->view('frontend/bottom_menu',$data, true);
		$data['_footer']=$this->_ci->load->view('frontend/footer',$data, true);
		$this->_ci->load->view('/frontend/template.php',$data);
	}
	function frontendCHF($template, $data=null) {
		$data['_content']=$this->_ci->load->view('frontend/' . $template, $data, true);
		$data['_header']=$this->_ci->load->view('frontend/header',$data, true);
		$data['_footer']=$this->_ci->load->view('frontend/footer',$data, true);
		$this->_ci->load->view('/frontend/template.php',$data);
	}
	function frontendCHTF($template, $data=null) {
		$data['_content']=$this->_ci->load->view('frontend/' . $template, $data, true);
		$data['_header']=$this->_ci->load->view('frontend/header',$data, true);
		$data['_top_menu']=$this->_ci->load->view('frontend/top_menu',$data, true);
		$data['_footer']=$this->_ci->load->view('frontend/footer',$data, true);
		$this->_ci->load->view('/frontend/template.php',$data);
	}
	function frontendCHTRF($template, $data=null) {
		$data['_content']=$this->_ci->load->view('frontend/' . $template, $data, true);
		$data['_header']=$this->_ci->load->view('frontend/header',$data, true);
		$data['_top_menu']=$this->_ci->load->view('frontend/top_menu',$data, true);
		$data['_right_menu']=$this->_ci->load->view('frontend/right_menu',$data, true);
		$data['_footer']=$this->_ci->load->view('frontend/footer',$data, true);
		$this->_ci->load->view('/frontend/template.php',$data);
	}
	function frontendContentOnly($template, $data=null) {
		$data['_content']=$this->_ci->load->view('frontend/' . $template, $data, true);
		$this->_ci->load->view('/frontend/template.php',$data);
	}
}