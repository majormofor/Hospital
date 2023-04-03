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
	
    <title>Staffs Details</title>
</head>
<body>

<style>
.footer {
            background-color: black;
            color: white;
            text-align: center;
            bottom: 0;
            /* position: fixed;
            width: 100%; */
            
        
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
                        <a class="nav-link " aria-current="page" href="../home.html">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/hospital/about.html">About</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/hospital/backend/staffview.php">Staffs</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="mailto:moformajor@gmail.com">Contact Us</a>
                        </li>

                        
                    </ul>
                    
                    </div>
                </div>
                </nav>


                        <!-- Navbar ends -->    


                        <main>
                                <div class="container mt-5">
                            <h1 class="text-center mb-5">Our Dedicated Staff</h1>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="../assets/images/staff1.jpg" alt="Staff 3" height = "200" width = "300">
                                        <div class="card-body">
                                            <p class="card-text">Our staff are dedicated to providing the best care possible to our patients. They work tirelessly day in and day out to make sure that our patients are comfortable and well taken care of.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="../assets/images/staff2.jpg" alt="Staff 3" height = "200" width = "300">
                                        <div class="card-body">
                                            <p class="card-text">Our staff are highly trained professionals who take their jobs very seriously. They are dedicated to providing the best possible care to our patients and are always looking for ways to improve their skills and knowledge.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" src="../assets/images/staff3.jpg" alt="Staff 3" height = "200" width = "300">
                                        <div class="card-body">
                                            <p class="card-text">Our staff are passionate about their work and truly care about our patients. They go above and beyond to make sure that each patient receives the best care possible and are always willing to lend a helping hand.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Staff List -->
                        <div class="container mt-5">
                                        <h2 class="text-center mb-5">Staff List</h2>
                                        <hr>
                                        <div class="row">
                                            <?php
                                            // Include the database connection
                                            include '../connection.php';

                                            // Prepare the SQL statement
                                            $stmt = $conn->prepare("SELECT * FROM staffs");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Loop through each row in the result set
                                            while ($row = $result->fetch_assoc()) {
                                                // Print the staff data in the card
                                                echo '<div class="col-md-4 mb-3">';
                                                echo '<div class="card">';
                                                echo '<div class="card-body">';
                                                echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                                                echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['job_title'] . '</h6>';
                                                echo '<p class="card-text">' . $row['email'] . '</p>';
                                                echo '<p class="card-text">' . $row['phone'] . '</p>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            // Close the statement and database connection
                                            $stmt->close();
                                            $conn->close();
                                            ?>
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