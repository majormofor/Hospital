

<?php
        // Database connection details
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'mofor_practice_db';

        // Connect to the database
        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
?>