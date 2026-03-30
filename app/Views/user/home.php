<?php
session_start();
require_once __DIR__ . "/../../../app/Controllers/user/UserLoginController.php";

$userlogin = new UserLoginController($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body>
    <main>
        <?php include __DIR__ . "/homenewbar.php"; ?>
    </main>
    <div>
        <?php include __DIR__ . "/herosection.php"; ?>
    </div>
    <div>
        <?php include __DIR__ . "/banefit.php"; ?>
    </div>
    <div>
        <?php include __DIR__ . "/footer.php"; ?>
    </div>
    <script src="../../../public/js/home.js"></script>
</body>

</html>