<?php
    require_once __DIR__ . "/../../../config/database.php";
    class Category
{
        private $db;
        public function __construct($con)//constructor function auto connection to database when create object from this class
    {
        $this->db = $con;
    }
    public function createCategories($id,$food_name, $category, $price, $action)
    {
        $stmt = $this->db->prepare("INSERT INTO categories(id,food_name, category, price, action) VALUES(:id, :fn, :cat, :pr, :ac)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fn', $food_name);
        $stmt->bindParam(':cat', $category);
        $stmt->bindParam(':pr', $price);
        $stmt->bindParam(':ac', $action);
        $stmt->execute();
    }
    public function getAllCategories()
    {
        $stmt = $this->db->prepare("SELECT * FROM categories ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $rows;
    }
}
?>