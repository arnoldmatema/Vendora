<?php
include 'config/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Vendora</title>
        <link rel="stylesheet" href="style.css" />
        <script src="https://kit.fontawesome.com/0b6bbeb682.js" crossorigin="anonymous"></script>
    </head>

    <body>

<section class="header">
<!-- start selling today topbar -->
  <div class="startsellingheader">
    <i class="fa-regular fa-truck" style="color: rgb(255, 255, 255);"></i> List your first item FREE — No fees, no hassle.
    <span class="announcement-link">Start selling today →</span>
  </div>
<!-- navigation bar -->
  <nav class="navbar">
    <div class="topnavebar">

      <div href="index.php" class="logo">
        <div class="vendoraimg">
            <img src="img/vendora2.png" alt="Vendora Logo" class="logo-img" width="80%" height="80%">
        </div>
    
    </div>

      <div class="searchbar">
        <select class="allcats">
          <option>All Categories</option>
          <option>Vehicles</option>
          <option>Property</option>
          <option>Electronics</option>
          <option>Home &amp; Garden</option>
          <option>Fashion</option>
          <option>Sports</option>
          <option>Services</option>
          <option>Hobbies</option>
          <option>Food &amp; Agri</option>
        </select>
        <input class="search-input" type="text" placeholder="Search for anything..." id="searchInput" />
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass" style="color: rgb(255, 255, 255);"></i></button>
      </div>

      <div class="navicons">
        <button class="navlogos"
onclick="window.location.href='<?php
if(isset($_SESSION['user_id'])){
    echo "profile.php";
} else {
    echo "loginpage.php";
}
?>'">

<span class="icon">
<i class="fa-regular fa-user"></i>
</span>

<span class="label">

<?php
if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
} else {
    echo "Sign In";
}
?>

</span>

      
</button>
<!-- NOTIFICATION BELL -->
 
<div class="notif-wrap">
          <button class="navlogos" onclick="toggleNotifPanel(event)">
            <span class="icon"><i class="fa-regular fa-bell"></i></span>
            <span class="label">Offers</span>
            
          </button>

          <!-- DROPDOWN PANEL -->
          <div class="notif-panel" id="notifPanel">
            <div class="notif-panel-header">
              <span>Notifications</span>
              <span class="notif-panel-count" id="notifPanelCount">3 pending</span>
            </div>

            <div class="notif-panel-tabs">
              <button class="notif-panel-tab active" onclick="filterPanelTab('all', this)">All</button>
              <button class="notif-panel-tab" onclick="filterPanelTab('pending', this)">Pending</button>
              <button class="notif-panel-tab" onclick="filterPanelTab('approved', this)">Approved</button>
              <button class="notif-panel-tab" onclick="filterPanelTab('declined', this)">Declined</button>
            </div>

            <div class="notif-panel-list" id="notifPanelList">

              <div class="notif-item" data-status="pending">
                <div class="notif-item-icon pending"><i class="fa-regular fa-paper-plane"></i></div>
                <div class="notif-item-body">
                  <div class="notif-item-top">
                    <span class="notif-item-title">Offer sent — awaiting response</span>
                    <span class="notif-item-time">2h ago</span>
                  </div>
                  <p class="notif-item-text">You offered R3,200 for Samsung 65" Smart TV.</p>
                  <span class="notif-item-badge pending"><i class="fa-regular fa-clock"></i> Pending</span>
                </div>
              </div>

              <div class="notif-item" data-status="pending">
                <div class="notif-item-icon pending"><i class="fa-regular fa-envelope"></i></div>
                <div class="notif-item-body">
                  <div class="notif-item-top">
                    <span class="notif-item-title">New offer received</span>
                    <span class="notif-item-time">5h ago</span>
                  </div>
                  <p class="notif-item-text">Naledi K. offered R1,500 for Office Chair.</p>
                  <span class="notif-item-badge pending"><i class="fa-regular fa-clock"></i> Pending your response</span>
                  <div class="notif-item-actions">
                    <button class="btn-mini-approve" onclick="respondPanelOffer(this, 'approved')">✓ Approve</button>
                    <button class="btn-mini-decline" onclick="respondPanelOffer(this, 'declined')">✕ Decline</button>
                  </div>
                </div>
              </div>

              <div class="notif-item" data-status="pending">
                <div class="notif-item-icon pending"><i class="fa-regular fa-envelope"></i></div>
                <div class="notif-item-body">
                  <div class="notif-item-top">
                    <span class="notif-item-title">New offer received</span>
                    <span class="notif-item-time">1d ago</span>
                  </div>
                  <p class="notif-item-text">Bongani Z. offered R2,800 for PS5 Console.</p>
                  <span class="notif-item-badge pending"><i class="fa-regular fa-clock"></i> Pending your response</span>
                  <div class="notif-item-actions">
                    <button class="btn-mini-approve" onclick="respondPanelOffer(this, 'approved')">✓ Approve</button>
                    <button class="btn-mini-decline" onclick="respondPanelOffer(this, 'declined')">✕ Decline</button>
                  </div>
                </div>
              </div>

              <div class="notif-item" data-status="approved">
                <div class="notif-item-icon approved">✅</div>
                <div class="notif-item-body">
                  <div class="notif-item-top">
                    <span class="notif-item-title">Offer approved!</span>
                    <span class="notif-item-time">1d ago</span>
                  </div>
                  <p class="notif-item-text">Zanele D. accepted your offer of R5,000 for MacBook Air 2020.</p>
                  <span class="notif-item-badge approved"> Approved</span>
                  <span class="notif-item-badge approved"> Contact seller</span>
                </div>
              </div>

              <div class="notif-item" data-status="declined">
                <div class="notif-item-icon declined"><i class="fa-regular fa-circle-xmark"></i></div>
                <div class="notif-item-body">
                  <div class="notif-item-top">
                    <span class="notif-item-title">Offer declined</span>
                    <span class="notif-item-time">2d ago</span>
                  </div>
                  <p class="notif-item-text">Sipho N. declined your offer of R150,000 for 2018 Ford Ranger.</p>
                  <span class="notif-item-badge declined"> Declined</span>
                </div>
              </div>

            </div>

            <a href="notifications.html" class="notif-panel-footer">View all notifications →</a>
          </div>
        </div>
        
        
        
        <button class="sellbutton"
onclick="window.location.href='sellindex.php'">
  + Sell Item
</button>
      </div>

    </div>

    

    <!-- bottomnav -->
    <div class="subnav">
      <div class="bottomnav">
        <button class="subnav-browse-btn">☰ Browse Categories</button>
        <a href="#" class="navoptions active">Home</a>
        <a href="#" class="navoptions">Deals <i class="fa-solid fa-fire-flame-curved" style="color: rgb(255, 175, 46);"></i></a>
        <a href="#" class="navoptions">New Arrivals</a>
        <a href="#" class="navoptions">Popular</a>
        <a href="#" class="navoptions">Vehicles</a>
        <a href="#" class="navoptions">Property</a>
        <a href="#" class="navoptions">Services</a>
      </div>
    </div>
  </nav>
          </section>
            <!-- HERO -->
  <section class="hero">
    <div class="hero-inner">

      <div class="hero-content">
        
        <h1 class="hero-title">Buy. Sell.<br /><span>Discover more.</span></h1>
        <p class="hero-subtitle">
          The marketplace for new &amp; used items from trusted sellers in your
          community — built for informal traders and township vendors.
        </p>
        <div class="hero-ctas">
          <button class="btn-hero-primary" onclick="document.getElementById('listings').scrollIntoView({behavior:'smooth'})"> Shop Now</button>
          <button class="btn-hero-outline" onclick="window.location.href='sellindex.php'"> Sell an Item</button>
        </div>
        <div class="trust-badges">
          <div class="trust-badge">
            <span class="trust-badge-icon"><i class="fa-solid fa-list" style="color: rgb(255, 255, 255);"></i></span>
            <div>
              <div class="trust-badge-title">Free to list</div>
              <div class="trust-badge-desc">List your item in minutes</div>
            </div>
          </div>
          <div class="trust-badge">
            <span class="trust-badge-icon"><i class="fa-solid fa-shield" style="color: rgb(255, 255, 255);"></i></span>
            <div>
              <div class="trust-badge-title">Safe &amp; secure</div>
              <div class="trust-badge-desc">Your safety is our priority</div>
            </div>
          </div>
          <div class="trust-badge">
            <span class="trust-badge-icon"><i class="fa-solid fa-location-dot" style="color: rgb(255, 246, 246);"></i></span>
            <div>
              <div class="trust-badge-title">Local deals</div>
              <div class="trust-badge-desc">Find items near you</div>
            </div>
          </div>
        </div>
      </div>

<div class="hero-cards">
  <div class="hero-cards-grid">

    <?php
    include 'config/db.php';

    $query = mysqli_query($conn, "SELECT * FROM products LIMIT 4");

    while($product = mysqli_fetch_assoc($query)) {
    ?>

      <div class="hero-card">

        <div class="image_container">
          <img 
            src="img/<?= $product['image']; ?>" 
            alt="<?= $product['title']; ?>" 
            class="hero-card-img"
          >
        </div>

        <div class="hero-card-price">
          R<?= $product['price']; ?>
        </div>

        <div class="hero-card-title">
          <?= $product['title']; ?>
        </div>

        <div class="hero-card-city">
          <?= $product['location']; ?>
        </div>

      </div>

    <?php } ?>

  </div>
</div>
  </section>
<!-- BROWSE BY CATEGORY -->
  <section class="section">
    <div class="section-header">
      <h2 class="section-title">Browse by Category</h2>
      <a href="#" class="section-link">View all categories →</a>
    </div>
    <div class="category-strip">
      <button class="category-chip active" onclick="filterCategory(this, 'all')">
        <span class="category-chip-icon"><i class="fa-solid fa-tag" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">All</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'vehicles')">
        <span class="category-chip-icon"><i class="fa-solid fa-car" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Vehicles</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'property')">
        <span class="category-chip-icon"><i class="fa-solid fa-house" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Property</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'electronics')">
        <span class="category-chip-icon"><i class="fa-solid fa-mobile-screen-button" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Electronics</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'home')">
        <span class="category-chip-icon"><i class="fa-solid fa-seedling" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Home &amp; Garden</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'fashion')">
        <span class="category-chip-icon"><i class="fa-solid fa-shirt" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Fashion</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'sports')">
        <span class="category-chip-icon"><i class="fa-solid fa-football" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Sports</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'services')">
        <span class="category-chip-icon"><i class="fa-solid fa-screwdriver-wrench" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Services</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'hobbies')">
        <span class="category-chip-icon"><i class="fa-solid fa-gamepad" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Hobbies</span>
      </button>
      <button class="category-chip" onclick="filterCategory(this, 'food')">
        <span class="category-chip-icon"><i class="fa-solid fa-apple-whole" style="color: rgb(0, 0, 0);"></i></span>
        <span class="category-chip-label">Food &amp; Agri</span>
      </button>
    </div>
  </section>

  <!-- RECOMMENDED LISTINGS -->
  <section class="section" id="listings">
    <div class="section-header">
      <h2 class="section-title" id="listingsTitle">Recommended for you</h2>
      <a href="#" class="section-link">See all →</a>
    </div>
    <div class="listings-grid" id="listingsGrid">

      <?php
include 'config/db.php';

$query = mysqli_query($conn, "SELECT * FROM products ORDER BY created_at DESC");

while($product = mysqli_fetch_assoc($query)) {
?>

<a href="productpage.php?id=<?= $product['id']; ?>" class="product-link">

<div class="listing-card">

    <div class="listing-card-image">

        <img 
            src="img/<?= $product['image']; ?>" 
            alt="<?= $product['title']; ?>" 
            class="hero-card-img"
        >

        <button class="listing-card-like">
            <i class="fa-regular fa-heart" style="color: rgb(0, 0, 0);"></i>
        </button>

    </div>

    <div class="listing-card-body">

        <div class="listing-card-price">
            R<?= $product['price']; ?>
        </div>

        <div class="listing-card-title">
            <?= $product['title']; ?>
        </div>

        <div class="listing-card-meta">
            <span>
                <i class="fa-solid fa-map-pin" style="color: rgb(0, 0, 0);"></i> <?= $product['location']; ?>
            </span>

            <span class="listing-card-time">
                New
            </span>
        </div>

    </div>

</div>
</a>

<?php } ?>
    </div>
    <div class="empty-state" id="emptyState" style="display:none">
      <div class="empty-state-icon"><i class="fa-solid fa-magnifying-glass" style="color: rgb(0, 0, 0);"></i></div>
      <div class="empty-state-title">No results found</div>
      <p>Try a different search or category</p>
    </div>
  </section>

<!-- FEATURE BANNERS -->
  <section class="section">
    <div class="feature-banners">
      <div class="feature-banner feature-banner-yellow">
        <span class="feature-banner-icon"><i class="fa-solid fa-list" style="color: rgb(0, 0, 0);"></i></span>
        <h3 class="feature-banner-title">Sell in minutes</h3>
        <p class="feature-banner-desc">List your item for free and reach thousands of buyers across South Africa.</p>
        <button class="btn-feature" onclick="openModal()">Start Selling</button>
      </div>
      <div class="feature-banner feature-banner-purple">
        <span class="feature-banner-icon"><i class="fa-solid fa-shield" style="color: rgb(0, 0, 0);"></i></span>
        <h3 class="feature-banner-title">Stay safe</h3>
        <p class="feature-banner-desc">Chat in-app, meet in public places, and trust our review &amp; verification system.</p>
        <button class="btn-feature">Learn More</button>
      </div>
      <div class="feature-banner feature-banner-green">
        <span class="feature-banner-icon"><i class="fa-solid fa-location-dot" style="color: rgb(0, 0, 0);"></i></span>
        <h3 class="feature-banner-title">Find deals near you</h3>
        <p class="feature-banner-desc">Discover great deals from vendors in your neighbourhood and informal settlement.</p>
        <button class="btn-feature">Enable Location</button>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section class="section">
    <div class="section-header" style="justify-content:center">
      <h2 class="section-title">How Vendora works</h2>
    </div>
    <div class="how-it-works">
      <div class="how-step">
        <div class="how-step-number">STEP 01</div>
        <div class="how-step-icon"><i class="fa-solid fa-camera-retro" style="color: rgb(0, 0, 0);"></i></div>
        <h3 class="how-step-title">Take a photo</h3>
        <p class="how-step-desc">Snap your item with your phone and add a quick description.</p>
      </div>
      <div class="how-step">
        <div class="how-step-number">STEP 02</div>
        <div class="how-step-icon"><i class="fa-solid fa-clipboard-list" style="color: rgb(0, 0, 0);"></i></div>
        <h3 class="how-step-title">List for free</h3>
        <p class="how-step-desc">Choose a category, set your price, and go live in minutes.</p>
      </div>
      <div class="how-step">
        <div class="how-step-number">STEP 03</div>
        <div class="how-step-icon"><i class="fa-solid fa-comment" style="color: rgb(0, 0, 0);"></i></div>
        <h3 class="how-step-title">Chat with buyers</h3>
        <p class="how-step-desc">Buyers contact you via in-app chat safely and securely.</p>
      </div>
      <div class="how-step">
        <div class="how-step-number">STEP 04</div>
        <div class="how-step-icon"><i class="fa-solid fa-handshake" style="color: rgb(0, 0, 0);"></i></div>
        <h3 class="how-step-title">Meet &amp; sell</h3>
        <p class="how-step-desc">Meet in a public place, exchange, and get paid.</p>
      </div>
    </div>
  </section>

   <!-- NEWSLETTER -->
  <section class="section section-padded">
    <div class="newsletter">
      <div class="newsletter-copy">
        <h2 class="newsletter-title">Stay updated with the best deals</h2>
        <p class="newsletter-subtitle">Subscribe to our newsletter and never miss out on a deal near you.</p>
      </div>
      <div class="newsletter-form">
        <input class="newsletter-input" type="email" placeholder="Enter your email" id="newsletterEmail" />
        <button class="btn-newsletter" onclick="subscribeNewsletter()">Subscribe</button>
      </div>
    </div>
  </section>

  


        </section>

      
        
    </body>

    <script>
     /* ── Notification panel ── */
  /* ── Notification panel ── */
    function toggleNotifPanel(e) {
      e.stopPropagation();
      document.getElementById('notifPanel').classList.toggle('open');
    }

    document.addEventListener('click', (e) => {
      const wrap = document.querySelector('.notif-wrap');
      if (wrap && !wrap.contains(e.target)) {
        document.getElementById('notifPanel').classList.remove('open');
      }
    });

    function filterPanelTab(status, btn) {
      document.querySelectorAll('.notif-panel-tab').forEach(t => t.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.notif-item').forEach(item => {
        const match = status === 'all' || item.dataset.status === status;
        item.style.display = match ? 'flex' : 'none';
      });
    }

    function respondPanelOffer(btn, decision) {
      const item = btn.closest('.notif-item');
      item.dataset.status = decision;

      const icon = item.querySelector('.notif-item-icon');
      icon.className = 'notif-item-icon ' + decision;
      icon.textContent = decision === 'approved' ? '✅' : '❌';

      const badge = item.querySelector('.notif-item-badge');
      badge.className = 'notif-item-badge ' + decision;
      badge.textContent = decision === 'approved' ? 'Approved' : 'Declined';

      const title = item.querySelector('.notif-item-title');
      title.textContent = decision === 'approved' ? 'You approved an offer' : 'You declined an offer';

      const actions = item.querySelector('.notif-item-actions');
      if (actions) actions.remove();

      updateNotifCount();
    }

    function updateNotifCount() {
      const pending = document.querySelectorAll('.notif-item[data-status="pending"]').length;
      document.getElementById('notifPanelCount').textContent = pending + ' pending';
      const dot = document.getElementById('notifDot');
      if (pending === 0) {
        dot.style.display = 'none';
      } else {
        dot.textContent = pending;
      }
    }

    </script>

    

</html>

