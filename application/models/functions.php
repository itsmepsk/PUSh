<?php

class Functions extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getStatus() {
        $id = 3;
        $query = $this->db->query("SELECT value FROM configuration WHERE id = '$id'");
        $result = $query->result();
        return $result;
    }

    public function getCount() {
        $id = 1;
        $query = $this->db->query("SELECT data FROM global_data WHERE id = $id");
        $link_count = $query->result();
        //print_r($link_count);
        foreach($link_count as $key) {
            $count = $key->data;
        }
        return $count;
    }
    
    public function generateRandomString() {
        $str = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        
        $query = $this->db->query("SELECT * FROM url_data WHERE shortened_url = '$str'");
        $result = $query->result();
        
        if($result != NULL) {
            generateRandomString();
        }
        else {
            return $str;
        }
    }
    
    public function store($original_url ,$shortened_url) {
        $shortened_url = (string)$shortened_url;
        $data = array(
            'original_url'      =>      $original_url,
            'shortened_url'     =>      $shortened_url,
            'hits'              =>      0,
            //'date_created'      =>      time()
        );
        $this->db->insert("url_data",$data);
        return $shortened_url;
    }
    
    public function updateCounter($count) {
        $data = array(
            'data'      =>      $count
        );
        
        $this->db->update("global_data",$data,"id = 1");
        //UPDATE global_data SET data = {$count} WHERE id = '1'
    }
    
    public function updateGlobalCounter() {
        $this->db->where('id',2);
        $this->db->set('data','data+1',FALSE);
        $this->db->update('global_data');
        //$query = $this->db->query("UPDATE global_data SET data = data+1 WHERE id = 2");
        //$result = $query->result();
    }

        public function is_valid($url) {
        $query = $this->db->query("SELECT * FROM url_data WHERE shortened_url = '$url'");
        $result = $query->result();
        return $result;
    }
    
    public function hits($url) {
        $query = $this->db->query("SELECT hits FROM url_data WHERE shortened_url = '$url'");
        $result = $query->result();
        foreach ($result as $key) {
            $hits = $key->hits;
        }
        $hits++;
        $data = array(
            'hits'      =>     $hits 
        );
        
        $this->db->update("url_data",$data,"shortened_url = '$url'");
    }
    
    public function user_exists($username ,$password ) {
        //$password = sha1($password);
        $query = $this->db->query("SELECT * FROM user_data WHERE username = '$username' AND password = '$password'");
        $result = $query->result();
        return $result;
    }
    
    public function get_links($start,$limit = 10) {
        $query = $this->db->query("SELECT * FROM url_data ORDER BY hits DESC limit $start,$limit");
        $result = $query->result();
        return $result;
    }
    
    public function get_desc($url) {
        $query = $this->db->query("SELECT * FROM url_data WHERE shortened_url = '$url'");
        $result = $query->result();
        //var_dump($result);
        return $result;
    }
    
    public function globalDetails() {
        $query = $this->db->query("SELECT * FROM configuration");
        $result = $query->result();
        //var_dump($result);
        return $result;
    }
    
    public function userDetails($id = 1) {
        $query = $this->db->query("SELECT * FROM user_data WHERE id = '$id'");
        $result = $query->result();
        return $result['0'];
    }


    public function globalUpdate($data) {
        foreach ($data as $key => $value) {
            if($key != "update"){
                //echo $key . "=>" . $value ."<br>";
                $this->db->update("configuration",array('value' => $value),array('field' => $key));
            }
        }
    }

    public function edit_url($data) {
        //var_dump($data);
        $var = new stdClass();
        foreach ($data as $key => $value) {
            $var->$key  =   $value;
        }
        //var_dump($var);
        
        $query = $this->db->query("SELECT * FROM url_data where id = '$var->id'");
        $result = $query->result();
        foreach($result as $key) {
            //$long_url = $key->original_url;
            //$short_url = $key->shortened_url;
            $hits = $key->hits;
            //$disable = $key->disable;
            //$time = $key->date_created;
        }
        //var_dump($result);
        $field = array(
           'hits'           =>          ($var->reset == FALSE)?$hits:0,
           'disable'        =>          ($var->disable == FALSE)?0:1,
           'shortened_url'  =>           $var->shortened_url    
        );
        $query = $this->db->update("url_data",$field,"id = '$var->id'");
        return $query;    
    }
    
    public function delete($url) {
        $data = array(
            'shortened_url'     =>      $url
        );
        $query = $this->db->delete('url_data',$data);
        return $query;
    }
    
    public function get_title($url) {
        $doc = new DOMDocument();
        $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
        $str = @file_get_contents($url,false,$context);
        @$doc->loadHTML($str);
        $titlelist = @$doc->getElementsByTagName("title");
        if($titlelist->length > 0){
          return $titlelist->item(0)->nodeValue;
        }
        /*
        var_dump($context);
        if(strlen($str) > 0) {
            //preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
            preg_match("/<title(?: [^>]+)?>((?:(?!<\/?title[ >]).)*)<\/title>/",$str,$title);
            var_dump($title);
            return $title[1];
        }
         * */
         
    }  
    
    public function checkPassword($id) {
        
        $query = $this->db->query("SELECT password FROM user_data WHERE id = '$id'");
        $result = $query->result();
        return $result['0']->password;
        
    }
    
    public function updateProfile($data) {
        $fields['username'] = $data['username'];
        $fields['first_name'] = $data['first_name'];
        $fields['last_name'] = $data['last_name'];
        if ($data['new_password'] != NULL) {
            
            $fields['password'] = $data['new_password'];
            
        }
        
        $id = $data['id'];
        //var_dump($fields);
        //var_dump($id);
        $query = $this->db->update("user_data",$fields,"id = '$id'");
        return $query;
    }
    
}

