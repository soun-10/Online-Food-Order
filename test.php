<?php 
session_start();
   require_once __DIR__."/../../../app/Controllers/user/UserLoginController.php";

$userlogin = new UserLoginController($con);  
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
            <div class="text-xl font-bold mr-auto">
                <img src="" alt="">
                USEA FOOD ONLINE
            </div>

            <!-- Menu -->
            <ul class="hidden md:flex space-x-6 ml-auto">
                <li><a href="#" class="hover:text-gray-200">Home</a></li>
                <li><a href="#" class="hover:text-gray-200">About</a></li>
                <li><a href="#" class="hover:text-gray-200">Services</a></li>
                <li><a href="#" class="hover:text-gray-200">Contact</a></li>
            </ul>

            <!-- Button -->
            <div class="ml-auto text-center">
                <?php if (isset($_SESSION['full_name'])): ?>
                <span class="mr-4 text-lg hover:text-green-500">
                    Hello, <?php echo $_SESSION['full_name']; ?>
                </span>
                <a href="logout.php"
                    class=" text-red-600 px-3 py-1 rounded bg-white hover:bg-green-500 hover:text-white transition">
                    Logout
                </a>
                <?php else: ?>
                <a href="../../../public/user/index.php"
                    class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-red-500 hover:text-white transition text-center">
                    Login
                </a>
                <?php endif; ?>
            </div>

    </nav>
    <nav>

    </nav>
</body>

</html>