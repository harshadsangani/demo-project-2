<!-- Button trigger modal -->
<div id="session_expired_popup" style="display:none;">
    <p>Your session has expired. Please log in again.</p>
</div>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Employee_model','employeedata');
        $this->load->model('Staff_model','userlist');
        // $this->load->library('session');    
          $this->load->helper('url');

    }
    

    public function index(){
        $login_type = $this->session->userdata('login_type');

 
        if($login_type == 'Admin'){
        $data["getdata"] = $this->employeedata->select();
        // echo "<pre>";
        // print_r($data);
        //       die;
        // "</pre>";

        $this->load->view('header');
        $this->load->view('header_section');
        $this->load->view('employeelist',$data);
        $this->load->view('upload');
        $this->load->view('footer');
        }

        else{
            redirect(base_url('Home_controller/staff_list')); 
        
        // if ($this->session->userdata('login_type') == "User") {
        //     redirect(base_url('Home_controller/index'));
        // } else {
        //     if ($this->session->userdata('login_type') == "expired") {
        //         redirect(base_url('Login_Controller/index'));
        //      } else {
        //         redirect(base_url('Home_controller/staff_list'));
        //     }


}
}

public function emp_list()
{
$login_type = $this->session->userdata('login_type');
if($login_type == 'Admin'){
$data['getdata']=$this->employeedata->select();
$this->load->helper('url');
$this->load->view('header');
$this->load->view('header_section');
$this->load->view('employeelist',$data);
$this->load->view('footer');

}
}

public function check_session_status()
{
// print_r($this->session->userdata('Admin'));
// exit;
if ($this->session->userdata('login_type')) {
echo"active";
echo 1;
} else {
echo "expired";
echo 0;
}
}


public function staff_list(){
$login_type = $this->session->userdata('login_type');
$data['getdata'] = $this->userlist->select();
// print_r($data);
// die;
$this->load->helper('url');
$this->load->view('header');
$this->load->view('header_section');
$this->load->view('stafflist',$data);
$this->load->view('footer');

}


}