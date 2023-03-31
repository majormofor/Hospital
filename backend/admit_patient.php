<?php
// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['staff_id'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

// Include the database connection
include '../connection.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $patient_id = $_POST['patient_id'];
    $bed_number = $_POST['bed_number'];
    $admission_date = $_POST['admission_date'];
    $discharge_date = $_POST['discharge_date'];
    $admission_reason = $_POST['admission_reason'];

    // Update the bed status to "occupied"
    $stmt = $conn->prepare("UPDATE beds SET status = 'occupied' WHERE bed_number = ?");
    $stmt->bind_param("i", $bed_number);
    $stmt->execute();
    $stmt->close();

    // Retrieve the bed_id for the selected bed_number
    $stmt = $conn->prepare("SELECT bed_id FROM beds WHERE bed_number = ?");
    $stmt->bind_param("i", $bed_number);
    $stmt->execute();
    $stmt->bind_result($bed_id);
    $stmt->fetch();
    $stmt->close();

    // Prepare the SQL statement to insert admission record
    $stmt = $conn->prepare("INSERT INTO admissions (patient_id, bed_id, admission_date, discharge_date, admission_reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $patient_id, $bed_id, $admission_date, $discharge_date, $admission_reason);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the staff page
        header('Location: admin.php');
        exit();
    } else {
        // Display an error message
        $error_message = "Failed to admit patient: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
