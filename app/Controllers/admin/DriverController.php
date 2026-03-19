<?php
    require_once __DIR__ . "../../../Models/admin/Drivers.php";
    class DriversController
    {
        private $driverModel;
        public function __construct($db)
        {
            $this->driverModel = new Driver($db);
        }
        public function store ($id,$driver_name, $phone, $dob, $address, $vehicle, $join_date)
        {
            $this->driverModel->createDriver($id,$driver_name, $phone, $dob, $address, $vehicle, $join_date);
        }
        public function show(){
            return $this->driverModel->getAllDrivers();
        }
        public function getDriverById($id){
            return $this->driverModel->getDriverById($id);
        }
        public function updateDriver($id, $driver_name, $phone, $dob, $address, $vehicle, $join_date){
            $this->driverModel->updateDriver($id, $driver_name, $phone, $dob, $address, $vehicle, $join_date);
        }
        public function deleteDriver($id){
            $this->driverModel->deleteDriver($id);
        }
    }
?>