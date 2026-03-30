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
    <div>
        <?php include __DIR__ . "/homenewbar.php"; ?>
    </div>

    <div class="w-full max-w-[1400px] mx-auto px-4 py-6">

        <!-- Page Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-blue-800 text-left">
                <i class="fa-solid fa-dumpster-fire"></i>
                Our Delicious Foods
            </h1>
            <p class="text-gray-500 text-sm mt-1 text-left">
                Search your favorite food and enjoy
            </p>
        </div>

        <!-- Search Box -->
        <form method="GET" class="mb-8 flex justify-center">
            <div class="relative w-full ">

                <input type="text" name="search" placeholder="Search food..."
                    class="w-full pl-10 pr-4 py-3 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= $_GET['search'] ?? '' ?>">

                <!-- Icon -->
                <span class="absolute left-3 top-3.5 text-gray-400">
                    🔍
                </span>

            </div>
        </form>

        <div class="max-w-8xl mx-auto px-4 py-6">

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <?php foreach ($newFoods as $newfood): ?>

                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group flex flex-col border border-gray-100">

                    <!-- Image -->
                    <div class="relative h-44 overflow-hidden">
                        <img src="/Online-Food-Order/public/image/newfood/<?php echo $newfood['photo']; ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                            alt="Food image">

                        <!-- Price badge on image -->
                        <div class="absolute top-3 right-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                            $<?php echo $newfood['price']; ?>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 flex flex-col flex-1">

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-gray-900">
                            <?php echo $newfood['food_name_english']; ?>
                        </h3>

                        <p class="text-sm text-gray-500 mb-2">
                            <?php echo $newfood['food_name_khmer']; ?>
                        </p>

                        <!-- Description -->
                        <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                            <?php echo $newfood['descrip']; ?>
                        </p>

                        <!-- Type badge -->
                        <?php 
                    $type = $newfood['food_type'];
                    $badgeClass = match ($type) {
                        'Vegetarian' => 'bg-green-100 text-green-700',
                        'Non-Vegetarian' => 'bg-blue-100 text-blue-700',
                        default => 'bg-gray-100 text-gray-700'
                    };
                ?>

                        <div class="mb-4">
                            <span
                                class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full <?= $badgeClass ?>">
                                <?= $type ?>
                            </span>
                        </div>

                        <!-- Button -->
                        <button
                            class="mt-auto w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2.5 rounded-xl transition duration-300 active:scale-95 shadow-md">
                            Add to Cart
                        </button>

                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div>
        <?php include __DIR__ . "/footer.php"; ?>
    </div>
</body>

</html>