    <?php

class Employee_model extends CI_model{

    public function insert_employee_info($data){

        // print_r($data);
        // die;
        
        $this->db->insert('employeedata',$data);
        if($this->db->affected_rows()> 0){  
            return true;
            // print_r(this->db->insert_id());
            // die;
        }else{
            return false;
        } 
    }

    public function select(){

        $query = $this->db->get('employeedata');

        return $query->result();
    }
}




?>