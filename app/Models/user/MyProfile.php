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

    // public function updateProfile($id, $fullname, $phonenumber, $password = null, $profile_image = null)
    // {
    //     if ($password && $profile_image) {
    //         $hashed = password_hash($password, PASSWORD_BCRYPT);
    //         $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, password=:pw, profile_image=:img WHERE id=:id");
    //         $stmt->bindParam(":pw",  $hashed);
    //         $stmt->bindParam(":img", $profile_image);
    //     } elseif ($password) {
    //         $hashed = password_hash($password, PASSWORD_BCRYPT);
    //         $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, password=:pw WHERE id=:id");
    //         $stmt->bindParam(":pw", $hashed);
    //     } elseif ($profile_image) {
    //         $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn, profile_image=:img WHERE id=:id");
    //         $stmt->bindParam(":img", $profile_image);
    //     } else {
    //         $stmt = $this->con->prepare("UPDATE customers SET fullname=:fn, phonenumber=:pn WHERE id=:id");
    //     }
    //     $stmt->bindParam(":fn", $fullname);
    //     $stmt->bindParam(":pn", $phonenumber);
    //     $stmt->bindParam(":id", $id);
    //     return $stmt->execute();
    // }
}
?>