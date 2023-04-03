<?php
require '../connection.php';
session_start();

if (isset($_POST['submit'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $job_title = $_POST['job_title'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password != $confirmpassword) {
        echo "<script> alert('Passwords do not match!');</script>";
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM staffs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<script> alert('Email already exists!');</script>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new patient into the database
    $stmt = $conn->prepare("INSERT INTO staffs (first_name, last_name, password, email, job_title, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $firstname, $lastname, $hashed_password, $email, $job_title, $phone, $address );
    $stmt->execute();

    // Redirect to admin page
    header('Location: admin.php');
    exit;
}
?>