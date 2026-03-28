<?php
require_once __DIR__ . "/../../../config/database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM customers WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: customers.php");
    }
}
?>