<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Admin View Appointment</title>
</head>

<body>
    <style>

.footer {
        background-color: black;
        color: white;
        text-align: center;
        bottom: 0;
        position: fixed;
        width: 100%;


    }


    </style>
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
                        <a class="nav-link " aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="staffs.php">Staffs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="blogview.php">Post Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php">Post Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Feedback.php">Patient Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <span class="badge text-bg-light">Welcome Admin</span>
                    </li>


                </ul>

                <form class="d-flex" role="search">
                    <a class="btn btn-primary" href="logouts.php?staff_id=<?php echo $_SESSION['staff_id']; ?>">
                        <h6>Log out</h6>
                    </a>
                </form>

            </div>
        </div>
    </nav>
    <!-- Navbar ends -->
    <br>
    <?php
require '../connection.php';


if(isset($_POST['delete_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $sql = "DELETE FROM appointments WHERE appointment_id='$appointment_id'";
    mysqli_query($conn, $sql);
}


$sql = "SELECT * FROM appointments";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    echo '<div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        $status = "";
        if($row['accepted'] == 0 && $row['rejected'] == 0) {
            $status = "Awaiting Decision";
            $status_class = "table-warning";
        } else if($row['rejected'] == 1) {
            $status = "Rejected";
            $status_class = "table-danger";
        } else if($row['accepted'] == 1) {
            $status = "Accepted";
            $status_class = "table-success";
        }
        echo '<tr class="' . $status_class . '">';
        echo '<td>' . $row['appointment_date'] . '</td>';
        echo '<td>' . $row['appointment_time'] . '</td>';
        echo '<td>' . $row['reason'] . '</td>';
        echo '<td>' . $status . '</td>';
        echo '<td><form method="post"><input type="hidden" name="appointment_id" value="' . $row['appointment_id'] . '"><button type="submit" name="delete_appointment" class="btn btn-danger">Delete</button></form></td>';
        echo '</tr>';
    }
    echo '</tbody></table></div>';
} else {
    echo '<div class="col-md-8"><p>No appointments found.</p></div>';
}

mysqli_close($conn);
?>









    <!-- footer starts -->
    <footer class="footer">
        <p>Mofor Practice care &copy; 2023</p>
    </footer>
    <!-- footer Ends -->




</body>

</html>