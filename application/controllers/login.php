<?php

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('functions');
    }
    
    public function index() {
        if($this->customfunctions->is_logged_in()) {
            redirect(base_url()."admin");
        }
        else {
            $this->login();
        }
    }  
    
    public function login() {
        $data['title'] = "Log In";
        $this->load->view('login',$data);
    }
    
    public function validate() {
        
        $this->form_validation->set_rules('username','Username','required|min_length[8]|trim|xss_clean');
        $this->form_validation->set_rules('password','Password','required|min_length[8]|trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['title'] = "Log In";
            $this->load->view('login',$data);
        }
        else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->check_user($username ,$password );
        }
    }
    
    public function check_user($username ,$password) {
        $result = $this->functions->user_exists($username,$password);
        if($result == NULL) {
            echo "USER NOT FOUND";
        }
        else {
            foreach($result as $key) {
                $user['id'] = $key->id;
                $user['username'] = $key->username;
            }
            $this->session->set_userdata('user',$user);
            /*
            print_r($result);
            echo "<br>";
            print_r($user);
             * 
             */
            redirect(base_url()."admin");
        }
    }
}

