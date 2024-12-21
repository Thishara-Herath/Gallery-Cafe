<?php
session_start();
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];
    $message = '';

    if ($action == 'confirm') {
        // Update the order status to 'confirmed'
        $sql = "UPDATE orders SET status = 'confirmed' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        $message = 'Order confirmed successfully.';
    } elseif ($action == 'cancel') {
        // First, delete the related rows from the order_items table
        $sql = "DELETE FROM order_items WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();

        // Then, delete the order from the orders table
        $sql = "DELETE FROM orders WHERE id = ?";
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param("i", $order_id);
        $stmt2->execute();
        $stmt2->close();
        $message = 'Order cancelled successfully.';
    }

    // Close the connection
    $conn->close();
    
    // Display the success message and redirect using JavaScript
    echo "<script type='text/javascript'>
            alert('$message');
            window.location.href = 'all_orders.php';
          </script>";
    exit();
}

$conn->close();
?>
