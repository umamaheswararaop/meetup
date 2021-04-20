<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @package Participant :  CodeIgniter - Upcoming Meetup with MySQL
 *
 * @author Umamaheswararao
 * 
 * Description of Participant Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Par extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load url helper
        $this->load->helper('url');
        // Load participant model 
        $this->load->model('Par_model', 'participant');
        $this->load->model('Auth_model', 'auth');
        // Load calender library
        $this->load->library('calendar');
        // Load session library
        $this->load->library('session');
        // Load Pagination library
        $this->load->library('pagination');
//        Load Form Validations
        $this->load->library('form_validation');
        
        
    }
//    Default Loader
    public function index($rowno = 0) {
        $data['title'] = 'Registered Participants List';
        // Search text
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }
        // Rows per page
        $rowperpage = 5;
        // Current Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->participant->getrecordCount($search_text);
        // Get  records
        $users_record = $this->participant->getData($rowno, $rowperpage, $search_text);
        // Pagination Configuration
        $config['base_url'] = base_url() . 'Par/index';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        // pagination Initialize
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['parInfo'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;
        // Load view
        
        $this->load->view('participant/index', $data);
    }
    //         post the input data for inserting/updating participants
    public function postdata() {
            $name = $this->input->post('name');
            $age = $this->input->post('age');
            $dob = $this->input->post('dob');
            $profession = $this->input->post('profession');
            $locality = $this->input->post('locality');
            $guests = $this->input->post('guests');
            $address = $this->input->post('address');
            $this->participant->setName($name);
            $this->participant->setAge($age);
            $this->participant->setDob($dob);
            $this->participant->setProfession($profession);
            $this->participant->setLocality($locality);
            $this->participant->setGuests($guests);
            $this->participant->setAddress($address);
    }
    // Participants Add method
    public function add() {
        $data['title'] = 'Participants Registration';
        $this->load->view('participant/add', $data);
    }
    public function validations() {
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
        $this->form_validation->set_rules('age', 'Age', 'trim|required|is_natural_no_zero|max_length[2]');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('profession', 'Select Profession', 'trim|required');
        $this->form_validation->set_rules('locality', 'Locality', 'trim|required|alpha');
        $this->form_validation->set_rules('guests', 'No. of Guests', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
    }
    // Participants save method
    public function save() {
//        form validations checking while inserting participants
        $this->validations();
        if ($this->form_validation->run() == FALSE) {
            $this->postdata();
            $this->add();
        } else {
            $this->postdata();
//            load participant model to insert the data
            $this->participant->createPar();
            // set success message on inserting
            $this->session->set_flashdata('success', 'Details Added successfully');
            redirect('par/index');
        }
    }

    // Participants edit method
    public function edit($id = '') {
        $data['title'] = 'Participants Update';
        $this->participant->setParID($id);
        $data['parInfo'] = $this->participant->getPar();
        $this->load->view('participant/add', $data);
    }
    // Participants update method
    public function update() {
//        form validations checking while updating participants list
        $this->validations();
        if ($this->form_validation->run() == FALSE) {
//            $this->postdata();
            $this->edit($this->input->post('par_id'));
        } else {
//            load participant id for particular record updation
            $id = $this->input->post('par_id');
            $this->participant->setParID($id);
            $this->postdata();
//          set success message on updation
            $this->session->set_flashdata('update', 'Details Updated successfully');
//            load participant model to update the data
            $this->participant->updatePar();
            redirect('par/index');
        }
    }
//          Participants display method
    public function display($id = '') {
        $data['title'] = 'Individual Participant Display';
        $this->participant->setParID($id);
        $data['parInfo'] = $this->participant->getPar();
        $this->load->view('participant/display', $data);
    }
    public function meetup() {
        $this->load->view('participant/meetup', $data);   
    }
     // login method
    public function login() {        
        $data = array();
        $data['title'] = "Login";
        $this->load->view('Auth/login', $data);
    }
    // action login method
    function doLogin() {        
        // Check form  validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->login();
        } else {
          $sessArray = array();
            //Field validation succeeded.  Validate against database
            $username = $this->input->post('user_name');
            $password = $this->input->post('password');
            
            $this->auth->setUserName($username);
            $this->auth->setPassword($password);
            //query the database
            $result = $this->auth->login();

            if (!empty($result) && count($result) > 0) {
                foreach ($result as $row) {
                    $authArray = array(
                        'user_id' => $row->user_id,
                        'user_name' => $row->user_name,
                        'email' => $row->email
                    );
                    $this->session->set_userdata('ci_session_key_generate', TRUE);
                    $this->session->set_userdata('ci_seesion_key', $authArray);
	                    setcookie ("loginId",""); 
	                    setcookie ("loginPass","");          
                }
                redirect('par/index');
            } else {
                $this->login();
            }
        }
    }
        
    //logout method
    public function logout() {
        $this->session->unset_userdata('ci_seesion_key');
        $this->session->unset_userdata('ci_session_key_generate');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('par/meetup');
    }   
}