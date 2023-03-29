<?php
// Include database connection file
include('../connection.php');

// Check if delete button is clicked
if(isset($_POST['delete'])){
    $patient_id = $_POST['patient_id'];
    // Delete patient from database
    $sql6 = "DELETE FROM patients WHERE patient_id = $patient_id";
    $patient_id = $_POST['patient_id'];
    $sql1 = "DELETE FROM blood_count_test WHERE patient_id = '$patient_id'";
    $sql2 = "DELETE FROM imaging WHERE patient_id = '$patient_id'";
    $sql3 = "DELETE FROM lipid_panel WHERE patient_id = '$patient_id'";
    $sql4 = "DELETE FROM stool_tests WHERE patient_id = '$patient_id'";
    $sql5 = "DELETE FROM urinalysis WHERE patient_id = '$patient_id'";
    
    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    mysqli_query($conn, $sql5);
    mysqli_query($conn, $sql6);

}

}

// Retrieve patient information from database
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);

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
	
    <title>Admin Page</title>
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

        table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}
		th {
			background-color: #ddd;
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
                    <a class="nav-link " aria-current="page" href="admin.php">Home</a>
                </li>
                                     
                <li class="nav-item">
                    <a class="nav-link" href="Feedback.php">Patient Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogform.php">Post Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Feedback.php">Patient Reviews</a>
                </li>
                <li class="nav-item">
                <span class="badge text-bg-light">Welcome Mofor</span>
                </li>
                

      </ul>
     
      <form class="d-flex" role="search">
      <a class="btn btn-primary"href="logouts.php?staff_id=<?php echo $_SESSION['staff_id']; ?>"><h6>Log out</h6></a>
      </form>
      
    </div>
  </div>
</nav>
        <!-- Navbar ends -->
    
     <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                                        ada

                    </div>
                    <div class="col-md-6">

                            aaa
                    </div>

                    
                </div>
            </div> 
            <br>
         <div class="container blac">
            <div class="row">
                <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Patients</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Staffs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-cont-tab" data-bs-toggle="pill" data-bs-target="#pills-cont" type="button" role="tab" aria-controls="pills-cont" aria-selected="false">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-con-tab" data-bs-toggle="pill" data-bs-target="#pills-con" type="button" role="tab" aria-controls="pills-con" aria-selected="false">Con</button>
                        </li>
                        
                        </ul>
                    <div class="tab-content" id="pills-tabContent">
                         <!-- Home details starts -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="blac">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Create a Blog</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">View Blog</button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Admit Patient</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">View admitted patient</button>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                                </div>
                            </div>

                        </div>
                        </div>
                        
                         <!-- Home details end -->
                         <!-- Patients details starts -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">   
                            <div class="blac">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-patientlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-patientlist" type="button" role="tab" aria-controls="v-pills-patientlist" aria-selected="true">Patient List</button>
                                    <button class="nav-link" id="v-pills-prof-tab" data-bs-toggle="pill" data-bs-target="#v-pills-prof" type="button" role="tab" aria-controls="v-pills-prof" aria-selected="false">Patients Medical Summary </button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Admit Patient</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">View admitted patient</button>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- patient LIst starts -->
                                    <div class="tab-pane fade show active" id="v-pills-patientlist" role="tabpanel" aria-labelledby="v-pills-patientlist-tab" tabindex="0">
                                        
                                         <div class="container">
                                         <h1>Patient Information</h1>
                                         <hr>
                                         <table class="table table-striped table-bordered">
                                             <thead>
                                                 <tr>
                                                     <th>Patient ID</th>
                                                     <th>Name</th>
                                                     <th>Email</th>
                                                     <th>Address</th>
                                                     <th>Nationality</th>
                                                     <th>Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                                 <tr>
                                                     <td><?php echo $row['patient_id']; ?></td>
                                                     <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                                     <td><?php echo $row['email']; ?></td>
                                                     <td><?php echo $row['address']; ?></td>
                                                     <td><?php echo $row['nationality']; ?></td>
                                                     <td>
                                                         <form method="post" action="">
                                                             <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
                                                             <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                         </form>
                                                     </td>
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>


                                    </div>
                                    <!-- patient LIst ends -->
                                    <!-- patient Medical summary start -->
                                    <div class="tab-pane fade" id="v-pills-prof" role="tabpanel" aria-labelledby="v-pills-prof-tab" tabindex="0">
                                    <h2>Medical Report Summary</h2>
	<table>
		<tr>
			<th>Patient Name</th>
			<th>Test Name</th>
			<th>Description</th>
			<th>Test Date</th>
			<th>Staff Name</th>
            <th>Action</th>
		</tr>
		<?php
			// include('database_connection.php');

			$sql = "SELECT 
            tests.test_name, 
            tests.description, 
            tests.test_date, 
            CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
            CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name
          FROM 
            blood_count_test AS tests 
            JOIN patients ON tests.patient_id = patients.patient_id
            JOIN staffs ON tests.staff_id = staffs.staff_id
          UNION ALL
          SELECT 
            tests.test_name, 
            tests.description, 
            tests.test_date, 
            CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
            CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name
          FROM 
            imaging AS tests 
            JOIN patients ON tests.patient_id = patients.patient_id
            JOIN staffs ON tests.staff_id = staffs.staff_id
          UNION ALL
          SELECT 
            tests.test_name, 
            tests.description, 
            tests.test_date, 
            CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
            CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name
          FROM 
            lipid_panel AS tests 
            JOIN patients ON tests.patient_id = patients.patient_id
            JOIN staffs ON tests.staff_id = staffs.staff_id
          UNION ALL
          SELECT 
            tests.test_name, 
            tests.description, 
            tests.test_date, 
            CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
            CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name
          FROM 
            stool_tests AS tests 
            JOIN patients ON tests.patient_id = patients.patient_id
            JOIN staffs ON tests.staff_id = staffs.staff_id
          UNION ALL
          SELECT 
            tests.test_name, 
            tests.description, 
            tests.test_date, 
            CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
            CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name
          FROM 
            urinalysis AS tests 
            JOIN patients ON tests.patient_id = patients.patient_id
            JOIN staffs ON tests.staff_id = staffs.staff_id;
          ";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
	?>
                    <tr>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['test_name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['test_date']; ?></td>
                    <td><?php echo $row['staff_name']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="patient_id" value="<?php echo $row['tests.patient_id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                  <?php
				}
			} else {
				echo "<tr><td colspan='5'>No medical reports found.</td></tr>";
			}

			mysqli_close($conn);
		?>
	</table>
	                       </div>
                                      <!-- patient Medical summary ends -->

                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- Patients details Ends -->


                          <!-- staffs details starts -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="blac">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Staff List</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Staff Medical Report Summary </button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Staff Registration</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Staff Medical Prescriptions</button>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                                </div>
                            </div>

                        </div>
                    </div>
                      <!-- staffs details Ends -->


                            <!-- General details starts -->
                        <div class="tab-pane fade" id="pills-cont" role="tabpanel" aria-labelledby="pills-cont-tab" tabindex="0">
                        <div class="blac">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">View Bed Spaces</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">View Online/offline staff </button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">View Discharged patients</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Staff Medical Prescriptions</button>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                                </div>
                            </div>

                        </div>
                        </div>
                         <!-- General details Ends -->
                        
                        <div class="tab-pane fade" id="pills-con" role="tabpanel" aria-labelledby="pills-con-tab" tabindex="0">tes</div>
   
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-mJWb+jxyfBZ04jKJkLaN29XV7PF1a54+Rn7/EnroJd1VcdjKq3nAa+sgJvEhX7V1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>