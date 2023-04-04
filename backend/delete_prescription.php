<?php
// Include database connection
include '../connection.php';

// Get prescription ID from URL parameter
$prescription_id = $_GET['prescription_id'];

// Delete prescription from database
$sql = "DELETE FROM prescription WHERE prescription_id = '$prescription_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Prescription deleted successfully, redirect back to prescriptions page
    header("Location: admin.php");
} else {
    // Error deleting prescription
    echo '<div class="alert alert-danger" role="alert">Error deleting prescription.</div>';
}

// Close database connection
mysqli_close($conn);
?>
