<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../../../public/admin");
    }

    require_once __DIR__ . "/../../../config/database.php";
    require_once __DIR__ . "/../../Controllers/admin/OrdersController.php";

    $OrdersController = new OrdersController($con);

    // Handle POST actions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        $order_id = $_POST['order_id'] ?? 0;

        if ($action === 'complete') {
            $OrdersController->updateStatus($order_id, 'completed');
            header("Location: orders.php");
            exit();
        }
    }

    $orders = $OrdersController->show();
    $totalOrders = $OrdersController->getCount();
    $pendingOrders = $OrdersController->getCount('pending');
    $completedOrders = $OrdersController->getCount('completed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>
    <!-- // admin header -->
    <main class=" flex-1 flex flex-col overflow-y-auto h-screen">

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
                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left">

                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
                                <th class="px-5 py-3">Order ID</th>
                                <th class="px-5 py-3">Customer</th>
                                <th class="px-5 py-3">Food Items</th>
                                <th class="px-5 py-3">Total</th>
                                <th class="px-5 py-3">Payment</th>
                                <th class="px-5 py-3">Status</th>
                                <th class="px-5 py-3">Date</th>
                                <th class="px-5 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="8" class="px-5 py-4 text-center text-gray-500">
                                    No orders found
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-4 font-medium text-gray-700">ORD<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></td>
                                <td class="px-5 py-4"><?= htmlspecialchars($order['customer_name'] ?? 'Guest') ?></td>
                                <td class="px-5 py-4 text-sm"><?= htmlspecialchars($order['food_items'] ?? 'N/A') ?></td>
                                <td class="px-5 py-4 font-semibold text-green-600">$<?= number_format($order['total_amount'], 2) ?></td>
                                <td class="px-5 py-4 capitalize text-sm"><?= htmlspecialchars($order['payment_method'] ?? 'Cash') ?></td>

                                <td class="px-5 py-4">
                                    <?php
                                        $statusClass = match($order['status']) {
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'processing' => 'bg-blue-100 text-blue-700',
                                            'completed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                            default => 'bg-gray-100 text-gray-700'
                                        };
                                    ?>
                                    <span class="<?= $statusClass ?> text-xs px-3 py-1 rounded-full font-medium capitalize">
                                        <?= htmlspecialchars($order['status']) ?>
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-gray-500 text-sm">
                                    <?= date('d M Y', strtotime($order['created_at'])) ?>
                                </td>

                                <td class="px-5 py-4 text-center space-x-2">

                                    <a href="viewOrder.php?id=<?= $order['id'] ?>"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs inline-block">
                                        View
                                    </a>

                                    <?php if ($order['status'] !== 'completed' && $order['status'] !== 'cancelled'): ?>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                        <input type="hidden" name="action" value="complete">
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs"
                                            onclick="return confirm('Mark this order as completed?')">
                                            Complete
                                        </button>
                                    </form>
                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </main>
</body>

</html>