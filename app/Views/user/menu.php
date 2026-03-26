<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include __DIR__ . "../../../../app/Views/components/cdns.php";
  ?>
    <link rel="stylesheet" href="../../../public/css/CustomerHomePage.css">
    <!-- Font Text -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet" />
</head>

</head>

<body>
    <div>
        <?php require_once __DIR__ . "../../../../public/user/index.php" ?>

    </div>
    <div>
        <?php require_once __DIR__ . "../foodorder.php" ?>
    </div>
</body>

</html>