<?php
session_start();
require_once __DIR__ . "/../../app/Controllers/user/CustomerController.php";
$Customer = new CustomerController($con);
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Input = $_POST['input'] ?? '';
    $Password = $_POST['password'] ?? '';
    $result = $Customer->Login($Input);
    if ($result) {
        $row = $result[0];
        // if($Email === $row['email'] && $Password === $row['password']){
        //     $_SESSION['email'] = $Email;//ចាប់ Email user
        //     header("Location: ../admin/dashboard.php");
        // exit(); Not hashed password
        if (password_verify($Password, $row['password'])) { // ✅ correct way to use with hashes password
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fullname'] = $row['fullname'];
            header("Location: ../../app/Views/user/home.php");
            exit();
        } else {
            $err = "Invalid Email or Password";
        }
    } else {
        $err = "Email or Phone Number not found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login – Khmer Food Delivery</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/CustomerLogin.css">
    <?php
    include __DIR__ . "/../../app/Views/components/cdns.php";
    ?>
</head>

<body>

    <!-- ═══ CARD ═══ -->
    <div class="card">

        <!-- Icon -->
        <div class="icon-wrap">
            <div class="icon-circle">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" y1="12" x2="3" y2="12" />
                </svg>
            </div>
        </div>

        <!-- Heading -->
        <h1 class="card-title">Welcome Back!</h1>
        <p class="card-sub">ចូលប្រើប្រាស់ – Login to your account</p>
        <?php if (!empty($err)): ?>
            <p style="color:red; text-align:center;"><?= htmlspecialchars($err) ?></p>
        <?php endif; ?>

        <form id="loginForm" novalidate method="POST">

            <!-- Email or Phone -->
            <div class="field">
                <label for="input">Email or Phone Number</label>
                <div class="input-wrap" id="wrap-input">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </span>
                    <input type="text" id="input" name="input" placeholder="your@email.com or 012345678" />
                </div>
                <div class="field-error" id="err-input">Please enter your email or phone number.</div>
            </div>

            <!-- Password -->
            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap" id="wrap-password">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </span>
                    <input type="password" id="password" name="password" placeholder="••••••••" />
                    <button type="button" class="toggle-pw" onclick="togglePw()" tabindex="-1">
                        <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
                <div class="field-error" id="err-password">Please enter your password.</div>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn-login" id="loginBtn">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" y1="12" x2="3" y2="12" />
                </svg>
                Login
            </button>

        </form>

        <!-- Register link -->
        <p class="register-link">
            Don't have an account? <a href="createCustomer.php">Register here</a>
        </p>

    </div>

    <!-- Back to Home -->
    <a href="../../test.php" class="back-link">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12" />
            <polyline points="12 19 5 12 12 5" />
        </svg>
        Back to Home
    </a>
    <script src="../js/LoginCustomer.js"></script>
</body>

</html>