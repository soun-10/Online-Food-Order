<?php

    require_once __DIR__ . "../../../Controllers/admin/CategoriesController.php";
    require_once __DIR__ . "/../../Controllers/admin/NewFoodController.php";

    $category_id = $_GET['category_id'] ?? null;

$newFoodController = new NewFoodController($con);

// if category selected → filter
if ($category_id) {
    $newFood = $newFoodController->getByCategory($category_id);
} else {
    $newFood = $newFoodController->show();
}

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
    <div id="food-category" class="min-h-screen p-6 bg-gray-100 scroll-mt-20">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Food Category</h1>

        <!-- Food Grid -->
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach($result as $food): ?>

            <a href="foodorder_page.php?category_id=<?= $food['id']; ?>"
                class="bg-white rounded-2xl shadow p-4 hover:shadow-lg transition-shadow duration-300 block">

                <!-- Image -->
                <div class="flex justify-center mb-3">
                    <img src="/Online-Food-Order/public/image/category/<?= $food['photo_url'] ?>"
                        alt="<?= $food['food_name'] ?>" class="w-16 h-16 object-cover rounded-md">
                </div>

                <!-- Name -->
                <h3 class="text-gray-800 font-semibold text-center">
                    <?= $food['food_name'] ?>
                </h3>

                <!-- Category -->
                <div class="mt-2 flex justify-center">
                    <span class="text-green-600 font-bold">
                        <?= $food['category'] ?>
                    </span>
                </div>

            </a>

            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>
<script>
document.querySelectorAll("a[href^='#']").forEach(link => {
    link.addEventListener("click", function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href"))
            .scrollIntoView({
                behavior: "smooth"
            });
    });
});
</script>