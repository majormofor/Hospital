<?php
                         // Include database connection file
                         include '../connection.php';
                         
                           // Check if a delete request was submitted
                      // Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admission_id = $_POST["admission_id"];
    
    // Update beds table to set status to "available"
    $sql = "UPDATE beds
    JOIN admissions ON beds.bed_id = admissions.bed_id
    SET beds.status = 'available'
    WHERE admissions.admission_id = $admission_id";


    if ($conn->query($sql) !== TRUE) {
      echo "Error updating beds table: " . $conn->error;
    }
    
    // Delete record from admissions table
    $sql = "DELETE FROM admissions WHERE admission_id=$admission_id";
    if ($conn->query($sql) !== TRUE) {
      echo "Error deleting record: " . $conn->error;
    }else{
        header('Location: admin.php');

    }
  }
  
  // Retrieve list of admissions
  $sql = "SELECT admissions.*, patients.firstname, patients.lastname, beds.bed_number, admissions.admission_date, admissions.discharge_date, admissions.admission_reason 
  FROM admissions 
  INNER JOIN patients ON admissions.patient_id=patients.patient_id 
  INNER JOIN beds ON admissions.bed_id=beds.bed_id";
  $result = $conn->query($sql);
  
  ?>