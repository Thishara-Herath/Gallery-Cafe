<?php
require 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $datetime = $_POST["datetime"];
    $select1 = $_POST["select1"];
    $message = $_POST["message"];

    // Check if the datetime is in the correct format
    $date = DateTime::createFromFormat('Y-m-d\TH:i', $datetime); // Correct format for datetime-local
    if ($date) {
        $formatted_datetime = $date->format('Y-m-d H:i:s');
    } else {
        echo "<script>alert('Invalid date format.'); window.location.href='booking.php';</script>";
        exit;
    }

    // Debugging messages
    // echo "Name: $name, Email: $email, Datetime: $formatted_datetime, People: $select1, Message: $message<br>";

    $stmt = $conn->prepare("INSERT INTO reservations (Name, Email, datetime, people, message) VALUES (?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssis", $name, $email, $formatted_datetime, $select1, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Booking Confirmed'); window.location.href='booking.php';</script>";
        } else {
            echo "<script>alert('Execute Error: " . $stmt->error . "'); window.location.href='booking.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Prepare Error: " . $conn->error . "'); window.location.href='booking.php';</script>";
    }

    $conn->close();
}
?>
