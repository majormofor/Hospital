<?php

session_start();
// Connect to the database
require '../connection.php';
// Get all pending appointments
$sql = "SELECT appointments.*, patients.firstname FROM appointments JOIN patients ON appointments.patient_id = patients.patient_id WHERE appointments.accepted = 0 AND appointments.rejected = 0";


$result = mysqli_query($conn, $sql);

   
                            if(!isset($_SESSION['staff_id'])) {
                                header('Location: ../stafflogin.php');
                                exit;
                            }

                            $staff_id = $_SESSION['staff_id'];


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
	
    <title>Staff</title>
</head>
<body>

<style>

.blac {
      margin-top: 50px;
      border: 2px solid #005EB8;
        padding: 20px;
        margin: 20px auto;
        /* max-width: 800px; */
    }
</style>

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
                        <a class="nav-link " aria-current="page" href="staff.php">Home</a>
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

                 <form class="d-flex" role="search">
                     <a class="btn btn-primary" href="logout.php" role="button"><h6>Log Out</h6></a>
                  </form>
        
             </div>
         </div>
    </nav>
     <!-- Navbar ends -->
    
    <div class="container blac">
            <div class="row">
                <div class="col-md-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Booked Appointment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Mine-tab" data-bs-toggle="pill" data-bs-target="#pills-Mine" type="button" role="tab" aria-controls="pills-Mine" aria-selected="false">My Appointedment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Record-tab" data-bs-toggle="pill" data-bs-target="#pills-Record" type="button" role="tab" aria-controls="pills-Record" aria-selected="false">Medical Record Form</button>
                    </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

                    <div class="container">
    <h2>Accept/Reject Appointments</h2>         
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['reason']; ?></td>
                <td>
                <form action="accept_reject.php" method="post">
                    <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                    <button type="submit" name="decision" value="accept" class="btn btn-success">Accept</button>
                    <button type="submit" name="decision" value="reject" class="btn btn-danger">Reject</button>
                 </form>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

                    </div>
                    <div class="tab-pane fade" id="pills-Mine" role="tabpanel" aria-labelledby="pills-Mine-tab" tabindex="0">
                        
                        <?php
                            require '../connection.php';

                         
                            // Select all accepted appointments for the current staff member
                            $sql = "SELECT * FROM appointments WHERE accepted = 1 AND staff_id = '$staff_id'";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0) {
                                // Output table headers
                                echo "<table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                
                                // Output each row of data
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>" . $row['patient_id'] . "</td>
                                            <td>" . $row['appointment_date'] . "</td>
                                            <td>" . $row['appointment_time'] . "</td>
                                            <td>" . $row['reason'] . "</td>
                                        </tr>";
                                }
                                
                                // Close the table
                                echo "</tbody></table>";
                            } else {
                                echo "No accepted appointments found.";
                            }

                            mysqli_close($conn);
                            ?>.

                        </div>
                        <div class="tab-pane fade" id="pills-Record" role="tabpanel" aria-labelledby="pills-Record-tab" tabindex="0">
                        
                        <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">BCT FORM</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            
                        <!-- Blood count test start -->
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <form method="post" action="process_blood_count.php">
                                <div class="form-group">
                                    <label for="test_date">Test Date:</label>
                                    <input type="date" class="form-control" id="test_date" name="test_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="test_name">Test Name:</label>
                                    <input type="text" class="form-control" id="test_name" name="test_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="red_blood_cells">Red Blood Cells (million/mm³):</label>
                                    <input type="number" step="0.01" class="form-control" id="red_blood_cells" name="red_blood_cells" required>
                                </div>
                                <div class="form-group">
                                    <label for="white_blood_cells">White Blood Cells (thousands/mm³):</label>
                                    <input type="number" step="0.01" class="form-control" id="white_blood_cells" name="white_blood_cells" required>
                                </div>
                                <div class="form-group">
                                    <label for="platelet">Platelet (thousands/mm³):</label>
                                    <input type="number" step="0.01" class="form-control" id="platelet" name="platelet" required>
                                </div>
                                <div class="form-group">
                                    <label for="hemoglobin">Hemoglobin (g/dL):</label>
                                    <input type="number" step="0.01" class="form-control" id="hemoglobin" name="hemoglobin" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="patient_id">Patient ID:</label>
                                    <input type="number" class="form-control" id="patient_id" name="patient_id">
                                </div>
                                <input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff_id']; ?>">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form> 

                            </div>
                            <!-- Blood count test ends -->
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                        </div>
                        </div>                     

                        </div>

                    
                
                
                
                
                
                
                
                </div>

                </div>


            </div>


    </div>



    <!-- footer starts -->
    <footer class="footer">
	    <p>Mofor Practice care &copy; 2023</p>
	</footer>
    <!-- footer Ends -->
    
</body>
</html>