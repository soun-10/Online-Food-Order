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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname    = $_POST['fullname']         ?? '';
  $phonenumber = $_POST['phonenumber']      ?? '';
  $newPassword = $_POST['new_password']     ?? '';
  $confirmPw   = $_POST['confirm_password'] ?? '';

  if ($newPassword && $newPassword !== $confirmPw) {
    $msg     = "Password and Confirm Password do not match!";
    $msgType = "error";
  } else {
    $photo_url = null;
    if (!empty($_FILES['photo_url']['name'])) {
      $uploadDir = __DIR__ . "/../../../public/Image/customerProfile/";
      $fileName  = time() . "_" . basename($_FILES['photo_url']['name']);
      if (move_uploaded_file($_FILES['photo_url']['tmp_name'], $uploadDir . $fileName)) {

        // ✅ លុបរូបចាស់ចោល ប្រសិន មានរូបចាស់
        if (!empty($customer['photo_url'])) {
          $oldFile = $uploadDir . $customer['photo_url'];
          if (file_exists($oldFile)) {
            unlink($oldFile); // លុប file ចាស់
          }
        }

        $photo_url = $fileName;
      }
    }

    $password = $newPassword ?: null;
    $MyProfile->updateProfile($_SESSION['id'], $fullname, $phonenumber, $password, $photo_url);

    $_SESSION['fullname'] = $fullname;
    $customer = $MyProfile->getById($_SESSION['id']);

    $msg     = "Profile updated successfully!";
    $msgType = "success";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Profile – Khmer Food Delivery</title>
  <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body class="bg-gray-100 min-h-screen">
  <main>
    <nav class="bg-blue-800 px-8 py-4 flex items-center justify-between sticky top-0 z-50 shadow-lg">
      <!-- Logo -->
      <div class="flex items-center gap-2 text-white font-bold text-xl tracking-wide">
        <i class="fas fa-store text-blue-300"></i>
        <span>Online Food Order</span>
      </div>
      <!-- Nav Links -->
      <div class="flex items-center gap-2">
        <a href="home.php" class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
          <i class="fas fa-home text-xs"></i>
          Home
        </a>
        <a href="menu.php" class="flex items-center gap-1.5 text-sm font-medium text-white hover:bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">
          <i class="fa-solid fa-bowl-food"></i>
          Food Menu
        </a>
        <a href="cart.php"
          class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
          <i class="fas fa-cart-shopping text-xs"></i>
          Cart
        </a>

        <?php if (isset($_SESSION['id'])): ?>
          <div class="relative" id="profileWrapper">
            <button onclick="toggleProfileDropdown()"
              class="flex items-center gap-2 text-sm font-medium text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-200">
              <?php if (!empty($customer['photo_url'])): ?>
                <img src="../../../public/Image/customerProfile/<?= htmlspecialchars($customer['photo_url']) ?>"
                  class="w-7 h-7 rounded-full object-cover" />
              <?php else: ?>
                <span class="w-7 h-7 rounded-full bg-white text-blue-800 font-bold flex items-center justify-center text-xs uppercase">
                  <?= htmlspecialchars(mb_substr($_SESSION['fullname'], 0, 1)) ?>
                </span>
              <?php endif; ?>
              <span><?= htmlspecialchars($_SESSION['fullname']) ?></span>
              <i class="fas fa-chevron-down text-xs"></i>
            </button>
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
          <a href="loginCustomer.php"
            class="flex items-center gap-1.5 text-sm font-medium text-blue-100 hover:text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition duration-200">
            <i class="fas fa-right-to-bracket text-xs"></i>
            Login
          </a>
          <a href="../../../public/user/createCustomer.php"
            class="flex items-center gap-1.5 text-sm font-medium text-blue-800 bg-white hover:bg-blue-50 px-4 py-2 rounded-lg transition duration-200">
            <i class="fas fa-user-plus text-xs"></i>
            Sign Up
          </a>
        <?php endif; ?>
      </div>
    </nav>

    <!-- PAGE -->
    <div class="max-w-7xl mx-auto px-6 py-8">

      <!-- Title -->
      <div class="flex items-center gap-2 mb-6">
        <i class="fa-regular fa-circle-user text-2xl text-gray-700"></i>
        <h1 class="text-2xl font-bold text-gray-800 m-0">My Profile</h1>
      </div>

      <!-- Message -->
      <?php if ($msg): ?>
        <div class="mb-4 px-4 py-3 rounded-lg text-sm font-medium
                    <?= $msgType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
          <?= htmlspecialchars($msg) ?>
        </div>
      <?php endif; ?>

      <div class="flex gap-5 items-start">

        <!-- Main Card -->
        <div class="flex-1 bg-white rounded-xl p-6 shadow-sm">
          <form action="myProfile.php" method="POST" enctype="multipart/form-data">

            <!-- Row 1: Full Name + Email -->
            <div class="grid grid-cols-2 gap-5 mb-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                <input type="text" name="fullname"
                  value="<?= htmlspecialchars($customer['fullname'] ?? '') ?>"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:border-purple-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email"
                  value="<?= htmlspecialchars($customer['email'] ?? '') ?>" readonly
                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-400 bg-gray-100 cursor-not-allowed focus:outline-none" />
              </div>
            </div>

            <!-- Row 2: Phone + Profile Image -->
            <div class="grid grid-cols-2 gap-5 mb-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                <input type="text" name="phonenumber"
                  value="<?= htmlspecialchars($customer['phonenumber'] ?? '') ?>"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:border-purple-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                  <label for="photo_url"
                    class="px-4 py-2 bg-gray-50 border-r border-gray-300 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 whitespace-nowrap">
                    Choose File
                  </label>
                  <span class="px-3 py-2 text-sm text-gray-400" id="file-name">No file chosen</span>
                  <input id="photo_url" type="file" name="photo_url" accept="image/*" class="hidden"
                    onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen'" />
                </div>
                <!-- Current photo -->
                <?php if (!empty($customer['photo_url'])): ?>
                  <div class="mt-2">
                    <img src="../../../public/Image/customerProfile/<?= htmlspecialchars($customer['photo_url'] ?? '') ?>"
                      class="w-12 h-12 rounded-full object-cover border border-gray-200" />
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Row 3: Passwords -->
            <div class="grid grid-cols-2 gap-5 mb-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">New Password (leave blank to keep)</label>
                <input type="password" name="new_password"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-purple-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="confirm_password"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-purple-500" />
              </div>
            </div>

            <!-- Submit -->
            <button type="submit"
              class="inline-flex items-center gap-2 text-white text-sm font-semibold px-5 py-2.5 rounded-lg hover:opacity-90 transition-opacity"
              style="background-color: #4c2473;">
              <i class="fa-solid fa-circle-check"></i> Update Profile
            </button>

          </form>
        </div>

        <!-- Sidebar -->
        <div class="w-56 bg-white rounded-xl p-5 shadow-sm shrink-0">
          <!-- Avatar -->
          <div class="flex justify-center mb-4">
            <?php if (!empty($customer['photo_url'])): ?>
              <img src="../../../public/Image/customerProfile/<?= htmlspecialchars($customer['photo_url'] ?? '') ?>"
                class="w-20 h-20 rounded-full object-cover border-2 border-gray-200" />
            <?php else: ?>
              <div class="w-20 h-20 rounded-full bg-blue-700 flex items-center justify-center text-white font-bold text-2xl uppercase">
                <?= mb_substr($customer['fullname'] ?? '?', 0, 1) ?>
              </div>
            <?php endif; ?>
          </div>
          <p class="text-sm font-bold text-gray-800 mb-0.5">Member since:</p>
          <p class="text-sm text-gray-600 mb-4">
            <?= date("F d, Y", strtotime($customer['created_at'])) ?>
          </p>
          <p class="text-sm font-bold text-gray-800 mb-2">Account status:</p>
          <span class="inline-block bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded-md">Active</span>
        </div>

      </div>
    </div>
  </main>

  <script src="../../../public/js/myProfile.js"></script>
</body>

</html>