<?php
require_once __DIR__ . "../../../../config/database.php";

if (!isset($_GET['category_id'])) {
    echo "No category selected";
    exit();
}

$category_id = $_GET['category_id'];

// get category info
$stmt = $con->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$category_id]);
$category = $stmt->fetch();

if (!$category) {
    echo "Category not found";
    exit();
}

// get foods for that category
$stmt2 = $con->prepare("SELECT * FROM new_foods WHERE category_id = ?");
$stmt2->execute([$category_id]);
$newfood = $stmt2->fetchAll();

// DEBUG (remove later)
// var_dump($newfood); exit;
?>