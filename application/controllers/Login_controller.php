<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use CodeIgniter\API\ResponseTrait;

class Login_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Loginmodel');
        $this->load->model('Employee_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('signin');
        $this->load->view('footer');
    }
    public function check_login()   
    {
        //     print_r($this->input->post());
        //     exit;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_type = $this->input->post('login_type');

        // echo $username;
        // echo $password;
        // echo $login_type;
        // exit;
        

        $res = $this->Loginmodel->islogin($username, $password,$login_type);
        if($res == 1){
            // print_r($res);
            // die;
            $this->session->set_userdata('login_type', $login_type);
            echo 1;
        }else{
            return false;
        }
    }
    

    public function logout() { 
     $this->session->unset_userdata('empid'); 
     $this->session->unset_userdata('emppass');
        $this->session->sess_destroy(); 
        echo json_encode(array('status' => true)); 
    }
    
    // Image Uploading Function
    public function insert_data(){

        // print_r($_FILES);
        // exit;
    
        $image_name = '';
        // $insert = '';
        if(isset($_FILES['img_file']['name']) && $_FILES['img_file']['name'] != ''){
            $ref['upload_path'] = "uploads/";
            $ref['allowed_types'] = 'jpg|jpeg|png|tif';
            $ref['max_size'] = '39936'; // set maximum upload size to 40 MB
            $ref['file_name'] = time().'_'.$_FILES['img_file']['name'];
            $image_name = time().'_'.$_FILES['img_file']['name'];
            // echo $image_name;
            // exit;
            $this->load->library('upload', $ref);
            if(!$this->upload->do_upload('img_file')){
                $error = $this->upload->display_errors('<div>','</div>');
                $this->session->set_userdata('response_mode', 'error');
                echo '0';
                echo $error;
            }
        }
        $data = array(
            'emp_id'=> $this->input->post('emp_id'),
            'emp_name' =>$this->input->post('emp_name'),
            'emp_des'=>$this->input->post('emp_des'),
            'role_add'=>$this->input->post('roll_add') == 1 ? 1 : 0,
            'role_edit'=>$this->input->post('roll_edit') == 1 ? 1 : 0,
            'role_delete'=>$this->input->post('roll_delete') == 1 ? 1 : 0,
            'role_view'=>$this->input->post('roll_view') == 1 ? 1 : 0,
            'emp_doj'=>$this->input->post('emp_doj'),
            "image_path"=>$image_name,
        );
            
        $insert = $this->Employee_model->insert_employee_info($data);
        if($insert == 1){
            echo 1;
        }else{
            return false;
        }
    }
    
}