<?php
session_start();

// if (!isset($_SESSION["username"])) {
//     header("Location: ../../public");
// }

require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../Controllers/admin/CategoriesController.php";

$Category = new CategoriesController($con);
$result = $Category->show();
$id = $_GET['id'] ?? 0;
$row = $Category->getCategoryById($id);

// If category not found, redirect
if (!$row) {
    header("Location: categories.php");
    exit();
}

if (isset($_POST['food_name'])) {
    $food_name = $_POST["food_name"] ?? '';
    $category = $_POST["category"] ?? '';
    $status = $_POST["status"] ?? 'Active';

    if ($food_name && $category) {
        $Category->updateCategory(
            $id,
            $food_name,
            $category,
            $status,
            $row['photo_url'] ?? ''
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

<body>


    <div class="p-4">

        <h1 class="text-2xl font-bold mb-6">Edit Category</h1>

        <!-- EDIT CATEGORY FORM -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">

            <h3 class="text-lg font-semibold mb-4">Edit Category Details</h3>

            <form method="POST" action="" class="space-y-3">

                <input type="text" name="food_name" placeholder="Food Name"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?php echo htmlspecialchars($row['food_name'] ?? ''); ?>" required>

                <select name="category"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="">Select Category</option>
                    <option value="FastFoods" <?php echo ($row['category'] ?? '') == "FastFoods" ? "selected" : ""; ?>>FastFoods</option>
                    <option value="Burgers" <?php echo ($row['category'] ?? '') == "Burgers" ? "selected" : ""; ?>>Burgers</option>
                    <option value="Drinks" <?php echo ($row['category'] ?? '') == "Drinks" ? "selected" : ""; ?>>Drinks</option>
                </select>

                <select name="status"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="Active" <?php echo ($row['status'] ?? '') == "Active" ? "selected" : ""; ?>>Active</option>
                    <option value="InActive" <?php echo ($row['status'] ?? '') == "InActive" ? "selected" : ""; ?>>InActive</option>
                </select>

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                    Update Category
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
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>

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
                                <span class="<?php echo $food['status'] == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> px-3 py-1 rounded-full text-xs font-medium">
                                    <?php echo $food['status']; ?>
                                </span>
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