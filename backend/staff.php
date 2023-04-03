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
	
    <title>Staff Page</title>
</head>
<body>
                        <?php
                        require '../connection.php';

                        // Get patient ID from session
                        $staff_id = $_SESSION['staff_id'];


                        $sql = "SELECT * FROM staffs WHERE staff_id = '$staff_id'";
                        $result = mysqli_query($conn, $sql);

                        // Fetch patient data
                        $row = mysqli_fetch_assoc($result);

                        ?>

<img src="../assets/images/stafff.jpg" alt="background image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">

<style>

.blac {
      margin-top: 50px;
      border: 2px solid #005EB8;
        padding: 20px;
        margin: 20px auto;
        /* max-width: 800px; */

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
                     <a class="btn btn-primary"href="logouts.php?staff_id=<?php echo $_SESSION['staff_id']; ?>"><h6>Log out</h6></a>
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
                        <button class="nav-link" id="pills-medication-tab" data-bs-toggle="pill" data-bs-target="#pills-medication" type="button" role="tab" aria-controls="pills-medication" aria-selected="false">Prescription Form</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Record-tab" data-bs-toggle="pill" data-bs-target="#pills-Record" type="button" role="tab" aria-controls="pills-Record" aria-selected="false">Medical Record Form</button>
                    </li>
                    

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

 <div class="container mt-5">
        <h2>Welcome <?php echo $row["first_name"]; ?> to the Staff Homepage</h2>
        <p>As a member of our team, we appreciate your hard work and dedication to providing high-quality healthcare to our patients.</p>
        <hr>
        <h4>Upcoming Tasks</h4>
        <ul>
            <li>Meeting with the hospital administration at 2:00 PM today</li>
            <li>Follow up with patient John Doe about lab results</li>
            <li>Prepare for upcoming surgery on patient Jane Smith</li>
        </ul>
        <hr>
        <h4>Important Announcements</h4>
        <ul>
            <li>Reminder to complete annual training by end of month</li>
            <li>New protocols for COVID-19 screening and testing</li>
            <li>Upcoming hospital-wide survey to gather feedback from patients and staff</li>
        </ul>
        <hr>
        <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="../assets/images/blog.jpg" alt="Card image cap" height = "150" width = "350">
                    <div class="card-body">
                       <h5 class="card-title">Write a Blog Post</h5>
                        <p class="card-text">Share your experience and knowledge to help others by writing a Blog about your care at Mofor Practice.</p>
                        <a href="blogpost.php" class="btn btn-primary">Write a Blog Post</a>
                        </div>
                            </div>
                        </div><div class="col-md-6">
                        <div class="card">
                            <img class="card-img-top" src="../assets/images/test.jpg" alt="Card image cap" height = "150" width = "350">
                            <div class="card-body">
                            <h5 class="card-title">Write a Testimonial</h5>
                                <p class="card-text">Share your experience and help others by writing a testimonial about your care at Mofor Practice.</p>
                                <a href="../createfeedback.php" class="btn btn-primary">Write a Testimonial</a>
                                </div>
                                    </div>
                                </div>
                                </div>





    
    </div>


                    </div>
                   
                   
                   
                    <!-- Staff profile starts -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="container">
                    
                                        
                                                <?php
                                            require '../connection.php';

                                            


                                // Check if user is logged in
                                if (!isset($_SESSION['staff_id'])) {
                                    header("Location: stafflogin.php");
                                    exit();
                                }

                            // Retrieve staff information from database
                            $sql = "SELECT * FROM staffs WHERE staff_id = " . $_SESSION['staff_id'];
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) == 1) {
                                // Output data for current user
                                $row = mysqli_fetch_assoc($result);
                                ?>

                                    <div class="card" style="width: 70rem;">
                                    <div class="card-header">
                                    <h2><?php echo $row["first_name"]; ?> Profile</h2>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><p>Staff ID: <?php echo $row["staff_id"]; ?></p></li>
                                        <li class="list-group-item"><p>First Name: <?php echo $row["first_name"]; ?></p></li>
                                        <li class="list-group-item"><p>Last Name: <?php echo $row["last_name"]; ?></p></li>
                                        <li class="list-group-item"><p>Job Title: <?php echo $row["job_title"]; ?></p></li>
                                        <li class="list-group-item"><p>Email: <?php echo $row["email"]; ?></p></li>
                                        <li class="list-group-item"><p>Phone Number: <?php echo $row["phone"]; ?></p></li>
                                        <li class="list-group-item"><p>Address: <?php echo $row["address"]; ?></p></li>
                                        <a href='edit_staff.php?staff_id=<?php echo $row["staff_id"]; ?>' class='btn btn-primary'>Edit</a>

                                    </ul>
                                    </div>
                                    
                                <?php
                                } else {
                                    echo "0 results";
                                }
                            
                                ?>
                            </div>

                                </div>
                <!-- Staff profile -->

                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

                    <div class="container">
    <h2>Accept/Reject Appointments</h2>         
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Patient First Name</th>
                <th>Patient Last Name</th>

                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require '../connection.php';
            // Get all pending appointments
            $sql = "SELECT appointments.*, patients.* FROM appointments JOIN patients ON appointments.patient_id = patients.patient_id WHERE appointments.accepted = 0 AND appointments.rejected = 0";
            
            
            $result = mysqli_query($conn, $sql);
            
               
                if(!isset($_SESSION['staff_id'])) {
                    header('Location: ../stafflogin.php');
                    exit;
                }
            
                $staff_id = $_SESSION['staff_id'];
            
            
            
            
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>

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
                        <!-- My appointment ends -->

                        <!-- medication starts -->

                        <div class="tab-pane fade" id="pills-medication" role="tabpanel" aria-labelledby="pills-medication-tab" tabindex="0">
                        <?php
                            $staff_id = $_SESSION['staff_id'];

                            // Check if form is submitted
                            if (isset($_POST['submit'])) {
                                // Include database connection
                                include '../connection.php';

                                // Prepare and bind parameters
                                $stmt = $conn->prepare("INSERT INTO prescription (patient_id, prescription_date, medicine_name, dosage, frequency, instructions, staff_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("isssssi", $patient_id, $prescription_date, $medicine_name, $dosage, $frequency, $instruction, $staff_id);

                                // Get form data
                                $patient_id = $_POST['patient_id'];
                                $prescription_date = $_POST['prescription_date'];
                                $medicine_name = $_POST['medicine_name'];
                                $dosage = $_POST['dosage'];
                                $frequency = $_POST['frequency'];
                                $instruction = $_POST['instructions'];

                                // Execute query and check if successful
                                if ($stmt->execute()) {
                                    echo "<script> alert('Prescription created successfully.');</script>";
                                    
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close statement and connection
                                $stmt->close();
                                $conn->close();
                            }
                            ?>
                       

                            <div class="row">
                                <div class="col-md-5">
                                    <img src="../assets/images/prescription.jpg" alt="Urine Image" height = "600px" width = "499px" >

                                </div>
                            <div class="col-md-7">
                                <h1>Create a Prescription</h1>
                                 <form method="POST">
                                        <div class="form-group">
                                            <label for="patient_id">Patient ID:</label>
                                            <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prescription_date">Prescription Date:</label>
                                            <input type="date" class="form-control" id="prescription_date" name="prescription_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="medicine_name">Medicine Name:</label>
                                            <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dosage">Dosage:</label>
                                            <input type="text" class="form-control" id="dosage" name="dosage" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="frequency">Frequency:</label>
                                            <input type="text" class="form-control" id="frequency" name="frequency" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="instruction">Instruction:</label>
                                            <input type="text" class="form-control" id="instruction" name="instructions" required>
                                        </div>
                                        <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                 </form>
                            </div>
                         </div>

                    
                    
                        </div>
                        <!-- medication ends -->


                        
                        <div class="tab-pane fade" id="pills-Record" role="tabpanel" aria-labelledby="pills-Record-tab" tabindex="0">
                        
                        <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-set-tab" data-bs-toggle="pill" data-bs-target="#v-pills-set" type="button" role="tab" aria-controls="v-pills-set" aria-selected="false">Imaging Test</button>

                            <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">BCT FORM</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Lipid Panel</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Urinalysis Test</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Stool Test</button>

                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                     <!-- imaging start -->
                        <div class="tab-pane fade show active" id="v-pills-set" role="tabpanel" aria-labelledby="v-pills-set-tab" tabindex="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="../assets/images/imaging.jpg" alt="Urine Image" height = "700px" width = "990px" >
                                </div>
                          <div class="col-md-8">
                            <h1>Imaging Test Result Form</h1>
                            <hr>
                            <form action="imaging_test.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="test_date">Test Date</label>
                                <input type="date" class="form-control" id="test_date" name="test_date" required>
                                </div>
                                <div class="form-group">
                                <label for="test_name">Test Name</label>
                                <input type="text" class="form-control" id="test_name" name="test_name" required>
                                </div>
                                <div class="form-group">
                                <label for="image_type">Image Type</label>
                                <select class="form-control" id="image_type" name="image_type" required>
                                    <option value="" selected disabled>Select Image Type</option>
                                    <option value="X-Ray">X-Ray</option>
                                    <option value="MRI">MRI</option>
                                    <option value="CT Scan">CT Scan</option>
                                    <option value="Ultrasound">Ultrasound</option>
                                    <option value="Other">Other</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="file">Upload Image/Report</label>
                                <input type="file" class="form-control-file" id="file" name="file" accept="image/*,.pdf,.doc,.docx,.txt">
                                </div>
                                <div class="form-group">
                                <label for="patient_id">Patient ID</label>
                                <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                        </div>
                            
                            </div>


                        </div>
                        <!-- imaging end -->




                        <!-- Blood count test start -->
                            <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="row">

                            
                            <div class="col-md-5">
                            <form method="post" action="process_blood_count.php">
                                <h3>Blood Count Test Form</h3>
                                <hr>
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
                                <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
                                </form> 
                                </div>
                            
                            <div class="col-md-5">
                                <img src="../assets/images/bloodcounttest.png" alt="test">
                            </div>
                            </div>
                            </div>
                            <!-- Blood count test ends -->

                            <!-- lipid panel test start -->
                            
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                    <img src="../assets/images/lipid.jpg" alt="Lipid Panel Image" height = "850px">
                                    </div>
                                    <div class="col-md-8">
                                    <h2>Lipid Panel Test</h2>
                                    <hr>
                                    <form method="POST" action="lipid_panel.php">
                                    <div class="form-group">
                                        <label for="lipid">Test Name</label>
                                        <input type="text" class="form-control" id="" name="test_name" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="hdl_cholesterol">Test Date</label>
                                        <input type="date" class="form-control" id="hdl_cholesterol" name="test_date" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="total_cholesterol">Total Cholesterol (mg/dL)</label>
                                        <input type="number" class="form-control" id="total_cholesterol" name="total_cholesterol" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="hdl_cholesterol">HDL Cholesterol (mg/dL)</label>
                                        <input type="number"  class="form-control" id="hdl_cholesterol" name="hdl_cholesterol" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="ldl_cholesterol">LDL Cholesterol (mg/dL)</label>
                                        <input type="number" class="form-control" id="ldl_cholesterol" name="ldl_cholesterol" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="triglycerides">Triglycerides (mg/dL)</label>
                                        <input type="number" class="form-control" id="triglycerides" name="triglycerides" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="patient_id">Patient ID:</label>
                                            <input type="number" class="form-control" id="patient_id" name="patient_id">
                                        </div>
                                                            
                                        <input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff_id']; ?>">
                                        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    </div>
                                </div>
                                </div>

                            </div>
                            <!-- lipid panel test ends -->
                            <!-- urinalysis Test start -->
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            
                            <div class="container">
                                <div class="row">
                                <div class="col-md-2">
                                    <img src="../assets/images/urine.jpg" alt="Urine Image" height = "1000px" width = "990px" >
                                </div>
                                    <div class="col-md-8">
                                    <h2>Urinalysis Test</h2>
                                    <hr>
                            <form method="post" action="urinalysis.php">
                                <div class="form-group">
                                    <label for="test_date">Test Date:</label>
                                    <input type="date" class="form-control" id="test_date" name="test_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="test_name">Test Name:</label>
                                    <input type="text" class="form-control" id="test_name" name="test_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="patient_id">Patient ID:</label>
                                    <input type="number" class="form-control" id="patient_id" name="patient_id">
                                </div>
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" id="color" name="color" required>
                                </div>
                                <div class="form-group">
                                    <label for="ph">pH:</label>
                                    <input type="text" class="form-control" id="ph" name="ph" required>
                                </div>
                                <div class="form-group">
                                    <label for="glucose">Glucose:</label>
                                    <input type="text" class="form-control" id="glucose" name="glucose" required>
                                </div>
                                <div class="form-group">
                                    <label for="ketones">Ketones:</label>
                                    <input type="text" class="form-control" id="ketones" name="ketones" required>
                                </div>
                                <div class="form-group">
                                    <label for="leukocytes">Leukocytes:</label>
                                    <input type="text" class="form-control" id="leukocytes" name="leukocytes" required>
                                </div>
                                <div class="form-group">
                                    <label for="protein">Protein:</label>
                                    <input type="text" class="form-control" id="protein" name="protein" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff_id']; ?>">
                                <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
                                </form>
                                
                                </div>
                                </div>
                                </div>
                                

                            </div>
                            <!-- Stool Test start -->
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                                <!-- HTML Form -->
                                <div class="container">
                                <div class="row">

                                <div class="col-md-2">
                                    <img src="../assets/images/stool.jpg" alt="Urine Image" height = "1200px" width = "990px" >
                                </div>
                                <div class="col-md-8 ">

                                        <h4>Stool Test Form</h4>
                                        <hr>
                                        
                                        <div class="card-body">
                                        <form method="post" action="stool_test.php">
                                            <div class="form-group">
                                            <label for="patient_id">Patient ID</label>
                                            <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="test_name">Test Name</label>
                                            <input type="text" class="form-control" id="test_name" name="test_name" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="test_date">Test Date</label>
                                            <input type="date" class="form-control" id="test_date" name="test_date" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="appearance">Appearance</label>
                                            <select class="form-control" id="appearance" name="appearance" required>
                                                <option value="">-- Select --</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Abnormal">Abnormal</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="color">Color</label>
                                            <select class="form-control" id="color" name="color" required>
                                                <option value="">-- Select --</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Abnormal">Abnormal</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="pH">pH</label>
                                            <input type="text" class="form-control" id="pH" name="pH" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="blood">Blood</label>
                                            <select class="form-control" id="blood" name="blood" required>
                                                <option value="">-- Select --</option>
                                                <option value="Negative">Negative</option>
                                                <option value="Positive">Positive</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="nitrite">Nitrite</label>
                                            <select class="form-control" id="nitrite" name="nitrite" required>
                                                <option value="">-- Select --</option>
                                                <option value="Negative">Negative</option>
                                                <option value="Positive">Positive</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <label for="ova_parasites">Ova & Parasites</label>
                                            <select class="form-control" id="ova_parasites" name="ova_parasites" required>
                                                <option value="">-- Select --</option>
                                                <option value="Negative">Negative</option>
                                                <option value="Positive">Positive</option>
                                            </select>
                                            </div>
                                            <div class="form-group">                                           
                                                <label for="cdiff_toxin">C. difficile Toxin</label>
                                                <select class="form-control" id="cdiff_toxin" name="cdiff_toxin" required>
                                                    <option value="">Select one</option>
                                                    <option value="Positive">Positive</option>
                                                    <option value="Negative">Negative</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="calprotectin">Calprotectin</label>
                                                <input type="text" class="form-control" id="calprotectin" name="calprotectin" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            </div>
                                            </div>

                            </div>
                    
                        </div>
                        </div>                     

                        </div>

                    
                
                
                
                
                
                
                
                </div>

                </div>


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

<!-- To check online and offline status -->
<?php
// Start session
// session_start();
require '../connection.php';
// Check if staff member is logged in
if (isset($_SESSION['staff_id'])) {
    // Update online status in database to "online"
    $staff_id = $_SESSION['staff_id'];
    $sql = "UPDATE staffs SET status = 'online' WHERE staff_id = $staff_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Check if staff member is logging out


?>
