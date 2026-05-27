<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../../../public/admin");
    }

    require_once __DIR__ . "/../../../config/database.php";
    require_once __DIR__ . "/../../Controllers/admin/OrdersController.php";

    $OrdersController = new OrdersController($con);
    $order_id = $_GET['id'] ?? 0;

    if (!$order_id) {
        header("Location: orders.php");
        exit();
    }

    // Fetch order details
    $orders = $OrdersController->show();
    $order = null;
    
    foreach ($orders as $o) {
        if ($o['id'] == $order_id) {
            $order = $o;
            break;
        }
    }

    if (!$order) {
        header("Location: orders.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>
    
    <main class=" flex-1 flex flex-col overflow-y-auto h-screen">
        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"><strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>

        <div class="p-8">
            <div class="mb-6">
                <a href="orders.php" class="text-blue-600 hover:text-blue-800 flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Back to Orders
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
                <!-- Header -->
                <div class="border-b pb-6 mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Order Details</h2>
                    <p class="text-gray-500 text-sm mt-2">Order ID: ORD<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></p>
                </div>

                <!-- Order Information Grid -->
                <div class="grid grid-cols-2 gap-8 mb-8">
                    <!-- Left Column -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Customer Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Name</p>
                                <p class="font-medium text-gray-800"><?= htmlspecialchars($order['customer_name'] ?? 'Guest') ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Phone</p>
                                <p class="font-medium text-gray-800"><?= htmlspecialchars($order['phone'] ?? 'N/A') ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Address</p>
                                <p class="font-medium text-gray-800"><?= htmlspecialchars($order['address'] ?? 'N/A') ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Order Information</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <?php
                                    $statusClass = match($order['status']) {
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'processing' => 'bg-blue-100 text-blue-700',
                                        'completed' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                ?>
                                <span class="<?= $statusClass ?> px-3 py-1 rounded-full font-medium capitalize text-sm inline-block mt-1">
                                    <?= htmlspecialchars($order['status']) ?>
                                </span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date</p>
                                <p class="font-medium text-gray-800"><?= date('d M Y, g:i A', strtotime($order['created_at'])) ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Payment Method</p>
                                <p class="font-medium text-gray-800 capitalize"><?= htmlspecialchars($order['payment_method'] ?? 'Cash') ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Food Items -->
                <div class="border-t pt-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Food Items</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-800"><?= htmlspecialchars($order['food_items'] ?? 'N/A') ?></p>
                    </div>
                </div>

                <!-- Total Amount -->
                <div class="border-t pt-6 mb-8">
                    <div class="flex justify-end">
                        <div class="w-64">
                            <div class="flex justify-between mb-3 pb-3 border-b">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="text-gray-800">$<?= number_format($order['total_amount'], 2) ?></span>
                            </div>
                            <div class="flex justify-between font-semibold text-lg">
                                <span class="text-gray-800">Total</span>
                                <span class="text-green-600">$<?= number_format($order['total_amount'], 2) ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="border-t pt-6 flex gap-3 justify-end">
                    <?php if ($order['status'] !== 'completed' && $order['status'] !== 'cancelled'): ?>
                    <form method="POST" action="orders.php" style="display:inline;">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                        <input type="hidden" name="action" value="complete">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium transition"
                            onclick="return confirm('Mark this order as completed?')">
                            <i class="fas fa-check mr-2"></i> Mark Complete
                        </button>
                    </form>
                    <?php endif; ?>

                    <a href="orders.php" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium transition">
                        <i class="fas fa-times mr-2"></i> Close
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
