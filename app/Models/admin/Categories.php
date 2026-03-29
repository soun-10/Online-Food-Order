<?php
    require_once __DIR__ . "/../../../config/database.php";
    class Category
{
        private $db;
        public function __construct($con)//constructor function auto connection to database when create object from this class
    {
        $this->db = $con;
    }
   public function createCategories($food_name, $category, $status, $photo_url )
{
    $stmt = $this->db->prepare("INSERT INTO categories(food_name, category, status, photo_url) VALUES(:fn, :cat, :status, :photo_url)");
    
    $stmt->bindParam(':fn', $food_name);
    $stmt->bindParam(':cat', $category);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':photo_url', $photo_url);

    $stmt->execute();
}
    public function getAllCategories()
    {
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $rows;
    }
    public function getCategoryById($id){
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $row;
    }
    public function updateCategory($id, $food_name, $category, $status ,$photo_url   ){
        $stmt = $this->db->prepare("UPDATE categories SET food_name = :fn, category = :cat, status = :status, photo_url = :photo_url WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fn', $food_name);
        $stmt->bindParam(':cat', $category);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':photo_url', $photo_url);
        $stmt->execute();
    }
    public function deleteCategory ($id){
        $stmt = $this->db->prepare ("DELETE FROM categories WHERE id = :id");
        $stmt -> bindParam (':id' , $id);
        if ($stmt->execute()){
            return $stmt->rowCOunt() > 0 ;
        }
        return false ;
    }
    public function getCount(){
            $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM categories");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ?? 0;
}
}
?>