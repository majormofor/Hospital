<?php
//connect to database
require '../connection.php';
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../home.html');
    exit;
?>