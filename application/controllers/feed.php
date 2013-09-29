<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends Controller 
{

    function Feed()
    {
        parent::Controller();
        $this->load->model('posts_model', '', TRUE);
        $this->load->helper('xml');
    }
    
    function index()
    {
        $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'nurulfajar.org';
        $data['feed_url'] = 'http://www.nurulfajar.com';
        $data['page_description'] = 'Nurul Fajar merupakan';
        $data['page_language'] = 'en-ca';
        $data['creator_email'] = 'dash.kiwing@gmail.com';
        $data['post'] = $this->mdl_content->article_news_records()->result();
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }
}
?> 
