<?php
require_once __DIR__ . "../../../../config/database.php";
class Customer
{
    private $con;
    public function __construct($customer)
    {
        $this->con = $customer;
    }
    public function CreateUser($fullname, $email, $phonenumber, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->con->prepare("INSERT INTO customers(fullname,email,phonenumber,password) VALUES(:fn, :em, :pn, :pw)");
        $stmt->bindParam(":fn", $fullname);
        $stmt->bindParam(":em", $email);
        $stmt->bindParam(":pn", $phonenumber);
        $stmt->bindParam(":pw", $hashedPassword);

        return $stmt->execute();
    }

    public function selectCustomers()
    {
        $stmt = $this->con->prepare("CALL sp_get_users();");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function FindUser($input)
    {
        $stmt = $this->con->prepare("SELECT id, fullname, email, phonenumber, password FROM customers WHERE email = :email OR phonenumber = :phone
    ");
        $stmt->bindParam(":email", $input);
        $stmt->bindParam(":phone", $input);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getCount()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS total FROM customers");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }
}
