<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/admin/ReportController.php";

if (!isset($_SESSION["username"])) {
    header("Location: ../../../public/admin");
    exit();
}

// ── Load Controller ──
$report = new ReportController($con);
$data   = $report->index();

// ── Extract variables ──
$totalOrders     = $data['totalOrders'];
$totalRevenue    = $data['totalRevenue'];
$totalCustomers  = $data['totalCustomers'];
$deliveredOrders = $data['deliveredOrders'];
$salesData       = $data['salesData'];
$from            = $data['from'];
$to              = $data['to'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>

    <main class="flex-1 flex flex-col overflow-y-auto h-screen">
        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"><strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>

        <div class="p-4">

            <!-- ── Summary Cards ── -->
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Orders</h3>
                    <p class="text-2xl font-bold text-blue-600">
                        <?= number_format($totalOrders) ?>
                    </p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                    <p class="text-2xl font-bold text-green-600">
                        $<?= number_format($totalRevenue, 2) ?>
                    </p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Customers</h3>
                    <p class="text-2xl font-bold text-purple-600">
                        <?= number_format($totalCustomers) ?>
                    </p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Delivered Orders</h3>
                    <p class="text-2xl font-bold text-orange-500">
                        <?= number_format($deliveredOrders) ?>
                    </p>
                </div>
            </div>

            <!-- ── Filter Bar ── -->
            <form method="GET" class="bg-white rounded-lg shadow p-4 mt-6 flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-600">From:</label>
                    <input type="date" name="from" value="<?= htmlspecialchars($from) ?>"
                        class="border rounded px-3 py-1.5 text-sm">
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-sm text-gray-600">To:</label>
                    <input type="date" name="to" value="<?= htmlspecialchars($to) ?>"
                        class="border rounded px-3 py-1.5 text-sm">
                </div>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-1.5 rounded text-sm hover:bg-blue-700">
                    <i class="fas fa-search mr-1"></i> Filter
                </button>
                <a href="reports.php"
                    class="text-sm text-gray-500 hover:text-gray-700">
                    Reset
                </a>
            </form>

            <!-- ── Sales Report Table ── -->
            <div class="bg-white rounded-lg shadow overflow-x-auto p-4 mt-4">
                <h2 class="text-xl font-semibold p-4 border-b">Sales Report</h2>

                <table class="w-full table-auto text-left text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Date</th>
                            <th class="p-3">Orders</th>
                            <th class="p-3">Revenue</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <?php if (empty($salesData)): ?>
                            <tr>
                                <td colspan="4" class="p-6 text-center text-gray-400">
                                    <i class="fas fa-inbox text-2xl mb-2 block"></i>
                                    No data found for this period.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($salesData as $row): ?>
                                <?php
                                // Dynamic badge តាម revenue
                                if ($row['revenue'] >= 500) {
                                    $badge = 'bg-blue-100 text-blue-700';
                                    $label = 'Excellent';
                                } elseif ($row['revenue'] >= 200) {
                                    $badge = 'bg-green-100 text-green-700';
                                    $label = 'Good';
                                } else {
                                    $badge = 'bg-yellow-100 text-yellow-700';
                                    $label = 'Low';
                                }
                                ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3"><?= htmlspecialchars($row['date']) ?></td>
                                    <td class="p-3"><?= $row['total_orders'] ?></td>
                                    <td class="p-3 text-green-600">
                                        $<?= number_format($row['revenue'], 2) ?>
                                    </td>
                                    <td class="p-3">
                                        <span class="<?= $badge ?> px-2 py-1 rounded text-xs">
                                            <?= $label ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>

</html>