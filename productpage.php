<?php
session_start();

include 'config/db.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM products WHERE id = $id"
);

$product = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Vendora</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="productpagestle.css" />
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
          </section>

          <!-- PRODUCT PAGE -->
  <div class="product-page">

    <!-- LEFT: IMAGES -->
    <div class="product-images">
      <div class="main-image" id="mainImage">
        <img
    src="img/<?= $product['image']; ?>"
    alt="<?= $product['title']; ?>"
    class="product-main-image"
>
        
      </div>
      
    </div>

    <!-- RIGHT: DETAILS -->
    <div class="product-details">

      <div class="product-meta-row">
        <span class="product-category">
<?= $product['category']; ?>
</span>
        
      </div>

      <h1 class="product-title">
<?= $product['title']; ?>
</h1>

      <div class="product-price-row">
        <span class="product-price">
R<?= $product['price']; ?>
</span>
      </div>
      

  <p class="product-description">
<?= $product['description']; ?>
</p>

      <div class="product-specs">
        
        
        <div class="spec-row"><span class="spec-label">Category</span><span class="spec-value"><?= $product['category']; ?></span></div>
        <div class="spec-row"><span class="spec-label">Location</span><span class="spec-value">
<?= $product['location']; ?>
</span></div>
        <div class="spec-row"><span class="spec-label">Phone number</span><span class="spec-value">
<?= $product['phone']; ?>
</span></div>
      </div>

      <!-- BUTTONS -->
      <div class="product-ctas">
        
        <button class="offerbutton" onclick="openOfferModal()">
    Send an Offer
</button>
        
      </div>

      <div class="offer-modal" id="offerModal">

    <div class="offer-box">

        <h3>Send an Offer</h3>

        <input
            type="number"
            id="offerAmount"
            placeholder="Enter your offer amount"
        >

        <div class="offer-actions">
            <button onclick="submitOffer()" class="offer-submit">
                Submit Offer
            </button>

            <button onclick="closeOfferModal()" class="offer-cancel">
                Cancel
            </button>
        </div>

    </div>

</div>
      
      

      <!-- SELLER CARD -->
      <div class="seller-card">
        <div class="seller-avatar">u</div>
        <div class="seller-info">
          <div class="seller-name">USER </div>
          <div class="seller-stats"> 14 listings · Member since 2023</div>
        </div>
      </div>

    

    </div>
  </div>

  <script>

function openOfferModal() {
    document.getElementById("offerModal").style.display = "flex";
}

function closeOfferModal() {
    document.getElementById("offerModal").style.display = "none";
}

function submitOffer() {

    let amount = document.getElementById("offerAmount").value;

    if(amount === "") {
        alert("Please enter an offer amount.");
        return;
    }

    alert("Offer of R" + amount + " submitted!");

    closeOfferModal();
}

</script>
</body>
</html>