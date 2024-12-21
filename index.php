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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>The Gallery Cafe</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

    
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    
    <link href="assets/css/style.css" rel="stylesheet">




    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">

    

    <link href="css/style1.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    


</head>

<body>

    <!-- ======= Header ======= -->
    <?php require "header.php" ?>
    <!-- End Header -->

    <main id="main">
        <section class="breadcrumbs">

            <!-- Hero Start -->
            <div class="container-fluid bg-light py-6 my-6 mt-0">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bgx border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome To Gallery Cafe</small>
                            <h1 class="display-1 mb-4 animated bounceInDown">Rain or shine, it’s a fine time to dine</h1>
                            <a href="booking.php" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Book Now</a>
                            <a href="about.php" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Know More</a>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <img src="img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero End -->


        </section>

<!-- Service1 Start -->
        <section class="about">
            <div class="container" data-aos="fade-up">
                
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-items rounded pt-3">
                                    <div class="p-4">
                                        <i class="fa fa-3x fa-user-tie text-dark mb-4"></i>
                                        <h5>Master Chefs</h5>
                                        <p style="color: white;">Our master chefs ensure an unforgettable dining experience with their expertise and passion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="service-items rounded pt-3">
                                    <div class="p-4">
                                        <i class="fa fa-3x fa-utensils text-dark mb-4"></i>
                                        <h5>Quality Food</h5>
                                        <p style="color: white;">Our cuisine features the finest ingredients, crafted with precision for exceptional quality</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="service-items rounded pt-3">
                                    <div class="p-4">
                                        <i class="fa fa-3x fa-cart-plus text-dark mb-4"></i>
                                        <h5>Online Order</h5>
                                        <p style="color: white;">Experience our finest cuisine through our seamless online ordering service</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
                                <div class="service-items rounded pt-3">
                                    <div class="p-4">
                                        <i class="fa fa-3x fa-headset text-dark mb-4"></i>
                                        <h5>24/7 Service</h5>
                                        <p style="color: white;">Enjoy our finest cuisine anytime with our convenient 24/7 online ordering service</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Service1 End -->

            </div>
        </section>

 <!-- About Start -->
        <section id="about">
            <div class="container" data-aos="fade-up">
               
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="images/i1.jpg">
                                    </div>
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="images/i3.jpg" style="margin-top: 25%;">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="images/i5.jpg">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="images/i4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h2>
                                <h1 class="mb-4">Welcome to Gallery Cafe</h1>
                                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                <div class="row g-4 mb-4">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                            <div class="ps-4">
                                                <p class="mb-0">Years of</p>
                                                <h6 class="text-uppercase mb-0">Experience</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                            <div class="ps-4">
                                                <p class="mb-0">Popular</p>
                                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary py-3 px-5 mt-2" style="color: black;" href="about.php">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- About End -->


        <section class="about">
            <div class="container" data-aos="fade-up">


                <!-- Service Start -->
                <div class="container-fluid service py-6">
                    <div class="container">
                        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Services</small>
                            <h1 class="display-5 mb-5" style="color: white;">What We Offer</h1>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-heart fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Wedding Services</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-concierge-bell fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Catering</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-utensils fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Dine In</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-hotel fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Accomodation</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="far fa-calendar-alt fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Event Planing</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-shuttle-van fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Home Delivery</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-car fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Parking</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                                <div class="bg-light rounded service-item">
                                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                                        <div class="service-content-icon text-center">
                                            <i class="fas fa-wifi fa-7x text-primary mb-4"></i>
                                            <h4 class="mb-3">Free WIFI</h4>
                                            <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->

        </section>




        <section>
            <div class="container" data-aos="fade-up">
                <!-- Events Start -->
                <div class="container-fluid event py-6">
                    <div class="container">
                        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Latest Events</small>
                            <h1 class="display-5 mb-5">Our Social & Professional Events Gallery</h1>
                        </div>
                        <div class="tab-class text-center">
                            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                                <li class="nav-item p-2">
                                    <label class="d-flex mx-2 py-2 border border-primary  rounded-pill " style="background-color: var(--bs-primary);" data-bs-toggle="pill" href="#pill-1">
                                        <span class="text-dark" style="width: 150px;">Wedding</span>
                                    </label>
                                </li>
                                <li class="nav-item p-2">
                                    <label class="d-flex py-2 mx-2 border border-primary  rounded-pill" style="background-color: var(--bs-primary);" data-bs-toggle="pill" href="#pill-2">
                                        <span class="text-dark" style="width: 150px;">Party</span>
                                    </label>
                                </li>
                                <li class="nav-item p-2">
                                    <label class="d-flex mx-2 py-2 border border-primary rounded-pill" style="background-color: var(--bs-primary);" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 150px;">Corporate</span>
                                    </label>
                                </li>
                                <li class="nav-item p-2">
                                    <label class="d-flex mx-2 py-2 border border-primary rounded-pill" style="background-color: var(--bs-primary);" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 150px;">Cocktail</span>
                                    </label>
                                </li>
                                <li class="nav-item p-2">
                                    <label class="d-flex mx-2 py-2 border border-primary rounded-pill" style="background-color: var(--bs-primary);" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 150px;">Buffet</span>
                                    </label>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="row g-4">
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-1.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Wedding</h4>
                                                            <a href="img/event-1.jpg" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-2.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Corporate</h4>
                                                            <a href="img/event-2.jpg" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-3.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Wedding</h4>
                                                            <a href="img/event-3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-4.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Buffet</h4>
                                                            <a href="img/event-4.jpg" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-5.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Cocktail</h4>
                                                            <a href="img/event-5.jpg" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-6.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Wedding</h4>
                                                            <a href="img/event-6.jpg" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-7.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Buffet</h4>
                                                            <a href="img/event-7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-8.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Corporate</h4>
                                                            <a href="img/event-8.jpg" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="row g-4">
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-1.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Wedding</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-8" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-2.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Wedding</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-9" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="row g-4">
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-3.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Corporate</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-10" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-4.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Corporate</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-11" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-4" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="row g-4">
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-5.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Cocktail</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-12" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-6.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Cocktail</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-13" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane fade show p-0">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="row g-4">
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-7.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Buffet</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-14" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="event-img position-relative">
                                                        <img class="img-fluid rounded w-100" src="img/event-8.jpg" alt="">
                                                        <div class="event-overlay d-flex flex-column p-4">
                                                            <h4 class="me-auto">Buffet</h4>
                                                            <a href="img/01.jpg" data-lightbox="event-15" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Events End -->
            </div>
        </section>

        <!-- ======= Gallery Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Gallery</small>
                    <h1 class="display-5 mb-5" style="color: white">Some photos from Our Restaurant</h1>
                </div>

                
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100" style="background-color: black;">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End Gallery Section -->


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg" style="background-color: white;">


            <div class="container" data-aos="fade-up">
                <!-- Events Start -->
                <div class="container-fluid event py-6">
                    <div class="container">

                        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonials</small>
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

    </main>
    <!-- End main -->

   
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3 style="color: white;">The Gallery Cafe</h3>
              <p>
                A108 Adam Street <br>
                Colombo, Sri Lanka<br><br>
                <strong>Phone:</strong> +94 89 55488 55<br>
                <strong>Email:</strong> info@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Other</h4>
            <ul>
            <li><a href="display_parking.php">Parking Availability</a></li>
              <li><a href="display_tables.php">Table Capacity</a></li>
              <li><a href="testimonials.php">Testimonials</a></li>
              <li><a href="review_form.php">Add Reviews</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter" href="review_form.php">
            <h4>Add A Review</h4>
            <p>We Value Your Feedback</p>
            <form action="review_form.php" method="post" href="review_form.php">
              <input href="review_form.php" type="email" name="email"><input type="submit" value="Add A Review">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>The Gallery Cafe</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="">Thishara Herath</a>
      </div>
    </div>
  </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

   
    <script src="assets/js/main.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>

    

</body>

</html>