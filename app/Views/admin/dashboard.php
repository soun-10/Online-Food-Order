<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="w-full bg-gray-100 font-sans flex min-h-screen">

    <!-- Sidebar -->
    <nav class="w-64 bg-blue-700 text-white flex flex-col fixed h-full">
        <!-- Logo -->
        <div class="px-6 py-5 border-b border-blue-600 text-center">
            <p class="text-xl font-bold"><i class="fas fa-store"></i> Food Delivery</p>
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
            <a href="logout.php"
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
            <i class="fas fa-caret-down text-gray-500"></i>
        </header>

        <!-- Content -->
        <div class="p-8 space-y-6">

            <!-- Stat Cards -->
            <div class="grid grid-cols-4 gap-5">

                <div
                    class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-blue-500">
                    <div>
                        <div class="text-xs text-blue-500 font-semibold uppercase tracking-wide">Total Orders</div>
                        <div class="text-3xl font-bold mt-1">44</div>
                    </div>
                    <i class="fas fa-cart-shopping text-4xl text-gray-300"></i>
                </div>

                <div
                    class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-green-500">
                    <div>
                        <div class="text-xs text-green-500 font-semibold uppercase tracking-wide">Total Revenue</div>
                        <div class="text-3xl font-bold mt-1">$146.00</div>
                    </div>
                    <i class="fas fa-dollar-sign text-4xl text-gray-300"></i>
                </div>

                <div
                    class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-cyan-500">
                    <div>
                        <div class="text-xs text-cyan-500 font-semibold uppercase tracking-wide">Restaurants</div>
                        <div class="text-3xl font-bold mt-1">8</div>
                    </div>
                    <i class="fas fa-store text-4xl text-gray-300"></i>
                </div>

                <div
                    class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-yellow-500">
                    <div>
                        <div class="text-xs text-yellow-500 font-semibold uppercase tracking-wide">Pending Orders</div>
                        <div class="text-3xl font-bold mt-1">8</div>
                    </div>
                    <i class="fas fa-clock text-4xl text-gray-300"></i>
                </div>

            </div>

        </div>

    </main>

</body>

</html>