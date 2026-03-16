<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
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
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-cart-shopping w-5 text-center"></i> Orders
            </a>
            <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
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
            <span class="text-gray-600"> <strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <div class="p-4">

            <div class="w-full bg-white p-6 rounded-lg shadow mb-6">

                <h2 class="text-lg font-semibold mb-4">Add Customer</h2>

                <form class="grid grid-cols-4 gap-4">

                    <input type="text" placeholder="Customer Name"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">

                    <input type="email" placeholder="Email"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">

                    <input type="text" placeholder="Phone"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">

                    <button class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">
                        Add Customer
                    </button>

                </form>
                <div class="bg-white rounded-lg  overflow-hidden">

                    <h2 class="text-xl font-semibold p-4 border-b">Customers</h2>

                    <table class="w-full text-sm text-left">

                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="p-3">ID</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Phone</th>
                                <th class="p-3">Orders</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            <tr class="hover:bg-gray-50">
                                <td class="p-3">C001</td>
                                <td class="p-3">John Doe</td>
                                <td class="p-3">john@gmail.com</td>
                                <td class="p-3">012345678</td>
                                <td class="p-3 text-blue-600 font-medium">5</td>

                                <td class="p-3 space-x-2">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs">
                                        View
                                    </button>

                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                        Delete
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