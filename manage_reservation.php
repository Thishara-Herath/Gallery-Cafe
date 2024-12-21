<?php
require 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $message = '';

    if ($action == 'confirm') {
        $sql = "UPDATE reservations SET status='confirmed' WHERE id=?";
        $message = 'Reservation confirmed successfully.';
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM reservations WHERE id=?";
        $message = 'Reservation deleted successfully.';
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

// Display the success message and redirect using JavaScript
echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'display_reservations.php';
      </script>";
exit;
?>
