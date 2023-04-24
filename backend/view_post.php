<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

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
    </style>

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


            </div>
        </div>
    </nav>

    <!-- Navbar Ends -->
    <div class="container">
        <?php
        // Check if post ID was passed in URL
        if (!isset($_GET['id'])) {
            echo '<div class="alert alert-danger" role="alert">No post ID specified.</div>';
        } else {
            // Connect to database
            session_start();
            require '../connection.php';
            
            // Get post details from database
            $stmt = $conn->prepare("SELECT * FROM staff_blog_posts WHERE id = ?");
            $stmt->bind_param("i", $_GET['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if post exists
            if ($result->num_rows == 0) {
                echo '<div class="alert alert-danger" role="alert">Post not found.</div>';
            } else {
                // Display post details
                $row = $result->fetch_assoc();
                echo '<h1>' . $row['title'] . '</h1>';
                echo '<p class="text-muted">Posted by ' . $row['author'] . ' on ' . $row['created_at'] . '</p>';
                echo '<img src="' . $row['image'] . '" class="img-fluid rounded" width = "350" height = "350">';
                echo '<div class="my-4">' . $row['content'] . '</div>';
            }
            
            // Close database connection
            $conn->close();
        }
    ?>
    </div>

    <!-- footer starts -->
    <footer class="footer">
        <p>Mofor Practice care &copy; 2023</p>
    </footer>
    <!-- footer Ends -->

</body>

</html>