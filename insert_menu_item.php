<?php
require 'dbconn.php';

// Retrieve form data
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$cousin_type = $_POST['cousin_type']; 
$image = $_FILES['image']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);


if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Move the uploaded image to the target directory
if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
    // Update SQL query to include cousin_type
    $sql = "INSERT INTO menu_items (name, description, price, category, cousin_type, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsss", $name, $description, $price, $category, $cousin_type, $image); // Bind the cousin type

    if ($stmt->execute()) {
        // Redirect to add_menu_item.php with a success message
        echo "<script>
                alert('New menu item added successfully!');
                window.location.href = 'add_menu_item.php?status=success';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'add_menu_item.php?status=error';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('Failed to upload image.');
            window.location.href = 'add_menu_item.php?status=error';
          </script>";
}

$conn->close();
?>
