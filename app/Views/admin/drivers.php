<?php
    session_start();
    require_once __DIR__ . "/../../Controllers/admin/DriverController.php";
    $Driver = new DriversController($con);
    $result = $Driver->show();
    $msg = "";
    if (isset($_POST['driver_name'])) {
        $driver_name = $_POST["driver_name"];
        $phone = $_POST["phone"];
        $dob = $_POST["date_of_birth"];
        $address = $_POST["address"];
        $vehicle = $_POST["vehicle"];
        $join_date = $_POST["join_date"];
    
       if ($driver_name && $phone && $dob && $join_date) {
    
        $Driver->store (
            $id,
            $driver_name,
            $phone,
            $dob,
            $address,
            $vehicle,
            $join_date
        );
    
            header("Location: drivers.php");
        } else {
        $msg = "<div>Driver insert failed.</div>";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
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
            <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-users w-5 text-center"></i> Customers
            </a>
            <a href="drivers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-person-biking w-5 text-center"></i> Drivers
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
    <main class=" flex-1 flex flex-col overflow-y-auto h-screen">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"><strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <div class=" p-4">
            <div class=" w-full bg-white p-6 rounded-lg shadow mb-6">

                <h2 class="text-lg font-semibold mb-4">Add Driver</h2>

                <form action="" method="post" class="grid grid-cols-4 gap-4">

                    <input type="text" name="driver_name" placeholder="Driver Name"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">

                    <input type="text" name="phone" placeholder="Phone"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" required>
                    <input type="text" name="address" placeholder="Address"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">

                    <input type="text" name="vehicle" placeholder="Vehicle"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                    <div class="flex gap-10">
                        <label class="text-sm text-gray-600">Date of Birth :</label>
                        <input type="date" name="date_of_birth"
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>
                    <div class="flex gap-10 ">
                        <label class="text-sm text-gray-600">Join Date : </label>
                        <input type="date" name="join_date" placeholder="Join Date"
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>


                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Add Driver
                    </button>

                </form>
                <div class="bg-white rounded-lg overflow-hidden">

                    <h2 class="text-xl font-semibold p-4 border-b">Drivers</h2>

                    <table class="w-full text-sm text-left">

                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="p-3">DID</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Phone</th>
                                <th class="p-3">Date of Birth</th>
                                <th class="p-3">Address</th>
                                <th class="p-3">Vehicle</th>
                                <th class="p-3">Join Date</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            <?php
                                foreach ($result as $delivery) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3"><?php
                                    echo $delivery['id'];?></td>
                                <td class="p-3"><?php echo $delivery['driver_name']; ?></td>
                                <td class="p-3"><?php echo $delivery['phone']; ?></td>
                                <td class="p-3"><?php echo $delivery['dob']; ?></td>
                                <td class="p-3"><?php echo $delivery['address']; ?></td>
                                <td class="p-3"><?php echo $delivery['vehicle']; ?></td>
                                <td class="p-3"><?php echo $delivery['join_date']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700 flex gap-2">

                                    <!-- Edit -->
                                    <a href="editDriver.php ?id=<?php echo $delivery['id']; ?>"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <a href="deleteDriver.php?delete_id=<?php echo $delivery['id']; ?>"
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