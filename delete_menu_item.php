<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'dbconn.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM menu_items WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Menu item deleted successfully!');
                window.location.href = 'menu_list.php?status=success';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'menu_list.php?status=error';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
