<?php

session_start();


// IF USER NOT LOGGED IN
if(!isset($_SESSION['user_id'])){
    header("Location: loginpage.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Vendora</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="logoutstyle.css" />
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

    <div class="profile-page">
 
    <!-- PROFILE CARD -->
    <div class="profile-card">
 
      <div class="profile-avatar">
<?php echo strtoupper(substr($_SESSION['name'], 0, 1)); ?>
</div>
      <div class="profile-name">
<?php echo $_SESSION['name']; ?>
</div>
      <div class="profile-email">
<?php echo $_SESSION['email']; ?>
</div>
      
 
      <div class="profile-divider"></div>
 
      <!-- DETAILS -->
      <div class="profile-details">
        <div class="detail-row">
          <span class="detail-label">First Name</span>
          <span class="detail-value">
<?php echo $_SESSION['name']; ?>
</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Last Name</span>
          <span class="detail-value">
<?php echo $_SESSION['last_name']; ?>
</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email</span>
          <span class="detail-value">
<?php echo $_SESSION['email']; ?>
</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Member Since</span>
          <span class="detail-value">
<?php echo $_SESSION['created_at']; ?>
</span>
        </div>
      </div>
 
      <div class="profile-divider"></div>
 
      <!-- ACTIONS -->

      <button class="btn-admin1"
onclick="window.location.href='adminpage.php'">Admin Page</button>
    
       <button class="btn-logout"
onclick="window.location.href='lougout.php'">Log Out</button>
 
    </div>
 
  </div>
 
  <script>
    
  </script>
 
</body>
</html>