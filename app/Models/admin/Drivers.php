<?php
    include_once __DIR__ . "/../../../config/database.php";
    class Driver{
        private $db;
        public function __construct($con)
    {
        $this->db = $con;
    }
    public function createDriver($id,$driver_name, $phone, $dob, $address , $vehicle , $join_date)
    {
        $stmt = $this->db->prepare("INSERT INTO drivers(id,driver_name, phone, dob, address, join_date) VALUES(:id, :fn, :em, :ph, :ad, :jd)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fn', $driver_name);
        $stmt->bindParam(':ph', $phone);
        $stmt->bindParam(':em', $dob);
        $stmt->bindParam(':ad', $address);
        $stmt->bindParam(':ve', $vehicle);
        $stmt->bindParam(':jd', $join_date);

        $stmt->execute();
    }
     public function getAllDrivers()
    {
        $stmt = $this->db->prepare("SELECT * FROM drivers ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $rows;
    }
     public function getDriverById($id){
        $stmt = $this->db->prepare("SELECT * FROM drivers WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $row;
    }
     public function updateDriver($id,$driver_name, $phone, $dob, $address , $vehicle , $join_date){
        $stmt = $this->db->prepare("UPDATE drivers SET driver_name = :fn, phone = :ph, dob = :em, address = :ad, vehicle = :ve, join_date = :jd WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fn', $driver_name);
        $stmt->bindParam(':ph', $phone);
        $stmt->bindParam(':em', $dob);
        $stmt->bindParam(':ad', $address);
        $stmt->bindParam(':ve', $vehicle);
        $stmt->bindParam(':jd', $join_date);
        $stmt->execute();
    }
     public function deleteDriver($id){
        $stmt = $this->db->prepare("DELETE FROM drivers WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
}
?>