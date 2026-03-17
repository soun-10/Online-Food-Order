<?php
    require_once __DIR__ . "../../../Models/admin/Categories.php";
    class CategoriesController
    {
        private $categoryModel;
        public function __construct($db)
        {
            $this->categoryModel = new Category($db);
        }
        public function store ($id, $food_name, $category, $price, $action)
        {
            $this->categoryModel->createCategories($id, $food_name, $category, $price, $action);
        }
        public function show(){
            return $this->categoryModel->getAllCategories();
        }
    }
?>