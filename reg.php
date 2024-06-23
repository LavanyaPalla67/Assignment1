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
$field_headline = $_POST['name'];
$description = $_POST['mobile'];
$password = $_POST['password'];
// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

function generateUniqueCode() {
    return sprintf('%06d', mt_rand(1, 999999));
}

// Call the function to generate a unique code
$uniqueCode = generateUniqueCode();


// SQL query to insert data
$sql = "INSERT INTO users (uniqueid, name, number, password) VALUES ('$uniqueCode', '$field_headline', '$description', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // If insertion is successful, display success message with SweetAlert
    echo "<script>
            // SweetAlert success popup
            Swal.fire({
                title: 'Success!',
                text: 'Registered Successfull!',
                icon: 'success',
                timer: 3000, // Close popup after 3 seconds
                timerProgressBar: true, // Show timer progress bar
                showConfirmButton: false // Hide confirm button
            }).then(function() {
                // Redirect to thank you page
                window.location.href = 'login.php';
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
                window.location.href = 'register.php';
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
