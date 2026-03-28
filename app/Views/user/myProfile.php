<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Profile – Khmer Food Delivery</title>
  <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- NAVBAR -->
  <nav style="background: linear-gradient(to right, #3b1460, #5b2d8e);">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
      <a href="#" class="flex items-center gap-2 text-white font-bold text-lg no-underline">
        <i class="fa-solid fa-store"></i>
        Khmer Food Delivery
      </a>
      <div class="flex items-center gap-6 text-white text-sm font-medium">
        <a href="#" class="flex items-center gap-1.5 text-white hover:text-purple-200 no-underline">
          <i class="fa-solid fa-house text-xs"></i> Home
        </a>
        <a href="#" class="flex items-center gap-1.5 text-white hover:text-purple-200 no-underline">
          <i class="fa-solid fa-store text-xs"></i> Restaurants
        </a>
        <a href="#" class="flex items-center gap-1.5 text-white hover:text-purple-200 no-underline">
          <i class="fa-solid fa-bag-shopping text-xs"></i> My Orders
        </a>
        <a href="#" class="flex items-center gap-1.5 text-white hover:text-purple-200 no-underline">
          <i class="fa-solid fa-cart-shopping text-xs"></i> Cart
        </a>
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-purple-800 font-bold text-sm">P</div>
          <span>Pril Soun</span>
          <i class="fa-solid fa-chevron-down text-xs"></i>
        </div>
      </div>
    </div>
  </nav>

  <!-- PAGE -->
  <div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Title -->
    <div class="flex items-center gap-2 mb-6">
      <i class="fa-regular fa-circle-user text-2xl text-gray-700"></i>
      <h1 class="text-2xl font-bold text-gray-800 m-0">My Profile</h1>
    </div>

    <div class="flex gap-5 items-start">

      <!-- Main Card -->
      <div class="flex-1 bg-white rounded-xl p-6 shadow-sm">
        <form action="#" method="POST" enctype="multipart/form-data">

          <!-- Row 1: Full Name + Email -->
          <div class="grid grid-cols-2 gap-5 mb-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
              <input type="text" name="fullname" value="Pril Soun"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:border-purple-500" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input type="email" name="email" value="sounprill68@gmail.com" readonly
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-400 bg-gray-100 cursor-not-allowed focus:outline-none" />
            </div>
          </div>

          <!-- Row 2: Phone + Profile Image -->
          <div class="grid grid-cols-2 gap-5 mb-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
              <input type="text" name="phonenumber" value="090535593"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:border-purple-500" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
              <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                <label for="profile_image"
                  class="px-4 py-2 bg-gray-50 border-r border-gray-300 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 whitespace-nowrap">
                  Choose File
                </label>
                <span class="px-3 py-2 text-sm text-gray-400" id="file-name">No file chosen</span>
                <input id="profile_image" type="file" name="profile_image" accept="image/*" class="hidden"
                  onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen'" />
              </div>
              <div class="mt-1 text-xs text-gray-400">
                <img src="" alt="Profile" />
              </div>
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

          <!-- Submit Button -->
          <button type="submit"
            class="inline-flex items-center gap-2 text-white text-sm font-semibold px-5 py-2.5 rounded-lg hover:opacity-90 transition-opacity"
            style="background-color: #4c2473;">
            <i class="fa-solid fa-circle-check"></i> Update Profile
          </button>

        </form>
      </div>

      <!-- Sidebar -->
      <div class="w-56 bg-white rounded-xl p-5 shadow-sm shrink-0">
        <p class="text-sm font-bold text-gray-800 mb-0.5">Member since:</p>
        <p class="text-sm text-gray-600 mb-4">March 13, 2026</p>

        <p class="text-sm font-bold text-gray-800 mb-2">Account status:</p>
        <span class="inline-block bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded-md">Active</span>
      </div>

    </div>
  </div>

</body>
</html>