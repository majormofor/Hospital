<?php
        session_start();
        require '../connection.php';

        if(isset($_POST['submit'])) {
        

            $test_date = mysqli_real_escape_string($conn, $_POST['test_date']);
            $test_name = mysqli_real_escape_string($conn, $_POST['test_name']);
            $total_cholesterol = mysqli_real_escape_string($conn, $_POST['total_cholesterol']);
            $hdl_cholesterol = mysqli_real_escape_string($conn, $_POST['hdl_cholesterol']);
            $ldl_cholesterol = mysqli_real_escape_string($conn, $_POST['ldl_cholesterol']);
            $triglycerides = mysqli_real_escape_string($conn, $_POST['triglycerides']);
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


            $sql = "INSERT INTO lipid_panel (test_date,test_name, total_cholesterol, hdl_cholesterol, ldl_cholesterol, triglycerides, description, patient_id, staff_id) VALUES ('$test_date','$test_name', '$total_cholesterol', '$hdl_cholesterol', '$ldl_cholesterol', '$triglycerides', '$description', '$patient_id', '$staff_id')";

            if(mysqli_query($conn, $sql)) {
                echo "<script>alert('Lipid panel test result has been added successfully!');</script>";
                header('Location: staff.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

     mysqli_close($conn);
  ?>
