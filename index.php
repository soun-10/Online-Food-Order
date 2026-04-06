<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order</title>
    <?php include __DIR__ . "/app/Views/components/cdns.php"; ?>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col" id="home">
    <main class="min-h-screen">
        <nav class="bg-blue-600 text-white sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <!-- Logo -->
                <div class="text-xl font-bold mr-auto">
                    <i class="fa-solid fa-utensils"></i>
                    ONLINE FOOD ORDER
                </div>

                <!-- Hamburger Button (mobile only) -->
                <button id="menu-toggle" class="md:hidden text-white text-2xl focus:outline-none">
                    <i class="fa-solid fa-bars" id="menu-icon"></i>
                </button>

                <!-- Menu Desktop -->
                <ul class="hidden md:flex space-x-6 ml-auto text-xl">
                    <li><a href="#home" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Home</a></li>
                    <li><a href="#about-us" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">About Us</a></li>
                    <li><a href="#users" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Users</a></li>
                </ul>
            </div>

            <!-- Menu Mobile (dropdown) -->
            <ul id="mobile-menu" class="hidden flex-col bg-blue-700 px-6 py-3 space-y-3 md:hidden">
                <li><a href="#home" class="text-white font-semibold text-sm tracking-wide">Home</a></li>
                <li><a href="#about-us" class="text-white font-semibold text-sm tracking-wide">About Us</a></li>
                <li><a href="#users" class="text-white font-semibold text-sm tracking-wide">Users</a></li>
            </ul>
        </nav>
        <section>
            <div class="banner" id="home">
                <img src="public/image/Banner.jpg" alt="Banner" class="w-full block object-contain">
            </div>
            <!-- Title -->
            <div id="about-us" class="scroll-mt-20 py-6"></div>
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-pink-500">About Us</h1>
                <p class="text-gray-500 mt-2 text-sm">Developer Profile</p>
            </div>
            <!-- Cards Grid -->
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <!-- Soun -->
                <div class="card bg-white rounded-2xl shadow-md border-t-4 border-blue-400 p-6 flex flex-col items-center w-full md:w-72">
                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-300 mb-4">
                        <img src="public/image/profile/Soun.jpg" alt="Soun" class="w-full h-full object-cover object-top">
                    </div>
                    <p class="text-blue-500 font-semibold text-lg">Pril Soun</p>
                </div>

                <!-- Vireak -->
                <div class="card bg-white rounded-2xl shadow-md border-t-4 border-blue-400 p-6 flex flex-col items-center w-full md:w-72">
                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-300 mb-4">
                        <img src="public/image/profile/Vireak.jpg" alt="Vireak" class="w-full h-full object-cover object-top">
                    </div>
                    <p class="text-blue-500 font-semibold text-lg">Sorn Vireak</p>
                </div>

                <!-- Makara -->
                <div class="card bg-white rounded-2xl shadow-md border-t-4 border-blue-400 p-6 flex flex-col items-center w-full md:w-72">
                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-300 mb-4">
                        <img src="public/image/profile/Makara.jpg" alt="Makara" class="w-full h-full object-cover object-top">
                    </div>
                    <p class="text-blue-500 font-semibold text-lg">Kheav Chanmakara</p>
                </div>

                <!-- Sally -->
                <div class="card bg-white rounded-2xl shadow-md border-t-4 border-blue-400 p-6 flex flex-col items-center w-full md:w-72">
                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-300 mb-4">
                        <img src="public/image/profile/Sally.jpg" alt="Sally" class="w-full h-full object-cover object-top">
                    </div>
                    <p class="text-blue-500 font-semibold text-lg">Kan Visally</p>
                </div>

                <!-- Samet -->
                <div class="card bg-white rounded-2xl shadow-md border-t-4 border-blue-400 p-6 flex flex-col items-center w-full md:w-72">
                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-300 mb-4">
                        <img src="public/image/profile/Samet.jpg" alt="Samet" class="w-full h-full object-cover object-top">
                    </div>
                    <p class="text-blue-500 font-semibold text-lg">Te Samet</p>
                </div>
            </div>
            <br> <br> <br> <br>
            <!-- Title -->
            <div class="text-center mb-10 scroll-mt-20" id="users">
                <h1 class="text-3xl font-bold text-Blue-500">Access Your Users</h1>
                <p class="text-gray-500 mt-2 text-sm">Choose your role and access your personalized users</p>
            </div>
            <!-- Cards Grid -->
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Customer Card -->
                <div class="card bg-white rounded-xl border-t-4 border-blue-500 p-6 flex flex-col">
                    <div class="text-blue-500 text-3xl mb-4">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <h2 class="text-xl font-bold text-blue-500 mb-2">Customer</h2>
                    <p class="text-gray-500 text-sm mb-4">Browse restaurants, order food, and track deliveries</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>Browse Menus</li>
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>Track Orders</li>
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>Reviews & Ratings</li>
                    </ul>
                    <div class="mt-auto flex flex-row gap-2">
                        <a href="public/user/loginCustomer.php" class="flex-1">
                            <button class="w-full bg-gradient-to-r from-blue-500 to-blue-400 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
                                Login
                            </button>
                        </a>
                        <a href="public/user/createCustomer.php" class="flex-1">
                            <button class="w-full border border-blue-400 text-blue-400 bg-gray-100 py-2 rounded-lg font-semibold hover:bg-pink-50 transition">
                                Register
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Admin Card -->
                <div class="card bg-white rounded-xl border-t-4 border-blue-400 p-6 flex flex-col">
                    <div class="text-blue-500 text-3xl mb-4">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h2 class="text-xl font-bold text-blue-500 mb-2">Admin</h2>
                    <p class="text-gray-500 text-sm mb-4">Manage users, restaurants, orders, and platform settings</p>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>User Management</li>
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>Reports</li>
                        <li><i class="fa-solid fa-check text-blue-400 mr-2"></i>System Settings</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="public/admin/index.php">
                            <button class="w-full bg-gradient-to-r from-blue-500 to-blue-400 text-white py-2 rounded-lg font-semibold hover:opacity-90 transition">
                                Login
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <br> <br> <br> <br>
        <footer class="bg-slate-700 text-white mt-auto">
            <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- About Us -->
                <div>
                    <h3 class="text-blue-400 font-bold text-xl mb-4">About Us</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Online Food Order brings authentic Cambodian cuisine to your doorstep with fast, reliable delivery service.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-blue-400 font-bold text-xl mb-4">Quick Links</h3>
                    <ul class="space-y-3 text-gray-300 text-sm">
                        <li><a href="#home" class="hover:text-blue-400 transition">Home</a></li>
                        <li><a href="#about-us" class="hover:text-blue-400 transition">About Us</a></li>
                        <li><a href="#users" class="hover:text-blue-400 transition">User</a></li>
                    </ul>
                </div>

                <!-- Follow Us -->
                <div>
                    <h3 class="text-blue-400 font-bold text-xl mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="https://web.facebook.com/soun.pril.2025/" class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-facebook-f text-white"></i>
                        </a>
                        <a href="https://t.me/SounPril" class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                        <a href="https://www.instagram.com/sounpril?igsh=bW91NjZzczlxcHpk" class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </a>
                        <a href="https://wa.me/qr/AKQTQ2J6D4QVN1" class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-600 py-4 text-center text-gray-400 text-sm">
                © 2026 Online Food Order. All rights reserved.
            </div>
        </footer>
    </main>
    <script src="public/js/index.js"></script>
</body>

</html>