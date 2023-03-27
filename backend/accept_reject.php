

<?php
    require '../connection.php';
    session_start();

    $appointment_id = $_POST['appointment_id'];
    $staff_id = $_SESSION['staff_id'];
    $decision = $_POST['decision'];

    // Update the appointment as accepted or rejected
    if ($decision == 'accept') {
        $sql = "UPDATE appointments SET accepted = 1, staff_id = '$staff_id' WHERE appointment_id = '$appointment_id'";
    } else {
        $sql = "UPDATE appointments SET rejected = 1, staff_id = '$staff_id' WHERE appointment_id = '$appointment_id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: staff.php');
        exit;
    } else {
        echo "Error updating appointment: " . mysqli_error($conn);
    }
?>
