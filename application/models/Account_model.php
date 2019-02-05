<?php
    class Account_model extends CI_Model {
       
    public function __construct() {
        $this->load->database();
    }
      
    //API call - get a book record by isbn
    public function checkIfUserExist( $email, $password ) {  

        $this->db->select('first_name, last_name, user_email, mobile_number');

        $this->db->from('_user_data');

        $this->db->where('user_email',$email);
        $this->db->where('password',$password);

        $query = $this->db->get();
        $result = array("result" => $query);
        if($query->num_rows() == 1) {
            return $query->result_array();
        }
        else {
            return 0;
        }
    }

    public function registerNewUser( $data ) {
        if($this->db->insert('_user_data', $data)){

            return true;
 
         }
         else{
 
            return false;
 
         }
    }

    public function updateUserData( $emailId, $data ) {
    
        $this->db->where('user_email', $emailId);
        if($this->db->update('_user_data', $data)){
            return true;
        }
        else{

          return false;

        }
    }
}