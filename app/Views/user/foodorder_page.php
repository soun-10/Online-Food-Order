<?php
require_once __DIR__ ."../../../../config/database.php";

// if category clicked
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // get category info
    $stmt = $con->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);
    $category = $stmt->fetch();

    // get foods of that category
    $stmt2 = $con->prepare("SELECT * FROM foods WHERE category_id = ?");
    $stmt2->execute([$category_id]);
    $foods = $stmt2->fetchAll();

} else {
    // show all foods by default
    $stmt = $con->query("SELECT * FROM new_foods");
    $foods = $stmt->fetchAll();
}
?>