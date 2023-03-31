<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['staff_id'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection
    include '../connection.php';

    // Prepare the SQL statement to delete the staff
    $stmt = $conn->prepare("DELETE FROM staffs WHERE staff_id = ?");
    $stmt->bind_param("i", $_POST['staff_id']);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the staffs page
        header('Location: admin.php');
        exit();
    } else {
        // Display an error message
        $error_message = "Failed to delete staff: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
} else {
    // If the request method is not POST, redirect to the staffs page
    header('Location: staff.php');
    exit();
}
?>
