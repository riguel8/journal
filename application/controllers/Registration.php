<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function index() {
        
        // $this->load->view('template/nav');
        $this->load->view('register/registration');
        // $this->load->view('template/footer');
    }
}
