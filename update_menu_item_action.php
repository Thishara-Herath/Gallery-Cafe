<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'dbconn.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $cousin_type = $_POST['cousin_type'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if ($image) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "UPDATE menu_items SET name=?, description=?, price=?, category=?, cousin_type=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsssi", $name, $description, $price, $category, $cousin_type, $image, $id);
        } else {
            echo "<script>
                    alert('Failed to upload image.');
                    window.location.href = 'update_menu_item.php?id=$id&status=error';
                  </script>";
            exit();
        }
    } else {
        $sql = "UPDATE menu_items SET name=?, description=?, price=?, category=?, cousin_type=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi", $name, $description, $price, $category, $cousin_type, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
                alert('Menu item updated successfully!');
                window.location.href = 'menu_list.php?status=success';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'update_menu_item.php?id=$id&status=error';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
