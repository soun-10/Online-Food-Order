<?php
session_start();

// if (!isset($_SESSION["username"])) {
//     header("Location: ../../public");
// }

require_once __DIR__ . "/../../Controllers/admin/CategoriesController.php";

$Category = new CategoriesController($con);
$result = $Category->show();
$id = $_GET['id'];
$row = $Category->getCategoryById($id);

if (isset($_POST['food_name'])) {
    $food_name = $_POST["food_name"];
    $categorye = $_POST["categorye"];
    $price = $_POST["price"];
    $action = $_POST["action"];

    
   if ($food_name && $categorye) {

    $Category->updateCategory (
        $id,
        $food_name,
        $categorye,
        $price,
        $action,
        $image,
        $rating,
        $description
    );

        header("Location: categories.php");
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

        <!-- ADD FOOD FORM -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">

            <h3 class="text-lg font-semibold mb-4">Add New Food</h3>

            <form method="POST" action="" class="space-y-3">

                <input type="text" name="food_name" placeholder="Food Name"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?php echo $row['food_name']; ?>">

                <input type="number" name="price" placeholder="Price"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?php echo $row['price']; ?>">

                <select name="categorye"
                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="FastFood" <?php if ($row['categorye'] == "FastFood") {
                        echo "selected";
                    } elseif ($row['categorye'] == "Burger") {
                        echo "selected";
                    } elseif ($row['categorye'] == "Drink") {
                        echo "selected";
                    }
                 ?>>
                    <option>FastFood</option>
                    <option>Burger</option>
                    <option>Drink</option>
                </select>

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                    Update Food
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


                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>



    </div>
</body>

</html>