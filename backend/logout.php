<?php
//connect to database
require '../connection.php';
    session_start();
    unset($_SESSION['patient_id']);
    session_destroy();
    header('Location: ../home.php');
    exit;

    ?>
