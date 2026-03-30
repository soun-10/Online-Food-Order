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

<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <nav>
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>

    <!-- Main Content -->
    <main class="ml-64 flex-1 flex flex-col overflow-y-auto">

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