<?php
    require_once __DIR__ . "../../../../config/database.php";
    class Customer{
        private $con;
        public function __construct($customer)
        {
            $this->con = $customer;
        }
        public function CreateUser($fullname,$email,$phonenumber,$password){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->con->prepare("INSERT INTO customers(fullname,email,phonenumber,password) VALUES(:fn, :em, :pn, :pw)");
            $stmt->bindParam(":fn", $fullname);
            $stmt->bindParam(":em", $email);
            $stmt->bindParam(":pn", $phonenumber);
            $stmt->bindParam(":pw", $hashedPassword);

            $stmt->execute();
        }

        public function FindUser($input){
            $stmt = $this->con->prepare("SELECT * FROM customers WHERE email = :input OR phonenumber = :input1");
            $stmt->bindParam(":input", $input);
            $stmt->bindParam(":input1", $input);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC)?: false;
        }
    }
?>