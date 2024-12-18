<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>The Gallery Cafe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  

  
  <link href="css/header.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+94 89 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 09AM - 23PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <?php if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) : ?>
            <li>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</li>
            <li><a href="logout.php">Log Out</a></li>
          <?php else : ?>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="index.php">Gallery Cafe</a></h1>
     
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          <li><a class="nav-link scrollto" href="menu.php">Menu</a></li>
          <li><a class="nav-link scrollto" href="offers.php">Offers</a></li>
          <li class="dropdown">
            <a href="#"><span>My Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) : ?>
                <li><a href="userprofile.php">Profile</a></li>
                <li><a href="my_orders.php">Orders</a></li>
                <li><a href="booking.php">Book A Table</a></li>
                <li><a href="review_form.php">Add Review</a></li>
                <li><a href="logout.php">Log Out</a></li>
              <?php else : ?>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Other</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="display_parking.php">Parking Availability</a></li>
              <li><a href="display_tables.php">Table Capacity</a></li>
              <li><a href="testimonials.php">Testimonials</a></li>
              <li><a href="review_form.php">Add Reviews</a></li>
             
              
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- end navbar -->
      <a href="booking.php" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>
    </div>
  </header><!-- End Header -->
</body>

</html>