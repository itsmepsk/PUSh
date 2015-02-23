<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('functions');
        if (!$this->customfunctions->is_logged_in()) {
            redirect(base_url()."login");
        }
        $site_details = $this->functions->globalDetails();
        //var_dump($site_details);
        $user_details = $this->functions->userDetails();
        //var_dump($user_details);
        foreach($site_details as $key) {
            $val[$key->field] = $key->value;
        }
        
        foreach ($user_details as $key=>$value) {
            $val[$key] = $value;
        }
        
        $GLOBALS['val'] = $val;
        //var_dump($val);
    }
    
    public function index($page = 1) {
        if (!$this->customfunctions->is_logged_in()) {
            redirect(base_url()."login");
        }
        else {
            $data['table'] = $this->functions->get_links(0);
            $data['url_count'] = $this->functions->getCount();
            $data['active'] = 1;
            $data['details'] = array (
                'title'     =>      'Admin Panel',
                'css'       =>      'admin'
            );
            $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
            $this->load->view('admin',$data);
            //var_dump($data);
        }
    }  
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/login');
    }

    public function links($page = 1,$limit = 10) {
        $start = ($page-1)*$limit;
        $data['table'] = $this->functions->get_links($start,$limit);
        $data['url_count'] = $this->functions->getCount();
        $data['active'] = $page;
        $data['details'] = array (
            'title'     =>      'Admin Panel',
            'css'       =>      'admin'
        );
        
        $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
        $this->load->view('admin',$data);
        //var_dump($data['table']);
    }
    
    public function edit($url) {
        if($url == NULL) {
            redirect(base_url()."admin");
        }
        else {
            $result = $this->functions->get_desc($url);
            if(empty($result)) {
                redirect(base_url().'admin');
            }
            foreach($result as $key) {
                $data['id']   =   $key->id;
                $data['original_url']   =   $key->original_url;
                $data['shortened_url']   =   $key->shortened_url;
                $data['hits']   =   $key->hits;
                $data['disable'] = $key->disable;
            }
            $data['details'] = array (
                'title'     =>      'Edit &raquo; '.$data['shortened_url'],
                'css'       =>      'edit'
            );
            $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
            $this->load->view('edit',$data);
        }
    }
    
    public function edit_update() {
        $f_data = $this->input->post();
        if(empty($f_data)) {
            redirect(base_url()."admin");
        }
        $f_data['reset'] = $this->input->post('reset');
        $f_data['disable'] = $this->input->post('disable');
        if($this->functions->edit_url($f_data)) {
            $data['success'] = 1;
            $data['message'] = "Saved Successfully.";
        }
        else {
            $data['success'] = 0;
            $data['message'] = "Error";
        }
        $result = $this->functions->get_desc($f_data['shortened_url']);
        foreach($result as $key) {
            $data['id']   =   $key->id;
            $data['original_url']   =   $key->original_url;
            $data['shortened_url']   =   $key->shortened_url;
            $data['hits']   =   $key->hits;
            $data['disable'] = $key->disable;
        }
         $data['details'] = array (
                'title'     =>      'Edit &raquo; '.$data['shortened_url'],
                'css'       =>      'edit'
        );
        $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
        $this->load->view('edit',$data);
    }
    
    public function view($url) {
        if($url == NULL) {
            redirect(base_url()."admin");
        }
        else {
            if($result = $this->functions->get_desc($url)) {                               
                foreach($result as $key) {
                    $data['id']   =   $key->id;
                    $data['original_url']   =   $key->original_url;
                    $data['shortened_url']   =   $key->shortened_url;
                    $data['hits']   =   $key->hits;
                    $data['locked'] = ($key->disable == 1)?"Yes":"No";
                }
                $this->load->helper('security');
                $data['page_title'] = NULL;
                $data['details'] = array (
                    'title'     =>      'stats &raquo; '.$data['shortened_url'],
                    'css'       =>      'view'
                );     
                $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
                foreach ($GLOBALS['val'] as $key=>$value) {
                    if($key == "get_title") {
                        $title = $value;
                        break;
                    }
                }
                if($title == "true") {
                    $data['page_title'] = xss_clean($this->functions->get_title($data['original_url']));
                }
                $this->load->view('view',$data);
            }
        }
    }

    public function delete($url) {
        if($url == NULL) {
            redirect(base_url().'admin');
        }        
        if($this->functions->is_valid($url) && $this->functions->delete($url)) {
            $data['success']    =   1;
            $data['title']  =   "Delete";
            $data['message']    =   "Successfully Deleted";
            $data['content']    =   "Success!";
            $count = $this->functions->getCount() - 1;
            $this->functions->updateCounter($count);
        }
        else {
            $data['success']    =   0;
            $data['title']  =   "Delete";
            $data['message']    =   "Error deleting URL!";
            $data['content']    =   "Error!";
        }
        $data['button']   =   "Back";
        $data['button_url']  = base_url()."admin"; 
        $data['details'] = array (
            'css'       =>      'message'
        );
        $data['details']    = array_merge( $data['details'],$GLOBALS['val']);
        //var_dump($data);
        $this->load->view('message',$data);
               
    }
    
    public function settings() {
        $data['title'] = "settings";
        $data['details']  =  array(
            'css'       =>      'settings'
        );
        if(isset($_POST['update'])) {
            //var_dump($_POST);
            $val['site_title']   =   $_POST['site_title'];
            $val['site_name']   =   $_POST['site_name'];
            $val['lock_all']   =   (!isset($_POST['lock_all']))?"false":"true";
            $val['get_title']   =   (!isset($_POST['get_title']))?"false":"true";
            $this->functions->globalUpdate($val);
            //var_dump($val);
            $data['result'] = $this->functions->globalDetails();
            $data['details']    =   array_merge($data['details'],$GLOBALS['val']);
            $data['success'] = TRUE;
            $data['message'] = "Saved Successfully.";
            $this->load->view('settings',$data);
        }
        else{
            $data['result'] = $this->functions->globalDetails();
            //var_dump($data['result']);
            $data['details']    =   array_merge($data['details'],$GLOBALS['val']);
            $this->load->view('settings',$data);
        }
    } 
    
    public function profile() {
        $data['title'] = "Profile";
        $data['details']  =  array(
            'css'       =>      'profile'
        );   
        $data['details']    =    array_merge( $data['details'],$GLOBALS['val']);
            $data['result']     =    $this->functions->userDetails();
        if (!isset($_POST['update'])) {
            
            $this->load->view('profile',$data);
            
        }    
        else {
            //var_dump($_POST);
            $val['username']    =   $_POST['username'];
            $val['first_name']  =   $_POST['first_name'];
            $val['last_name']  =   $_POST['last_name'];
            $val['new_password']    =   $_POST['new_password'];
            $val['conf_password']   =   $_POST['confirm_password'];
            $val['password']    =   $_POST['old_password'];
            $val['id']      =       $_POST['id'];
            
            $config = array(
                array(
                    'field'     =>      'username',
                    'label'     =>      'Username',
                    'rules'     =>      'required|trim|xss_clean|alpha_numeric|max_length[15]|min_length[8]'
                ),
                array(
                    'field'     =>      'first_name',
                    'label'     =>      'First Name',
                    'rules'     =>      'required|trim|xss_clean|alpha'
                ),
                array(
                    'field'     =>      'last_name',
                    'label'     =>      'Last Name',
                    'rules'     =>      'required|trim|xss_clean|alpha'
                ),
                array(
                    'field'     =>      'new_password',
                    'label'     =>      'New Password',
                    'rules'     =>      'trim|xss_clean|'
                ),
                array(
                    'field'     =>      'conf_password',
                    'label'     =>      'Confirm Password',
                    'rules'     =>      'trim|xss_clean|matches[new_password]'
                )
            );
            
            $data['details']    =    array_merge( $data['details'],$GLOBALS['val']);
            $data['result']     =    $this->functions->userDetails();
            //$this->load->view('profile',$data);           
            $this->form_validation->set_rules($config);
            
            if ($this->form_validation->run() == FALSE) {
                
                //echo "hi!";
                $this->load->view('profile',$data);
                //echo "hi!";
                
            }
            else {
                //echo "hi@!";
                $pass = $this->functions->checkPassword($val['id']);
                //echo "\$Pass is {$pass}";
                //var_dump($pass);
                if($pass == $val['password']) {
                    if($this->functions->updateProfile($val)) {
                        $data['success'] = TRUE;
                        $data['message'] = "Updated Successfully.";
                    }
                    else {
                        $data['success'] = FALSE;
                        $data['message'] = "Error!!";
                    }
                }
                else {
                    $data['success'] = FALSE;
                    $data['message'] = "Wrong Password!";
                }
                
                //$data['success'] = TRUE;
                
                $data['result']     =    $this->functions->userDetails();
                $this->load->view('profile',$data);
                
            } 
            
        }
    }
    
}