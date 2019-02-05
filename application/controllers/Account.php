<?php

require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('account_model');
    }

    //API - Check user if exist in our database
    function authenticateUser_post() {

        $email  = $this->post('user_email');
        $password  = $this->post('password');
        
        if(!$email || !$password) {

            $this->response("Please enter valid login detail", 400);
            exit;
        }

        $result = $this->account_model->checkIfUserExist( $email, $password );

        if($result) {

            $this->response($result, 200); 
            exit;
        } 
        else {

             $this->response("User does not exist", 404);
            exit;
        }
    } 

     //API - Register a new user
     function registerUser_post() {

        $data = [
            'first_name' => $this->post('first_name'),
            'last_name' => $this->post('last_name'),
            'mobile_number' => $this->post('mobile_number'),
            'user_email' => $this->post('user_email'),
            'password' => $this->post('password')
        ];

        $confirmPassword = $this->post('confirm_password');
        
        if(!$data) {
            $this->response("Please enter the essential data", 400);
            exit;
        }

        $result = $this->account_model->registerNewUser( $data );

        if($result === 0){

            $this->response("User registration failed. Try again.", 404);

        }else{

            $this->response("success", 200);  
       
        }
    }
    
    //API - Update the existing user data
    function updateUserData_post() {

        $emailId  = $this->post('emailId');
        $data = [
            'first_name' => $this->post('first_name'),
            'last_name' => $this->post('last_name'),
            'gender' => $this->post('gender'),
            'dob' => $this->post('dob'),
            'country' => $this->post('country'),
            'current_city' => $this->post('current_city'),
            'mobile_number' => $this->post('mobile_number'),
            'password' => $this->post('password')
        ];
        
        if(!$data) {
            $this->response("Please enter the essential data", 400);
            exit;
        }

        $result = $this->account_model->updateUserData( $emailId, $data );

        if($result === 0){

            $this->response("User registration failed. Try again.", 404);

        }else{

            $this->response("success", 200);  
       
        }
    } 
}