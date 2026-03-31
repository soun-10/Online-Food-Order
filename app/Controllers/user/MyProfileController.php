<?php
require_once __DIR__ . "/../../Models/user/MyProfile.php";

class MyProfileController
{
    private $myProfileModel;

    public function __construct($con)
    {
        $this->myProfileModel = new MyProfile($con);
    }

    public function getById($id)
    {
        return $this->myProfileModel->getById($id);
    }

     public function updateProfile($id, $fullname, $phonenumber, $password = null, $photo_url = null)
    {
        return $this->myProfileModel->updateProfile($id, $fullname, $phonenumber, $password, $photo_url);
    }
}
?>