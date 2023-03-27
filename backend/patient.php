<?php

require '../connection.php';

session_start();
if(!isset($_SESSION['patient_id'])) {
    header('Location: ../login.php');
    exit;
}
if (isset($_POST['book']) ) {

    // get the data from the form
    $patient_id = $_SESSION['patient_id'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $reason = $_POST['reason'];

// prepare the SQL statement
$sql = "INSERT INTO appointments (patient_id, appointment_date, appointment_time, reason) VALUES ('$patient_id', '$date', '$time', '$reason')";

// execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "<script> alert('Appointment booked successfully!');</script>";
    header('Location: patient.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
}
// } else {
// echo "Please fill all the fields.";
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css ?v=<?php echo time();?>">
    <title>Welcome</title>
</head>
<body>
     
    <!-- Navbar starts -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <img src="/patient/images/log.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
           Mofor Practise Care
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                 <li class="nav-item">
                     <a class="nav-link" href="staffs.php">Staffs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Feedback.php">Patient Reviews</a>
                </li>
                
      </ul>
      <ul class="nav justify-content-end">
        <li class="nav-item">
             <a class="badge text-bg-light nav-link">Welcome Mofor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="createfeedback.php">Create a Feedback</a>
        </li>
       
      </ul>
     
      <form class="d-flex" role="search">
      <a class="btn btn-primary" href="logout.php" role="button"><h6>Log Out</h6></a>
      </form>
      
    </div>
  </div>
</nav>
        <!-- Navbar ends -->

   <main>
            <a href="appointment.php">Book an Appointment</a>


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Book an Appointment</button>
                            <button class="nav-link" id="v-pills-appointment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appointment" type="button" role="tab" aria-controls="v-pills-appointment" aria-selected="false">View Appointment</button>


                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0"><img src="../assets/images/book.avif" alt="ok" sizes=""></div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                            <div class="row">
                            <div class="col-md-5">
                                <form action="" method="post">
                                    <h3 class="mb-4">Book An Appointment</h3>
                                    <input type="hidden" name="patient_id" value="<?php echo $_SESSION['patient_id']; ?>">
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" id="date" name="appointment_date" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="time">Time:</label>
                                        <input type="time" id="time" name="appointment_time" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="reason">Reason for Appointment:</label>
                                        <textarea id="reason" name="reason" class="form-control" rows="4"></textarea>
                                    </div>

                                    <button type="submit" name = "book" class="btn btn-primary">Submit</button>
                                </form>
                            </div>



                            <div class="col-md-6">
                                <img src="../assets/images/book.png" alt="ok" sizes="">
                            </div>
                            </div>
                            </div>
                            

                            <div class="tab-pane fade" id="v-pills-appointment" role="tabpanel" aria-labelledby="v-pills-appointment-tab" tabindex="0">
                            <div class="row">
                    
                            <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../connection.php';
                                    
                                    if(!isset($_SESSION['patient_id'])) {
                                        header('Location: login.php');
                                        exit;
                                    }
                                    $patient_id = $_SESSION['patient_id'];
                                    $sql = "SELECT * FROM appointments WHERE patient_id='$patient_id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
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
                                        echo '</tr>';
                                    }
                                    } else {
                                    echo '<tr><td colspan="4">No appointments found.</td></tr>';
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                                </table>

                                </div>
                            <div class="col-md-2">                                  
                            <img src="../assets/images/appoint.jpg" alt="Doctor Appointmrnt" >
                            </div>
                            </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-settingsaa" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="v-pills-settingsaa" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>

                        </div>
                        </div>

                    </div>
                </div>
            </div>


  </main>

    <!-- footer starts -->
    <footer class="footer">
	    <p>Mofor Practice care &copy; 2023</p>
	</footer>
    <!-- footer Ends -->
    
</body>
</html>