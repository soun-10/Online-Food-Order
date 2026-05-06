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
    <link rel="stylesheet" href="../../../public/css/manageCustomer.css" />

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>
    <!-- // admin header -->
    <main class="flex-1 flex flex-col overflow-y-auto h-screen">



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
                        <input type="text" name="search"
                            value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                            placeholder="Search by name, email or phone..." class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white
                               text-sm font-medium px-5 py-2 rounded-lg transition">
                        <i class="fas fa-magnifying-glass"></i> Search
                    </button>
                    <a href="customers.php" class="flex items-center justify-center bg-gray-200 hover:bg-gray-300
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
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">No</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Customer Name</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Email</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Phone Number</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Registered</th>
                                <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php
                            $no = 1;
                            foreach ($return as $cusomter) {
                            ?>
                            <tr>
                                <td class="px-5 py-3 text-xs font-semibold">
                                    <?php echo $no++  ?>
                                </td>
                                <td class="px-5 py-3 text-xs font-semibold">
                                    <?php echo $cusomter["fullname"] ?>
                                </td>
                                <td class="px-5 py-3 text-xs font-semibold">
                                    <?php echo $cusomter["email"] ?>
                                </td>
                                <td class="px-5 py-3 text-xs font-semibold">
                                    <?php echo $cusomter["phonenumber"] ?>
                                </td>
                                <td class="px-5 py-3 text-xs font-semibold">
                                    <?php 
                                        echo !empty($cusomter['created_at'])? date('d-M-Y g:iA', strtotime($cusomter['created_at'])): '—'; 
                                        ?>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- view -->
                                         <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md cursor-pointer" type="button">
                                            <i class="fa-solid fa-eye"></i>
                                         </button>
                                        <!-- Delete -->
                                        <a href="deleteCustomers.php?id=<?php echo $cusomter["id"]; ?>"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                                            <i class="fas fa-trash text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg p-4 md:p-6">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Customer Information
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="space-y-4 md:space-y-6 py-4 md:py-6">
                        <div class="grid grid-cols-2 gap-4">
                           
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end border-t border-gray-200 space-x-4 pt-4 md:pt-5">
                        <button data-modal-hide="default-modal" type="button" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script to handle modal population -->
        <script src="../../../public/js/manageCustomer.js"></script>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>