<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<!-- Css file -->
	<link rel="stylesheet" href="/patient/CSS/signupStyle.css ?v=<?php echo time();?>" type="text/css">
	<!-- include bootstrap -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
</head>
<body>
        <img src="/patient/images/login4.jpg" alt="background image" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
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
          <a class="nav-link" href="contactus.html">Sign Up</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>


        <!-- Navbar ends -->


        <div class="container">
            <form method="POST" action="">
                <h2 class="mb-4">Patient Registration Form</h2>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">First Name:</label>
                        <input class="form-input mb-2" type="text" name="firstname" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name:</label>
                        <input class="form-input mb-2" type="text" name="lastname" required>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-6">
                        <label class="form-label">Password:</label>
                        <input class="form-input mb-2" type="password" name="password" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email:</label>
                        <input class="form-input mb-2" type="email" name="email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password:</label>
                        <input class="form-input mb-2" type="password" name="confirmpassword" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender:</label>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="gender" value="Male" required>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="gender" value="Female" required>
                            <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="gender" value="Other" required>
                            <label class="form-check-label">Other</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth:</label>
                        <input class="form-control" type="date" name="dob" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Marital Status:</label>
                        <select class="form-select" name="maritalstatus" required>
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            </select>
                     </div>
                        <br>
                        <div class="col-md-6">
                            <label class="form-label">Address:</label>
                            <input class="form-control" type="text" name="address" required>
                        </div>
                    <div class="col-md-6">
                        <label class="form-label">Nationality:</label>
                        <select class="form-control" type="text" name="nationality" required>
                            <option value="" selected>Select</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="France">France</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Italy">Italy</option>
                            <option value="Germany">Germany</option>
                            <option value="Japan">Japan</option>
                            <option value="China">China</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <input class="btn btn-primary" type="submit" name="signup" value="Sign Up">
                        <h7>Registered already? <a href="login.php">Login.</a></h7>
                    </div>
</div> 
            </form>
</div>

<!-- footer starts -->
    <footer class="footer">
			<p>Mofor Practice care &copy; 2023</p>
	</footer>

<!-- footer Ends -->
</body>
</html>