<?php
session_start();

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["uniqueid"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
} else {
    // Continue with the rest of your code
}
$uniqueid = $_SESSION['uniqueid'];
$name = $_SESSION["name"];
$number = $_SESSION["number"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Registration</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kalam:wght@400;700&display=swap">
  <head>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

   
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    .floating-button {
  position: fixed;
  top: 20px;
  left: 20px;
  z-index: 999; /* Adjust z-index as needed */
}

.floating-button a {
  background-color: #007bff; /* Change background color as needed */
  color: #fff; /* Change text color as needed */
  border: none;
  border-radius: 20px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add box shadow for better visibility */
}

.floating-button a:hover {
  background-color: #0056b3;
  text-decoration: none; /* Change hover background color as needed */
}
    /* Add your custom styles here */
    .content {
  padding: 20px;
}
body {
      background-image: url('bg.png');
      background-size: cover;
      background-repeat: no-repeat;
    }
    .custom-form {
  max-width: 400px;
  
  margin: 100px auto auto auto;
  padding: 20px;
  border-radius: 10px;
  background-color: #f8f9fa; /* Background color for form container */
}

.custom-form .form-header h5 {
  text-align: center;
}

.custom-form .form-group {
  margin-bottom: 20px;
}

.custom-form .form-group input[type="text"],
.custom-form .form-group textarea,
.custom-form .form-group input[type="file"],
.custom-form .form-group select {
  border: none;
  border-bottom: 1px solid #ced4da; /* Bottom border */
  border-radius: 0;
  background-color: transparent;
}


.custom-form .form-group input[type="text"]:focus,
.custom-form .form-group textarea:focus,
.custom-form .form-group input[type="file"]:focus {
  box-shadow: none;
}

.custom-form .form-group .input-group-text {
  background-color: transparent;
  border: none;
}

.custom-form .btn-primary {
  background-color: #007bff;
  border: none;
}

.custom-form .btn-primary:hover {
  background-color: #0056b3;
}
.chat-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .sent-message {
            background-color: #007bff;
            color: white;
            float: right;
        }
        .received-message {
            background-color: #f0f0f0;
            color: #333;
            float: left;
        }

  </style>
</head>
<body>
 <!--Header --><br>
 <h5 style="text-align:center; color:#fff">View Your Replies</h5>
 <div class="container mt-5">

 <div class="chat-container">

 
 <?php  
include('db.php');
$questionid = $_GET['id'];
$result = $conn->query("SELECT * FROM replies WHERE question_id = $questionid ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
     





    <div class="message received-message"><?php echo $row['message'] ?></div>
          

      <?php

}

} else {
echo "No records found";
}
$conn->close();

?>


           
            <!-- Add more messages here -->
        </div>
        <!-- Message input form -->
   
    </div>
<div class="floating-button">
  <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

  <script>
    function togglePassword(fieldId) {
      var passwordField = document.getElementById(fieldId);
      var passwordIcon = document.getElementById("password-icon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.className = "fa fa-eye-slash";
      } else {
        passwordField.type = "password";
        passwordIcon.className = "fa fa-eye";
      }
    }
  </script>
</body>
</html>

