<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../../public/admin");
}

require_once __DIR__ . "/../../Controllers/admin/CategoriesController.php";

$Category = new CategoriesController($con);
$result = $Category->show();

$msg = "";

if (isset($_POST['food_name'])) {

    $food_name = $_POST["food_name"];
    $categorye = $_POST["categorye"];
    $price = $_POST["price"];
    $action = $_POST["action"];

    
   if ($food_name && $categorye) {

    $Category->store (
        $id,
        $food_name,
        $categorye,
        $price,
        $action
    );

        header("Location: categories.php");
        exit();
    } else {
    $msg = "<div>Student insert failed.</div>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <nav class="w-64 bg-blue-700 text-white flex flex-col fixed h-full">

        <!-- Logo -->
        <div class="px-6 py-5 border-b border-blue-600 text-center">
            <p class="text-xl font-bold">
                <i class="fas fa-store"></i> Online Food Order
            </p>
            <p class="text-xs text-blue-200 mt-1">Admin Panel</p>
        </div>

        <!-- Menu Links -->
        <div class="flex-1 px-2 py-4 space-y-1">

            <a href="dashboard.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 font-semibold">
                <i class="fas fa-gauge-high w-5 text-center"></i>
                Dashboard
            </a>

            <a href="categories.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
                <i class="fas fa-tag w-5 text-center"></i>
                Categories
            </a>

            <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-cart-shopping w-5 text-center"></i>
                Orders
            </a>

            <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-users w-5 text-center"></i>
                Customers
            </a>

            <a href="drivers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-person-biking w-5 text-center"></i>
                Drivers
            </a>

            <a href="reports.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-chart-line w-5 text-center"></i>
                Reports
            </a>

            <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-gear w-5 text-center"></i>
                Settings
            </a>

        </div>

        <!-- Logout -->
        <div class="px-2 py-4 border-t border-blue-600">
            <a href="../../../public/admin/index.php"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-blue-600 transition">
                <i class="fas fa-right-from-bracket w-5 text-center"></i>
                Logout
            </a>
        </div>

    </nav>
    <!-- // admin header -->
    <main class=" w-full ml-64 flex-1 flex flex-col overflow-y-auto">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"> <strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <!-- MAIN CONTENT -->
        <div class="p-4">

            <h1 class="text-2xl font-bold mb-6">Category Management</h1>

            <!-- ADD FOOD FORM -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">

                <h3 class="text-lg font-semibold mb-4">Add New Food</h3>

                <form method="POST" action="" class="space-y-3">

                    <input type="text" name="food_name" placeholder="Food Name"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <input type="number" name="price" placeholder="Price"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <select name="categorye"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option>FastFood</option>
                        <option>Burger</option>
                        <option>Drink</option>
                    </select>

                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        Add Food
                    </button>

                </form>
                <div class="overflow-hidden ">
                    <table class="w-full bg-white rounded-lg mt-6 overflow-hidden">

                        <!-- Table Header -->
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Food Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Category</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Action</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody class="divide-y divide-gray-200">

                            <?php foreach ($result as $food) { ?>
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo $food['id']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo $food['food_name']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo $food['category']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    $<?php echo $food['price']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700 flex gap-2">

                                    <!-- Edit -->
                                    <a href="editCategory.php ?id=<?php echo $food['id']; ?>"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <a href="deleteCategory.php?delete_id=<?php echo $food['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                                        Delete
                                    </a>

                                </td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>



        </div>
</body>

</html>