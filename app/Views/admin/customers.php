<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../../public/admin");
}

require_once __DIR__ . "/../../Controllers/user/CustomerController.php";

$CustomerController = new CustomerController($con);
$return = $CustomerController->show();
$totalCustomers = $CustomerController->countOrders();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
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
            <a href="categories.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-tag w-5 text-center"></i> Categories
            </a>
            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-cart-shopping w-5 text-center"></i> Orders
            </a>
            <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
                <i class="fas fa-users w-5 text-center"></i> Customers
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
            <a href="../../../public/admin/index.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-blue-600 transition">
                <i class="fas fa-right-from-bracket w-5 text-center"></i> Logout
            </a>
        </div>
    </nav>
    <!-- // admin header -->
    <main class="flex-1 flex flex-col overflow-y-auto h-screen">

        <!-- Topbar -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-end items-center gap-3 sticky top-0 z-10">
            <span class="text-gray-500 text-sm">Welcome,
                <span class="font-semibold text-gray-700">
                    <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>
                </span>
            </span>
            <div class="flex items-center gap-1 cursor-pointer text-gray-500 hover:text-gray-700">
                <i class="fas fa-circle-user text-2xl"></i>
                <i class="fas fa-caret-down text-xs"></i>
            </div>
        </header>

        <div class="p-6 flex flex-col gap-6">

            <!-- Page Title -->
            <div class="flex items-center gap-3">
                <i class="fas fa-users text-2xl text-gray-700"></i>
                <h1 class="text-2xl font-bold text-gray-800">Manage Customers</h1>
            </div>

            <!-- Stat Cards — only what DB supports -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg shadow-sm border-l-4 border-blue-500 px-5 py-4">
                    <p class="text-sm font-semibold text-blue-500 mb-1">Total Customers</p>
                    <p class="text-3xl font-bold text-gray-800">
                        <?php echo (int)$totalCustomers; ?>
                    </p>
                </div>
                <!-- <div class="bg-white rounded-lg shadow-sm border-l-4 border-green-500 px-5 py-4">
                    <p class="text-sm font-semibold text-green-500 mb-1">Search Results</p>
                    <p class="text-3xl font-bold text-gray-800">
                        <?php echo (int)$totalCustomers; ?>
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow-sm border-l-4 border-cyan-500 px-5 py-4">
                    <p class="text-sm font-semibold text-cyan-500 mb-1">Today's Registrations</p>
                    <p class="text-3xl font-bold text-gray-800">
                        <?php echo (int)$totalCustomers; ?>
                    </p>
                </div> -->
            </div>

            <!-- Search Bar -->
            <div class="bg-white rounded-lg shadow-sm p-4">
                <form method="GET" action="customers.php" class="flex flex-wrap gap-3 items-center">
                    <div class="flex-1 min-w-[200px]">
                        <input
                            type="text"
                            name="search"
                            value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Search by name, email or phone..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <button type="submit"
                        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white
                               text-sm font-medium px-5 py-2 rounded-lg transition">
                        <i class="fas fa-magnifying-glass"></i> Search
                    </button>
                    <a href="customers.php"
                        class="flex items-center justify-center bg-gray-200 hover:bg-gray-300
                               text-gray-600 text-sm font-medium px-4 py-2 rounded-lg transition">
                        <i class="fas fa-xmark"></i>
                    </a>
                </form>
            </div>

            <!-- Customers Table -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-base font-semibold text-gray-700">Customers</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">ID</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Customer Name</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Email</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Phone Number</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Registered</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

                            <?php foreach ($return as $customer): ?>
                                <?php
                                // Avatar initials from fullname
                                $nameParts  = explode(' ', trim($customer['fullname']));
                                $initials   = strtoupper(substr($nameParts[0], 0, 1));
                                if (count($nameParts) > 1) {
                                    $initials .= strtoupper(substr(end($nameParts), 0, 1));
                                }
                                $colors = [
                                    'bg-purple-500',
                                    'bg-blue-500',
                                    'bg-green-500',
                                    'bg-yellow-500',
                                    'bg-red-500',
                                    'bg-pink-500',
                                    'bg-indigo-500',
                                    'bg-teal-500',
                                    'bg-orange-500',
                                ];
                                $colorClass = $colors[$customer['id'] % count($colors)];
                                ?>
                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-5 py-4 text-gray-500 font-medium">
                                        <?php echo (int)$customer['id']; ?>
                                    </td>

                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full <?php echo $colorClass; ?>
                                                    text-white flex items-center justify-center
                                                    text-xs font-bold flex-shrink-0">
                                                <?php echo htmlspecialchars($initials, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <span class="font-medium text-gray-800">
                                                <?php echo htmlspecialchars($customer['fullname'], ENT_QUOTES, 'UTF-8'); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-envelope text-gray-400 text-xs w-4"></i>
                                            <?php echo htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8'); ?>
                                        </div>
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-phone text-gray-400 text-xs w-4"></i>
                                            <?php echo htmlspecialchars($customer['phonenumber'], ENT_QUOTES, 'UTF-8'); ?>
                                        </div>
                                    </td>

                                    <td class="px-5 py-4 text-gray-500">
                                        <?php echo $customer['created_at']
                                            ? date('M d, Y', strtotime($customer['created_at']))
                                            : '—'; ?>
                                    </td>

                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-2">
                                            <!-- View -->
                                            <button
                                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-cyan-100 text-cyan-600 hover:bg-cyan-200 transition"
                                                title="View"
                                                onclick="my_modal_3.showModal()">
                                                <i class="fas fa-eye text-xs"></i>
                                            </button>
                                            <!-- Delete (POST form + CSRF) -->
                                            <a href="deleteCustomers.php?delete_id=<?php echo $customer['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                                                <i class="fas fa-trash text-xs"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($customers)): ?>
                                <tr>
                                    <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                                        <i class="fas fa-users text-4xl mb-3 block"></i>
                                        No customers found.
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <dialog id="my_modal_3" class="modal">
                    <div class="modal-box max-w-md p-0 overflow-hidden !rounded-md">

                        <!-- Header -->
                        <div class="flex items-center justify-between px-4 py-4 border-b border-gray-100">
                            <h3 class="text-base font-semibold text-gray-900">Customer details</h3>
                            <form method="dialog">
                                <button class="w-8 h-8 flex items-center justify-center rounded-md text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition">
                                    ✕
                                </button>
                            </form>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-5">
                            <p><b>Customer Name: </b> <span id="name"></span></p>
                            <p><b>Email: </b> <span id="email"></span></p>
                            <p><b>Phone Number: </b> <span id="phone"></span></p>
                            <p><b>Registered: </b> <span id="registered"></span></p>
                        </div>

                    </div>
                </dialog>
            </div>

        </div>
    </main>
</body>

</html>