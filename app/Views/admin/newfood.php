<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../../public/admin");
    exit;
}
require_once __DIR__ . "/../../Controllers/admin/NewFoodController.php";
$newFoodController = new NewFoodController($con);
$newFoods = $newFoodController->show();

if (isset($_POST['food_name_english'])) {

    $food_name_english = $_POST["food_name_english"];
    $food_name_khmer = $_POST["food_name_khmer"];
    $price = $_POST["price"];
    $food_type = $_POST["food_type"];
    $descrip= $_POST["descrip"];

    $photo = basename($_FILES["photo"]["name"]);

    $photoDirectory = "../../../public/image/newfood/" . $photo;
    $temp = $_FILES['photo']['tmp_name'];

    if (move_uploaded_file($temp, $photoDirectory)) {

        $newFoodController->store(
            $food_name_english,
            $food_name_khmer,
            $price,
            $photoDirectory,
            $food_type,
            $descrip,
        );

        header("Location: newfood.php");
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>

    <!-- ✅ IMPORTANT: Make sure Tailwind is loaded -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- your other cdns -->
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <div class="w-64 h-screen bg-blue-700 text-white fixed top-0 left-0">
        <?php include __DIR__ . "/menubar.php"; ?>
    </div>

    <!-- Main -->
    <div class="ml-64">

        <!-- Topbar -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-end items-center gap-3 sticky top-0 z-10">
            <span class="text-gray-500 text-sm">
                Welcome,
                <span class="font-semibold text-gray-700">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
            </span>
        </header>

        <div class="p-6">

            <div class="w-full max-w-[1400px] mx-auto bg-white p-6 rounded-2xl shadow">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">🍔 Food List</h1>

                    <!-- OPEN MODAL BUTTON -->
                    <label for="foodModal"
                        class="bg-purple-600 text-white px-5 py-2 rounded-xl hover:bg-purple-700 cursor-pointer">
                        + New Food
                    </label>
                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto text-sm">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs text-center">
                            <tr>
                                <th class="p-4">No</th>
                                <th class="p-4">Image</th>
                                <th class="p-4">Food Name (English)</th>
                                <th class="p-4">Food Name (Khmer)</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Description</th>
                                <th class="p-4 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($newFoods as $newfood) { ?>
                            <tr class="hover:bg-gray-50 transition text-center">

                                <!-- ID -->
                                <td class="py-4 text-sm text-gray-700">
                                    <?php echo $newfood['id']; ?>
                                </td>

                                <!-- Image -->
                                <td class="py-4">
                                    <div class="flex justify-center">
                                        <img src="/Online-Food-Order/public/image/newfood/<?php echo $newfood['photo']; ?>"
                                            class="w-16 h-16 object-cover rounded-md">
                                    </div>
                                </td>

                                <!-- Food Name -->
                                <td class="py-4 text-sm text-gray-700 truncate">
                                    <?php echo $newfood['food_name_english']; ?>
                                </td>
                                <td class="py-4 text-sm text-gray-700 truncate">
                                    <?php echo $newfood['food_name_khmer']; ?>
                                </td>

                                <!-- Category -->
                                <td class="py-4 text-sm text-gray-700">
                                    <?php echo $newfood['price']; ?>
                                </td>

                                <!-- Status -->
                                <td class="py-4">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                        <?php echo $newfood['food_type']; ?>
                                    </span>
                                </td>
                                <td class="py-4 text-sm text-gray-700 truncate">
                                    <?php echo $newfood['descrip']; ?>
                                </td>

                                <!-- Action -->
                                <td class="py-4">
                                    <div class="flex justify-center items-center gap-2">

                                        <!-- Edit -->
                                        <a href="editCategory.php?id=<?php echo $newfood['id']; ?>"
                                            class="h-8 px-3 flex items-center bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-md transition">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <a href="deleteCategory.php?delete_id=<?php echo $newfood['id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="h-8 w-8 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white rounded-md transition">
                                            <i class="fas fa-trash text-xs"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL (TAILWIND ONLY) -->


    <input type="checkbox" id="foodModal" class="hidden peer">

    <div class="fixed inset-0 bg-black/50 hidden peer-checked:flex items-center justify-center z-50">

        <div class="bg-white w-[900px] p-6 rounded-xl shadow-lg">

            <h2 class="text-xl font-bold mb-4">Add New Food</h2>

            <form method="POST" enctype="multipart/form-data">
                <label for="food_name_english" class="block text-sm font-medium text-gray-700">
                    Food Name (English)
                </label>

                <input type="text" name="food_name_english" placeholder="Food Name"
                    class="w-full border p-2 rounded mb-3">
                <label for="food_name_english" class="block text-sm font-medium text-gray-700">
                    Food Name (Khmer)
                </label>
                <input type="text" name="food_name_khmer" placeholder="Food Name"
                    class="w-full border p-2 rounded mb-3">
                <input type="text" name="price" placeholder="Price" class="w-full border p-2 rounded mb-3">

                <input type="file" name="photo" class="w-full border p-2 rounded mb-3">

                <select name="food_type" class="w-full border p-2 rounded mb-3">
                    <option value="Non-Vegetarian">Non-Vegetarian</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Mild">Mild</option>
                </select>
                <textarea name="descrip" placeholder="Description" class="w-full border p-2 rounded mb-3"></textarea>

                <div class="flex justify-end gap-2">

                    <label for="foodModal" class="px-4 py-2 bg-gray-400 text-white rounded cursor-pointer">
                        Cancel
                    </label>

                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">
                        Save
                    </button>

                </div>

            </form>

        </div>
    </div>

</body>

</html>
<script>