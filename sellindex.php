<?php
session_start();

include 'config/db.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];
    $phone = $_POST['phone'];
    $seller = $_SESSION['name'];

    
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "img/" . $image
    );

    $sql = "INSERT INTO products
    (title, description, price, image, location, category, seller, phone)

    VALUES
    ('$title', '$description', '$price', '$image', '$location', '$category', '$seller', '$phone')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sell an Item — Vendora</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="sellstyle.css" />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/0b6bbeb682.js" crossorigin="anonymous"></script>
</head>
<body>

</body>

<section class="header">
<!-- start selling today topbar -->
  <div class="startsellingheader">
    <i class="fa-regular fa-truck" style="color: rgb(255, 255, 255);"></i> List your first item FREE — No fees, no hassle.
    <span class="announcement-link">Start selling today →</span>
  </div>
<!-- navigation bar -->
  <nav class="navbar">
    <div class="topnavebar">

      <div href="index.php" class="logo" onclick="window.location.href='index.php'" style="cursor:pointer;">
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
        <button class="navlogos">
          <span class="icon"><i class="fa-regular fa-heart" style="color: rgb(0, 0, 0);"></i></span>
          <span class="label">Saved</span>
        </button>
        
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

 <!-- PAGE HERO -->
  <div class="sell-hero">
    <div class="sell-hero-inner">
      <div class="breadcrumb">
        <a href="index.php" class="breadcrumb-link">Home</a>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-current">Sell an Item</span>
      </div>
      <h1 class="sell-hero-title">List your item </h1>
      <p class="sell-hero-sub">Reach thousands of buyers across South Africa. It takes less than 2 minutes.</p>
      
        
      </div>
    </div>
  </div>

  <!-- FORM PAGE -->
  <div class="sell-page">
    <div class="sell-container">

      <div class="sell-heading">
        <h1>Sell an Item</h1>
        <p>Fill in your details and go live in minutes — completely free.</p>
      </div>

      <form class="sell-form" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="title">Item Title <span class="req">*</span></label>
          <input type="text" id="title" name="title" placeholder="e.g. Samsung 65-inch Smart TV" />
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="price">Price (R) <span class="req">*</span></label>
            <input type="number" id="price" name="price" placeholder="0.00" min="0" />
          </div>
          
        </div>

        <div class="form-group">
          <label for="category">Category <span class="req">*</span></label>
          <select id="category" name="category">
            <option value="">Select a category...</option>
            <option>Vehicles</option>
            <option>Property</option>
            <option>Electronics</option>
            <option>Home & Garden</option>
            <option>Fashion</option>
            <option>Sports & Outdoors</option>
            <option>Furniture</option>
            <option>Hobbies & Games</option>
            <option>Food & Agri</option>
            <option>Services</option>
            <option>Beauty & Health</option>
            <option>Kids & Baby</option>
          </select>
        </div>

        <div class="form-group">
          <label for="description">Description <span class="req">*</span></label>
          <textarea id="description" name="description" rows="4" placeholder="Describe your item — condition, what's included, reason for selling..."></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="city">City / Area <span class="req">*</span></label>
            <input type="text" id="city" name="location" placeholder="e.g. Soweto, Cape Town..." />
          </div>
          <div class="form-group">
            <label for="phone">Phone <span class="req">*</span></label>
            <input type="text" id="phone" name="phone" placeholder="e.g. 068 280 0000" />
          </div>
        </div>

        <div class="form-group">
          <label>Photos</label>
          <div class="photo-upload" onclick="document.getElementById('photos').click()">
            <input type="file" id="photos" name="image" accept="image/*" multiple style="display:none" onchange="showPhotoCount(this)" />
            <span id="photoLabel">Click to upload photos</span>
          </div>
        </div>

        <button type="submit" name="submit" class="btn-post">Post Listing</button>

      </form>
    </div>
  </div>

  <script>
    function showPhotoCount(input) {
      const n = input.files.length;
      document.getElementById('photoLabel').textContent =
        n === 0 ? 'Click to upload photos (up to 10)' : n + ' photo' + (n > 1 ? 's' : '') + ' selected';
    }
 
    function submitForm() {
      const required = ['title', 'price', 'condition', 'category', 'description', 'city', 'phone'];
      let valid = true;
      required.forEach(id => {
        const el = document.getElementById(id);
        if (!el.value.trim()) {
          el.classList.add('error');
          el.addEventListener('input', () => el.classList.remove('error'), { once: true });
          valid = false;
        }
      });
      if (!valid) return;
      document.getElementById('successOverlay').style.display = 'flex';
    }
 
    function reset() {
      document.getElementById('successOverlay').style.display = 'none';
      document.querySelectorAll('input, textarea, select').forEach(el => el.value = '');
      document.getElementById('photoLabel').textContent = 'Click to upload photos (up to 10)';
    }
  </script>

</html>