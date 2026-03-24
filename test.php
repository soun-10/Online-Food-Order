<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order</title>
    <?php include __DIR__ . "/app/Views/components/cdns.php"; ?>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <main class="min-h-screen">
        <nav class="bg-blue-600 text-white">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <!-- Logo -->
                <div class="text-xl font-bold mr-auto">
                    <i class="fa-solid fa-utensils"></i>
                    ONLINE FOOD ORDER
                </div>

                <!-- Menu -->
                <ul class="hidden md:flex space-x-6 ml-auto text-xl">
                    <li><a href="#home" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Home</a></li>
                    <li><a href="#about" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">About</a></li>
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Services</a></li>
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Contact</a></li>
                </ul>
            </div>
        </nav>
        <section>
            <div class="banner" id="home">
                <img src="public/image/Banner.jpg" alt="Banner" class="w-full block object-contain">
            </div> <br> <br>
            <!-- Title -->
            <div class="text-center mb-10" id="about">
                <h1 class="text-3xl font-bold text-pink-500">Access Your Dashboard</h1>
                <p class="text-gray-500 mt-2 text-sm">Choose your role and access your personalized dashboard</p>
            </div>

            <!-- Cards Grid -->
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Customer Card -->
                <div class="card bg-white rounded-xl border-t-4 border-pink-500 p-6 flex flex-col">
                    <div class="text-pink-500 text-3xl mb-4">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <h2 class="text-xl font-bold text-pink-500 mb-2">Customer</h2>
                    <p class="text-gray-500 text-sm mb-4">Browse restaurants, order food, and track deliveries</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Browse Menus</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Track Orders</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Reviews & Ratings</li>
                    </ul>
                    <div class="mt-auto">
                        <button class="w-full bg-gradient-to-r from-pink-500 to-rose-400 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
                            View Website
                        </button>
                    </div>
                </div>

                <!-- Driver Card -->
                <div class="card bg-white rounded-xl border-t-4 border-yellow-500 p-6 flex flex-col">
                    <div class="text-yellow-500 text-3xl mb-4">
                        <i class="fa-solid fa-motorcycle"></i>
                    </div>
                    <h2 class="text-xl font-bold text-pink-500 mb-2">Driver</h2>
                    <p class="text-gray-500 text-sm mb-4">Accept deliveries, track earnings, and manage schedule</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Accept Deliveries</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Track Earnings</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Performance Stats</li>
                    </ul>
                    <div class="mt-auto flex gap-2">
                        <button class="flex-1 bg-gradient-to-r from-pink-500 to-rose-400 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
                            Login
                        </button>
                        <button class="flex-1 border border-pink-500 text-pink-500 py-2 rounded-lg font-semibold hover:bg-pink-50 transition">
                            Register
                        </button>
                    </div>
                </div>

                <!-- Admin Card -->
                <div class="card bg-white rounded-xl border-t-4 border-pink-400 p-6 flex flex-col">
                    <div class="text-pink-500 text-3xl mb-4">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h2 class="text-xl font-bold text-pink-500 mb-2">Admin</h2>
                    <p class="text-gray-500 text-sm mb-4">Manage users, restaurants, orders, and platform settings</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>User Management</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>Reports</li>
                        <li><i class="fa-solid fa-check text-pink-400 mr-2"></i>System Settings</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="public/admin/index.php">
                            <button class="w-full bg-gradient-to-r from-pink-500 to-rose-400 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
                            Login
                        </button>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>
</body>

</html>