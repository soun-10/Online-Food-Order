<?php
    require_once __DIR__ . "../../../Models/admin/Category.php";
    class CategoryController
    {
        private $categoryModel;
        public function __construct($db)
        {
            $this->categoryModel = new Category($db);
        }
        public function store ($food_name, $category, $price, $action)
        {
            $this->categoryModel->createCategories($food_name, $category, $price, $action);
            
        }
        public function show(){
            return $this->categoryModel->getAllCategories();
        }
    }
?>