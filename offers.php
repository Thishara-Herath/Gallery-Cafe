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

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- ======= Header ======= -->
        <?php require "header.php" ?>
        <!-- End Header -->


        <div class="container-xxl position-relative p-0">


            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Special Offers</h1>
                    
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item text-white active" aria-current="page">Special Offers</li>
                    </ol>
                    
                </div>
            </div>

        </div>

        <div class="container">

            <center>
                <h2 class="mt-5">Offers valid for dine-in only</h2>
            </center>
            <center><a href="menu.php">Explore Our Menu</a></center><br><br>
            <div class="row">
                <?php
                require 'dbconn.php';
                $sql = "SELECT title, description, image FROM offers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="uploads/' . $row["image"] . '" class="card-img-top" alt="' . $row["title"] . '">
                            <div class="card-body">
                                <h3 class="card-title">' . $row["title"] . '</h3>
                                <h5 class="card-title">' . $row["description"] . '</h5>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "No offers available.";
                }
                ?>
            </div>
        </div>

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