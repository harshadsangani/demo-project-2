<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employeelist_Controller extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('signin');
        $this->load->view('footer');
    }
}