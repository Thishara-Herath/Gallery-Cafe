<?php
session_start();
require 'dbconn.php'; // Include the database connection

// Check if the user is logged in as admin
if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Fetch data from the admin table
$sql = "SELECT email, password FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$admin_data = $result->fetch_assoc();

if (!$admin_data) {
    echo "No admin data found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile - The Gallery Cafe</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin_profile.css">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />
</head>

<body>
    <div class="container">
        <header>
            <h1>Admin Panel</h1>
            <a href="logout.php">Logout</a>
        </header>
        <main>
            <h2>Admin Information</h2>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($admin_data['email']); ?></td>
                    <td><?php echo htmlspecialchars($admin_data['password']); ?></td>
                </tr>
            </table>
        </main>
    </div>
</body>

</html>
