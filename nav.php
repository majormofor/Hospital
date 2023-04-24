<style>
#website-guide {
    margin-left: auto;
}
</style>
<!-- Navbar starts -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/log.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Mofor Practise Care
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hospital/backend/staffview.php">Staffs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:moformajor@gmail.com">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hospital/backend/Feedback.php">Patient Testimonial</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
        include 'connection.php';
        
          if(isset($_SESSION['patient_id'])) { 
            $patient_id = $_SESSION['patient_id'];
            $sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
            $result = mysqli_query($conn, $sql);
            
            // Fetch patient data
            $row = mysqli_fetch_assoc($result);
            // If patient is logged in, display their first name and logout button
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/hospital/backend/patient.php">Welcome, '.$row['firstname'].'</a>';            echo '</li>';
            echo '<li class="nav-item">';
            echo '<form class="d-flex" role="search">';
            echo '<a class="btn btn-primary" href="/hospital/backend/logout.php?patient_id='.$_SESSION['patient_id'].'"><h6>Log out</h6></a>';
            echo '</form>';
            echo '</li>';
            // If staff is logged in, display their first name and logout button
          } elseif(isset($_SESSION['staff_id'])) {
            $staff_id = $_SESSION['staff_id'];


            $sqlp = "SELECT * FROM staffs WHERE staff_id = '$staff_id'";
            $resulto = mysqli_query($conn, $sqlp);

            // Fetch staff data
            $row = mysqli_fetch_assoc($resulto);
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/hospital/backend/staff.php">Welcome, '.$row['first_name'].'</a>';       
            echo '</li>';
            echo '<li class="nav-item">';
            echo '<form class="d-flex" role="search">';
            echo '<a class="btn btn-primary" href="/hospital/backend/logouts.php?staff_id='.$_SESSION['staff_id'].'"><h6>Log out</h6></a>';

            echo '</form>';
            echo '</li>';


          } else { 
            // If patient/staff is not logged in, display login and new patient buttons
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
            echo 'Login';
            echo '</a>';
            
            echo '<ul class="dropdown-menu">';
            echo '<li><a class="dropdown-item" href="login.php">Patient Login</a></li>';
            echo '<li><a class="dropdown-item" href="stafflogin.php">Staff Login</a></li>';
            echo '</ul>';
            echo '</li>';
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="signup.php">New Patient</a>';
            echo '</li>';
            
          } 
         
        ?>
            </ul>
            <a id="website-guide" class="d-flex btn btn-primary" role="search" href="menu.html">
                <h6>Website Guide</h6>
            </a>

        </div>
    </div>
</nav>
<!-- Navbar ends -->