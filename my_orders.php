<?php
session_start();
require 'dbconn.php'; // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user's order details
$query = "SELECT o.id as order_id, o.order_date, oi.item_name, oi.quantity, oi.item_price 
          FROM orders o 
          JOIN order_items oi ON o.id = oi.order_id 
          WHERE o.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe</title>

    
    <link href="img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header -->
        <?php require "header.php" ?>
        <!-- End Header -->

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item text-white active" aria-current="page">My Orders</li>
                </ol>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <?php
                        // Initialize variables for order total
                        $current_order_id = null;
                        $order_total = 0;
                        $order_totals = [];

                        if ($result->num_rows > 0) :
                        ?>
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Item Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <?php
                                        // Calculate total price for the current item
                                        $total_price = $row['quantity'] * $row['item_price'];

                                        // Check if this is a new order ID
                                        if ($current_order_id != $row['order_id']) {
                                            if ($current_order_id !== null) {
                                                // Store the total for the previous order
                                                $order_totals[$current_order_id] = $order_total;
                                            }

                                            // Reset total for the new order
                                            $current_order_id = $row['order_id'];
                                            $order_total = 0;
                                        }

                                        // Add the total price of the current item to the order total
                                        $order_total += $total_price;
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                                            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                            <td>Rs. <?php echo htmlspecialchars($row['item_price']); ?></td>
                                            <td>Rs. <?php echo number_format($total_price, 2); ?></td>
                                        </tr>
                                    <?php endwhile; ?>

                                    <?php
                                    // Store the total for the last order
                                    if ($current_order_id !== null) {
                                        $order_totals[$current_order_id] = $order_total;
                                    }
                                    ?>

                                </tbody>
                            </table>

                            <!-- <div class="mt-4">
                                <h5>Order Totals:</h5>
                                <ul>
                                    <?php foreach ($order_totals as $order_id => $total) : ?>
                                        <li>Order ID <?php echo htmlspecialchars($order_id); ?>: Rs. <?php echo number_format($total, 2); ?></li>
                                    <?php endforeach; ?>
                                    <li><strong>Grand Total: Rs. <?php echo number_format(array_sum($order_totals), 2); ?></strong></li>
                                </ul>
                            </div> -->

                        <?php else : ?>
                            <p class="text-center mt-4">No orders found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require "footer.php" ?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    
    <script src="js/main.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>