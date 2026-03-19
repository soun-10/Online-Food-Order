<?php
require_once __DIR__ . "/../../../config/database.php";

if (isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $sql = "DELETE FROM drivers WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: drivers.php");
    }
}
?>