<?php
    require_once __DIR__ . "../../../Controllers/user/CustomerController.php";
    $Customer = new CustomerController($con);
    $msg = "";
    if(isset($_POST["fullname"])){
        $fullname         = $_POST['fullname'];
        $email            = $_POST['email'];
        $phonenumber      = $_POST['phone'];
        $password         = $_POST['password'];
        $confirm_password = $_POST['confirmPw'];
        if($confirm_password === $password){
            $Customer->Create($fullname, $email, $phonenumber, $password);
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            $msg = "Please input confirm password again";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Account – Khmer Food Delivery</title>
  <?php include __DIR__ . "../../components/cdns.php"; ?>
  <link rel="stylesheet" href="../../../public/css/CustomerSignup.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body>

  <div class="card">

    <div class="icon-wrap">
      <div class="icon-circle">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm3.6 1.2H8.4C6 13.2 4.8 14.7 4.8 16.8v1.2h14.4v-1.2c0-2.1-1.2-3.6-3.6-3.6z"/>
          <line x1="19" y1="5" x2="19" y2="11" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
          <line x1="16" y1="8" x2="22" y2="8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
        </svg>
      </div>
    </div>

    <h1 class="card-title">Create Account</h1>
    <p class="card-sub">បង្កើតគណនី – <span>Join us today!</span></p>

    <?php if($msg): ?>
      <p style="color:red; text-align:center;"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>

    <form id="signupForm" novalidate method="post">

      <!-- Full Name -->
      <div class="field">
        <label>Full Name <span class="req">*</span></label>
        <div class="input-wrap" id="wrap-name">
          <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </span>
          <input type="text" id="fullName" name="fullname" placeholder="John Doe" autocomplete="name"/>
        </div>
        <div class="field-error" id="err-name">Please enter your full name.</div>
      </div>

      <!-- Email -->
      <div class="field">
        <label>Email Address <span class="req">*</span></label>
        <div class="input-wrap" id="wrap-email">
          <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 7L2 7"/></svg>
          </span>
          <input type="email" id="email" name="email" placeholder="john@example.com" autocomplete="email"/>
        </div>
        <div class="field-error" id="err-email">Please enter a valid email address.</div>
      </div>

      <!-- Phone -->
      <div class="field">
        <label>Phone Number <span class="req">*</span></label>
        <div class="input-wrap" id="wrap-phone">
          <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12" y2="18"/></svg>
          </span>
          <input type="tel" id="phone" name="phone" placeholder="012345678" autocomplete="tel"/>
        </div>
        <div class="field-hint">Format: 012345678 or 0123456789</div>
        <div class="field-error" id="err-phone">Enter a valid Cambodian phone number.</div>
      </div>

      <!-- Password -->
      <div class="field">
        <label>Password <span class="req">*</span></label>
        <div class="input-wrap" id="wrap-password">
          <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </span>
          <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="new-password"/>
          <button type="button" class="toggle-pw" onclick="togglePw('password', this)" tabindex="-1">
            <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <div class="field-hint">Minimum 6 characters</div>
        <div class="field-error" id="err-password">Password must be at least 6 characters.</div>
      </div>

      <!-- Confirm Password -->
      <div class="field">
        <label>Confirm Password <span class="req">*</span></label>
        <div class="input-wrap" id="wrap-confirm">
          <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </span>
          <input type="password" id="confirmPw" name="confirmPw" placeholder="••••••••" autocomplete="new-password"/>
          <button type="button" class="toggle-pw" onclick="togglePw('confirmPw', this)" tabindex="-1">
            <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <div class="field-error" id="err-confirm">Passwords do not match.</div>
      </div>

      <button type="submit" class="btn-create">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
        Create Account
      </button>

    </form>

    <p class="login-link">Already have an account? <a href="LoginCustomer.php">Login here</a></p>
  </div>

  <a href="../../../public/Customer/index.php" class="back-link">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    Back to Home
  </a>

<script src="../../../public/js/CreateCustomer.js"></script>
</body>
</html>