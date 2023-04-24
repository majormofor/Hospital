<?php
// Start session
session_start();

// Include database connection
include '../connection.php';

// Get patient ID from session
$patient_id = $_SESSION['patient_id'];

// Query patient data for patient ID
$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

// Fetch patient data
$row = mysqli_fetch_assoc($result);
$firstname = $row['firstname'];
$email = $row['email'];

$maritalstatus = $row['maritalstatus'];
$address = $row['address'];


// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $maritalstatus = mysqli_real_escape_string($conn, $_POST['maritalstatus']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Update patient data in database
    $sql = "UPDATE patients SET email='$email', maritalstatus='$maritalstatus', address='$address' WHERE patient_id='$patient_id'";
    if (mysqli_query($conn, $sql)) {

        header("Location: patient.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close database connection
// mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit <?php echo $firstname ?> Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                        <a class="badge text-bg-light nav-link">Welcome <?php echo $firstname ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createfeedback.php">Create a Feedback</a>
                    </li>

                </ul>

                <form class="d-flex" role="search">
                    <a class="btn btn-primary" href="logout.php" role="button">
                        <h6>Log Out</h6>
                    </a>
                </form>

            </div>
        </div>
    </nav>
    <!-- Navbar ends -->


    <div class="container">
        <h1>Edit <?php echo $firstname ?> Profile</h1>
        <hr>
        <form method="post">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
            </div>

            <div class="form-group">
                <label for="maritalstatus">Marital Status:</label>
                <select class="form-control" name="maritalstatus">
                    <option value="Single" <?php if ($maritalstatus == "Single") echo "selected" ?>>Single</option>
                    <option value="Married" <?php if($maritalstatus == "Married") echo "selected" ?>>Married</option>
                    <option value="Divorced" <?php if ($maritalstatus == "Divorced") echo "selected" ?>>Divorced
                    </option>
                    <option value="Widowed" <?php if ($maritalstatus == "Widowed") echo "selected" ?>>Widowed</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-form-label">Address</label>
                <textarea class="form-control" name="address" rows="3"><?php echo $address ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </form>

    </div>
</body>

</html>