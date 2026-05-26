<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/user/MyProfileController.php";
require_once __DIR__ . "/../../../app/Controllers/admin/OrdersController.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

$order_id = $_GET['order_id'] ?? 0;

if (!$order_id) {
    header("Location: home.php");
    exit();
}

$OrdersController = new OrdersController($con);
$order = $OrdersController->getById($order_id);
$orderItems = $OrdersController->getItems($order_id);

if (!$order || $order['customer_id'] != $_SESSION['id']) {
    header("Location: home.php");
    exit();
}

$MyProfile = new MyProfileController($con);
$customer = $MyProfile->getById($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body>
    <main>
        <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">
            <div class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
                <i class="fas fa-store text-blue-300"></i>
                <span>Online Food Order</span>
            </div>
            <div class="flex items-center gap-2">
                <a href="home.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-home text-xs"></i>
                    Home
                </a>
                <a href="menu.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fa-solid fa-bowl-food"></i>
                    Food Menu
                </a>
                <a href="cart.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-cart-shopping text-xs"></i>
                    Cart
                </a>
            </div>
        </nav>

        <section class="max-w-3xl mx-auto px-6 py-12">
            <!-- Success Message -->
            <div class="bg-green-50 border-l-4 border-green-500 p-6 mb-8 rounded-lg">
                <div class="flex items-center gap-4">
                    <i class="fas fa-check-circle text-4xl text-green-500"></i>
                    <div>
                        <h1 class="text-3xl font-bold text-green-700">Order Confirmed!</h1>
                        <p class="text-green-600 mt-1">Thank you for your order. Your food will be prepared and delivered soon.</p>
                    </div>
                </div>
            </div>

            <!-- Order Details Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Order Number</p>
                        <p class="text-2xl font-bold text-gray-800">ORD<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Order Date</p>
                        <p class="text-2xl font-bold text-gray-800"><?= date('M d, Y', strtotime($order['created_at'])) ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Status</p>
                        <span class="inline-block bg-yellow-100 text-yellow-700 text-sm px-4 py-2 rounded-full font-semibold capitalize">
                            <?= htmlspecialchars($order['status']) ?>
                        </span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Payment Method</p>
                        <p class="text-xl font-bold text-gray-800 capitalize"><?= htmlspecialchars($order['payment_method']) ?></p>
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="border-t pt-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Delivery To</h2>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="font-semibold text-gray-800"><?= htmlspecialchars($order['customer_name']) ?></p>
                        <p class="text-gray-600"><?= htmlspecialchars($order['email'] ?? '') ?></p>
                        <p class="text-gray-600"><?= htmlspecialchars($order['phonenumber'] ?? '') ?></p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Order Items</h2>
                
                <div class="space-y-4">
                    <?php foreach ($orderItems as $item): ?>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800"><?= htmlspecialchars($item['food_name_english']) ?></p>
                            <p class="text-sm text-gray-500"><?= htmlspecialchars($item['food_name_khmer']) ?></p>
                            <p class="text-sm text-gray-600 mt-1">Qty: <?= $item['quantity'] ?> × $<?= number_format($item['price'], 2) ?></p>
                        </div>
                        <p class="font-bold text-lg text-blue-700">$<?= number_format($item['subtotal'], 2) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Total -->
                <div class="border-t mt-6 pt-6">
                    <div class="flex justify-between text-lg mb-3">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold text-gray-800">$<?= number_format($order['total_amount'], 2) ?></span>
                    </div>
                    <div class="flex justify-between text-lg mb-3">
                        <span class="text-gray-600">Delivery Fee</span>
                        <span class="font-semibold text-gray-800">$2.00</span>
                    </div>
                    <div class="flex justify-between text-2xl font-bold border-t pt-4">
                        <span class="text-gray-800">Total</span>
                        <span class="text-blue-700">$<?= number_format($order['total_amount'] + 2, 2) ?></span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-center">
                <a href="home.php"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-xl transition duration-200">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
                <a href="menu.php"
                    class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-8 py-3 rounded-xl transition duration-200">
                    <i class="fas fa-bowl-food mr-2"></i>
                    Continue Shopping
                </a>
            </div>
        </section>

        <footer>
            <?php include __DIR__ . "/footer.php"; ?>
        </footer>
    </main>
</body>

</html>
