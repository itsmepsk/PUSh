<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customfunctions {
    public function __construct() {
       
    }
    
    public function is_logged_in() {
        $CI =& get_instance();
        if($CI->session->userdata('user')) {
            return true;
        }
        else {
            return false;
        }
    }  
}