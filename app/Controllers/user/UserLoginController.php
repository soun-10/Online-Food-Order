<?php
    require_once __DIR__."/../../Models/user/Userlogin.php";

    class UserLoginController{
        private $userloginModel;
        public function __construct($db){
            $this->userloginModel = new Userlogin($db);
        }

        public function getUserlogin($full_name){
            return $this->userloginModel->selectUserlogin($full_name);
        }
        public function register($id,$full_name, $email, $phone, $address){
            return $this->userloginModel->register( $id, $full_name, $email, $phone, $address);
        }
        public function store( $id, $full_name, $email, $phone, $address){
            $this->userloginModel->register($id, $full_name, $email, $phone, $address);
        }
        
        public function show(){
            return $this->userloginModel->selectUserlogin();
        }
        public function countOrders(){
            return $this->userloginModel->getCount();
        }
    }
?>