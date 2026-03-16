<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen">
    <nav class="w-64 bg-blue-700 text-white flex flex-col">
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
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
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
    <!-- // admin header -->
    <main class=" flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"><strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <div class="p-4">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100">

                <!-- Header -->
                <div class="flex items-center justify-between p-5 border-b">
                    <h2 class="text-xl font-semibold text-gray-700">Orders</h2>

                    <input type="text" placeholder="Search order..."
                        class="border px-3 py-2 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Table -->
                <div>

                    <table class="w-full text-sm text-left">


                        <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <th class="px-5 py-3">Order ID</th>
                            <th class="px-5 py-3">Customer</th>
                            <th class="px-5 py-3">Food</th>
                            <th class="px-5 py-3">Total</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3">Date</th>
                            <th class="px-5 py-3 text-center">Action</th>
                        </tr>


                        <tbody class="divide-y">

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-4 font-medium text-gray-700">ORD001</td>
                                <td class="px-5 py-4">John Doe</td>
                                <td class="px-5 py-4">Cheese Pizza</td>
                                <td class="px-5 py-4 font-semibold text-green-600">$12</td>

                                <td class="px-5 py-4">
                                    <span
                                        class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full font-medium">
                                        Pending
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-gray-500">
                                    16 Mar 2026
                                </td>

                                <td class="px-5 py-4 text-center space-x-2">

                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        View
                                    </button>

                                    <button
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        Complete
                                    </button>

                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-4 font-medium text-gray-700">ORD002</td>
                                <td class="px-5 py-4">Alice</td>
                                <td class="px-5 py-4">Burger Combo</td>
                                <td class="px-5 py-4 font-semibold text-green-600">$15</td>

                                <td class="px-5 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-medium">
                                        Completed
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-gray-500">
                                    16 Mar 2026
                                </td>

                                <td class="px-5 py-4 text-center space-x-2">

                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs">
                                        View
                                    </button>

                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </main>
</body>

</html>