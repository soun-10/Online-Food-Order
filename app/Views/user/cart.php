<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/user/MyProfileController.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

$MyProfile = new MyProfileController($con);
$customer  = $MyProfile->getById($_SESSION['id']);
$msg       = "";
$msgType   = "";

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
        <footer>
            <?php include __DIR__ . "/footer.php"; ?>
        </footer>
    </main>
    <script src="../../../public/js/home.js"></script>
</body>

</html>