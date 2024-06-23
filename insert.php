<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting</title>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
// Database connection
include('db.php');

// Insert form data into the database
$field_headline = $_POST['headline'];
$description = $_POST['description'];
$category = $_POST['category'];
$uniqueid = $_POST['unique'];;

// SQL query to insert data
$sql = "INSERT INTO question (uniqueid, field_headline, description, category) VALUES ('$uniqueid', '$field_headline', '$description', '$category')";

if ($conn->query($sql) === TRUE) {
    // If insertion is successful, display success message with SweetAlert
    echo "<script>
            // SweetAlert success popup
            Swal.fire({
                title: 'Success!',
                text: 'Query Submitted!',
                icon: 'success',
                timer: 3000, // Close popup after 3 seconds
                timerProgressBar: true, // Show timer progress bar
                showConfirmButton: false // Hide confirm button
            }).then(function() {
                // Redirect to thank you page
                window.location.href = 'myquery.php';
            });
        </script>";
} else {
    // If insertion fails, display error message with SweetAlert
    echo "<script>
            // SweetAlert error popup
            Swal.fire({
                title: 'Error!',
                text: 'Error in form submission. Please try again later.',
                icon: 'error',
                timer: 3000, // Close popup after 3 seconds
                timerProgressBar: true, // Show timer progress bar
                showConfirmButton: false // Hide confirm button
            }).then(function() {
                // Redirect to thank you page
                window.location.href = 'myquery.php';
            });
        </script>";
    // Print MySQL error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
</body>
</html>
