<?php
//connect to data PAGE
require 'connection.php';
    session_start();
    session_unset();
    session_destroy();
    header('Location: home.html');
    exit;
?>