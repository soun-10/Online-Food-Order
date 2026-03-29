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

    public function updateProfile($id, $fullname, $phonenumber, $password = null, $profile_image = null)
    {
        return $this->myProfileModel->updateProfile($id, $fullname, $phonenumber, $password, $profile_image);
    }
}
?>