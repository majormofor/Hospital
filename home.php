<?php
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css style -->
    <link rel="stylesheet" href="assets/CSS/homestyle.css">
    <!-- bootstrap  link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <title>MCP Homepage</title>
</head>

<body>


    <?php 
      include ('nav.php');
      ?>

    <main>
        <div class="container blac">
            <div class="row">
                <div class="col-md-4">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">News Updates</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Events</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Job update</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">

                            Dear patients,

                            We regret to inform you that Mofor Practice Care will be closed for all appointments and
                            consultations until the below date.
                            <br>
                            We apologize for any inconvenience this may cause.
                            <br>
                            We are taking this step to ensure the safety of our patients and staff in light of the
                            current situation
                            <br>
                            Thank you for your understanding and cooperation during this challenging time.
                            <br>
                            Resumption Dates: Tuesdays in July 6th, 2023


                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            Details: Join us for our annual community blood drive! Donating blood is a simple and
                            effective way to save lives, and every pint counts. All donors will receive a free t-shirt
                            and snacks. Appointments are encouraged, but walk-ins are welcome.
                            <br>
                            Program:
                            Healthy Living Workshop Series
                            <br>
                            Dates: Tuesdays in July (6th, 13th, 20th, 27th)
                            <br>
                            Time: 6pm - 7pm
                            <br>
                            Location: Hospital Conference Room
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">

                            Job Title: Medical Receptionist/Administrative Assistant
                            <br>
                            Location: Mofor Practice Care, [Aberdeen, Scotland]
                            <br>
                            Job Type: Full-time
                            <br>
                            Job Description:

                            Mofor Practice Care is seeking a full-time Medical Receptionist/Administrative Assistant to
                            join our team. The ideal candidate will have strong communication and customer service
                            skills, as well as experience in a medical office setting.
                        </div>
                    </div>


                </div>
                <div class="col-md-8">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/first.png" class="d-block w-100" alt="..." height="350px">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/second.jpg" class="d-block w-100" alt="..." height="350px">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/third.jfif" class="d-block w-100" alt="..." height="350px">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>



                </div>
            </div>
        </div>

    </main>

    <!-- 2nd main -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Mofor Practice Care</h5>
                        <img src="images/health.jpg" alt="" srcset="">
                        <p class="card-text">Our aim is to provide a high quality, caring and personal healthcare
                            service to our whole patient population.</p>
                        <a href="signup.php" class="btn btn-primary">Register as a New Patient</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Covid 19 Update</h5>
                        <img src="images/Covid-19.jpg" alt="" srcset="">
                        <p class="card-text"> Norovirus cases are higher than normal at the moment, particularly
                            affecting those over the age of 65.</p>
                        <a href="https://www.fiercepharma.com/pharma/goodbye-original-covid-19-vaccines-fda-changes-vaccine-guidance-pulls-monovalent-vaxs"
                            class="btn btn-primary">Highlight</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container blac">
        <h3>Frequently Asked Questions</h3>
        <div class="row">
            <div class="container mt-6">

                <button id="toggl-btn" class="btn btn-primary">How long will I have to stay in the hospital?</button>
                <div id="message" class="mt-3" style="display: none;">
                    <p>The length of your stay will depend on your medical condition and how quickly you recover. Your
                        healthcare provider will let you know when you're ready to go home.</p>
                </div>
            </div>
            <br>
            <!-- Add Bootstrap JS and your custom script -->
            <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#toggl-btn").click(function() {
                    $("#message").toggle();
                    if ($("#message").is(":visible")) {
                        $(this).text("Answer to How long will I have to stay in the hospital?");
                    } else {
                        $(this).text("How long will I have to stay in the hospital?");
                    }
                });
            });
            </script>
            <br>

            <!-- dropdown 2 -->
            <div class="container mt-6">
                <button id="toggle-btn" class="btn btn-primary">What are the possible side effects of my
                    treatment?</button>
                <div id="messag" class="mt-3" style="display: none;">
                    <p>Every treatment has potential side effects. Your healthcare provider will discuss the possible
                        side effects of your treatment with you and answer any questions you have.</p>
                </div>
            </div>
            <br>
            <script>
            $(document).ready(function() {
                $("#toggle-btn").click(function() {
                    $("#messag").toggle();
                    if ($("#messag").is(":visible")) {
                        $(this).text("What are the possible side effects of my treatment?");
                    } else {
                        $(this).text("What are the possible side effects of my treatment?");
                    }
                });
            });
            </script>
            <br>
            <!-- dropdown 3 -->

            <div class="container mt-6">
                <button id="togge-btn" class="btn btn-primary">Can my family visit me in the hospital?</button>
                <div id="messa" class="mt-3" style="display: none;">
                    <p>Yes, in most cases, your family can visit you in the hospital.</p>
                    <p>However, there may be certain visiting hours or restrictions in place due to your medical
                        condition.</p>

                </div>
            </div>
            <br>
            <script>
            $(document).ready(function() {
                $("#togge-btn").click(function() {
                    $("#messa").toggle();
                    if ($("#messa").is(":visible")) {
                        $(this).text("Can my family visit me in the hospital?");
                    } else {
                        $(this).text("Can my family visit me in the hospital?");
                    }
                });
            });
            </script>
            <br>
            <!-- dropdown 4 -->
            <div class="container mt-6">
                <button id="toggg-btn" class="btn btn-primary">How can I manage my pain?</button>
                <div id="messagg" class="mt-3" style="display: none;">
                    <p>Your healthcare provider will prescribe medications or other treatments to help manage your pain.
                    </p>
                    <p>It's important to let your healthcare provider know if you're experiencing pain so they can
                        adjust your treatment plan.</p>

                </div>
            </div>
            <br>
            <script>
            $(document).ready(function() {
                $("#toggg-btn").click(function() {
                    $("#messagg").toggle();
                    if ($("#messagg").is(":visible")) {
                        $(this).text("How can I manage my pain?");
                    } else {
                        $(this).text("How can I manage my pain?");
                    }
                });
            });
            </script>
            <br>
            <!-- dropdown 5 -->
            <div class="container mt-6">
                <button id="tog-btn" class="btn btn-primary">What should I do if I have questions or concerns?</button>
                <div id="mes" class="mt-3" style="display: none;">
                    <p>Don't hesitate to ask your healthcare provider or nursing staff if you have questions or
                        concerns. They are there to help you and ensure that you receive the best care possible.</p>
                </div>
            </div>

            <script>
            $(document).ready(function() {
                $("#tog-btn").click(function() {
                    $("#mes").toggle();
                    if ($("#mes").is(":visible")) {
                        $(this).text("What should I do if I have questions or concerns?");
                    } else {
                        $(this).text("What should I do if I have questions or concerns?");
                    }
                });
            });
            </script>



        </div>
    </div>




    <br>
    <!-- footer starts -->
    <footer class="footer">
        <p>Mofor Practice care &copy; 2023</p>
    </footer>

    <!-- footer Ends -->
</body>

</html>