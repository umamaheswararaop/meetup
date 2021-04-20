<?php

/* * ***
  * Description of Auth Controller
 *
 * @author umamaheswararao56@gmail.com
 *
 * *** */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model {
    // Declaration of a variables   
    private $_userName;
    private $_password;   

    public function setUserName($userName) {
        $this->_userName = $userName;
    }
    public function setPassword($password) {
        $this->_password = $password;
    }
       
    // login method and password verify
    function login() {
        $this->db->select('id as user_id, user_name, email, password');
        $this->db->from('users');
        $this->db->where('email', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        //{OR}
        $this->db->or_where('user_name', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }
    // password verify
    public function verifyHash($password, $vpassword) {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
?>
