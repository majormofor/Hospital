<?php
include('../connection.php');

if(isset($_POST['delete'])) {
    $patient_id = $_POST['patient_id'];

     //Perform delete operation

     $sql1 = "DELETE FROM blood_count_test WHERE patient_id = '$patient_id'";
     $sql2 = "DELETE FROM imaging WHERE patient_id = '$patient_id'";
     $sql3 = "DELETE FROM lipid_panel WHERE patient_id = '$patient_id'";
     $sql4 = "DELETE FROM stool_tests WHERE patient_id = '$patient_id'";
     $sql5 = "DELETE FROM urinalysis WHERE patient_id = '$patient_id'";

     mysqli_query($conn, $sql1);
     mysqli_query($conn, $sql2);
     mysqli_query($conn, $sql3);
     mysqli_query($conn, $sql4);
     mysqli_query($conn, $sql5);

     header("Location: admin.php");
     exit;
    }
    ?> 

 
