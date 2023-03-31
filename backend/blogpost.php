<?php
session_start();
require '../connection.php';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $staff_id = $_SESSION['staff_id'];

    // Check if a file was uploaded
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileExt;
                    $fileDestination = '../uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $sql = "INSERT INTO blog (title, staff_id, content, image_path) 
                            VALUES ('$title', $staff_id, '$content', '$fileDestination')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script> alert('Blog post added successfully!');</script>";
                        header('Location: admin.php');
                    } else {
                        echo "<script> alert('Error: " . mysqli_error($conn) . "');</script>";
                    }
                } else {
                    echo "<script> alert('File size is too large!');</script>";
                }
            } else {
                echo "<script> alert('Error uploading file!');</script>";
            }
        } else {
            echo "<script> alert('Invalid file type!');</script>";
        }
    } else {
        $sql = "INSERT INTO blog (title, staff_id, content) 
                VALUES ('$title', $staff_id, '$content')";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Blog post added successfully!');</script>";
            header('Location: admin.php');
        } else {
            echo "<script> alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
