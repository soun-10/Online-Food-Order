<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
            <a href="categories.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
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
            <a href="logout.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-blue-600 transition">
                <i class="fas fa-right-from-bracket w-5 text-center"></i> Logout
            </a>
        </div>

    </nav>
    <!-- MENU MANAGEMENT -->
    <div id="menu" class="w-full section p-6 bg-gray-100 min-h-screen">

        <h1 class="text-2xl font-bold mb-6">Category Management</h1>

        <!-- FORM -->
        <div class="bg-white p-6 rounded-lg shadow-md w-full mb-8">
            <h3 class="text-lg font-semibold mb-4">Add New Food</h3>

            <input type="text" placeholder="Food Name"
                class="w-full mb-3 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <input type="number" placeholder="Price"
                class="w-full mb-3 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <select class="w-full mb-4 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option>Pizza</option>
                <option>Burger</option>
                <option>Drink</option>
            </select>

            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                Add Food
            </button>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">Food</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Price</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-t">
                        <td class="p-3">Cheese Pizza</td>
                        <td class="p-3">Pizza</td>
                        <td class="p-3">$12</td>
                        <td class="p-3 space-x-2">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                Edit
                            </button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>