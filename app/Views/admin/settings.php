<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../../../public/admin");
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <?php include __DIR__. "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen overflow-hidden">
    <nav class="w-64 bg-blue-700 text-white flex flex-col sticky top-0 h-screen">
        <?php include __DIR__ . "/menubar.php"; ?>
    </nav>
    <main class="flex-1 p-6 space-y-6 overflow-y-auto h-screen">

        <h1 class="text-2xl font-bold text-gray-700">Settings</h1>

        <!-- Admin Profile Settings -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">Admin Profile</h2>

            <form class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-600 mb-1">Name</label>
                    <input type="text" placeholder="Admin Name"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Email</label>
                    <input type="email" placeholder="admin@example.com"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Password</label>
                    <input type="password" placeholder="********"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Confirm Password</label>
                    <input type="password" placeholder="********"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div class="col-span-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Update Profile
                    </button>
                </div>

            </form>
        </div>

        <!-- Site Settings -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">Site Settings</h2>

            <form class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-600 mb-1">Business Name</label>
                    <input type="text" placeholder="My Food Delivery"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Contact Email</label>
                    <input type="email" placeholder="info@example.com"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Contact Phone</label>
                    <input type="text" placeholder="+123456789"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Logo</label>
                    <input type="file" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div class="col-span-2">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Save Settings
                    </button>
                </div>

            </form>
        </div>

        <!-- Delivery / System Settings -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">Delivery Settings</h2>

            <form class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-600 mb-1">Minimum Order Amount</label>
                    <input type="number" placeholder="5"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1">Delivery Fee</label>
                    <input type="number" placeholder="2"
                        class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div class="col-span-2">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">
                        Update Delivery Settings
                    </button>
                </div>

            </form>
        </div>

    </main>
</body>

</html>