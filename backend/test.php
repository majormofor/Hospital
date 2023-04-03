<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	

 <?php
    
                        // Check if form is submitted
                        if (isset($_POST['submit'])) {
                            // Include database connection
                            include '../connection.php';

                            // Prepare and bind parameters
                            $stmt = $conn->prepare("INSERT INTO prescriptions (patient_id, prescription_date, medicine_name, dosage, frequency, instruction, staff_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
                            $stmt->bind_param("isssssi", $patient_id, $prescription_date, $medicine_name, $dosage, $frequency, $instruction, $staff_id);

                            // Get form data
                            $patient_id = $_POST['patient_id'];
                            $prescription_date = $_POST['prescription_date'];
                            $medicine_name = $_POST['medicine_name'];
                            $dosage = $_POST['dosage'];
                            $frequency = $_POST['frequency'];
                            $instruction = $_POST['instruction'];
                            $staff_id = $_POST['staff_id'];

                            // Execute query and check if successful
                            if ($stmt->execute()) {
                                echo "Prescription created successfully.";
                            } else {
                                echo "Error: " . $stmt->error;
                            }

                            // Close statement and connection
                            $stmt->close();
                            $conn->close();
                        }
                        ?>

                    <div class="row">
                    <div class="col-md-5">
                    <img src="../assets/images/prescription.jpg" alt="Urine Image" height = "600px" width = "499px" >

                        </div>
                        <div class="col-md-7">
                    <h1>Create a Prescription</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="patient_id">Patient ID:</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                        </div>
                        <div class="form-group">
                            <label for="prescription_date">Prescription Date:</label>
                            <input type="date" class="form-control" id="prescription_date" name="prescription_date" required>
                        </div>
                        <div class="form-group">
                            <label for="medicine_name">Medicine Name:</label>
                            <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                        </div>
                        <div class="form-group">
                            <label for="dosage">Dosage:</label>
                            <input type="text" class="form-control" id="dosage" name="dosage" required>
                        </div>
                        <div class="form-group">
                            <label for="frequency">Frequency:</label>
                            <input type="text" class="form-control" id="frequency" name="frequency" required>
                        </div>
                        <div class="form-group">
                            <label for="instruction">Instruction:</label>
                            <input type="text" class="form-control" id="instruction" name="instruction" required>
                        </div>
                        <!-- <a type="submit" name="submit" class="btn btn-primary">Create</a> -->
                        <button type="submit" name = "submit">create</button>
                    </form>
                    </div>
                    </div>