<?php
                            $staff_id = $_SESSION['staff_id'];

                            // Check if form is submitted
                            if (isset($_POST['submit'])) {
                                // Include database connection
                                include '../connection.php';

                                // Prepare and bind parameters
                                $stmt = $conn->prepare("INSERT INTO prescription (patient_id, prescription_date, medicine_name, dosage, frequency, instructions, staff_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("isssssi", $patient_id, $prescription_date, $medicine_name, $dosage, $frequency, $instruction, $staff_id);

                                // Get form data
                                $patient_id = $_POST['patient_id'];
                                $prescription_date = $_POST['prescription_date'];
                                $medicine_name = $_POST['medicine_name'];
                                $dosage = $_POST['dosage'];
                                $frequency = $_POST['frequency'];
                                $instruction = $_POST['instruction'];

                                // Execute query and check if successful
                                if ($stmt->execute()) {
                                    echo "<script> alert('Prescription created successfully.');</script>";
                                    // Redirect to staff page
                                    header('Location: staff.php');
                                    exit;
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close statement and connection
                                $stmt->close();
                                $conn->close();
                            }
                            ?>