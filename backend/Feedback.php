<!DOCTYPE html>
<html>
<head>
	<title>Testimonials</title>
	<!-- include bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
    </head>
<body>
    <style>
        .footer {
            background-color: black;
            color: white;
            text-align: center;
            bottom: 0;
            /* position: fixed; */
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
                            <a class="nav-link " aria-current="page" href="/backend/patient.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="/hospital/about.html">About</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="staffview.php">Staffs</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="mailto:moformajor@gmail.com">Contact Us</a>
                            </li>

                            <li class="nav-item">
                            <a class="nav-link" href="/hospital/backend/Feedback.php">Patient Testimonial</a>
                            </li>
                            
                        </ul>
                        
                        </div>
                    </div>
                    </nav>


                            <!-- Navbar ends -->


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
				echo '</div>';
				echo '</div>';
				echo '<br>';
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</div>


        <!-- footer starts -->
        <footer class="footer">
			<p>Mofor Practice care &copy; 2023</p>
	</footer>

<!-- footer Ends -->
</body>
</html>
