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

        <!-- side bar end -->

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
                    <div class="container">
                        <h2>Update Staff Member</h2><br>
                        <?php
                        require 'dbconn.php'; 

                        $successMessage = "";
                        $errorMessage = "";

                        if (isset($_POST['update'])) {
                            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                            $firstname = trim($_POST['firstname']);
                            $lastname = trim($_POST['lastname']);
                            $nic = trim($_POST['nic']);
                            $address = trim($_POST['address']);
                            $mnumber = trim($_POST['mnumber']);
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);

                            // Handle profile picture upload
                            $profilePicture = "";
                            if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
                                $target_dir = "uploads/";
                                $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                // Check if image file is an actual image or fake image
                                $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
                                if ($check === false) {
                                    $error_message = 'File is not an image.';
                                    $uploadOk = 0;
                                }

                                // Check file size
                                if ($_FILES["profilePicture"]["size"] > 500000) { // 500KB max file size
                                    $error_message = 'Sorry, your file is too large.';
                                    $uploadOk = 0;
                                }

                                // Allow certain file formats
                                if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $error_message = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                                    $uploadOk = 0;
                                }

                                // Check if $uploadOk is set to 0 by an error
                                if ($uploadOk == 0) {
                                    $errorMessage = $error_message;
                                } else {
                                    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                                        $profilePicture = $target_file;
                                    } else {
                                        $errorMessage = 'Sorry, there was an error uploading your file.';
                                    }
                                }
                            }

                            // Prepare an SQL statement to prevent SQL injection
                            if ($profilePicture) {
                                $stmt = $conn->prepare("UPDATE staff SET firstname=?, lastname=?, nic=?, address=?, mnumber=?, email=?, password=?, profile_picture=? WHERE id=?");
                                $stmt->bind_param("ssssssssi", $firstname, $lastname, $nic, $address, $mnumber, $email, $password, $profilePicture, $id);
                            } else {
                                $stmt = $conn->prepare("UPDATE staff SET firstname=?, lastname=?, nic=?, address=?, mnumber=?, email=?, password=? WHERE id=?");
                                $stmt->bind_param("sssssssi", $firstname, $lastname, $nic, $address, $mnumber, $email, $password, $id);
                            }

                            if ($stmt->execute()) {
                                $successMessage = "Record updated successfully";
                            } else {
                                $errorMessage = "Error updating record: " . $stmt->error;
                            }

                            $stmt->close();
                        }

                        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                        if ($id > 0) {
                            $stmt = $conn->prepare("SELECT * FROM staff WHERE id=?");
                            if (!$stmt) {
                                die("Prepare failed: " . $conn->error);
                            }

                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if (!$result) {
                                die("Get result failed: " . $stmt->error);
                            }

                            $row = $result->fetch_assoc();
                            $stmt->close();

                            if ($row) {
                        ?>
                                <form action="edit_staff.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <div class="form-group">
                                        <label for="firstname">First Name:</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($row['firstname']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="lastname">Last Name:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($row['lastname']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="nic">NIC:</label>
                                        <input type="text" class="form-control" id="nic" name="nic" value="<?php echo htmlspecialchars($row['nic']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="mnumber">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mnumber" name="mnumber" value="<?php echo htmlspecialchars($row['mnumber']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="profilePicture">Profile Picture:</label>
                                        <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                                        <?php
                                        if (!empty($row['profile_picture'])) {
                                            echo "<img src='" . htmlspecialchars($row['profile_picture']) . "' alt='Profile Picture' width='100' height='100'>";
                                        }
                                        ?>
                                    </div><br>
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </form>
                        <?php
                            } else {
                                echo "<div class='alert alert-danger'>Staff member not found.</div>";
                            }
                        } else {

                            echo "<meta http-equiv='refresh' content='2;url=display_staff.php'>";
                        }

                        $conn->close();

                        // Display alerts based on success or error messages
                        if ($successMessage) {
                            echo "<script type='text/javascript'>alert('$successMessage');</script>";
                        }
                        if ($errorMessage) {
                            echo "<script type='text/javascript'>alert('$errorMessage');</script>";
                        }
                        ?>
                    </div>

                </div>
            </main>

            <!-- content end -->

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