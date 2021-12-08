<?php
    class taikhoan{
        public $user_id,$username,$password;
        public function __construct($user_id,$username,$password)
        {
            $this->user_id=$user_id;
            $this->username=$username;
            $this->password=$password;
            
        }
    }



?>