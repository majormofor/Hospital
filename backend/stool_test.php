<?php
    session_start();
    require '../connection.php';

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
     
        // Get the form data
        $test_date = mysqli_real_escape_string($conn, $_POST['test_date']);
        $test_name = mysqli_real_escape_string($conn, $_POST['test_name']);
        $appearance = mysqli_real_escape_string($conn, $_POST['appearance']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $pH = mysqli_real_escape_string($conn, $_POST['ph']);
        $blood = mysqli_real_escape_string($conn, $_POST['blood']);
        $nitrite = mysqli_real_escape_string($conn, $_POST['nitrite']);
        $ova_parasites = mysqli_real_escape_string($conn, $_POST['ova_parasites']);
        $cdiff_toxin = mysqli_real_escape_string($conn, $_POST['cdiff_toxin']);
        $calprotectin = mysqli_real_escape_string($conn, $_POST['calprotectin']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);

        // Get the patient ID using the first name
        $sql = "SELECT patient_id FROM patients WHERE patient_id = '$patient_id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $patient_id = $row['patient_id'];
        } else {
            // Handle error if patient not found
            echo "<script> alert('Patient not found!!');</script>";
            exit;
        }

        // Get the staff ID from the session
        $staff_id = $_SESSION['staff_id'];

        // Prepare the SQL query
        $sql = "INSERT INTO stool_tests (test_date, test_name, appearance, color, pH, blood, nitrite, ova_parasites, cdiff_toxin, calprotectin, description, patient_id, staff_id) 
                VALUES ('$test_date', '$test_name', '$appearance', '$color', '$pH', '$blood', '$nitrite', '$ova_parasites', '$cdiff_toxin', '$calprotectin', '$description', '$patient_id', '$staff_id')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Test result added successfully!');</script>";
            header('Location: staff.php');

        } else {
            echo "<script> alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
?>