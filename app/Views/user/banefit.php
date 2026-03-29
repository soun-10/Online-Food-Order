<?php

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

<body class="scroll-smooth">


    <!-- FOOD CATEGORY SECTION (in Benefit file) -->
    <div id="food-category" class="min-h-screen p-6 bg-gray-100">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Food Category</h1>

        <!-- Food Grid -->
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach($result as $food): ?>
            <div class="bg-white rounded-2xl shadow p-4 hover:shadow-lg transition-shadow duration-300">

                <!-- Image -->
                <div class="flex justify-center mb-3">
                    <img src="/Online-Food-Order/public/image/category/<?= $food['photo_url'] ?>"
                        alt="<?= $food['food_name'] ?>" class="w-16 h-16 object-cover rounded-md">
                </div>

                <!-- Name -->
                <h3 class="text-gray-800 font-semibold text-center"><?= $food['food_name'] ?></h3>

                <!-- Category -->
                <div class="mt-2 flex justify-center">
                    <span class="text-green-600 font-bold"><?= $food['category'] ?></span>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>