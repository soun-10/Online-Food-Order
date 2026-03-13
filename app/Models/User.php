<?php
    require_once __DIR__."/../../config/database.php";

    class User{
        private $db;

        public function __construct($con){
            $this->db = $con;
        }
        
    }
?>