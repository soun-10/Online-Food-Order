<?php
    require_once __DIR__."/../../../config/database.php";

    class Userlogin{
        private $db;

        public function __construct($con){
            $this->db = $con;
        }
        public function register($id, $full_name, $email, $phone, $address){
            $stmt = $this->db->prepare("INSERT INTO userlogin ( id,full_name, email, phone, address) VALUES (:id, :u, :e, :ph, :a)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':u', $full_name);
            $stmt->bindParam(':e', $email);
            $stmt->bindParam(':ph', $phone);
            $stmt->bindParam(':a', $address);
            return $stmt->execute();
        }
            public function selectUserlogin(){
                $stmt = $this->db->prepare("SELECT * FROM userlogin ORDER BY id ASC");
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                return $rows;
            }
            public function getCount(){
            $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM userlogin");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ?? 0;
}
    }
?>