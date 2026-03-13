<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Delivery - Admin Panel</title>
    <?php __DIR__. "/components/cdns.php" ?>
  </head>
  <body class="bg-gray-100 flex min-h-screen font-sans">
    <!-- Sidebar -->
    <aside
      class="w-64 bg-blue-700 text-white flex flex-col fixed top-0 left-0 h-full z-10"
    >
      <div class="py-6 px-4 text-center border-b border-blue-600">
        <div class="text-2xl font-bold">
          <i class="fas fa-store mr-2"></i>Food Delivery
        </div>
        <div class="text-sm text-blue-200 mt-1">Admin Panel</div>
      </div>
      <nav class="flex-1 px-2 py-4 space-y-1">
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 font-semibold"
        >
          <i class="fas fa-gauge-high w-5 text-center"></i> Dashboard
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-utensils w-5 text-center"></i> Restaurants
          <span
            class="ml-auto bg-blue-400 text-white text-xs font-bold px-2 py-0.5 rounded-full"
            >2</span
          >
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-tag w-5 text-center"></i> Categories
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-cart-shopping w-5 text-center"></i> Orders
          <span
            class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full"
            >8</span
          >
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-users w-5 text-center"></i> Customers
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-person-biking w-5 text-center"></i> Drivers
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-chart-line w-5 text-center"></i> Reports
        </a>
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          <i class="fas fa-gear w-5 text-center"></i> Settings
        </a>
      </nav>
      <div class="px-2 py-4 border-t border-blue-600">
        <a
          href="#"
          class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-blue-600 transition"
        >
          <i class="fas fa-right-from-bracket w-5 text-center"></i> Logout
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 flex flex-col">
      <!-- Topbar -->
      <header
        class="bg-white shadow px-8 py-4 flex justify-end items-center gap-3"
      >
        <span class="text-gray-600">Welcome, <strong>Admin</strong></span>
        <i class="fas fa-circle-user text-2xl text-gray-500"></i>
        <i class="fas fa-caret-down text-gray-500"></i>
      </header>

      <div class="p-8 space-y-6">
        <!-- Stat Cards -->
        <div class="grid grid-cols-4 gap-5">
          <div
            class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-blue-500"
          >
            <div>
              <div
                class="text-xs text-blue-500 font-semibold uppercase tracking-wide"
              >
                Total Orders
              </div>
              <div class="text-3xl font-bold mt-1">44</div>
            </div>
            <i class="fas fa-cart-shopping text-4xl text-gray-300"></i>
          </div>
          <div
            class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-green-500"
          >
            <div>
              <div
                class="text-xs text-green-500 font-semibold uppercase tracking-wide"
              >
                Total Revenue
              </div>
              <div class="text-3xl font-bold mt-1">$146.00</div>
            </div>
            <i class="fas fa-dollar-sign text-4xl text-gray-300"></i>
          </div>
          <div
            class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-cyan-500"
          >
            <div>
              <div
                class="text-xs text-cyan-500 font-semibold uppercase tracking-wide"
              >
                Restaurants
              </div>
              <div class="text-3xl font-bold mt-1">8</div>
            </div>
            <i class="fas fa-store text-4xl text-gray-300"></i>
          </div>
          <div
            class="bg-white rounded-xl shadow p-5 flex items-center justify-between border-l-4 border-yellow-500"
          >
            <div>
              <div
                class="text-xs text-yellow-500 font-semibold uppercase tracking-wide"
              >
                Pending Orders
              </div>
              <div class="text-3xl font-bold mt-1">8</div>
            </div>
            <i class="fas fa-clock text-4xl text-gray-300"></i>
          </div>
        </div>

        <!-- Revenue / Customers / Drivers -->
        <div class="grid grid-cols-3 gap-5">
          <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="bg-blue-500 text-white px-5 py-3 font-semibold text-sm">
              <i class="fas fa-calendar-day mr-2"></i>Today's Revenue
            </div>
            <div
              class="px-5 py-8 text-center text-green-500 text-4xl font-bold"
            >
              $0.00
            </div>
          </div>
          <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="bg-cyan-400 text-white px-5 py-3 font-semibold text-sm">
              <i class="fas fa-users mr-2"></i>Total Customers
            </div>
            <div class="px-5 py-8 text-center text-cyan-500 text-4xl font-bold">
              8
            </div>
          </div>
          <div class="bg-white rounded-xl shadow overflow-hidden">
            <div
              class="bg-green-700 text-white px-5 py-3 font-semibold text-sm"
            >
              <i class="fas fa-truck mr-2"></i>Total Drivers
            </div>
            <div
              class="px-5 py-8 text-center text-green-700 text-4xl font-bold"
            >
              2
            </div>
          </div>
        </div>

        <!-- Recent Orders -->
        <!-- <div class="bg-white rounded-xl shadow">
          <div class="flex items-center justify-between px-6 py-4 border-b">
            <h2 class="text-blue-500 font-semibold text-lg">
              <i class="fas fa-clock mr-2"></i>Recent Orders
            </h2>
            <button
              class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition"
            >
              View All
            </button>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
              <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                  <th class="px-6 py-3">Order #</th>
                  <th class="px-6 py-3">Customer</th>
                  <th class="px-6 py-3">Restaurant</th>
                  <th class="px-6 py-3">Amount</th>
                  <th class="px-6 py-3">Status</th>
                  <th class="px-6 py-3">Date</th>
                  <th class="px-6 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-bold">ORD202602043078</td>
                  <td class="px-6 py-4">dsds</td>
                  <td class="px-6 py-4">Chanrey Tree</td>
                  <td class="px-6 py-4">$38.40</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-yellow-400 text-white text-xs font-semibold px-3 py-1 rounded-full"
                      >Pending</span
                    >
                  </td>
                  <td class="px-6 py-4 text-gray-500">Feb 04, 2026 08:14</td>
                  <td class="px-6 py-4">
                    <button
                      class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1.5 rounded-lg transition"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-bold">ORD202602017001</td>
                  <td class="px-6 py-4">kaovannak</td>
                  <td class="px-6 py-4">Test</td>
                  <td class="px-6 py-4">$18.00</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full"
                      >Delivered</span
                    >
                  </td>
                  <td class="px-6 py-4 text-gray-500">Feb 01, 2026 02:13</td>
                  <td class="px-6 py-4">
                    <button
                      class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1.5 rounded-lg transition"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-bold">ORD202602012451</td>
                  <td class="px-6 py-4">kaovannak</td>
                  <td class="px-6 py-4">Romdeng Restaurant</td>
                  <td class="px-6 py-4">$13.50</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-yellow-400 text-white text-xs font-semibold px-3 py-1 rounded-full"
                      >Pending</span
                    >
                  </td>
                  <td class="px-6 py-4 text-gray-500">Feb 01, 2026 02:04</td>
                  <td class="px-6 py-4">
                    <button
                      class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1.5 rounded-lg transition"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-bold">ORD202602016098</td>
                  <td class="px-6 py-4">kaovannak</td>
                  <td class="px-6 py-4">Romdeng Restaurant</td>
                  <td class="px-6 py-4">$13.50</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-yellow-400 text-white text-xs font-semibold px-3 py-1 rounded-full"
                      >Pending</span
                    >
                  </td>
                  <td class="px-6 py-4 text-gray-500">Feb 01, 2026 01:55</td>
                  <td class="px-6 py-4">
                    <button
                      class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1.5 rounded-lg transition"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-bold">ORD202602019540</td>
                  <td class="px-6 py-4">kaovannak</td>
                  <td class="px-6 py-4">Romdeng Restaurant</td>
                  <td class="px-6 py-4">$13.50</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-yellow-400 text-white text-xs font-semibold px-3 py-1 rounded-full"
                      >Pending</span
                    >
                  </td>
                  <td class="px-6 py-4 text-gray-500">Feb 01, 2026 01:48</td>
                  <td class="px-6 py-4">
                    <button
                      class="bg-cyan-500 hover:bg-cyan-600 text-white px-3 py-1.5 rounded-lg transition"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->
      </div>
    </main>
  </body>
</html>
