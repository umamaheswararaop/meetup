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
 * Description of Participant Model
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Par_model extends CI_Model {

    private $_empID;
    private $_name;
    private $_age;
    private $_dob;
    private $_profession;
    private $_locality;
    private $_guests;
    private $_address;

    public function setParID($empID) {
        $this->_empID = $empID;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setAge($age) {
        $this->_age = $age;
    }    
    public function setDob($dob) {
        $this->_dob = $dob;
    }
    public function setProfession($profession) {
        $this->_profession = $profession;
    }
    public function setLocality($locality) {
        $this->_locality = $locality;
    }
    public function setGuests($guests) {
        $this->_guests = $guests;
    }
    public function setAddress($address) {
        $this->_address = $address;
    }
    // get Participant List
    public function getParList() {        
        $this->db->select(array('id', 'name', 'age', 'dob', 'profession', 'locality', 'guests', 'address'));
        $this->db->from('participants');        
        $query = $this->db->get();
        return $query->result_array();
    }
    // create new Participant
    public function createPar() { 
        $data = array(
            'name' => $this->_name,
            'age' => $this->_age,
            'dob' => $this->_dob,
            'profession' => $this->_profession,
            'locality' => $this->_locality,
            'guests' => $this->_guests,
            'address' => $this->_address,
        );
        $this->db->insert('participants', $data);
        return $this->db->insert_id();
    }
    // update Participant
    public function updatePar() { 
        $data = array(
             'name' => $this->_name,
            'age' => $this->_age,
            'dob' => $this->_dob,
            'profession' => $this->_profession,
            'locality' => $this->_locality,
            'guests' => $this->_guests,
            'address' => $this->_address,
        );
        $this->db->where('id', $this->_empID);
        $this->db->update('participants', $data);
    }
    // for display Participant
    public function getPar() {        
        $this->db->select(array('id', 'name', 'age', 'dob', 'profession', 'locality', 'guests', 'address'));
        $this->db->from('participants');  
        $this->db->where('id', $this->_empID);     
        $query = $this->db->get();
       return $query->row_array();
    }
       // Fetch records
	public function getData($rowno,$rowperpage,$search="") {
			
		$this->db->select('*');
		$this->db->from('participants');

		if($search != ''){
        	$this->db->like('name', $search);
			$this->db->or_like('locality', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();
       	
		return $query->result_array();
	}

	// Select total records
    public function getrecordCount($search = '') {

    	$this->db->select('count(*) as allcount');
      	$this->db->from('participants');
      
      	if($search != ''){
       		$this->db->like('name', $search);
		$this->db->or_like('locality', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
    }
    
}