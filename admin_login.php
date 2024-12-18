<?php
session_start();
require 'dbconn.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user was found
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email; // Store the email in session
        header('Location: admin_panel.php'); // Redirect to the admin panel page
        exit();
    } else {
        $error_message = "Invalid email or password";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Gallery Cafe - Admin Login</title>
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
    <form action="admin_login.php" method="POST">
        <h3>Admin Sign-In</h3>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <button type="submit">Log In</button>
        <div class="register">
            <p>Don't have an account? <a href="signup.php">Register</a></p>
        </div>
        <center>
            <a href="login.php" style="font-size: smaller; color: lightslategray;">User Login</a> |
            <a href="staff_login.php" style="font-size: smaller; color: lightslategrey;">Staff Login</a>
        </center>
    </form>
</body>

</html>
