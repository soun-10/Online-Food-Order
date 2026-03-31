<?php
class MyProfile
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM customers WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProfile($id, $fullname, $phonenumber, $password = null, $photo_url = null){
        if ($password && $photo_url) {
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, password=:pw, photo_url=:pu WHERE id=:id");
            $stmt->bindParam(":pw", $hashed);
            $stmt->bindParam(":pu", $photo_url);
        } elseif ($password) {
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, password=:pw WHERE id=:id");
            $stmt->bindParam(":pw", $hashed);
        } elseif ($photo_url) {
            $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, photo_url=:pu WHERE id=:id");
            $stmt->bindParam(":pu", $photo_url);
        } else {
            $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn WHERE id=:id");
        }
        $stmt->bindParam(":fn", $fullname);
        $stmt->bindParam(":pn", $phonenumber);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>