<?php

class Loginmodel extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();    
    }

    public function islogin($username, $password,$login_type )
    {
        // echo $username;
        // echo $password;
        // echo $login_type;
        // exit;
        if (!empty($username) && !empty($password)) {
            if($login_type == 'Admin'){
            $this->db
                // ->select('*')
                ->from('stafflist')
                ->where('username', $username)
                ->where('password', $password);
                $quary = $this->db->get();
                // echo $quary;
                // die;
                return ($quary->num_rows() == 1) ? true : false;
                echo 1;
            }

             if($login_type == 'User'){
                $this->db
                ->from('userlist')
                ->where('empid',$username)
                ->where('emppass',$password);
                $q = $this->db->get();
                // print_r($q->num_rows());
                // print_r($q);
                // die;
                return ($q->num_rows() == 1) ? true : false;
                echo 1;
                // die;

            }else{
                echo 0;
            }
        }

    } 
}