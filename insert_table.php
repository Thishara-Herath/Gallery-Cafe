<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_number = $_POST['table_number'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status']; // Get the status from the form submission

    // Include the status column in the SQL query
    $sql = "INSERT INTO restaurant_tables (table_number, capacity, status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $table_number, $capacity, $status);

    if ($stmt->execute()) {
        // Display success alert and redirect to the same page
        echo "<script>
                alert('Data added successfully');
                window.location.href = 'add_table.php'; // Replace with your actual page name
              </script>";
    } else {
        // Display error message
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'add_table.php'; // Replace with your actual page name
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
