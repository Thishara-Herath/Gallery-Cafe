<?php
session_start();
require 'dbconn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: menu.php');
    exit();
}

$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Insert order details into the database
$sql = "INSERT INTO orders (total_price, user_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $total_price, $_SESSION['user_id']);

if ($stmt->execute()) {
    $order_id = $stmt->insert_id;
    
    $sql = "INSERT INTO order_items (order_id, item_name, item_price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    foreach ($_SESSION['cart'] as $item) {
        $stmt->bind_param("isdi", $order_id, $item['name'], $item['price'], $item['quantity']);
        $stmt->execute();
    }
    
    // Clear the cart after successful order placement
    unset($_SESSION['cart']);
    
    // Show the alert and redirect to order_details.php
    echo "<script>
            alert('Order confirmed! Your order ID is " . $order_id . "');
            window.location.href = 'order_details.php?order_id=" . $order_id . "';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
