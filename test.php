<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order</title>
    <?php include __DIR__ . "/app/Views/components/cdns.php"; ?>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <main class="min-h-screen">
        <nav class="bg-blue-600 text-white">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <!-- Logo -->
                <div class="text-xl font-bold mr-auto">
                    <i class="fa-solid fa-utensils"></i>
                    ONLINE FOOD ORDER
                </div>

                <!-- Menu -->
                <ul class="hidden md:flex space-x-6 ml-auto text-xl">
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Home</a></li>
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">About</a></li>
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Services</a></li>
                    <li><a href="#" class="nav-link text-white font-semibold text-sm tracking-wide pb-1">Contact</a></li>
                </ul>
            </div>
        </nav>
        <div class="banner">
            <img src="public/image/Banner.jpg" alt="Banner" class="w-full h-auto block object-contain">
        </div>
    </main>
</body>
</html>