<?php
    require_once __DIR__."/../../Models/admin/User.php";

    class UserController{
        private $userModel;
        public function __construct($db){
            $this->userModel = new User($db);
        }

        public function getUser($username){
            return $this->userModel->selectUser($username);
        }
    }
?>