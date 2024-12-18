<?php
session_start();
require 'dbconn.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: staff_login.php');
    exit();
}

// Fetch the staff details
$user_id = $_SESSION['user_id'];
$sql = "SELECT firstname, lastname, nic, address, mnumber, email, profile_picture FROM staff WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $nic, $address, $mnumber, $email, $profile_picture);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Your Profile - The Gallery Cafe</title>

    <link href="admin_css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">Gallery Cafe - Admins</span>
				</a>

				<ul class="sidebar-nav">


					<li class="sidebar-item active">
						<a class="sidebar-link" href="staff_panel.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="staff_profile.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
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

				</ul>


			</div>
		</nav>

        <div class="main">
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

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Welcome, <?php echo htmlspecialchars($firstname); ?></h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" class="img-fluid rounded-circle mb-2" width="150">
                                        </div>
                                        <div class="col-md-9">
                                            <p><strong>Name:</strong> <?php echo htmlspecialchars($firstname . " " . $lastname); ?></p>
                                            <p><strong>NIC:</strong> <?php echo htmlspecialchars($nic); ?></p>
                                            <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
                                            <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($mnumber); ?></p>
                                            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-end">
                                           
                                            <a href="staff_logout.php" class="btn btn-secondary">Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

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
        </div>
    </div>

    <script src="admin_js/app.js"></script>
</body>

</html>
