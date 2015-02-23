<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
class Shorten extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('functions');
        $site_details = $this->functions->globalDetails();
        foreach($site_details as $key) {
            $val[$key->field] = $key->value;
        }
        //var_dump($val);
        $GLOBALS['val'] = $val;
        $status = $this->functions->getStatus();
        foreach ($status as $key) {
            $GLOBALS['status'] = $key->value;
        }
        //var_dump($status);
        //var_dump($site_details);
    }
    
    public function index($url = NULL) {
        //echo $GLOBALS['status'];
        //var_dump($GLOBALS['val']);
        $data['title'] = $GLOBALS['val']['site_title'];
        $data['site_name'] = $GLOBALS['val']['site_name'];
        if($url == NULL || $url == "shorten" || ($GLOBALS['status'] == "true") ) {
            $this->load->view('shorten',$data);
        }
        else {
            $this->redirect_to($url);
        }
    }
    
    public function process() {
        $url = $this->input->post('url');
        $config = array(
            array(
                'field'     =>      'url',
                'label'     =>      'URL',
                'rules'     =>      'required|trim|xss_clean|callback_valid_url_format'
            )
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE) {
            $this->load->view('shorten');
        }
        else {
            $data['original_url'] = $url;

            $counter = $this->functions->getCount();
            $shortened_url = $this->functions->generateRandomString();
            $this->functions->store($url,$shortened_url);

            $this->functions->updateCounter($counter+1);
            
            $original_url = auto_link($url);
            $shortened_url = (base_url().$shortened_url);
            
            $data['message'] = "Shortened URL for {$original_url} is {$shortened_url}";
            $data['title'] = "URL Shortener";
            $data['original_url'] = $original_url;
            $data['shortened_url'] = $shortened_url;
            $data['details']    =   array(
                'title'     =>       'Success',
                'css'       =>       'success'
            );
            $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
            $this->load->view('success',$data);
        }
    }
    
    public function redirect_to($url) {
       $result = $this->functions->is_valid($url);
       //var_dump($result);
       if(empty($result)) {
           $data['title'] = "Error";
           $data['success'] =   0;
           $data['message'] = "The URL you entered is invalid.<br/>";
           $data['content'] = "Error!";
           $data['button']  =   "Home";
           $data['button_url']  = base_url();
           $this->load->view('message',$data);
       }
       else {
           foreach($result as $key) {
               $original_url    =       $key->original_url;
               $hits            =       $key->hits;
               $disable         =       $key->disable;
           }
           if($disable == 1) {
               redirect(base_url());
           }
           $this->functions->hits($url);
           //echo auto_link($original_url);
           $this->load->helper('url');
           $this->functions->updateGlobalCounter();
           redirect($original_url);
       }
    }
    
    public function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }     
    
    public function url_exists($url){                                  
        $url_data = parse_url($url); // scheme, host, port, path, query
        if(!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)){
            $this->form_validation->set_message('url_exists', 'The URL you entered is not accessible.');
            return FALSE;
        }              
         
        return TRUE;
    } 
}
