<?php
// Check if a confirmation message is present in the URL
if (isset($_GET["msg"]) && $_GET["msg"] == "account_created") {
    // Use Bootstrap alert to display confirmation message
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              Your account has been created. Please login.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
          </div>";
}
?>

 
 <!DOCTYPE html>




<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/loginStyle.css ?v=<?php echo time();?>">
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
          <a class="nav-link " aria-current="page" href="home.html">Home</a>
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


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Patient Login</a></li>
            <li><a class="dropdown-item" href="stafflogin.php">Staff Login</a></li>
            <li><a class="dropdown-item" href="Feedback.php">Patient Reviews</a></li>

          </ul>
  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign Up</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>


        <!-- Navbar ends -->

    <div class="container mt-5">
      <div class="row justify-content-center">
      <div class="col-md-4">

<div class="card">
  <div class="card-header">
    <h4 class="text-center">Patient Login</h4>
  </div>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
        <label for="showPassword">
        <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password
      </div>
      <script>
          function togglePassword() {
            var passwordInput = document.getElementById("password");
            var showPasswordCheckbox = document.getElementById("showPassword");
            if (showPasswordCheckbox.checked) {
              passwordInput.type = "text";
            } else {
              passwordInput.type = "password";
            }
          }
      </script>
      <button type="submit" class="btn btn-primary btn-block">Login</button><br>
      <h6>Haven't Register? <a href="signup2.php">Sign Up</a></h6>
    </form>
  </div>
</div>
</div>
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
        <img src="images/patient.png" alt="You can do it" sizes="" srcset="">    
        </div>
       
      </div>
    </div>
  
  
    <!-- footer starts -->
    <footer class="footer">
			<p>Mofor Practice care &copy; 2023</p>
	  </footer>

<!-- footer Ends -->
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity >

</body>

</html>

<?php
// TODO: Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];

	// TODO: Hash password for security
	$hashed_password = md5($password);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed_password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// Authentication successful, redirect to dashboard or some other page
		header("Location: patient.php");
		exit();
	} else {
		// Authentication failed, show error message
		echo "<p>Login failed. Please check your email and password and try again.</p>";
	}
}

$conn->close();
?>
