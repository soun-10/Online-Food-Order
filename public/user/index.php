<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khmer Food Delivery</title>
  <?php
    include __DIR__ . "../../../app/Views/components/cdns.php";
  ?>
  <link rel="stylesheet" href="../css/CustomerHomePage.css">
  <!-- Font Text -->
 <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav>
  <div class="nav-inner">
    <a href="#" class="nav-logo">
      <!-- shop/storefront icon -->
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 9l1-5h16l1 5"/><path d="M3 9h18v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9z"/>
        <path d="M9 9v6"/><path d="M15 9v6"/><path d="M9 15h6"/>
      </svg>
      Khmer Food Delivery
    </a>

    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="hide-mobile">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l1-5h16l1 5"/><path d="M3 9h18v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9z"/></svg>
          Restaurants
        </a>
      </li>
      <li>
        <a href="#" class="hide-mobile">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
          Cart
        </a>
      </li>
      <li>
        <a href="../../app/Views/user/LoginCustomer.php" class="hide-mobile">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
          Login
        </a>
      </li>
      <li>
        <a href="../../app/Views/user/CreateCustomer.php" class="btn-signup-nav">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
          Sign Up
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- ═══ HERO ═══ -->
<section class="hero">

  <!-- LEFT COPY -->
  <div class="hero-left">
    <div class="hero-tag">
      <span>🍜</span> Now delivering in Siem Reap
    </div>

    <h1 class="hero-title">
      Order Your<br/>
      <em>Favorite Food</em><br/>
      Fast &amp; Easy
    </h1>

    <p class="hero-khmer">ភោជន៍ឆ្ងាញ់ ដឹកជញ្ជូនដល់ទ្វារ</p>
    <p class="hero-sub">Delicious food delivered to your door in minutes</p>

    <div class="hero-ctas">
      <a href="../../app/Views/user/CreateCustomer.php" class="btn-secondary">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
        Sign Up
      </a>
    </div>

    <div class="stats-row">
      <div class="stat-item">
        <strong>200+</strong>
        <span>Restaurants</span>
      </div>
      <div class="stat-item">
        <strong>30 min</strong>
        <span>Avg. Delivery</span>
      </div>
      <div class="stat-item">
        <strong>4.8 ★</strong>
        <span>Avg. Rating</span>
      </div>
    </div>
  </div>

  <!-- RIGHT IMAGE -->
  <div class="hero-right">
    <div class="food-img-wrapper">

      <!-- Floating badge – delivery time -->
      <div class="float-badge badge-delivery">
        <div class="badge-icon">🛵</div>
        <div>
          <div class="badge-label">Delivery Time</div>
          <div class="badge-value">25–30 min</div>
        </div>
      </div>

      <!-- Floating badge – rating -->
      <div class="float-badge badge-rating">
        <div class="badge-icon">⭐</div>
        <div>
          <div class="badge-label">Top Rated</div>
          <div class="badge-value">4.9 / 5.0</div>
        </div>
      </div>

      <img
        src="https://img.freepik.com/free-vector/flat-design-cambodian-food-collection_23-2149290428.jpg"
        alt="Cambodian Cuisine spread"
        onerror="this.src='https://placehold.co/500x480/f3eeff/5a2d82?text=Cambodian+Cuisine'"
      />
    </div>
  </div>

</section>

<!-- ═══ FEATURES STRIP ═══ -->
<div class="features-strip">
  <div class="features-inner">
    <div class="feature-item">
      <div class="fi-icon">🛵</div>
      <div>
        <div style="font-weight:700;color:#fff">Fast Delivery</div>
        <div style="font-size:0.8rem;opacity:0.75">Under 30 minutes</div>
      </div>
    </div>
    <div class="feature-item">
      <div class="fi-icon">🍛</div>
      <div>
        <div style="font-weight:700;color:#fff">Authentic Khmer</div>
        <div style="font-size:0.8rem;opacity:0.75">Local &amp; trusted chefs</div>
      </div>
    </div>
    <div class="feature-item">
      <div class="fi-icon">🔒</div>
      <div>
        <div style="font-weight:700;color:#fff">Secure Payment</div>
        <div style="font-size:0.8rem;opacity:0.75">ABA, Wing &amp; Cash</div>
      </div>
    </div>
    <div class="feature-item">
      <div class="fi-icon">📍</div>
      <div>
        <div style="font-weight:700;color:#fff">Live Tracking</div>
        <div style="font-size:0.8rem;opacity:0.75">Know where your food is</div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
