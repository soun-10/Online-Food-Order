<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>'
  <?php include __DIR__. "/../components/cdns.php"; ?>
</head>
<body class="bg-gray-100 flex min-h-screen font-sans">
  <main class="">
    <nav class="flex-1 px-2 py-4 space-y-1">
      <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 font-semibold">
          <i class="fas fa-gauge-high w-5 text-center"></i> Dashboard
      </a>
      <a href="categories.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
          <i class="fas fa-tag w-5 text-center"></i> Categories
      </a>
      <a href="orders.php" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 transition">
          <i class="fas fa-cart-shopping w-5 text-center"></i> Orders
          <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">8</span>
      </a>
      <a href="customers.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
          <i class="fas fa-users w-5 text-center"></i> Customers
      </a>
      <a href="drivers.php"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
          <i class="fas fa-person-biking w-5 text-center"></i> Drivers
      </a>
      <a href="reports.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
          <i class="fas fa-chart-line w-5 text-center"></i> Reports
        </a>
      <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
          <i class="fas fa-gear w-5 text-center"></i> Settings
      </a>
    </nav>
  </main>
</body>
</html>