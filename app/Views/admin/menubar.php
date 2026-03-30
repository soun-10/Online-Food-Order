<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManuBar</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body>

    <?php
$currentPage = basename($_SERVER['PHP_SELF']);
function active($page) {
    global $currentPage;
    return $currentPage == $page 
        ? 'bg-white/10 text-white before:scale-y-100'
        : 'text-blue-100 hover:bg-white/10 hover:text-white before:scale-y-0 hover:before:scale-y-100';
}
?>

    <nav
        class="w-64 bg-gradient-to-b from-blue-900 to-blue-700 text-white flex flex-col fixed h-full shadow-2xl backdrop-blur-md">

        <!-- Logo -->
        <div class="px-6 py-6 border-b border-white/10 text-center">
            <p class="text-xl font-bold tracking-wide">
                <i class="fas fa-store"></i> Food Admin
            </p>
            <p class="text-xs text-blue-300 mt-1">Dashboard Panel</p>
        </div>

        <!-- Menu -->
        <div class="flex-1 px-3 py-6 space-y-2">

            <?php
        $menus = [
            ["dashboard.php", "fas fa-gauge-high", "Dashboard"],
            ["categories.php", "fas fa-tag", "Categories"],
            ["newfood.php", "fas fa-burger", "New Food"],
            ["orders.php", "fas fa-receipt", "Orders"],
            ["customers.php", "fas fa-users", "Customers"],
            ["reports.php", "fas fa-chart-line", "Reports"],
            ["settings.php", "fas fa-gear", "Settings"],
        ];
        ?>

            <?php foreach($menus as $menu): ?>
            <a href="<?= $menu[0] ?>"
                class="relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 ease-out transform hover:translate-x-1 <?= active($menu[0]) ?>">

                <!-- Animated left bar -->
                <span
                    class="absolute left-0 top-0 h-full w-1 bg-white rounded-r origin-top scale-y-0 transition-transform duration-300"></span>

                <!-- Icon -->
                <i class="<?= $menu[1] ?> w-5 text-center transition-transform duration-300 group-hover:scale-110"></i>

                <!-- Text -->
                <span class="font-medium"><?= $menu[2] ?></span>
            </a>
            <?php endforeach; ?>

        </div>

        <!-- Logout -->
        <div class="px-3 py-4 border-t border-white/10">
            <a href="../../../public/admin/index.php"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-300 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:translate-x-1">
                <i class="fas fa-right-from-bracket w-5 text-center"></i>
                Logout
            </a>
        </div>

    </nav>

</body>

</html>