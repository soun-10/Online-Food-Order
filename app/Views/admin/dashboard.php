<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../../../public/admin");
    }
    
    require_once __DIR__."/../../Controllers/user/UserLoginController.php";
    require_once __DIR__ . "/../../../config/database.php";
    $userLoginController = new UserLoginController($con);
    $totalCustomers = $userLoginController -> countOrders ();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen">

    <!-- Sidebar -->
    <nav class="w-64 bg-blue-700 text-white flex flex-col fixed h-full">
        <!-- Logo -->
        <div class="px-6 py-5 border-b border-blue-600 text-center">
            <p class="text-xl font-bold"><i class="fas fa-store"></i> Online Food Order</p>
            <p class="text-xs text-blue-200 mt-1">Admin Panel</p>
        </div>

        <!-- Links -->
        <div class="flex-1 px-2 py-4 space-y-1">
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 font-semibold">
                <i class="fas fa-gauge-high w-5 text-center"></i> Dashboard
            </a>

            <a href="categories.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-tag w-5 text-center"></i> Categories
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-cart-shopping w-5 text-center"></i> Orders
            </a>

            <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-users w-5 text-center"></i> Customers
            </a>

            <a href="drivers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-person-biking w-5 text-center"></i> Drivers
            </a>

            <a href="reports.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-chart-line w-5 text-center"></i> Reports
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-gear w-5 text-center"></i> Settings
            </a>
        </div>

        <!-- Logout -->
        <div class="px-2 py-4 border-t border-blue-600">
            <a href="../../../public/admin/index.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-blue-600 transition">
                <i class="fas fa-right-from-bracket w-5 text-center"></i> Logout
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="ml-64 flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600">Welcome, <strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <!-- Content -->
        <div class="p-8 space-y-6">

        </div>

        <div class="p-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ">

                <!-- Total Orders -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm">Total Orders</h3>
                    <p class="text-2xl font-bold text-blue-600">
                        <?= $totalCustomers ?>
                    </p>
                </div>

                <!-- Revenue -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500">
                    <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                    <p class="text-2xl font-bold text-green-600">
                        $<?= $totalCustomers ?>
                    </p>
                </div>

                <!-- Customers -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-purple-500">
                    <h3 class="text-gray-500 text-sm">Customers</h3>
                    <p class="text-2xl font-bold text-purple-600">
                        <?= $totalCustomers ?>
                    </p>
                </div>

                <!-- Delivered Orders -->
                <div class="bg-white p-5 rounded-xl shadow border-l-4 border-orange-500">
                    <h3 class="text-gray-500 text-sm">Delivered Orders</h3>
                    <p class="text-2xl font-bold text-orange-600">
                        <?= $totalCustomers ?>
                    </p>
                </div>

            </div>

        </div>
    </main>

</body>

</html>