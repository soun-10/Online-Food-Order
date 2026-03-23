<?php
    require_once __DIR__ . "../../../Models/user/Customer.php";
    class CustomerController{
        private $CustomerModel;
        public function __construct($customer)
        {
            $this->CustomerModel = new Customer($customer);
        }
        public function Create($fullname, $email,$phonenumber,$password){
            return $this->CustomerModel->CreateUser($fullname,$email,$phonenumber,$password);
        }
        public function Login($input){
            return $this->CustomerModel->FindUser($input);
        }
    }
?>