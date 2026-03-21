<?php
    require_once __DIR__."/../../Controllers/user/UserLoginController.php";
    $userLoginController = new UserLoginController($con);    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <div>
        <h1>My App</h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </div>
</body>

</html>