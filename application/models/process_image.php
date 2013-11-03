<?php

class Process_Image extends CI_Model{
    
    function Process_image()
    {
		parent::__construct();
        
        $this->load->library('image_lib');
        //Generate random Activation code
        
 
    }

function process_pic()
    {   
        //Connect to database
        $this->load->database();
        
        //Get File Data Info
        $uploads = array($this->upload->data());
        
        $this->load->library('image_lib');

        //Move Files To User Folder
        foreach($uploads as $key[] => $value)
        {
            
                        //Gen Random code for new file name
            $randomcode = generate_code(12);
            
            $newimagename = $randomcode.$value['file_ext'];
            
            //Creat Thumbnail
            $config['image_library'] = 'GD2';
            $config['source_image'] = $value['full_path'];
            $config['create_thumb'] = TRUE;
            $config['thumb_marker'] = '_tn';
            $config['master_dim'] = 'width';
            $config['quality'] = 75;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 175;
            $config['height'] = 175;
            $config['new_image'] = '/pictures/'.$newimagename;

            //$this->image_lib->clear();
            $this->image_lib->initialize($config);
            //$this->load->library('image_lib', $config);
            $this->image_lib->resize();
            
            //Move Uploaded Files with NEW Random name
            rename($value['full_path'],'/pictures/'.$newimagename);
            
            //Make Some Variables for Database
            $imagename = $newimagename;
            $thumbnail = $randomcode.'_tn'.$value['file_ext'];
            $filesize = $value['file_size'];
            $width = $value['image_width'];
            $height = $value['image_height'];
            $timestamp = time();
            
            //Add Pic Info To Database
            $this->db->set('imagename', $imagename);
            $this->db->set('thumbnail', $thumbnail);
            $this->db->set('filesize', $filesize);
            $this->db->set('width', $width);
            $this->db->set('height', $height);
            $this->db->set('timestamp', $timestamp);
            
            //Insert Info Into Database
            $this->db->insert('pictures');

        }
        
        
        
    }
}	