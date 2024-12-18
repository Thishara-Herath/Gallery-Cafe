<?php
require 'dbconn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Ensure ID is an integer

if ($id > 0) {
    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Record deleted successfully</div>";
        echo "<meta http-equiv='refresh' content='2;url=display_staff.php'>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting record: " . $stmt->error . "</div>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>Invalid staff member ID. Redirecting...</div>";
    echo "<meta http-equiv='refresh' content='2;url=display_staff.php'>";
}

$conn->close();
?>
