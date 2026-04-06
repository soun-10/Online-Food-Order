<?php
require_once __DIR__ . "/../../../config/database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ១. ទាញយក photo_url មុននឹងលុប
    $sqlSelect = "SELECT photo_url FROM customers WHERE id = :id";
    $stmtSelect = $con->prepare($sqlSelect);
    $stmtSelect->bindParam(':id', $id);
    $stmtSelect->execute();
    $customer = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    // ២. លុបចេញពី Database
    $sqlDelete = "DELETE FROM customers WHERE id = :id";
    $stmtDelete = $con->prepare($sqlDelete);
    $stmtDelete->bindParam(':id', $id);

    if ($stmtDelete->execute()) {

        // ៣. លុបរូបភាព (បើមាន)
        if (!empty($customer['photo_url'])) {
            $imagePath = __DIR__ . "/../../../public/Image/customerProfile/" . $customer['photo_url'];

            if (file_exists($imagePath)) {
                unlink($imagePath); // លុបឯកសាររូបភាព
            }
        }

        header("Location: customers.php");
        exit();
    }
}
?>