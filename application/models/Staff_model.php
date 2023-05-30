<?php

class Staff_model extends CI_model{


    public function select(){
        $query = $this->db->get('userlist');
        
        return $query->result();
    }
}



?>