<?php
session_start();
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../app/Controllers/user/MyProfileController.php";
require_once __DIR__ . "/../../../app/Controllers/user/CartController.php";
require_once __DIR__ . "/../../../app/Controllers/admin/OrdersController.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

$MyProfile = new MyProfileController($con);
$customer  = $MyProfile->getById($_SESSION['id']);
$CartController = new CartController($con);
$OrdersController = new OrdersController($con);

// Check if customer exists
if (empty($customer)) {
    session_unset();
    session_destroy();
    header("Location: ../../../public/user/loginCustomer.php");
    exit();
}

$msg       = "";
$msgType   = "";

// Handle cart actions (remove, update qty, checkout, add item)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    // If no action specified, treat it as "add to cart" from menu
    if (empty($action) && !empty($_POST['food_id'])) {
        $food_id = $_POST['food_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;
        
        if ($CartController->add($_SESSION['id'], $food_id, $quantity)) {
            $msg = "Item added to cart successfully!";
            $msgType = "success";
        } else {
            $msg = "Failed to add item to cart!";
            $msgType = "error";
        }
    } elseif ($action === 'remove') {
        $cart_id = $_POST['cart_id'] ?? 0;
        if ($CartController->remove($cart_id)) {
            $msg = "Item removed from cart!";
            $msgType = "success";
        } else {
            $msg = "Failed to remove item!";
            $msgType = "error";
        }
    } elseif ($action === 'update_qty') {
        $cart_id = $_POST['cart_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;
        if ($CartController->updateQty($cart_id, $quantity)) {
            $msg = "Quantity updated!";
            $msgType = "success";
        } else {
            $msg = "Failed to update quantity!";
            $msgType = "error";
        }
    } elseif ($action === 'checkout') {
        // Get cart items
        $cartItems = $CartController->show($_SESSION['id']);
        $cartTotal = $CartController->getTotal($_SESSION['id']);
        $paymentMethod = $_POST['payment_method'] ?? 'cash';
        
        // Check if cart is empty
        if (empty($cartItems) || $cartTotal <= 0) {
            $msg = "Your cart is empty!";
            $msgType = "error";
        } else {
            // Create order with cart total (delivery fee is added separately on display)
            $order_id = $OrdersController->create($_SESSION['id'], $cartTotal, $paymentMethod);
            
            if ($order_id) {
                // Add items to order
                foreach ($cartItems as $item) {
                    $OrdersController->addItem($order_id, $item['food_id'], $item['quantity'], $item['price']);
                }
                
                // Clear cart
                $CartController->clear($_SESSION['id']);
                
                // Redirect to order success page
                header("Location: orderSuccess.php?order_id=" . $order_id);
                exit();
            } else {
                $msg = "Failed to create order!";
                $msgType = "error";
            }
        }
    }
}

// Get cart items
$cartItems = $CartController->show($_SESSION['id']);
$cartTotal = $CartController->getTotal($_SESSION['id']);

// Get cart items
$cartItems = $CartController->show($_SESSION['id']);
$cartTotal = $CartController->getTotal($_SESSION['id']);
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
                <h1 class="text-3xl font-bold text-gray-800 mb-8">
                    <i class="fas fa-cart-shopping text-blue-700"></i>
                    My Cart
                </h1>

                <?php if ($msg): ?>
                <div class="mb-4 p-4 rounded-lg <?= $msgType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                    <?= htmlspecialchars($msg) ?>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- LEFT SIDE -->
                    <div class="lg:col-span-2 space-y-6">

                        <?php if (empty($cartItems)): ?>
                        <div class="bg-white rounded-2xl shadow-md p-10 text-center">
                            <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600">Your cart is empty</h3>
                            <a href="menu.php" class="inline-block mt-4 bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg">
                                Continue Shopping
                            </a>
                        </div>
                        <?php else: ?>
                        <?php foreach ($cartItems as $item): ?>
                        <!-- CART ITEM -->
                        <div class="bg-white rounded-2xl shadow-md p-5 flex flex-col md:flex-row gap-5">

                            <!-- IMAGE -->
                            <img src="../../../public/image/newfood/<?= htmlspecialchars($item['photo']) ?>"
                                class="w-full md:w-40 h-40 object-cover rounded-xl"
                                onerror="this.src='../../../public/image/category/default.jpg'">

                            <!-- DETAILS -->
                            <div class="flex-1">

                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-800">
                                            <?= htmlspecialchars($item['food_name_khmer']) ?>
                                        </h2>
                                        <h4 class="text-lg font-semibold text-gray-700">
                                            <?= htmlspecialchars($item['food_name_english']) ?>
                                        </h4>
                                        <p class="text-gray-500 text-sm mt-1">
                                            <?= htmlspecialchars($item['descrip'] ?? '') ?>
                                        </p>
                                    </div>

                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Remove this item?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- PRICE & QTY -->
                                <div class="mt-4 flex items-center justify-between">

                                    <div>
                                        <span class="text-sm text-gray-500">Price</span>
                                        <p class="text-2xl font-bold text-blue-700">
                                            $<?= number_format($item['price'], 2) ?>
                                        </p>
                                    </div>

                                    <!-- QTY -->
                                    <form method="POST" class="flex items-center gap-3">
                                        <input type="hidden" name="action" value="update_qty">
                                        <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                                        
                                        <button type="button" onclick="decreaseQty(this)" class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-lg font-bold">
                                            -
                                        </button>

                                        <input type="number" name="quantity" value="<?= $item['quantity'] ?>" 
                                            class="text-xl font-bold w-8 text-center border border-gray-300 rounded" 
                                            min="1" onchange="this.form.submit()">

                                        <button type="button" onclick="increaseQty(this)" class="w-10 h-10 rounded-lg bg-blue-700 hover:bg-blue-800 text-white text-lg font-bold">
                                            +
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <!-- RIGHT SIDE -->
                    <div>

                        <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">

                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                Order Summary
                            </h2>

                            <!-- PAYMENT FORM -->
                            <form method="POST">
                                <input type="hidden" name="action" value="checkout">

                                <!-- PAYMENT -->
                                <div class="mb-6">

                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Payment Method
                                    </label>

                                    <select name="payment_method" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
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
                                        <span id="subtotal">$<?= number_format($cartTotal, 2) ?></span>
                                    </div>

                                    <div class="flex justify-between text-gray-600">
                                        <span>Delivery</span>
                                        <span>$2.00</span>
                                    </div>

                                    <div class="flex justify-between text-xl font-bold text-gray-800 border-t pt-4">
                                        <span>Total</span>
                                        <span id="total">$<?= number_format($cartTotal + 2, 2) ?></span>
                                    </div>

                                </div>

                                <!-- BUTTON -->
                                <button type="submit" <?= empty($cartItems) ? 'disabled' : '' ?>
                                    class="w-full mt-6 bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition duration-200 <?= empty($cartItems) ? 'opacity-50 cursor-not-allowed' : '' ?>">
                                    <i class="fas fa-credit-card mr-2"></i>
                                    Checkout
                                </button>
                            </form>

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