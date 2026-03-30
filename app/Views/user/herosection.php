<?php
// session_start();
require_once __DIR__ . "/../../../app/Controllers/user/UserLoginController.php";

$userlogin = new UserLoginController($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="scroll-smooth">
    <section class="bg-white text-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center">

            <!-- LEFT CONTENT -->
            <div class="space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    Delicious Food <br> Delivered To You 🍔
                </h1>

                <p class="text-lg text-gray-500">
                    Order your favorite meals anytime, anywhere. Fast delivery, fresh ingredients, and amazing taste!
                </p>

                <div class="flex gap-4">
                    <!-- Order -->
                    <a href="#food-category"
                        class="bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-800 transition duration-300">
                        Order Now
                    </a>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="flex justify-center">
                <img src="https://i.pinimg.com/1200x/23/6b/a5/236ba56962a3ba362a47fcbc634f206e.jpg" alt="Food"
                    class="w-full max-w-md drop-shadow-xl rounded-xl">
            </div>

        </div>
    </section>
    <script>
    document.getElementById('scroll-btn').addEventListener('click', function() {
        const section = document.getElementById('food-category');
        section.scrollIntoView({
            behavior: 'smooth'
        });
    });
    </script>
</body>

</html>