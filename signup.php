<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>The Gallery Cafe</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="register.php" method="POST">
        <h3>Sign-Up</h3>
        <input type="text" name="fname" id="fname" placeholder="Enter First Name" required>
        <input type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
        <input type="text" name="mnumber" id="mnumber" placeholder="Enter Mobile Number" required>
        <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <button type="submit" value="Submit" name="submit">Sign Up</button>
        <div class="register">
            <p>Don't have an account? <a href="login.php">Sign In</a></p>
        </div>
    </form>
</body>

</html>