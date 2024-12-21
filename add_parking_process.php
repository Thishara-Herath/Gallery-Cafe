<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $conn->real_escape_string($_POST['location']);
    $availability = (int)$_POST['availability'];

    $sql = "INSERT INTO parking_availability (location, availability) VALUES ('$location', $availability)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Parking availability added successfully!');
                window.location.href='add_parking.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href='add_parking.php';
              </script>";
    }

    $conn->close();
}
?>
