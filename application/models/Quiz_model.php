<?php
    class Quiz_model extends CI_Model {
       
    public function __construct() {
        $this->load->database();
    }
      
    //API call - get a book record by isbn
    public function checkIfUserExist( $email, $password ) {  

        $this->db->select('first_name, last_name, email_id, mobile_number');

        $this->db->from('_user_data');

        $this->db->where('email_id',$email);
        $this->db->where('password',$password);

        $query = $this->db->get();

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
}