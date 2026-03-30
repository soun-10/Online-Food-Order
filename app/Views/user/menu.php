<?php
    session_start();
    require_once __DIR__ . "/../../Controllers/admin/NewFoodController.php";
$newFoodController = new NewFoodController($con);
$newFoods = $newFoodController->show();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include __DIR__ . "../../../../app/Views/components/cdns.php";
  ?>
    <link rel="stylesheet" href="../../../public/css/CustomerHomePage.css">
    <!-- Font Text -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet" />
</head>

</head>

<body>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php foreach ($newFoods as $newfood): ?>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">

            <img src="/Online-Food-Order/public/image/newfood/<?php echo $newfood['photo']; ?>"
                class="w-full h-40 object-cover" alt="Food image">

            <div class="p-4 space-y-1">

                <h3 class="text-lg font-semibold text-gray-800">
                    <?php echo $newfood['food_name_english']; ?>
                </h3>

                <p class="text-sm text-gray-500">
                    <?php echo $newfood['food_name_khmer']; ?>
                </p>

                <p class="text-green-600 font-bold">
                    $<?php echo $newfood['price']; ?>
                </p>

                <p class="text-sm text-gray-600 line-clamp-2">
                    <?php echo $newfood['descrip']; ?>
                </p>

                <?php $type = $newfood['food_type'];
                    $badgeClass = match ($type) {
                    'Vegetarian' => 'bg-green-100 text-green-700',
                    'Non-Vegetarian' => 'bg-blue-100 text-blue-700',
                    'Mind' => 'bg-red-100 text-red-700',
                    default => 'bg-gray-100 text-gray-700'
                };
                    ?>

                <span class="inline-block mt-2 px-2 py-1 text-xs font-medium rounded-full <?= $badgeClass ?>">
                    <?= $type ?>
                </span>

                <button class="w-full mt-3 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                    Add to Cart
                </button>

            </div>
        </div>

        <?php endforeach; ?>

    </div>
</body>

</html>