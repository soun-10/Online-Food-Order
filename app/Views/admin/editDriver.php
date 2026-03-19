<?php
    session_start();
    require_once __DIR__ . "/../../Controllers/admin/DriverController.php";
    $Driver = new DriversController($con);
    $result = $Driver->show();
    $id = $_GET['id'];
    $row = $Driver->getDriverById($id);
    if (isset($_POST['driver_name'])) {
        $driver_name = $_POST["driver_name"];
        $phone = $_POST["phone"];
        $dob = $_POST["date_of_birth"];
        $address = $_POST["address"];
        $vehicle = $_POST["vehicle"];
        $join_date = $_POST["join_date"];
    
       if ($driver_name && $phone && $dob && $join_date) {
    
        $Driver->updateDriver (
            $id,
            $driver_name,
            $phone,
            $dob,
            $address,
            $vehicle,
            $join_date
        );
    
            header("Location: drivers.php");
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

<body class="bg-gray-100 font-sans flex min-h-screen">
    <!-- // admin header -->
    <main class=" flex-1 flex flex-col">
        <div class=" p-4">
            <div class=" w-full bg-white p-6 rounded-lg shadow mb-6">

                <h2 class="text-lg font-semibold mb-4">Add Driver</h2>

                <form action="" method="post" class="grid grid-cols-4 gap-4">

                    <input type="text" name="driver_name" placeholder="Driver Name"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                        value="<?php echo $row['driver_name']; ?>">

                    <input type="text" name="phone" placeholder="Phone"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" required
                        value="<?php echo $row['phone']; ?>">
                    <input type="text" name="address" placeholder="Address"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                        value="<?php echo $row['address']; ?>">

                    <input type="text" name="vehicle" placeholder="Vehicle"
                        class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                        value="<?php echo $row['vehicle']; ?>">
                    <div class="flex gap-10">
                        <label class="text-sm text-gray-600">Date of Birth :</label>
                        <input type="date" name="date_of_birth"
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                            value="<?php echo date('Y-m-d', strtotime($row['dob'])); ?>">
                    </div>
                    <div class="flex gap-10 ">
                        <label class="text-sm text-gray-600">Join Date : </label>
                        <input type="date" name="join_date" placeholder="Join Date"
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none"
                            value="<?php echo date('Y-m-d', strtotime($row['join_date'])); ?>">
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
                                <th class="p-3">ID</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Phone</th>
                                <th class="p-3">Date of Birth</th>
                                <th class="p-3">Address</th>
                                <th class="p-3">Vehicle</th>
                                <th class="p-3">Join Date</th>
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

                            </tr>

                            <?php } ?>
                        </tbody>


                    </table>

                </div>
            </div>
        </div>
</body>

</html>