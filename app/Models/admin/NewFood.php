<?php
    require_once __DIR__ . "/../../../config/database.php";
    class NewFood
{
        private $db;
        public function __construct($con)//constructor function auto connection to database when create object from this class
    {
        $this->db = $con;
    }
  public function createNewFood($food_name_english, $food_name_khmer, $price, $photo, $food_type, $descrip, $category_id)
{
    $stmt = $this->db->prepare("
        INSERT INTO new_foods(food_name_english, food_name_khmer, price, photo, food_type, descrip, category_id) 
        VALUES ( :fn,:fn_kh, :price,:photo,:food_type,:descrip,:category_id ) ");

    $stmt->bindParam(':fn', $food_name_english);
    $stmt->bindParam(':fn_kh', $food_name_khmer);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':food_type', $food_type);
    $stmt->bindParam(':descrip', $descrip);
    $stmt->bindParam(':category_id', $category_id);

    $stmt->execute();
}
    public function getAllNewFoods()
    {
        $stmt = $this->db->prepare("SELECT * FROM new_foods");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $rows;
    }
    // public function getNewFoodById($category_id){
    //     $stmt = $this->db->prepare("SELECT * FROM new_foods WHERE category_id = ?");
    //     $stmt->execute([$category_id]);
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    //     return $row;
    // }
    public function updateNewFood($food_name_english, $food_name_khmer, $price, $photo,$food_type,$descrip,$category_id, $id){
        $stmt = $this->db->prepare("UPDATE new_foods SET food_name_english = :fn, food_name_khmer = :fn_kh, price = :price, photo = :photo, food_type = :food_type, descrip = :descrip, category_id = :category_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fn', $food_name_english);
        $stmt->bindParam(':fn_kh', $food_name_khmer);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':food_type', $food_type);
        $stmt->bindParam(':descrip', $descrip);
        $stmt->bindParam(':category_id', $category_id);

        $stmt->execute();
    }
    public function deleteNewFood ($id){
        $stmt = $this->db->prepare ("DELETE FROM new_foods WHERE id = :id");
        $stmt -> bindParam (':id' , $id);
        if ($stmt->execute()){
            return $stmt->rowCOunt() > 0 ;
        }
        return false ;
    }
    public function getCount(){
            $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM new_foods");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ?? 0;
}
public function getFoodsByCategory($category_id)
{
    $stmt = $this->db->prepare("SELECT * FROM new_foods WHERE category_id = ?");
    $stmt->execute([$category_id]);
    return $stmt->fetchAll();
}
}
?>