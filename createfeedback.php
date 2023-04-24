<?php

require 'connection.php';
// Process form submission
if (isset($_POST['submit'])) {
    $patient_name = $_POST['patient_name'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    // Escape special characters to prevent SQL injection
    $patient_name = mysqli_real_escape_string($conn, $patient_name);
    $title = mysqli_real_escape_string($conn, $title);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert form data into database
    $sql = "INSERT INTO patient_testimonials (patient_name, title, message) VALUES ('$patient_name', '$title', '$message')";
    if (mysqli_query($conn, $sql)) {
		echo "<script> alert('Testimonial created successfully!');</script>";
		header('Location: /hospital/backend/patient.php');
		exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Testimonial</title>
    <!-- include bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        padding: 0px;
    }

    h1 {
        margin-top: 0;
        font-size: 32px;
    }

    form {
        background-color: white;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #ccc;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0069d9;
    }

    .footer {
        background-color: black;
        color: white;
        text-align: center;
        bottom: 0;
        position: fixed;
        width: 100%;


    }
    </style>
</head>

<body>

    <!-- Navbar starts -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/patient/images/log.png" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top">
                Mofor Practise Care
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../patient.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="staffs.php">Staffs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:moformajor@gmail.com">Contact Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../hospital/backend/Feedback.php">Patient Testimonial</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <!-- Navbar ends -->
    <div class="container">
        <h1>Patient Testimonial Form</h1>
        <form method="POST" action="">
            <label>Patient Name:</label>
            <input type="text" name="patient_name" required>
            <label>Title of Testimonial:</label>
            <input type="text" name="title" required>
            <label>Testimonial Message:</label>
            <textarea name="message" rows="5" required></textarea>
            <input type="submit" name="submit" value="Submit Testimonial">
        </form>
    </div>

    <!-- footer starts -->
    <footer class="footer">
        <p>Mofor Practice care &copy; 2023</p>
    </footer>

    <!-- footer Ends -->
</body>

</html>