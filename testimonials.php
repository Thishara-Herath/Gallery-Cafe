<?php
// Include the database connection file
include 'dbconn.php';

// Fetch confirmed reviews from the database
$query = "SELECT * FROM reviews WHERE confirmed = TRUE";
$result = $conn->query($query);
$confirmedReviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $confirmedReviews[] = $row;
    }
}
$conn->close();
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

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonials</h1>
                    
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonials</li>
                    </ol>
                    
                </div>
            </div>

        </div>

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg" style="background-color: white;">


            <div class="container" data-aos="fade-up">
                <!-- Events Start -->
                <div class="container-fluid event py-6">
                    <div class="container">

                        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">

                            <h1 class="display-5 mb-5">What they're saying about us</h1>
                        </div>


                        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">
                                <?php if (!empty($confirmedReviews)) : ?>
                                    <?php foreach ($confirmedReviews as $review) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> <?= htmlspecialchars($review['message']); ?>
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <img src="<?= htmlspecialchars($review['profile_photo']); ?>" class="testimonial-img" alt="">
                                                <h3 style="color: black;"><?= htmlspecialchars($review['name']); ?></h3>
                                                <h4 style="color: black;"><?= htmlspecialchars($review['designation']); ?></h4>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <p>No testimonials found.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-pagination" style="background-color: black;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->











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