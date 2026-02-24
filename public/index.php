<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat"style="background-image: url('Image/bg login.jpg');">
    <main class="relative w-full flex items-center justify-center px-4 sm:px-6 md:px-8">
        <div class="w-full max-w-sm sm:max-w-md bg-white/40 backdrop-blur-xl rounded-2xl shadow-2xl p-6 sm:p-8 z-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6">
                Log in
            </h1>
            <form class="space-y-4 sm:space-y-5">
                <!-- Username -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1 text-sm sm:text-base">
                        Username
                    </label>
                    <input type="text" placeholder="Enter your username"class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Password -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1 text-sm sm:text-base">
                        Password
                    </label>
                    <input type="password" placeholder="Enter your password" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Button -->
                <button type="submit" class="w-full py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition duration-300">
                    Log In
                </button>
            </form>
        </div>
    </main>
</body>
</html>