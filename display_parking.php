<?php
include 'dbconn.php';

$sql = "SELECT location, availability FROM parking_availability";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />
    
    
    <link href="img/favicon.ico" rel="icon">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <title>The Gallery Cafe - Parking Availability</title>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header -->
        <?php require "header.php"; ?>
        <!-- End Header -->

        <div class="container-xxl position-relative p-0">
            <!-- Hero Header -->
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3">Parking Availability</h1>
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Parking Availability</li>
                    </ol>
                </div>
            </div>
            <!-- End Hero Header -->

            <!-- Parking Availability Table -->
            <div class="container-xxl py-5">
                <div class="container">
                    <h2 class="mb-4">Current Parking Availability</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . htmlspecialchars($row['location']) . "</td><td>" . htmlspecialchars($row['availability']) . "</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2' class='text-center'>No records found</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Parking Availability Table -->

            <!-- Footer -->
            <?php require "footer.php"; ?>
            <!-- End Footer -->
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
</body>

</html>
