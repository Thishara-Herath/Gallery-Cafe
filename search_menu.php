<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle adding items to cart
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

    // Add item to cart
    $item = array(
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => 1
    );

    $_SESSION['cart'][] = $item;
    header('Location: order.php');
    exit();
}

require 'dbconn.php';

// Get the search term and category if they exist
$search = isset($_GET['search']) ? filter_var($_GET['search'], FILTER_SANITIZE_STRING) : '';
$category = isset($_GET['category']) ? filter_var($_GET['category'], FILTER_SANITIZE_STRING) : '';

// Prepare SQL query with parameters
$sql = "SELECT * FROM menu_items WHERE 1=1";
$params = [];
$types = '';

if ($search) {
    $sql .= " AND cousin_type LIKE ?";
    $params[] = "%$search%";
    $types .= 's';
}

if ($category) {
    $sql .= " AND category=?";
    $params[] = $category;
    $types .= 's';
}

$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
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

    
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header -->
        <?php require "header.php"; ?>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <br><br>
                    <h5 class="section-title ff-secondary text-center fw-normal" style="color: #cda45e;">Search Menu Items</h5>
                    <h1 class="mb-5">Use your favorite cuisine types to narrow your search</h1>
                    <h6 class="mb-5">Sri Lankan / Italian / Chinese / Indian / Mexican</h6>
                </div>
                <div class="container mb-4">
                    <form method="GET" action="">
                        <div class="input-group" style="justify-content: center;">
                            <input type="text" style="width: 50%;" name="search" placeholder="Search by Cuisine Type" value="<?php echo htmlspecialchars($search); ?>">
                            <button style="background-color: #cda45e;" type="submit">Search</button><br><br>
                        </div>
                    </form>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php
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
                                        echo '<form method="post" action="search_menu.php">';
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
                                    echo "<p>No results found.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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