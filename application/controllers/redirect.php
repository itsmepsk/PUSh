<?php

class Redirect extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index($url = NULL) {
        if($url == NULL) {
            $data['state'] = 0;
            $this->load->view('shorten',$data);
        }
        else {
            $this->redirect($url);
        }
    }
    
    public function redirect($url) {
       $this->load->model('functions');
       $result = $this->functions->isValid($url);
       if($result == NULL) {
           $data['title'] = "Error";
           $data['message'] = "The URL you entered is invalid.<br/>";
           $this->load->view('message',$data);
       }
       else {
           foreach($result as $key) {
               $original_url    =       $key->original_url;
               $hots            =       $key->hits;
           }
           //echo auto_link($original_url);
           $this->load->helper('url');
           redirect("http://".$original_url);
       }
    }
}
