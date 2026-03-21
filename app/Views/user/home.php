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
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body>
    <nav class="bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <!-- Logo -->
            <div class="text-xl font-bold mr-[16px]">
                <img src="" alt="">
                USEA FOOD ONLINE
            </div>

            <!-- Menu -->
            <ul class="hidden md:flex space-x-6">
                <li><a href="#" class="hover:text-gray-200">Home</a></li>
                <li><a href="#" class="hover:text-gray-200">About</a></li>
                <li><a href="#" class="hover:text-gray-200">Services</a></li>
                <li><a href="#" class="hover:text-gray-200">Contact</a></li>
            </ul>

            <!-- Button -->
            <div class="hidden md:block">
                <a href="#" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">
                    Login
                </a>
            </div>
    </nav>
</body>

</html>