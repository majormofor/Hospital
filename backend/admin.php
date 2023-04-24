<?php
session_start();
// Include database connection file
include('../connection.php');

// Check if delete button is clicked
if (isset($_POST['delete'])) {


    $patient_id = $_POST['patient_id'];
    // Delete patient from database
    $sql6 = "DELETE FROM patients WHERE patient_id = $patient_id";
    mysqli_query($conn, $sql6);

}
if (!isset($_SESSION['staff_id'])) {
    header('Location: ../stafflogin.php');
    exit;
}



// Retrieve patient information from database
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);

// $sqll = "SELECT * FROM staffs";
// $result = mysqli_query($conn, $sqll);

?>



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

    <title>Admin Page</title>
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

    th,
    td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
    }

    th {
        background-color: #ddd;
    }
    </style>
    <!-- <img src="../assets/images/admin1.jpg" alt="background image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"> -->

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
                        <a class="nav-link" href="staffview.php">Staffs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="blogview.php">Post Blog</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="appointment.php">Manage Appointment </a>
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
    <main>
        <div class="container blac">
            <h3>MPC Dashboard</h3>
            <div class="row">
                <!-- Number of admitted patient -->
                <div class="col-md-6">

                    <?php
                                            include('../connection.php');

                                            // Count number of patients
                                            $patients_query = "SELECT COUNT(*) AS patient_count FROM patients";
                                            $patients_result = mysqli_query($conn, $patients_query);
                                            $patient_count = mysqli_fetch_assoc($patients_result)['patient_count'];

                                            // Count number of admitted patients
                                            $admitted_query = "SELECT COUNT(*) AS admitted_count FROM admissions WHERE discharge_date IS not NULL";
                                            $admitted_result = mysqli_query($conn, $admitted_query);
                                            $admitted_count = mysqli_fetch_assoc($admitted_result)['admitted_count'];
                                            ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Total Registered Patients</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $patient_count; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-header">Admitted Patients</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $admitted_count; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Number of staff online -->


                <div class="col-md-6">

                    <?php
                                            include('../connection.php');
                                            $online_query = "SELECT COUNT(*) as online_count FROM staffs WHERE status='Online'";
                                            $offline_query = "SELECT COUNT(*) as offline_count FROM staffs WHERE status='Offline'";

                                            $online_result = mysqli_query($conn, $online_query);
                                            $offline_result = mysqli_query($conn, $offline_query);

                                            if (mysqli_num_rows($online_result) > 0 && mysqli_num_rows($offline_result) > 0) {
                                                $online_row = mysqli_fetch_assoc($online_result);
                                                $offline_row = mysqli_fetch_assoc($offline_result);

                                                $online_count = $online_row['online_count'];
                                                $offline_count = $offline_row['offline_count'];
                                            } else {
                                                $online_count = 0;
                                                $offline_count = 0;
                                            }
                                            ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Online Staffs</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $online_count; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-header">offline Staffs </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $offline_count; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <br>
            <!-- BED SPACES -->
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-6">

                    <?php
                    include('../connection.php');
                    $online_query = "SELECT COUNT(*) as Available_bed FROM beds WHERE status='available'";
                    $offline_query = "SELECT COUNT(*) as occupied_bed FROM beds WHERE status='occupied'";

                    $online_result = mysqli_query($conn, $online_query);
                    $offline_result = mysqli_query($conn, $offline_query);

                    if (mysqli_num_rows($online_result) > 0 && mysqli_num_rows($offline_result) > 0) {
                        $online_row = mysqli_fetch_assoc($online_result);
                        $offline_row = mysqli_fetch_assoc($offline_result);

                        $online_count = $online_row['Available_bed'];
                        $offline_count = $offline_row['occupied_bed'];
                    } else {
                        $online_count = 0;
                        $offline_count = 0;
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Available Beds</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $online_count; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-header">Occupied Beds </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $offline_count; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- BED SPACES -->



            </div>
        </div>
        <br>
        <div class="container blac">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">!</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Patients</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Staffs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-cont-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-cont" type="button" role="tab" aria-controls="pills-cont"
                                aria-selected="false">General</button>
                        </li>


                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Home details starts -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="blac">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link" id="v-pills-beds-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-beds" type="button" role="tab"
                                            aria-controls="v-pills-beds" aria-selected="false">!</button>

                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">!</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-messages" type="button" role="tab"
                                            aria-controls="v-pills-messages" aria-selected="false">!</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false">!</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- bed spaces start -->
                                        <div class="tab-pane fade" id="v-pills-beds" role="tabpanel"
                                            aria-labelledby="v-pills-beds-tab" tabindex="0">
                                            <div class="container mt-5">
                                                <h2>Beds List</h2>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Bed Number</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                    include('../connection.php');

                                                    $sql = "SELECT * FROM beds";
                                                    $result = mysqli_query($conn, $sql);

                                                    // Loop through each row in the result set
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Determine the status color based on the bed status
                                                        $status_color = $row['status'] == 'occupied' ? 'text-danger' : 'text-success';
                                                        // Print the bed data in the table
                                                        echo '<tr>';
                                                        echo '<td>' . $row['bed_number'] . '</td>';
                                                        echo '<td class="' . $status_color . '">' . $row['status'] . '</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- bed spaces end -->


                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab" tabindex="0">..t.</div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab" tabindex="0">m...</div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab" tabindex="0">..k.</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Home details end -->
                        <!-- Patients details starts -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="blac">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-patientlist-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-patientlist" type="button"
                                            role="tab" aria-controls="v-pills-patientlist" aria-selected="true">Patient
                                            List</button>
                                        <button class="nav-link" id="v-pills-prof-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-prof" type="button" role="tab"
                                            aria-controls="v-pills-prof" aria-selected="false">Patients Medical Summary
                                        </button>
                                        <button class="nav-link" id="v-pills-admit-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-admit" type="button" role="tab"
                                            aria-controls="v-pills-admit" aria-selected="false">Admit Patient</button>
                                        <button class="nav-link" id="v-pills-wiewadmit-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-viewadmit" type="button" role="tab"
                                            aria-controls="v-pills-viewadmit" aria-selected="false">View admitted
                                            patient</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- patient LIst starts -->
                                        <div class="tab-pane fade show active" id="v-pills-patientlist" role="tabpanel"
                                            aria-labelledby="v-pills-patientlist-tab" tabindex="0">

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
                                                        <?php
                                                 $sql = "SELECT * FROM patients";
                                                 $result = mysqli_query($conn, $sql);
                                                 while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['patient_id']; ?></td>
                                                            <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                                            </td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $row['address']; ?></td>
                                                            <td><?php echo $row['nationality']; ?></td>
                                                            <td>
                                                                <form method="post" action="">
                                                                    <input type="hidden" name="patient_id"
                                                                        value="<?php echo $row['patient_id']; ?>">
                                                                    <button type="submit" name="delete"
                                                                        class="btn btn-danger"
                                                                        onclick="return confirmDelete()">Delete</button>
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
                                        <div class="tab-pane fade" id="v-pills-prof" role="tabpanel"
                                            aria-labelledby="v-pills-prof-tab" tabindex="0">
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
        include('../connection.php');
        $sql = "SELECT 
                    tests.test_name, 
                    tests.description, 
                    tests.test_date, 
                    CONCAT(patients.firstname, ' ', patients.lastname) AS patient_name, 
                    CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name,
                    patients.patient_id
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
                    CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name,
                    patients.patient_id
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
                    CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name,
                    patients.patient_id
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
                    CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name,
                    patients.patient_id
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
                    CONCAT(staffs.first_name, ' ', staffs.last_name) AS staff_name,
                    patients.patient_id
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
                                                        <form method="post" action="delete_report.php">
                                                            <input type="hidden" name="patient_id"
                                                                value="<?php echo $row['patient_id']; ?>">
                                                            <button type="submit" name="delete" class="btn btn-danger"
                                                                onclick="return confirmDelete('<?php echo $row['patient_name']; ?>')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
            }
        } else {
            echo "<tr><td colspan='6'>No medical reports found.</td></tr>";
        }
        mysqli_close($conn);
        ?>
                                            </table>
                                            <script>
                                            function confirmDelete(name) {
                                                return confirm(
                                                    "Are you sure you want to delete the medical report for " +
                                                    name + "?");
                                            }
                                            </script>




                                        </div>
                                        <!-- patient Medical summary ends -->
                                        <!-- Admit Patient Start  -->
                                        <div class="tab-pane fade" id="v-pills-admit" role="tabpanel"
                                            aria-labelledby="v-pills-admit-tab" tabindex="0">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form method="post" action="admit_patient.php">
                                                        <div class="form-group">
                                                            <label for="patient_id">Patient ID</label>
                                                            <input type="text" class="form-control" name="patient_id"
                                                                id="patient_id" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="patient_id">Bed Number</label>
                                                            <input type="text" class="form-control" name="bed_number"
                                                                id="bed_id" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="admission_date">Admission Date</label>
                                                            <input type="date" class="form-control"
                                                                name="admission_date" id="admission_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="discharge_date">Discharge Date</label>
                                                            <input type="date" class="form-control"
                                                                name="discharge_date" id="discharge_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="admission_reason">Reason for Admission</label>
                                                            <textarea class="form-control" name="admission_reason"
                                                                id="reason_for_admission" required></textarea>
                                                        </div>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary">Admit Patient</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-3">
                                                    <img src="../assets/images/admit.jpg" alt="admit patient">
                                                </div>


                                            </div>
                                        </div>
                                        <!-- Admit Patient Ends  -->
                                        <!-- Admitted Patient start  -->
                                        <div class="tab-pane fade" id="v-pills-viewadmit" role="tabpanel"
                                            aria-labelledby="v-pills-viewadmit-tab" tabindex="0">


                                            <?php
                                            // Include database connection file
                                            include '../connection.php';



                                            // Retrieve list of admissions
                                            $sql = "SELECT admissions.*, patients.firstname, patients.lastname, beds.bed_number, admissions.admission_date, admissions.discharge_date, admissions.admission_reason 
                                    FROM admissions 
                                    INNER JOIN patients ON admissions.patient_id=patients.patient_id 
                                    INNER JOIN beds ON admissions.bed_id=beds.bed_id";
                                            $result = $conn->query($sql);

                                            ?>
                                            <div class="container">
                                                <h2>Admissions</h2>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Bed Number</th>
                                                            <th>Admission Date</th>
                                                            <th>Discharge Date</th>
                                                            <th>Admission Reason</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
                                                    echo "<td>" . $row["bed_number"] . "</td>";
                                                    echo "<td>" . $row["admission_date"] . "</td>";
                                                    echo "<td>" . $row["discharge_date"] . "</td>";
                                                    echo "<td>" . $row["admission_reason"] . "</td>";


                                                    echo "<td>";
                                                    echo "<form method='POST' action = delete_admission.php>";
                                                    echo "<input type='hidden' name='admission_id' value='" . $row["admission_id"] . "'>";
                                                    echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                                                    echo "</form>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='3'>No admissions found.</td></tr>";
                                            }
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- Admitted Patient Ends  -->

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Patients details Ends -->


                        <!-- staffs details starts -->
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="blac">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">Staff List</button>
                                        <button class="nav-link" id="v-pills-summary-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-summary" type="button" role="tab"
                                            aria-controls="v-pills-summary" aria-selected="false">Staff Medical Report
                                            Summary </button>
                                        <button class="nav-link" id="v-pills-registers-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-registers" type="button" role="tab"
                                            aria-controls="v-pills-registers" aria-selected="false">Staff
                                            Registration</button>
                                        <button class="nav-link" id="v-pills-pre-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-pre" type="button" role="tab"
                                            aria-controls="v-pills-pre" aria-selected="false">Staff Medical
                                            Prescriptions</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- staff List start -->
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <div class="container mt-5">
                                                <h2>Staff List</h2>
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Job Title</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th>status</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                // Include the database connection
                                                include '../connection.php';

                                                // Prepare the SQL statement
                                                $stmt = $conn->prepare("SELECT * FROM staffs");
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                // Loop through each row in the result set
                                                while ($row = $result->fetch_assoc()) {
                                                    // Print the staff data in the table
                                                    echo '<tr>';
                                                    echo '<td>' . $row['first_name'] . '</td>';
                                                    echo '<td>' . $row['last_name'] . '</td>';
                                                    echo '<td>' . $row['job_title'] . '</td>';
                                                    echo '<td>' . $row['email'] . '</td>';
                                                    echo '<td>' . $row['address'] . '</td>';
                                                    echo '<td>' . $row['phone'] . '</td>';
                                                    echo '<td>' . $row['status'] . '</td>';

                                                    echo '<td>
                                                    <form method="POST" action="delete_staff.php">
                                                    <input type="hidden" name="staff_id" value="' . $row['staff_id'] . '">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                 </form>


                                                  </td>';
                                                    echo '</tr>';
                                                }
                                                // Close the statement and database connection
                                                $stmt->close();
                                                $conn->close();
                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <!-- staff List End  -->
                                        <!-- staff medical summary start -->
                                        <div class="tab-pane fade" id="v-pills-summary" role="tabpanel"
                                            aria-labelledby="v-pills-summary-tab" tabindex="0">
                                            <div class="container mt-5">
                                                <h2>Medical Report Summary</h2>
                                                <table>
                                                    <tr>
                                                        <th>Staff Name</th>
                                                        <th>Test Name</th>
                                                        <th>Description</th>
                                                        <th>Test Date</th>
                                                        <th>Patient Name</th>
                                                    </tr>
                                                    <?php
    include('../connection.php');

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
					JOIN staffs ON tests.staff_id = staffs.staff_id
				";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                                                    <tr>
                                                        <td><?php echo $row['staff_name']; ?></td>
                                                        <td><?php echo $row['test_name']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><?php echo $row['test_date']; ?></td>
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                    </tr>
                                                    <?php
        }
    }
    mysqli_close($conn);
    ?>
                                                    </tbody>
                                                </table>


                                            </div>

                                        </div>
                                        <!-- staff medical summary end-->
                                        <!-- staff registration start-->

                                        <div class="tab-pane fade" id="v-pills-registers" role="tabpanel"
                                            aria-labelledby="v-pills-registers-tab" tabindex="0">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="add_staff.php" method="post">
                                                            <h2>Add Staff</h2>
                                                            <div class="form-group">
                                                                <label for="first_name">First Name:</label>
                                                                <input type="text" class="form-control" id="first_name"
                                                                    name="first_name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="last_name">Last Name:</label>
                                                                <input type="text" class="form-control" id="last_name"
                                                                    name="last_name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="job_title">Job Title:</label>
                                                                <input type="text" class="form-control" id="job_title"
                                                                    name="job_title" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password:</label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Confirm Password:</label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="confirmpassword" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone">Phone Number:</label>
                                                                <input type="tel" class="form-control" id="phone"
                                                                    name="phone" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Address">Address:</label>
                                                                <input type="text" class="form-control" id="job_title"
                                                                    name="address" required>
                                                            </div>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- staff registration start-->
                                        <!-- staff medical Prescription -->
                                        <div class="tab-pane fade" id="v-pills-pre" role="tabpanel"
                                            aria-labelledby="v-pills-pre-tab" tabindex="0">
                                            <?php
    // Include database connection
    include '../connection.php';

    // Query prescription data for patient ID
    $sql = "SELECT * FROM prescription ";
    $result = mysqli_query($conn, $sql);

    // Check if there are any prescriptions for this patient
    if (mysqli_num_rows($result) > 0) {
        // Print prescription data in a table
        echo '<div class="container">';
        echo '<h1 class="text-center mb-5">Medical Prescriptions</h1>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr><th>Prescription ID</th><th>Patient ID</th><th>Prescription Date</th><th>Medicine Name</th><th>Dosage</th><th>Frequency</th><th>Instructions</th><th>Action</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['prescription_id'] . "</td>";
            echo "<td>" . $row['patient_id'] . "</td>";
            echo "<td>" . $row['prescription_date'] . "</td>";
            echo "<td>" . $row['medicine_name'] . "</td>";
            echo "<td>" . $row['dosage'] . "</td>";
            echo "<td>" . $row['frequency'] . "</td>";
            echo "<td>" . $row['instructions'] . "</td>";
            echo '<td><form method="GET" action="delete_prescription.php"><input type="hidden" name="prescription_id" value="'.$row['prescription_id'].'"><button type="submit" class="btn btn-danger">Delete</button></form></td>';
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

                                    </div>
                                    <!-- staff medical Prescription end -->

                                </div>

                            </div>
                        </div>
                        <!-- staffs details Ends -->


                        <!-- General details starts -->
                        <div class="tab-pane fade" id="pills-cont" role="tabpanel" aria-labelledby="pills-cont-tab"
                            tabindex="0">
                            <div class="blac">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link" id="v-pills-bedso-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-bedso" type="button" role="tab"
                                            aria-controls="v-pillso-beds" aria-selected="true">View Bed Spaces</button>
                                        <button class="nav-link" id="v-pills-test-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-test" type="button" role="tab"
                                            aria-controls="v-pills-test" aria-selected="false">Manage Testimonial
                                        </button>
                                        <button class="nav-link" id="v-pills-Blogo-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-Blogo" type="button" role="tab"
                                            aria-controls="v-pills-Blogo" aria-selected="false">Manage Blog
                                            Post</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <!-- bed space start -->
                                        <div class="tab-pane fade show" id="v-pills-bedso" role="tabpanel"
                                            aria-labelledby="v-pills-bedso-tab" tabindex="0">
                                            <div class="container mt-5">
                                                <h2>Beds List</h2>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Bed Number</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                    include('../connection.php');

                                                    $sql = "SELECT * FROM beds";
                                                    $result = mysqli_query($conn, $sql);

                                                    // Loop through each row in the result set
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Determine the status color based on the bed status
                                                        $status_color = $row['status'] == 'occupied' ? 'text-danger' : 'text-success';
                                                        // Print the bed data in the table
                                                        echo '<tr>';
                                                        echo '<td>' . $row['bed_number'] . '</td>';
                                                        echo '<td class="' . $status_color . '">' . $row['status'] . '</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <!-- bed space end -->
                                        <!-- Testimonial Start -->
                                        <div class="tab-pane fade" id="v-pills-test" role="tabpanel"
                                            aria-labelledby="v-pills-test-tab" tabindex="0">
                                            <div class="container">
                                                <h1>Testimonials</h1>
                                                <hr>
                                                <?php
        require '../connection.php';

        // Query to fetch testimonials
        $query = "SELECT * FROM patient_testimonials ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        // Loop through all testimonials
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['patient_name'];
            $title = $row['title'];
            $message = $row['message'];
            $date = date('F j, Y', strtotime($row['date_created']));

            // Display testimonial
            echo '<div class="card">';
            echo '<div class="card-header">' . $name . '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $title . '</h5>';
            echo '<p class="card-text">' . $message . '</p>';
            echo '<p class="card-text"><small class="text-muted">' . $date . '</small></p>';
            echo '<form method="POST" action="delete_testimonial.php">';
            echo '<input type="hidden" name="testimonial_id" value="' . $id . '">';
            echo '<button type="submit" class="btn btn-danger">Delete</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '<br>';
        }

        // Close database connection
        mysqli_close($conn);
        ?>

                                            </div>
                                            <!-- Testimonial End -->
                                        </div>
                                        <!-- Blog Post start -->
                                        <div class="tab-pane fade" id="v-pills-Blogo" role="tabpanel"
                                            aria-labelledby="v-pills-Blogo-tab" tabindex="0">
                                            <table class="table">
                                                <h1>Blog Posts</h1>
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            // Connect to database
                                          
                                            require '../connection.php';

                                            // Fetch posts from database
                                            $sql = "SELECT * FROM staff_blog_posts";
                                            $result = $conn->query($sql);
                                            
                                            // Loop through posts and display them in a table row
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . $row['id'] . '</td>';
                                                    echo '<td>' . $row['title'] . '</td>';
                                                    echo '<td>' . substr($row['content'], 0, 100) . '...</td>';
                                                    echo '<td>';
                                                    echo '<form method="POST" action="delete_post.php">';
                                                    echo '<input type="hidden" name="post_id" value="' . $row['id'] . '">';
                                                    echo '<button type="submit" class="btn btn-danger">Delete</button>';
                                                    echo '</form>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr>';
                                                echo '<td colspan="4">No posts found.</td>';
                                                echo '</tr>';
                                            }

                                            // Close database connection
                                            $conn->close();
                                            ?>
                                                </tbody>
                                            </table>


                                        </div>
                                        <!-- Blog Post ends -->

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- General details Ends -->



                    </div>
                </div>
            </div>
        </div>




    </main>


















    <br><br>



    <!-- footer starts -->
    <footer class="footer">
        <p>Mofor Practice care &copy; 2023</p>
    </footer>
    <!-- footer Ends -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-mJWb+jxyfBZ04jKJkLaN29XV7PF1a54+Rn7/EnroJd1VcdjKq3nAa+sgJvEhX7V1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</body>

</html>

<script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete the patient?")) {
        // User clicked "OK"
        return true;
    } else {
        // User clicked "Cancel"
        return false;
    }
}
</script>