<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/user/MyProfileController.php";
require_once __DIR__ . "/../../../app/Controllers/admin/NewFoodController.php";
$newFoodController = new NewFoodController($con);
$newFoods = $newFoodController->show();
if (!isset($_SESSION['id'])) {
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

$MyProfile = new MyProfileController($con);
$customer  = $MyProfile->getById($_SESSION['id']);
$msg       = "";
$msgType   = "";

// ✅ បន្ថែម: ពិនិត្យថា Customer នៅមាននៅក្នុង DB ឬទេ
if (empty($customer)) {
    session_unset();
    session_destroy();
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

// Handle POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname    = $_POST['fullname']          ?? '';
    $phonenumber = $_POST['phonenumber']       ?? '';
    $newPassword = $_POST['new_password']      ?? '';
    $confirmPw   = $_POST['confirm_password']  ?? '';

    if ($newPassword && $newPassword !== $confirmPw) {
        $msg     = "Password and Confirm Password do not match!";
        $msgType = "error";
    } else {
        // Handle image upload
        $profile_image = null;
        if (!empty($_FILES['profile_image']['name'])) {
            $uploadDir  = __DIR__ . "/../../../public/Image/profile/";
            $fileName   = time() . "_" . basename($_FILES['profile_image']['name']);
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadDir . $fileName)) {
                $profile_image = $fileName;
            }
        }

        $password = $newPassword ?: null;
        $MyProfile->updateProfile($_SESSION['id'], $fullname, $phonenumber, $password, $profile_image);

        // Update session
        $_SESSION['fullname'] = $fullname;
        $customer = $MyProfile->getById($_SESSION['id']); // reload

        $msg     = "Profile updated successfully!";
        $msgType = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body>
    <main>
        <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">
            <!-- Logo -->
            <div class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
                <i class="fas fa-store text-blue-300"></i>
                <span>Online Food Order</span>
            </div>
            <!-- Nav Links -->
            <div class="flex items-center gap-2">
                <a href="home.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-home text-xs"></i>
                    Home
                </a>
                <a href="menu.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fa-solid fa-bowl-food"></i>
                    Food Menu
                </a>
                <a href="cart.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-100 text-white bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-cart-shopping text-xs"></i>
                    Cart
                </a>
                <?php if (isset($_SESSION['id'])): ?>
                <!-- ✅ Logged in: Profile Dropdown -->
                <div class="relative" id="profileWrapper">
                    <button onclick="toggleProfileDropdown()"
                        class="flex items-center gap-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-200">
                        <!-- Initial Circle -->
                        <?php if (!empty($customer['photo_url'])): ?>
                        <img src="../../../public/Image/customerProfile/<?= htmlspecialchars($customer['photo_url']) ?>"
                            class="w-7 h-7 rounded-full object-cover" />
                        <?php else: ?>
                        <span
                            class="w-7 h-7 rounded-full bg-white text-blue-800 font-bold flex items-center justify-center text-xs uppercase">
                            <?= htmlspecialchars(mb_substr($_SESSION['fullname'], 0, 1)) ?>
                        </span>
                        <?php endif; ?>
                        <!-- Name -->
                        <span><?= htmlspecialchars($_SESSION['fullname']) ?></span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdownMenu"
                        class="hidden absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border border-gray-100 z-50">
                        <a href="myProfile.php"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg">
                            <i class="fas fa-user text-blue-600 text-xs"></i>
                            My Profile
                        </a>
                        <hr class="border-gray-100">
                        <a href="logout.php"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                            <i class="fas fa-right-from-bracket text-xs"></i>
                            Logout
                        </a>
                    </div>
                </div>

                <?php else: ?>
                <!-- Not logged in: Sign Up button -->
                <a href="../../../public/user/createCustomer.php"
                    class="flex items-center gap-1.5 text-sm font-medium text-blue-800 bg-white hover:bg-blue-50 px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-user-plus text-xs"></i>
                    Sign Up
                </a>
                <?php endif; ?>
            </div>
        </nav>
        <main>



            <section class="max-w-7xl mx-auto px-6 py-10">
                <?php foreach ($newFoods as $newfood) { ?>
                <h1 class="text-3xl font-bold text-gray-800 mb-8">
                    <i class="fas fa-cart-shopping text-blue-700"></i>
                    My Cart
                </h1>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- LEFT SIDE -->
                    <div class="lg:col-span-2 space-y-6">

                        <!-- CART ITEM -->
                        <div class="bg-white rounded-2xl shadow-md p-5 flex flex-col md:flex-row gap-5">

                            <!-- IMAGE -->
                            <img src="../../../public/Image/food/burger.jpg"
                                class="w-full md:w-40 h-40 object-cover rounded-xl">

                            <!-- DETAILS -->
                            <div class="flex-1">

                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-800">
                                            <?php echo $newfood['food_name_khmer']; ?>
                                        </h2>
                                        <h4 class="text-xl font-bold text-gray-800">
                                            <?php echo $newfood['food_name_english']; ?>
                                        </h4>

                                        <p class="text-gray-500 text-sm mt-1">
                                            <?php echo $newfood['descrip']; ?>
                                        </p>
                                    </div>

                                    <button class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <!-- PRICE -->
                                <div class="mt-4 flex items-center justify-between">

                                    <div>
                                        <span class="text-sm text-gray-500">
                                            Price
                                        </span>

                                        <p id="priceText" class="text-2xl font-bold text-blue-700">
                                            <?php echo $newfood['price']; ?>
                                        </p>
                                    </div>

                                    <!-- QTY -->
                                    <div class="flex items-center gap-3">

                                        <button onclick="decreaseQty()"
                                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-lg font-bold">
                                            -
                                        </button>

                                        <span id="qty" class="text-xl font-bold w-8 text-center">

                                        </span>

                                        <button onclick="increaseQty()"
                                            class="w-10 h-10 rounded-lg bg-blue-700 hover:bg-blue-800 text-white text-lg font-bold">
                                            +
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- RIGHT SIDE -->
                    <div>

                        <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">

                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                Order Summary
                            </h2>

                            <!-- PAYMENT -->
                            <div class="mb-6">

                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Payment Method
                                </label>

                                <select
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                                    <option value="cash">Cash</option>
                                    <option value="card">Credit Card</option>
                                    <option value="aba">ABA Pay</option>
                                    <option value="acleda">ACLEDA</option>

                                </select>
                            </div>

                            <!-- TOTAL -->
                            <div class="space-y-4 border-t pt-4">

                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span id="subtotal">$5</span>
                                </div>

                                <div class="flex justify-between text-gray-600">
                                    <span>Delivery</span>
                                    <span>$2</span>
                                </div>

                                <div class="flex justify-between text-xl font-bold text-gray-800 border-t pt-4">
                                    <span>Total</span>
                                    <span id="total">$7</span>
                                </div>

                            </div>

                            <!-- BUTTON -->
                            <button
                                class="w-full mt-6 bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition duration-200">

                                <i class="fas fa-credit-card mr-2"></i>
                                Checkout

                            </button>

                        </div>

                    </div>

                </div>

            </section>

            <footer>
                <?php include __DIR__ . "/footer.php"; ?>
            </footer>
        </main>
        <script src="../../../public/js/home.js"></script>
</body>

</html>