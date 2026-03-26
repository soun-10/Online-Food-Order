<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../../../public/admin");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <!-- Logo -->
        <div class="px-6 py-5 border-b border-blue-600 text-center">
            <p class="text-xl font-bold"><i class="fas fa-store"></i>Online Food Order</p>
            <p class="text-xs text-blue-200 mt-1">Admin Panel</p>
        </div>
        <!-- Links -->
        <div class="flex-1 px-2 py-4 space-y-1">
            <a href="dashboard.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 font-semibold">
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
            <a href="reports.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
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
    <!-- // admin header -->
    <main class=" flex-1 flex flex-col overflow-y-auto h-screen">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"><strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <!-- //main contant -->

        <div class=" p-4">

            <!-- Summary Cards -->
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Orders</h3>
                    <p class="text-2xl font-bold text-blue-600">120</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                    <p class="text-2xl font-bold text-green-600">$2,450</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Customers</h3>
                    <p class="text-2xl font-bold text-purple-600">85</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Delivered Orders</h3>
                    <p class="text-2xl font-bold text-orange-500">100</p>
                </div>
            </div>

            <!-- Sales Report Table -->
            <div class="bg-white rounded-lg shadow overflow-x-auto p-4 mt-6">

                <h2 class="text-xl font-semibold p-4 border-b">Sales Report</h2>

                <table class="w-full table-auto text-left text-sm">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Date</th>
                            <th class="p-3">Orders</th>
                            <th class="p-3">Revenue</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50">
                            <td class="p-3">2026-03-15</td>
                            <td class="p-3">25</td>
                            <td class="p-3 text-green-600">$320</td>
                            <td class="p-3">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                    Good
                                </span>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="p-3">2026-03-16</td>
                            <td class="p-3">30</td>
                            <td class="p-3 text-green-600">$410</td>
                            <td class="p-3">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                                    Excellent
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>