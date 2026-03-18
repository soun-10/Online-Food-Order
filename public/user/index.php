<?php
require_once __DIR__."/../../config/database.php";
require_once __DIR__."/../../app/Controllers/user/UserLoginController.php";

$userlogin = new UserLoginController($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];

    $userlogin->register($id, $full_name, $email, $phone, $address);

    header("Location: ../../app/Views/user/homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Login</title>
</head>

<body class="min-h-screen flex">

    <!-- Left side with image -->
    <div class="w-1/2 bg-cover bg-center relative"
        style="background-image: url('https://i.pinimg.com/736x/98/73/cd/9873cd1125ead793251622bf1195c47d.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-start p-12">
            <h1 class="text-4xl font-bold text-white mb-4">Create your Account</h1>
            <p class="text-white text-lg">Share your recipes and Get delicious projects!</p>
        </div>
    </div>

    <!-- Right side signup form -->
    <div class="w-1/2 flex justify-center items-center p-12 bg-white">
        <form action="" method="POST" class="w-full max-w-md space-y-4">
            <h2 class="text-2xl font-bold mb-4">Sign Up</h2>

            <input type="text" name="full_name" placeholder="Full name"
                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="email" name="email" placeholder="Email "
                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$" required>
            <input type="tel" name="phone" placeholder="Phone number"
                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" required>
            <input type="text" name="address" placeholder="Address"
                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit" class="w-full bg-black text-white p-3 rounded-md hover:bg-gray-800">Join us →</button>

            <div class="flex items-center my-2">
                <hr class="flex-grow border-t border-gray-300">
                <span class="mx-2 text-gray-400">or</span>
                <hr class="flex-grow border-t border-gray-300">
            </div>

            <button class="w-full bg-white border p-3 rounded-md hover:bg-gray-100">Sign up with Google</button>
        </form>
    </div>
    <script>
    document.getElementById('index.php').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value.trim();
        // Basic Gmail format check
        const gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        if (!gmailPattern.test(email)) {
            e.preventDefault(); // Stop form submission
            alert("Please enter a valid Gmail address ending with @gmail.com");
        }
    });
    </script>
</body>

</html>