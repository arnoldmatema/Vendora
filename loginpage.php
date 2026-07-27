<?php

session_start();

include 'config/db.php';


// REGISTER
if(isset($_POST['register'])){

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users
    (first_name, last_name, email, password)

    VALUES
    ('$first', '$last', '$email', '$password')";

    mysqli_query($conn, $sql);

    header("Location: loginpage.php");
}



// LOGIN
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        // CHECK PASSWORD
        if($user['password'] == $password){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['first_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['created_at'] = $user['created_at'];

            header("Location: index.php");
            exit();

        } else {

            $error = "Incorrect password";

        }

    } else {

        $error = "Email does not exist";

    }
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
        <link rel="stylesheet" href="loginstyle.css" />
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

      <div href="index.php" class="logo"onclick="window.location.href='index.php'" style="cursor:pointer;">
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

  <!-- RIGHT PANEL -->
     <div class="auth-page">
    <div class="auth-card">

      <!-- TABS -->
      <div class="auth-tabs">
        <button class="auth-tab active" onclick="show('login', this)">Sign In</button>
        <button class="auth-tab" onclick="show('register', this)">Register</button>
      </div>

      <!-- LOGIN -->
      <form id="login" method="POST">
        <h1 class="auth-title">Welcome back</h1>
        <p class="auth-sub">Sign in to your Vendora account</p>

        <div class="form-group">
          <label for="lEmail">Email</label>
          <input type="email" id="lEmail" name="email">
        </div>
        <div class="form-group">
          <label for="lPassword">Password</label>
          <input type="password" id="lPassword" name="password">
        </div>

        <button type="submit" name="login" class="btn-auth">Sign In</button>
        <p class="switch-text">No account? <button class="switch-btn" onclick="show('register', document.querySelectorAll('.auth-tab')[1])">Register free</button></p>
      </form>

      <!-- REGISTER -->
      <form id="register" method="POST" style="display:none">
        <h1 class="auth-title">Create account</h1>
        <p class="auth-sub">Free to join — always</p>

        <div class="form-row">
          <div class="form-group">
            <label for="rFirst">First Name</label>
            <input type="text" id="rFirst" name="first_name" />
          </div>
          <div class="form-group">
            <label for="rLast">Last Name</label>
            <input type="text" id="rLast" name="last_name" />
          </div>
        </div>
        <div class="form-group">
          <label for="rEmail">Email</label>
          <input type="email" id="rEmail" name="email" />
        </div>
        <div class="form-group">
          <label for="rPassword">Password</label>
          <input type="password" id="rPassword" name="password" placeholder="At least 8 characters"/>
        </div>

        <button type="submit" name="register" class="btn-auth">Create Account</button>
        <p class="switch-text">Already registered? <button class="switch-btn" onclick="show('login', document.querySelectorAll('.auth-tab')[0])">Sign in</button></p>
      </form>

      <!-- SUCCESS -->
      <div id="success" style="display:none; text-align:center">
        <div style="font-size:52px; margin-bottom:12px">🎉</div>
        <h1 class="auth-title">You're in!</h1>
        <p class="auth-sub" style="margin-bottom:24px">Welcome to Vendora.</p>
        <a href="vendora.html" class="btn-auth" style="display:block; text-decoration:none">Go to Marketplace →</a>
      </div>

    </div>
  </div>

  <script>
    function show(panel, tab) {
      ['login','register','success'].forEach(p => document.getElementById(p).style.display = 'none');
      document.getElementById(panel).style.display = 'block';
      document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
      if (tab) tab.classList.add('active');
    }

    function validate(ids) {
      let ok = true;
      ids.forEach(id => {
        const el = document.getElementById(id);
        if (!el.value.trim()) {
          el.classList.add('error');
          el.addEventListener('input', () => el.classList.remove('error'), { once: true });
          ok = false;
        }
      });
      return ok;
    }

  </script>


  </div>
