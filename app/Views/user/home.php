<?php
// session_start();
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
        <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">

            <!-- Logo -->
            <a href="home.php" class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
                <i class="fas fa-store text-blue-300"></i>
                <span>Khmer Food Delivery</span>
            </a>

            <!-- Nav Links -->
            <div class="flex items-center gap-2">
                <a href="index.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-home text-xs"></i>
                    Home
                </a>

                <a href="cart.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-cart-shopping text-xs"></i>
                    Cart
                </a>

                <a href="loginCustomer.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-right-to-bracket text-xs"></i>
                    Login
                </a>

                <a href="createCustomer.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-800 bg-white hover:bg-blue-50 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-user-plus text-xs"></i>
                    Sign Up
                </a>
            </div>
        </nav>
    </main>
    <div>
        <?php include __DIR__ . "/herosection.php"; ?>
    </div>
    <div>
        <?php include __DIR__ . "/banefit.php"; ?>
    </div>
</body>

</html>