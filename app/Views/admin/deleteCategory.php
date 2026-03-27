<?php
require_once __DIR__ . "/../../Controllers/admin/CategoriesController.php";
$Category = new CategoriesController($con);

$id = $_GET['delete_id'];
// Get student record first
$categoryData = $Category->getCategoryById($id);
// Delete photo if it exists
if (
    !empty($categoryData["image"]) &&
    file_exists($categoryData["image"])
) {
    unlink($categoryData["image"]);
}
// Delete student record
$result = $Category->destroy($id);
if ($result) {
    header("Location: categories.php");
    exit;
} else {
    echo "<div class='alert alert-danger'>Failed to delete student
record.</div>";
}