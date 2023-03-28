<?php
session_start();
require '../connection.php';

if (isset($_POST['submit'])) {
    $test_date = mysqli_real_escape_string($conn, $_POST['test_date']);
    $test_name = mysqli_real_escape_string($conn, $_POST['test_name']);
    $image_type = mysqli_real_escape_string($conn, $_POST['image_type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
    $staff_id = $_SESSION['staff_id'];

    // Check if a file was uploaded
    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file'];
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

                    $sql = "INSERT INTO imaging (test_date, test_name, image_type, description, file, patient_id, staff_id) 
                            VALUES ('$test_date', '$test_name', '$image_type', '$description', '$fileNameNew', $patient_id, $staff_id)";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script> alert('Imaging test results added successfully!');</script>";
                        header('Location: staff.php');
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
        $sql = "INSERT INTO imaging (test_date, test_name, image_type, description, patient_id, staff_id) 
                VALUES ('$test_date', '$test_name', '$image_type', '$description', $patient_id, $staff_id)";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Imaging test results added successfully!');</script>";
            header('Location: staff.php');
        } else {
            echo "<script> alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
