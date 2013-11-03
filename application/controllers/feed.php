<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {


	function __construct() {
		parent::__construct();
        $this->load->helper('xml');
		$this->load->model('mdl_content','',TRUE);
    }
    
    function index()
    {
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'nurulfajar.org';
        $data['feed_url'] = 'http://www.nurulfajar.org';
        $data['page_description'] = 'Nurul Fajar merupakan';
        $data['page_language'] = 'en-ca';
        $data['creator_email'] = 'dash.kiwing@gmail.com';
        $data['posts'] = $this->mdl_content->article_records()->result();
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }
}
?> 
