<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Model
{

    function getUsers()
    {
        $q = $this->db->get('registration');
        $response = $q->result_array();

        return $response;
    }
    function logincheck($email, $password)
    {


        // $data = $this->getUsers();
        $result = $this->db->select('*')
            ->from('registration')
            ->where('email', $email)
            ->where('password', $password)
            ->get();
        print_r($result);
        exit;
        if ($result->num_rows() > 0) {
            $row = $result->row_array();
            return $row;
        } else {
            return false;
        }
    }
}
