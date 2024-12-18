<?php
session_start();
include("dbconn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $sql = "DELETE FROM user WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "User deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting user: " . mysqli_error($conn);
    }

    // Redirect back to the edit_users.php without a message in the URL
    header("Location: edit_users.php");
    exit();
}
?>
