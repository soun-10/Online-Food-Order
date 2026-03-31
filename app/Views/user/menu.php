<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/admin/NewFoodController.php";
require_once __DIR__ . "/../../../app/Controllers/user/MyProfileController.php";

// Load foods
$newFoodController = new NewFoodController($con);
$newFoods = $newFoodController->show();

// Load customer
$customer = [];
if (isset($_SESSION['id'])) {
    $MyProfile = new MyProfileController($con);
    $customer  = $MyProfile->getById($_SESSION['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu – Khmer Food Delivery</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
    <!-- <link rel="stylesheet" href="../../../public/css/CustomerHomePage.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">
        <!-- Logo -->
        <div class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
            <i class="fas fa-store text-blue-300"></i>
            <span>Khmer Food Delivery</span>
        </div>
        <!-- Nav Links -->
        <div class="flex items-center gap-2">
            <a href="home.php"
                class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-home text-xs"></i>
                Home
            </a>
            <a href="menu.php"
                class="flex items-center gap-1.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                <i class="fa-solid fa-bowl-food"></i>
                Food Menu
            </a>
            <a href="cart.php"
                class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-cart-shopping text-xs"></i>
                Cart
            </a>

            <?php if (isset($_SESSION['id'])): ?>
                <div class="relative" id="profileWrapper">
                    <button onclick="toggleProfileDropdown()"
                        class="flex items-center gap-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-200">
                        <?php if (!empty($customer['photo_url'])): ?>
                            <img src="../../../public/Image/customerProfile/<?= htmlspecialchars($customer['photo_url']) ?>"
                                class="w-7 h-7 rounded-full object-cover" />
                        <?php else: ?>
                            <span class="w-7 h-7 rounded-full bg-white text-blue-800 font-bold flex items-center justify-center text-xs uppercase">
                                <?= htmlspecialchars(mb_substr($_SESSION['fullname'], 0, 1)) ?>
                            </span>
                        <?php endif; ?>
                        <span><?= htmlspecialchars($_SESSION['fullname']) ?></span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div id="profileDropdownMenu"
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
                <a href="loginCustomer.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-right-to-bracket text-xs"></i>
                    Login
                </a>
                <a href="../../../public/user/createCustomer.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-800 bg-white hover:bg-blue-50 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-user-plus text-xs"></i>
                    Sign Up
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="w-full max-w-[1400px] mx-auto px-4 py-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-blue-800 text-left">
                <i class="fa-solid fa-bowl-food"></i>
                Our Delicious Foods
            </h1>
            <p class="text-gray-500 text-sm mt-1 text-left">
                Search your favorite food and enjoy
            </p>
        </div>

        <!-- Search Box -->
        <form method="GET" class="mb-8 flex justify-center">
            <div class="relative w-full">
                <input type="text" name="search" placeholder="Search food..."
                    class="w-full pl-10 pr-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <span class="absolute left-3 top-3.5 text-gray-400">
                    🔍
                </span>
            </div>
        </form>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php foreach ($newFoods as $newfood): ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group flex flex-col border border-gray-100">

                    <!-- Image -->
                    <div class="relative h-44 overflow-hidden">
                        <img src="/Online-Food-Order/public/image/newfood/<?= htmlspecialchars($newfood['photo']) ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                            alt="Food image">
                        <!-- Price badge -->
                        <div class="absolute top-3 right-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                            $<?= htmlspecialchars($newfood['price']) ?>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 flex flex-col flex-1">

                        <h3 class="text-lg font-bold text-gray-900">
                            <?= htmlspecialchars($newfood['food_name_english']) ?>
                        </h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <?= htmlspecialchars($newfood['food_name_khmer']) ?>
                        </p>
                        <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                            <?= htmlspecialchars($newfood['descrip']) ?>
                        </p>

                        <!-- Type badge -->
                        <?php
                        $type = $newfood['food_type'];
                        $badgeClass = match ($type) {
                            'Vegetarian'     => 'bg-green-100 text-green-700',
                            'Non-Vegetarian' => 'bg-blue-100 text-blue-700',
                            default          => 'bg-gray-100 text-gray-700'
                        };
                        ?>
                        <div class="mb-4">
                            <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full <?= $badgeClass ?>">
                                <?= htmlspecialchars($type) ?>
                            </span>
                        </div>

                        <!-- Button -->
                        <button
                            class="mt-auto w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2.5 rounded-xl transition duration-300 active:scale-95 shadow-md">
                            Add to Cart
                        </button>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <footer>
        <?php include __DIR__ . "/footer.php"; ?>
    </footer>

    <script src="../../../public/js/menu.js"></script>
</body>

</html>