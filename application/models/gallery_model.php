<?php
class Gallery_model extends CI_Model {
	
	var $gallery_path;
	var $gallery_path_url;
	
	function __construct(){
		parent::__construct();
		
		$this->gallery_path = realpath(APPPATH . 'uploads');
		$this->gallery_path_url = base_url(). APPPATH . 'uploads/';
	}
	
	function do_upload() {
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['full_path'];
		$config['new_image'] = $this->gallery_path . '/thumbs/'.'thumb_'.$image_data['file_name'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 50;
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		
	}
	
	function get_images() {
		
		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		foreach ($files as $file) {
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/thumb_' . $file
			);
		}
		
		return $images;
	}
	
}



