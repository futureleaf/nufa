<?php
class Mdl_Function extends CI_Model {
	
	var $image_path_file;
	var $image_path_url;
	
	function __construct(){
		parent::__construct();
		
		$this->image_path_file = realpath('uploads/');
		$this->image_path_url = base_url(). 'uploads/';
	}
	
	function do_upload($height=300, $weight=200) {
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->image_path_file,
			'max_size' => 50000
		);
		
		$result['error'] = null;
		$result['file_name'] = null;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()) {
			$result['error'] = $this->upload->display_errors();
		}
		else {
			$image_data = $this->upload->data();
			
			$result['file_name'] = $image_data['file_name'];
			$config['image_library'] = 'gd2';
			$config['source_image'] = $image_data['full_path'];
			$config['new_image'] = $this->image_path_file . '/thumbs/'.'thumb_'.$image_data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $weight;
			$config['height'] = $height;
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
		return $result;
	}
	
	function get_images() {
		
		$files = scandir($this->image_path_file);
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		foreach ($files as $file) {
			$images []= array (
				'url' => $this->image_path_url . $file,
				'thumb_url' => $this->image_path_url . 'thumbs/thumb_' . $file
			);
		}
		
		return $images;
	}
	
}
