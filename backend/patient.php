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
// mysqli_close($conn);
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
        <!-- css style -->
        <style>
            .blac {
            margin-top: 50px;
            border: 2px solid #005EB8;
                padding: 20px;
                margin: 20px auto;
                /* max-width: 800px; */
            }

</style>
<?php
require '../connection.php';

// Get patient ID from session
$patient_id = $_SESSION['patient_id'];


$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

// Fetch patient data
$row = mysqli_fetch_assoc($result);

?>
     
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
                    <a class="nav-link " aria-current="page" href="patient.php">Home</a>
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
                    <a class="nav-link" href="Feedback.php">Patient Testimonial</a>
                </li>
                
      </ul>
      <ul class="nav justify-content-end">
        <li class="nav-item">
             <a class="badge text-bg-light nav-link">Welcome <?php echo $row['firstname']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../createfeedback.php">Write a Testimonial</a>
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


            <div class="container blac">
                <div class="row">
                    <div class="col-md-12">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">View Prescriptions</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Book an Appointment</button>
                            <button class="nav-link" id="v-pills-appointment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appointment" type="button" role="tab" aria-controls="v-pills-appointment" aria-selected="false">View Appointments</button>
                            <button class="nav-link" id="v-pills-MedicalRecord-tab" data-bs-toggle="pill" data-bs-target="#v-pills-MedicalRecord" type="button" role="tab" aria-controls="v-MedicalRecord" aria-selected="false">Medical Test Records</button>


                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

                            <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome <?php echo $row['firstname']; ?> to Mofor Practice Care</h1>
            <p>We care about your health and well-being. Our team of experienced medical professionals is dedicated to providing you with the best possible care.</p>
            <hr class="my-4">
            <p>On our website, you can book appointments, check your medical results, and keep track of your health history. Just by using the links at the left hand side of these page</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../assets/images/appoint2.png" alt="Card image cap" height = "150" width = "350">
                    <div class="card-body">
                        <h5 class="card-title">Book an Appointment</h5>
                        <p class="card-text">Easily book an appointment with one of our medical professionals online.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../assets/images/test.jpg" alt="Card image cap" height = "150" width = "350">
                    <div class="card-body">
                       <h5 class="card-title">Write a Testimonial</h5>
                        <p class="card-text">Share your experience and help others by writing a testimonial about your care at Mofor Practice.</p>
                        <a href="#" class="btn btn-primary">Write a Testimonial</a>
                        </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card">
                        <img class="card-img-top" src="../assets/images/test1.jpg" alt="Card image cap" height = "150" width = "350">

                        <div class="card-body">
                        <h5 class="card-title">Testimonials</h5>
                            <p class="card-text">Hear from patients like you about their experiences at Mofor Practice Care.</p>
                            <a href="#" class="btn btn-primary">Read Testimonials</a> </div>
                        </div>
                        </div>
                        </div>
                        </div>

                            </div>
                            
                            <!-- patient profile starts -->
                            

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">

                            <?php 
                            // Include database connection
                            include '../connection.php';

                            // Get patient ID from session
                            $patient_id = $_SESSION['patient_id'];

                            // Query patient data for patient ID
                            $sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
                            $result = mysqli_query($conn, $sql);

                            // Check if there is a patient with this ID
                            if (mysqli_num_rows($result) > 0) {
                                // Get patient data
                                $row = mysqli_fetch_assoc($result);
                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];
                                $email = $row['email'];
                                $dob = $row['dob'];
                                $maritalstatus = $row['maritalstatus'];
                                $address = $row['address'];
                                $nationality = $row['nationality'];
                            } else {
                                // Patient not found
                                echo "Patient not found.";
                                exit;
                            }
                            ?>



                            <div class="container">
                            <h1><?php echo $firstname . " " . $lastname ?>'s Profile</h1>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>First Name:</strong> <?php echo $firstname ?></p>
                                    <p><strong>Last Name:</strong> <?php echo $lastname ?></p>
                                    <p><strong>Email:</strong> <?php echo $email ?></p>
                                    <p><strong>Date of Birth:</strong> <?php echo $dob ?></p>
                                    <p><strong>Marital Status:</strong> <?php echo $maritalstatus ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Address:</strong> <?php echo $address ?></p>
                                    <p><strong>Nationality:</strong> <?php echo $nationality ?></p>
                                    <a href='updatepatient.php?patient_id=<?php echo $row["patient_id"]; ?>' class='btn btn-primary'>Edit</a>

                                </div>
                            </div>
                        </div>
                            </div>
                            
                            <!-- patient profile ends -->

                            <!-- book an appointment start -->

                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <?php


                                    // Include database connection
                                    include '../connection.php';

                                    // Get patient ID from session
                                    $patient_id = $_SESSION['patient_id'];

                                    // Query prescription data for patient ID
                                    $sql = "SELECT * FROM prescription WHERE patient_id = '$patient_id'";
                                    $result = mysqli_query($conn, $sql);

                                    // Check if there are any prescriptions for this patient
                                    if (mysqli_num_rows($result) > 0) {
                                        // Print prescription data in a table
                                        echo '<div class="container">';
                                        echo '<h1 class="text-center mb-5">Your Prescriptions</h1>';
                                        echo '<div class="table-responsive">';
                                        echo '<table class="table table-striped">';
                                        echo '<thead>';
                                        echo '<tr><th>Prescription ID</th><th>Prescription Date</th><th>Medicine Name</th><th>Dosage</th><th>Frequency</th><th>Instructions</th></tr>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['prescription_id'] . "</td>";
                                            echo "<td>" . $row['prescription_date'] . "</td>";
                                            echo "<td>" . $row['medicine_name'] . "</td>";
                                            echo "<td>" . $row['dosage'] . "</td>";
                                            echo "<td>" . $row['frequency'] . "</td>";
                                            echo "<td>" . $row['instructions'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo '</tbody>';
                                        echo '</table>';
                                        echo '</div>';
                                        echo '</div>';
                                    } else {
                                        echo '<div class="container">';
                                        echo '<h2 class="text-center mt-5">You have no prescriptions.</h2>';
                                        echo '</div>';
                                    }

                                    // Close database connection
                                    mysqli_close($conn);
                                    ?>

                            </div>
                           <!-- book an appointment End -->
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
                                    // mysqli_close($conn);
                                    ?>
                                </tbody>
                                </table>

                                </div>
                            <div class="col-md-2">                                  
                            <img src="../assets/images/appoint.jpg" alt="Doctor Appointmrnt" >
                            </div>
                            </div>
                            </div>


                            <!-- Medical Test Record  start-->
                           
                            <div class="tab-pane fade" id="v-pills-MedicalRecord" role="tabpanel" aria-labelledby="v-pills-MedicalRecord-tab" tabindex="0">
                            <div class="blac">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-h-tab" data-bs-toggle="pill" data-bs-target="#pills-h" type="button" role="tab" aria-controls="pills-h" aria-selected="true"> Urinalysis Test</button>
                                </li>
                            <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-ho-tab" data-bs-toggle="pill" data-bs-target="#pills-ho" type="button" role="tab" aria-controls="pills-ho" aria-selected="true"> Stool Test</button>
                                </li>
                            <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-hom-tab" data-bs-toggle="pill" data-bs-target="#pills-hom" type="button" role="tab" aria-controls="pills-hom" aria-selected="true"> Imaging Testing</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Blood Count Test</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Lipid Profile Test</button>
                                </li>  

                                </ul>



                               
                                <div class="tab-content" id="pills-tabContent">
                                    <!-- Urinalysis Test stat -->
                                <div class="tab-pane fade show active" id="pills-h" role="tabpanel" aria-labelledby="pills-h-tab" tabindex="0">
                                <?php
                                        // session_start();
                                        // require '../connection.php';

                                        // Get the patient ID from the session
                                        $patient_id = $_SESSION['patient_id'];

                                        // Prepare the SQL query
                                        $sql = "SELECT * FROM urinalysis WHERE patient_id = '$patient_id'";

                                        // Execute the query
                                        $result = mysqli_query($conn, $sql);

                                        // Check if any test results found
                                        if (mysqli_num_rows($result) > 0) {
                                            // Output table header
                                            echo '<table class="table table-striped">';
                                            echo '<thead><tr>';
                                            echo '<th scope="col">Test ID</th>';
                                            echo '<th scope="col">Test Date</th>';
                                            echo '<th scope="col">Test Name</th>';
                                            echo '<th scope="col">Color</th>';
                                            echo '<th scope="col">pH</th>';
                                            echo '<th scope="col">Glucose</th>';
                                            echo '<th scope="col">Ketones</th>';
                                            echo '<th scope="col">Leukocytes</th>';
                                            echo '<th scope="col">Protein</th>';
                                            echo '<th scope="col">Staff Name</th>';
                                            echo '</tr></thead>';
                                            echo '<tbody>';

                                            // Output test results
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $urine_id = $row['urine_id'];
                                                $test_date = $row['test_date'];
                                                $test_name = $row['test_name'];
                                                $color = $row['color'];
                                                $ph = $row['pH'];
                                                $glucose = $row['glucose'];
                                                $ketones = $row['ketones'];
                                                $leukocytes = $row['leukocytes'];
                                                $protein = $row['protein'];
                                                $staff_id = $row['staff_id'];


                                                $sql_staff = "SELECT CONCAT(first_name, ' ', last_name) AS staff_name FROM staffs WHERE staff_id = '$staff_id' LIMIT 1";
                                                $result_staff = mysqli_query($conn, $sql_staff);
                                                $staff_name = mysqli_fetch_assoc($result_staff)['staff_name'];
                                                // Output test result row
                                                echo '<tr>';
                                                echo '<th scope="row">' . $urine_id . '</th>';
                                                echo '<td>' . $test_date . '</td>';
                                                echo '<td>' . $test_name . '</td>';
                                                echo '<td>' . $color . '</td>';
                                                echo '<td>' . $ph . '</td>';
                                                echo '<td>' . $glucose . '</td>';
                                                echo '<td>' . $ketones . '</td>';
                                                echo '<td>' . $leukocytes . '</td>';
                                                echo '<td>' . $protein . '</td>';
                                                echo '<td>' . $staff_name . '</td>';
                                                echo '</tr>';
                                            }

                                            // Output table footer
                                            echo '</tbody></table>';
                                        } else {
                                            // Output message if no test results found
                                            echo '<div class="alert alert-info" role="alert">No Urinalysis test results found!</div>';
                                        }
                                    ?>

                                </div>
                                <!-- Urinalysis Test End  -->

                                <!-- Stool Test start -->
                                <div class="tab-pane fade" id="pills-ho" role="tabpanel" aria-labelledby="pills-ho-tab" tabindex="0">
                                <div class="container">
                                <h1>Stool Test Results</h1>
                                <hr>

                                <!-- Display the test results in a table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Test Date</th>
                                            <th>Test Name</th>
                                            <th>Appearance</th>
                                            <th>Color</th>
                                            <th>pH</th>
                                            <th>Blood</th>
                                            <th>Nitrite</th>
                                            <th>Ova &amp; Parasites</th>
                                            <th>C. difficile Toxin</th>
                                            <th>Calprotectin</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           
                                             // SQL query to retrieve stool test results
                                                 $sql = "SELECT * FROM stool_tests";
                                                 // Execute the query
                                        $result = mysqli_query($conn, $sql);
                                                // Check if any results were returned
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['test_date'] . "</td>";
                                                    echo "<td>" . $row['test_name'] . "</td>";
                                                    echo "<td>" . $row['appearance'] . "</td>";
                                                    echo "<td>" . $row['color'] . "</td>";
                                                    echo "<td>" . $row['pH'] . "</td>";
                                                    echo "<td>" . $row['blood'] . "</td>";
                                                    echo "<td>" . $row['nitrite'] . "</td>";
                                                    echo "<td>" . $row['ova_parasites'] . "</td>";
                                                    echo "<td>" . $row['cdiff_toxin'] . "</td>";
                                                    echo "<td>" . $row['calprotectin'] . "</td>";
                                                    echo "<td>" . $row['description'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='11'>No results found.</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            
                                </div>
                              <!-- Stool Test End -->


                                <!-- Imaging test start -->

                                <div class="tab-pane fade " id="pills-hom" role="tabpanel" aria-labelledby="pills-hom-tab" tabindex="0">
                                t <div class="container">
                                    <h1>Imaging Test Results</h1>
                                    <hr>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Test ID</th>
                                                <th>Test Date</th>
                                                <th>Test Name</th>
                                                <th>Image Type</th>
                                                <th>Description</th>
                                                <th>File/Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                             // SQL query to retrieve stool test results
                                             $sql = "SELECT * FROM imaging";
                                             // Execute the query
                                           $result = mysqli_query($conn, $sql);
                                     
                                            
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['imaging_id']; ?></td>
                                                <td><?php echo $row['test_date']; ?></td>
                                                <td><?php echo $row['test_name']; ?></td>
                                                <td><?php echo $row['image_type']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td>
                                                   <img src="../assets/uploads/<?php echo $row['file']; ?>" alt="Image" class="img-fluid" style="max-width: 400px;">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                                <!-- Imaging test end -->

                                 <!-- Blood Count test start -->
                                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <?php
                                    
                                    require '../connection.php';

                                    // Get the patient ID from the session
                                    $patient_id = $_SESSION['patient_id'];

                                    // Prepare the SQL query to fetch the blood count results along with the staff name who conducted the test
                                    $sql = "SELECT b.*, s.first_name, s.last_name FROM blood_count_test b 
                                            JOIN staffs s ON b.staff_id = s.staff_id 
                                            WHERE b.patient_id = $patient_id";

                                    // Execute the query
                                    $result = mysqli_query($conn, $sql);

                                    // Check if the query was successful
                                    if ($result) {
                                        // Check if there are any results
                                        if (mysqli_num_rows($result) > 0) {
                                            // Display the results in a table
                                            echo "<table class='table'>
                                                    <thead>
                                                        <tr>
                                                            <th>Test Date</th>
                                                            <th>Test Name</th>
                                                            <th>Red Blood Cells</th>
                                                            <th>White Blood Cells</th>
                                                            <th>Platelet</th>
                                                            <th>Hemoglobin</th>
                                                            <th>Description</th>
                                                            <th>Staff Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>
                                                        <td>" . $row['test_date'] . "</td>
                                                        <td>" . $row['test_name'] . "</td>
                                                        <td>" . $row['red_blood_cells'] . " x 10^6/ul</td>
                                                        <td>" . $row['white_blood_cells'] . " x 10^3/ul</td>
                                                        <td>" . $row['platelet'] . " x 10^3/ul</td>
                                                        <td>" . $row['hemoglobin'] . " g/dl</td>
                                                        <td>" . $row['description'] . "</td>
                                                        <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                                                    </tr>";
                                            }
                                            echo "</tbody>
                                                </table>";
                                        } else {
                                            // No results found
                                            echo "No blood count results found for this patient.";
                                        }
                                    } else {
                                        // Query execution failed
                                        echo "Error: " . mysqli_error($conn);
                                    }

                                    // // Close the database connection
                                    // mysqli_close($conn);
                                ?>
                                </div>
                                <!-- Blood Count test end -->
                                <!-- Lipid Profile Test start -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <!-- Display lipid profile test results form -->
                                <div class="container">
                                    <h2>Lipid Profile Test Results</h2>
                                    <hr>
                                    <?php
                                        // Retrieve patient's lipid profile test results from database
                                        $patient_id = $_SESSION['patient_id'];
                                        $sql = "SELECT * FROM lipid_panel WHERE patient_id = $patient_id";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="../assets/images/lipid1.jpg" alt="Lipid Profile Test Image" style="width:100%">
                                        </div>
                                        <div class="col-md-8">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Total Cholesterol:</strong></td>
                                                        <td><?php echo $row['total_cholesterol']; ?> mg/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>HDL Cholesterol:</strong></td>
                                                        <td><?php echo $row['hdl_cholesterol']; ?> mg/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>LDL Cholesterol:</strong></td>
                                                        <td><?php echo $row['ldl_cholesterol']; ?> mg/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Triglycerides:</strong></td>
                                                        <td><?php echo $row['triglycerides']; ?> mg/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Test Date:</strong></td>
                                                        <td><?php echo $row['test_date']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Test Name:</strong></td>
                                                        <td><?php echo $row['test_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Description:</strong></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                            }
                                        } else {
                                            echo "<p>No lipid profile test results found.</p>";
                                        }
                                    ?>
                                </div>

                                 <!-- Lipid Profile Test end -->
                                

                                  <!-- Stool Test Start-->
                                <div class="tab-pane fade" id="pills-stool" role="tabpanel" aria-labelledby="pills-stool-tab" tabindex="0">
                             
   
                                </div>
                                
                                <!-- Stool Test End-->

                                <div class="tab-pane fade" id="pills-imaging" role="tabpanel" aria-labelledby="pills-imaging-tab" tabindex="0">
                               

                                </div>

                                </div>



                            </div>
                            </div>
                           <!-- Medical Test Record  End-->

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