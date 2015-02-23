<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Shorten extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('functions');
    }
    
    public function index($url = NULL) {
        if($url == NULL || $url == "shorten") {
            $data['state'] = 0;
            $this->load->view('shorten',$data);
        }
        else {
            echo $url . "<br>";
            echo "check 1 <br>";
            $this->redirect($url);
        }
    }
    
    public function process() {
        $url = $this->input->post('url');
        if($url == NULL) {
            $this->index(NULL);
        }
        
        else {
            //$value = $this->validateUrl($url);
            $data['original_url'] = $url;

            $counter = $this->functions->getCount();

            $data['shortened_url'] = $this->functions->store($url,$counter+1);

            $this->functions->updateCounter($counter+1);

            $data['state'] = 1;
            $this->load->view('shorten',$data);
        }
    }
    
    public function redirect($url) {
       $result = $this->functions->isValid($url);
       
       if($result == NULL) {
           $data['title'] = "Error";
           $data['message'] = "The URL you entered is invalid.<br/>";
           $this->load->view('message',$data);
       }
       else {
           foreach($result as $key) {
               $original_url    =       $key->original_url;
               $hits            =       $key->hits;
           }
           $this->functions->hits($url);
           //echo auto_link($original_url);
           $this->load->helper('url');
           redirect("http://".$original_url);
       }
    }
    
    public function validateUrl($url) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('url','URL','URL');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('shorten');
        }
        else {
            return true;
        }
    }
    
}
