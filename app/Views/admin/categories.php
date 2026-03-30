<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../../public/admin");
}
require_once __DIR__ . "/../../Controllers/admin/CategoriesController.php";

$Category = new CategoriesController($con);
$result = $Category->show();
$totalcategory = $Category -> countOrders();
// var_dump($_FILES['photo']);
    $msg = "";

if (isset($_POST['food_name'])) {

    $food_name = $_POST["food_name"];
    $category = $_POST["category"] ?? '';
    $status = $_POST["status"];

    $photo_url = basename($_FILES["photo"]["name"]);

    $photoDirectory = "../../../public/image/category/" . $photo_url;
    $temp = $_FILES['photo']['tmp_name'];

    if (move_uploaded_file($temp, $photoDirectory)) {

        $Category->store(
            $food_name,
            $category,
            $status,
            $photo_url
        );

        header("Location: categories.php");
        exit();
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
    <?php include __DIR__ . "/menubar.php"; ?>

    <!-- // admin header -->
    <main class=" w-full ml-64 flex-1 flex flex-col overflow-y-auto">

        <!-- Topbar -->
        <header class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3">
            <span class="text-gray-600"> <strong>Admin</strong></span>
            <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        </header>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Total Category -->
                <div
                    class="bg-white rounded-xl shadow-md border-l-4 border-blue-500 px-5 py-4 hover:shadow-lg transition">
                    <p class="text-sm font-medium text-blue-500 mb-1">Total Category</p>

                    <p class="text-3xl font-bold text-gray-800">
                        <?= $totalcategory ?>
                    </p>
                </div>

            </div>
        </div>
        <!-- MAIN CONTENT -->
        <div class="p-4">

            <!-- ADD FOOD FORM -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">

                <h3 class="text-lg font-semibold mb-4">Add New Food</h3>

                <form method="POST" action="" class="space-y-3" enctype="multipart/form-data">
                    <input type="text" name="food_name" placeholder="Food Name"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <select name="category"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="FastFoods">FastFoods</option>
                        <option value="KhmerFoods">KhmerFoods</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Dessert">Dessert</option>
                    </select>

                    <select name="status"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>

                    <input type="file" name="photo" class="border p-2 w-full mb-2" id="photoUpload">

                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        Add Category
                    </button>

                </form>
                <div class="overflow-hidden">
                    <table class="w-full table-fixed bg-white rounded-lg mt-6">

                        <!-- Header -->
                        <thead class="bg-gray-100">
                            <tr class="text-center">
                                <th class="px-4 py-3 w-16 text-sm font-semibold text-gray-600">No</th>
                                <th class="px-4 py-3 w-28 text-sm font-semibold text-gray-600">Image</th>
                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">Food Name</th>
                                <th class="px-4 py-3 text-sm font-semibold text-gray-600">Category</th>
                                <th class="px-4 py-3 w-28 text-sm font-semibold text-gray-600">Status</th>
                                <th class="px-4 py-3 w-40 text-sm font-semibold text-gray-600">Action</th>
                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($result as $food) { ?>
                            <tr class="hover:bg-gray-50 transition text-center">

                                <!-- ID -->
                                <td class="py-4 text-sm text-gray-700">
                                    <?php echo $food['id']; ?>
                                </td>

                                <!-- Image -->
                                <td class="py-4">
                                    <div class="flex justify-center">
                                        <img src="/Online-Food-Order/public/image/category/<?php echo $food['photo_url']; ?>"
                                            class="w-16 h-16 object-cover rounded-md">
                                    </div>
                                </td>

                                <!-- Food Name -->
                                <td class="py-4 text-sm text-gray-700 truncate">
                                    <?php echo $food['food_name']; ?>
                                </td>

                                <!-- Category -->
                                <td class="py-4 text-sm text-gray-700">
                                    <?php echo $food['category']; ?>
                                </td>

                                <!-- Status -->
                                <td class="py-4">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                        <?php echo $food['status']; ?>
                                    </span>
                                </td>

                                <!-- Action -->
                                <td class="py-4">
                                    <div class="flex justify-center items-center gap-2">

                                        <!-- Edit -->
                                        <a href="editCategory.php?id=<?php echo $food['id']; ?>"
                                            class="h-8 px-3 flex items-center bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-md transition">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <a href="deleteCategory.php?delete_id=<?php echo $food['id']; ?>"
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
</body>

</html>