<?php
    require_once __DIR__."/../Models/User.php";

    class UserController{
        private $userModel;
        public function __construct($db){
            $this->userModel = new User($db);
        }

        public function getUser($)
    }
?>