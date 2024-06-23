<?php
session_start();

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include('db.php');

    // Retrieve form data
    $questionId = $_POST["questionid"];
    $uniqueId = $_POST["uniqueid"];
    $message = $_POST["message"]; // Assuming the textarea field is named "message"

    // Prepare and execute SQL statement to insert the message
    $stmt = $conn->prepare("INSERT INTO replies (question_id, unique_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $questionId, $uniqueId, $message);

    if ($stmt->execute()) {
        // If insertion is successful, redirect to a success page or perform any other action
        header("Location: success.php");
        exit();
    } else {
        // If insertion fails, display an error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect to an error page or perform any other action
    header("Location: error.php");
    exit();
}
?>
