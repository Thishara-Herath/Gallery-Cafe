<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>The Gallery Cafe</title>

	<link href="admin_css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<!-- Sidebar open -->
    <div class="wrapper">
        
        <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">Gallery Cafe - Admins</span>
				</a>

				<ul class="sidebar-nav">
					

					<li class="sidebar-item active">
						<a class="sidebar-link" href="admin_panel.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="add_menu_item.php">
							<i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Add menu items</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="menu_list.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Edit menu items</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="add_offer.php">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Add Offers</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="edit_offers.php">
							<i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Edit Offers</span>
						</a>
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="all_orders.php">
							<i class="align-middle" data-feather="square"></i> <span class="align-middle">Orders</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="display_reservations.php">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Reservations</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="register_staff.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Add Staff</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="display_staff.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Edit Staff</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="edit_users.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Edit Users</span>
						</a>
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="display_reviews.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Reviews</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="add_table.php">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Add Table Capasity</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="add_parking.php">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Add Parking Availability</span>
						</a>
					</li>

				</ul>


			</div>
		</nav>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="main">
            <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">


							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">Log Out</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								
								<a class="dropdown-item" href="admin_logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <!-- End Navbar -->

            <!-- Form Content -->
            <main class="content">
                <div class="container-fluid p-4">
                    <h2 class="mb-4">Add Parking Availability</h2>
                    <form action="add_parking_process.php" method="post">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="availability" class="form-label">Availability:</label>
                            <input type="number" class="form-control" id="availability" name="availability" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Parking</button>
                    </form>
                </div>
            </main>
            <!-- End Form Content -->

            <!-- Footer -->
            <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>The Gallery Cafe - Admins | Designed by Thishara Herath</strong></a> &copy;
							</p>
						</div>

					</div>
				</div>
			</footer>
            <!-- End Footer -->
        </div>
        <!-- End Main Content -->
    </div>

    <!-- Bootstrap JS Bundle-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <!-- Custom JS -->
    <script src="admin_js/app.js"></script>
</body>

</html>
