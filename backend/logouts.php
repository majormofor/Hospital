<?php
require '../connection.php';
session_start();
if (isset($_GET['staff_id'])) {
    // Update online status in database to "offline"
    $staff_id = $_GET['staff_id'];
    $sql = "UPDATE staffs SET status = 'offline' WHERE staff_id = $staff_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Destroy session and redirect to login page
    unset($_SESSION['staff_id']);
    session_destroy();
    header('Location: ../stafflogin.php');
    exit;
}

?>