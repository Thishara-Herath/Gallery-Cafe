<?php
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $nic = isset($_POST['nic']) ? $_POST['nic'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $mnumber = isset($_POST['mnumber']) ? $_POST['mnumber'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // File upload logic
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>
                alert('File is not an image.');
                window.location.href = 'register_staff.php';
              </script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>
                alert('Sorry, file already exists.');
                window.location.href = 'register_staff.php';
              </script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) { // 500KB max file size
        echo "<script>
                alert('Sorry, your file is too large.');
                window.location.href = 'register_staff.php';
              </script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>
                alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                window.location.href = 'register_staff.php';
              </script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>
                alert('Sorry, your file was not uploaded.');
                window.location.href = 'register_staff.php';
              </script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            // File uploaded successfully, proceed with database insertion
            $sql = "INSERT INTO staff (firstname, lastname, nic, address, mnumber, email, password, profile_picture)
                    VALUES ('$firstname', '$lastname', '$nic', '$address', '$mnumber', '$email', '$password', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('New record created successfully');
                        window.location.href = 'register_staff.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: " . $conn->error . "');
                        window.location.href = 'register_staff.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Sorry, there was an error uploading your file.');
                    window.location.href = 'register_staff.php';
                  </script>";
        }
    }

    $conn->close();
}
?>
