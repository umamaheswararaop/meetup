<?php

/* * ***
 * Version: V1.0.1
 *
 * Description of MY_Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 * *** */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Site', 'site');
    }
    public function is_logged_in()
    {
        $user = $this->session->userdata('user_data');
        return isset($user);
    }

    //create custom Controller
    function page_construct($page, $meta = array(), $data = array()) {
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['info'] = $this->site->getNotifications();
        $this->load->view('participant/header', $meta);
        $this->load->view($page, $data);
        $this->load->view('participant/footer', $data);
    }

}
