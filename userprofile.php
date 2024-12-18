<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("dbconn.php");

$user_id = $_SESSION['user_id'];
$sql = "SELECT firstname, lastname, email, mobile FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_details'])) {
        $mobile = $_POST['mobile'];

        $sql = "UPDATE user SET mobile = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $mobile, $user_id);

        if ($stmt->execute()) {
            $alert_message = "Details updated successfully!";
        } else {
            $alert_message = "Error updating details.";
        }

        $stmt->close();
    } elseif (isset($_POST['delete_account'])) {
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            session_destroy();
            header("Location: goodbye.php");
            exit();
        } else {
            $alert_message = "Error deleting account.";
        }

        $stmt->close();
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
    <link rel="shortcut icon" href="admin_img/icons/icon-48x48.png" />

    
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <?php include('header.php'); ?>

    <div class="container-xxl bg-white p-0">
        <!-- Hero Header -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3">User Profile</h1>
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                </ol>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="container-xxl py-5 box">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <?php if (isset($alert_message)) : ?>
                            <div class="alert alert-info">
                                <?php echo htmlspecialchars($alert_message); ?>
                            </div>
                        <?php endif; ?>
                        <div class="profile-info bg-light p-4 rounded">
                            <h5 class="section-title ff-secondary text-start fw-normal" style="color: #cda45e;">Profile Details</h5>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label" style="color: gray;">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="form-label" style="color: gray;">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="color: gray;">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label" style="color: gray;">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" required>
                                </div>
                                <button type="submit" name="update_details" style="background-color: #cda45e;">Update Mobile</button>
                            </form>
                        </div>
                        <div class="profile-info bg-light p-4 rounded mt-4">
                            <h5 class="section-title ff-secondary text-start fw-normal" style="color: #cda45e;">Delete Account</h5>
                            <form method="post">
                                <button type="submit" name="delete_account" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">Delete Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>