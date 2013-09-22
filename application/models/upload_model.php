<?php
class User_model extends CI_Model{
  public $original_path;
  public $resized_path;
  public $thumbs_path;
 
  //initialize the path where you want to save your images
	  function __construct(){
		parent::__construct();
	  }
	 function add_files($i) {
		$file = $this->upload->data();
		$files = $file['file_name'];
		$fields = array(
			'files' => $files[$i]
		);
			for ($i = 0; $i < count($files); $i++) {
					$data['image'] = APPPATH . 'uploads/'.$files[$i];
					//$data['image'] = APPPATH . '/uploads/'.$files[1];
					$config['image_library'] = 'gd2';
					$config['source_image'] = $data['image'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 345;
					$config['height'] = 224;
					$config['new_image'] = APPPATH . '/uploads/thumb/'.$files[$i];
					$this->load->library('image_lib');
					//$this->image_lib->resize();
					$this->image_lib->initialize($config); //MUST CALL THIS METHOD
				if(!$this->image_lib->resize()){
					//echo '<p> not resized</p>';
				}else{
					//echo '<p> OK </p>';
				}
				$this->image_lib->clear();
			}
		$this->db->set($fields);
		$this->db->insert($this->files_table);
		return $this->db->insert_id();
	}

}
