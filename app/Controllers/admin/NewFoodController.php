<?php
require_once __DIR__ . "../../../Models/admin/NewFood.php";
class NewFoodController
    {
        private $newFoodModel;
        public function __construct($db)
        {
            $this->newFoodModel = new NewFood($db);
        }
        public function store ( $food_name_english, $food_name_khmer, $price, $photo, $food_type, $descrip, $category_id )
        {
            $this->newFoodModel->createNewFood($food_name_english, $food_name_khmer, $price, $photo, $food_type, $descrip, $category_id);
        }
        public function show(){
            return $this->newFoodModel->getAllNewFoods();
        }
        public function getByCategory($category_id){
    return $this->newFoodModel->getFoodsByCategory($category_id);
}
        public function updateNewFood($id, $food_name_english, $food_name_khmer, $price, $photo, $food_type, $description, $category_id){
            $this->newFoodModel->updateNewFood($food_name_english, $food_name_khmer, $price, $photo, $food_type, $description, $category_id, $id);
        }
        public function deleteNewFood($id){
            $this->newFoodModel->deleteNewFood($id);
        }
        public function countOrders(){
            return $this->newFoodModel->getCount();
        }
        public function destroy ($id){
            return $this->newFoodModel->deleteNewFood($id);
        }
    }
?>