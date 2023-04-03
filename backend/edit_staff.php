<?php
    // Include the database connection file
    include '../connection.php';

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        
        // Get the form data
        $staff_id = $_POST['staff_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $job_title = $_POST['job_title'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Prepare the SQL query to update staff information
        $sql = "UPDATE staffs SET first_name = '$first_name', last_name = '$last_name', job_title = '$job_title', email = '$email', phone = '$phone', address = '$address' WHERE staff_id = '$staff_id'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Redirect to the staffs list page if the update was successful
            header("Location: staff.php");
            exit();
        } else {
            // Display an error message if the update failed
            echo "Error updating staff information: " . mysqli_error($conn);
            exit();
        }
    }

    // Get the staff ID from the URL parameter
    $staff_id = $_GET['staff_id'];

    // Prepare the SQL query to retrieve the staff information
    $sql = "SELECT * FROM staffs WHERE staff_id = '$staff_id'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Fetch the result as an associative array
    $staff = mysqli_fetch_assoc($result);

    // Check if the staff ID is valid
    if (!$staff) {
        // Redirect to the staffs list page if the staff ID is invalid
        header("Location: staff.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Staff</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
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

	
	<!-- Main content starts -->
	<div class="container">
		<h1>Edit Staff</h1>
		<form method="POST" action="">
			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $staff['first_name']; ?>" required>
			</div>
			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $staff['last_name']; ?>" required>
			</div>
			<div class="form-group">
				<label for="job_title">Job Title:</label>
				<input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $staff['job_title']; ?>" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $staff['email']; ?>" required>
			</div>
		
			<div class="form-group">
				<label for="phone">Phone Number:</label>
				<input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $staff['phone']; ?>" required>
			</div>
			<div class="form-group">
				<label for="Address">Address:</label>
				<input type="text" class="form-control" id="job_title" name="address" value="<?php echo $staff['address']; ?>" required>
			</div>
			<input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>">
			<button type="submit" name="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- Main content ends -->
</body>
</html>
