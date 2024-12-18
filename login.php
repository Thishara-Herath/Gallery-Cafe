<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Gallery Cafe</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="userlogin.php" method="POST">
        <h3>Sign-In</h3>
        <?php
        // Display error message if set
        if (isset($_SESSION['error'])) {
            echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Clear the error message after displaying
        }
        ?>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <button type="submit">Log In</button>
        <div class="register">
            <p>Don't have an account? <a href="signup.php">Register</a></p>
        </div>
        <center><a href="admin_login.php" style="font-size: smaller; text-align:center; color: lightslategray;">Admin Login  |  </a><a href="staff_login.php" style="font-size: smaller; text-align:center; color: lightslategrey;">  Staff Login</a></center>
    </form>
</body>

</html>
