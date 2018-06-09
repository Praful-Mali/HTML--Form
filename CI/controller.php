<?php 

class Home extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','session')); // load form lidation libaray & session library
        $this->load->helper(array('url','html','form'));  // load url,html,form helpers optional
    }    
 
    public function index(){
    
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('number', 'Phone Number', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[10]|alpha');
        $this->form_validation->set_rules('message', 'Message', 'required|min_length[12]|max_length[100]');
 
    
        // hold error messages in div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        // check for validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_validation_demo');
        }else{
            $this->session->set_flashdata('item', 'form submitted successfully');
            redirect(current_url());
        }
    
    }
}