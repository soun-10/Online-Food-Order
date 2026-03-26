<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    require_once __DIR__ . "../../../Controllers/admin/CategoriesController.php";
    $Category = new CategoriesController($con);
    $result = $Category->show();
    $totalitem = $Category -> countOrders();
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="p-6 bg-gray-100 min-h-screen">

        <!-- Category -->
        <div class="flex gap-4 mb-6 overflow-x-auto">
            <div class="bg-green-200 p-4 rounded-xl min-w-[120px] text-center">
                <p class="font-bold">All</p>
                <span class="text-sm text-gray-500">
                    <?= $totalitem ?> Item
                </span>
            </div>
            <div class="bg-white p-4 rounded-xl min-w-[120px] text-center shadow">
                Burger
            </div>
            <div class="bg-white p-4 rounded-xl min-w-[120px] text-center shadow">
                Pizza
            </div>
            <div class="bg-white p-4 rounded-xl min-w-[120px] text-center shadow">
                Coffee
            </div>
        </div>

        <!-- Food Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php foreach($result as $food): ?>
            <div class="bg-white rounded-2xl shadow p-4 hover:shadow-lg transition">

                <!-- Image -->
                <!-- <img src="images/" class="w-full h-40 object-cover rounded-xl"> -->

                <!-- Name -->
                <h3 class="mt-3 font-semibold text-gray-800">
                    <?= $food['food_name'] ?>
                </h3>

                <!-- Price + Type -->
                <div class="flex justify-between items-center mt-2">
                    <span class="text-green-600 font-bold">
                        <?= $food['category'] ?>
                    </span>

                    <span class="text-sm  'text-green-500' : 'text-red-500' ?>">
                        $<?= $food['price'] ?>
                    </span>
                </div>

                <!-- Button -->
                <button class="mt-4 w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                    Add to Dish
                </button>

            </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>