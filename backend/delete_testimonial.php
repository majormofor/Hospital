<?php
    require '../connection.php';

    // Get the testimonial ID from the POST data
    $testimonial_id = $_POST['testimonial_id'];

    // Delete the testimonial record from the database
    $query = "DELETE FROM patient_testimonials WHERE id = $testimonial_id";
    mysqli_query($conn, $query);

    // Redirect back to the testimonials page
    header('Location: admin.php');
    exit();
?>
