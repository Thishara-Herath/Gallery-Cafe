<?php
session_start();
require 'dbconn.php';

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if form is submitted to add item to cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    // Sanitize and validate input
    $item_id = filter_var($_POST['item_id'], FILTER_SANITIZE_NUMBER_INT);
    $item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
    $item_price = filter_var($_POST['item_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $item = array(
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => 1
    );

    // Add item to cart
    $_SESSION['cart'][] = $item;
    header('Location: order.php');
    exit();
}

// Function to fetch and display menu items
function displayMenuItems($conn, $category)
{
    $sql = "SELECT * FROM menu_items WHERE category=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4">';
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src="uploads/' . htmlspecialchars($row["image"]) . '" alt="Card image cap">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>';
            echo '<p style="color: black;">' . htmlspecialchars($row["description"]) . '</p>';
            echo '</div>';
            echo '<ul class="list-group list-group-flush">';
            echo '<li class="list-group-item">Rs. ' . htmlspecialchars($row["price"]) . '</li>';
            echo '</ul>';
            echo '<div class="card-body">';
            echo '<form method="post" action="menu.php">';
            echo '<input type="hidden" name="item_id" value="' . htmlspecialchars($row["id"]) . '">';
            echo '<input type="hidden" name="item_name" value="' . htmlspecialchars($row["name"]) . '">';
            echo '<input type="hidden" name="item_price" value="' . htmlspecialchars($row["price"]) . '">';
            echo '<button type="submit" class="btn btn-outline-dark"><i class="fa fa-bars"></i> Add to cart</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No results found for $category category.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The Gallery Cafe</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

    
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- ======= Header ======= -->
        <?php require "header.php"; ?>
        <!-- End Header -->

        <div class="container-xxl position-relative p-0">
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                    <h1 class="mb-5">"Discover the flavors of Gallery Cafe in every dish"</h1>
                </div>
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="search_menu.php" class="fa fa-search" style="font-size: larger;"> Use your favorite cuisine types to narrow your search.</a><br><br>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fas fa-hamburger fa-2x root-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Delicious</small>
                                    <h6 class="mt-n1 mb-0">Meals</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fas fa-cocktail fa-2x root-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Flavorful</small>
                                    <h6 class="mt-n1 mb-0">Beverages</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fas fa-ice-cream fa-2x root-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Lovely</small>
                                    <h6 class="mt-n1 mb-0">Desserts</h6>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php displayMenuItems($conn, 'Meals'); ?>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade p-0">
                            <div class="row g-4">
                                <?php displayMenuItems($conn, 'Beverages'); ?>
                            </div>
                        </div>

                        <div id="tab-3" class="tab-pane fade p-0">
                            <div class="row g-4">
                                <?php displayMenuItems($conn, 'Deserts'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <?php require "footer.php"; ?>
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