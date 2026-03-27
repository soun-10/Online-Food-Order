<?php
    require_once __DIR__ . "../../../Models/admin/Categories.php";
    class CategoriesController
    {
        private $categoryModel;
        public function __construct($db)
        {
            $this->categoryModel = new Category($db);
        }
        public function store ( $food_name, $category, $price ,$image ,$rating , $description)
        {
            $this->categoryModel->createCategories($food_name, $category, $price, $image ,$rating , $description);
        }
        public function show(){
            return $this->categoryModel->getAllCategories();
        }
        public function getCategoryById($id){
            return $this->categoryModel->getCategoryById($id);
        }
        public function updateCategory($id, $food_name, $category, $price, $action ,$image ,$rating , $decription){
            $this->categoryModel->updateCategory($id, $food_name, $category, $price, $action ,$image ,$rating,$decription);
        }
        public function deleteCategory($id){
            $this->categoryModel->deleteCategory($id);
        }
        public function countOrders(){
            return $this->categoryModel->getCount();
        }
    }
?>