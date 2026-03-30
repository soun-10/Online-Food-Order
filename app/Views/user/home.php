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
        <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">
            <!-- Logo -->
            <div class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
                <i class="fas fa-store text-blue-300"></i>
                <span>Khmer Food Delivery</span>
            </div>
            <!-- Nav Links -->
            <div class="flex items-center gap-2">
                <a href="home.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-home text-xs"></i>
                    Home
                </a>
                <a href="cart.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-cart-shopping text-xs"></i>
                    Cart
                </a>
                <?php if (isset($_SESSION['id'])): ?>
                    <!-- ✅ Logged in: Profile Dropdown -->
                    <div class="relative" id="profileWrapper">
                        <button
                            onclick="toggleProfileDropdown()"
                            class="flex items-center gap-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-200">
                            <!-- Initial Circle -->
                            <span class="w-7 h-7 rounded-full bg-white text-blue-800 font-bold flex items-center justify-center text-xs uppercase">
                                <?= htmlspecialchars(mb_substr($_SESSION['fullname'], 0, 1)) ?>
                            </span>
                            <!-- Name -->
                            <span><?= htmlspecialchars($_SESSION['fullname']) ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            id="profileDropdownMenu"
                            class="hidden absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border border-gray-100 z-50">
                            <a href="myProfile.php"
                                class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg">
                                <i class="fas fa-user text-blue-600 text-xs"></i>
                                My Profile
                            </a>
                            <hr class="border-gray-100">
                            <a href="logout.php"
                                class="flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                                <i class="fas fa-right-from-bracket text-xs"></i>
                                Logout
                            </a>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Not logged in: Sign Up button -->
                    <a href="../../../public/user/createCustomer.php"
                        class="flex items-center gap-1.5 text-sm font-medium text-blue-800 bg-white hover:bg-blue-50 px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-user-plus text-xs"></i>
                        Sign Up
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </main>
    <div>
        <?php include __DIR__ . "/herosection.php"; ?>
    </div>
    <div>
        <?php include __DIR__ . "/banefit.php"; ?>
    </div>
    <script src="../../../public/js/home.js"></script>
</body>

</html>