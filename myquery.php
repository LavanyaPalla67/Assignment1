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
  <title>Women Dashboard</title>
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
    /* Add your custom styles here */
    .content {
  padding: 20px;
}
body {
      background-image: url('bg.png');
      background-size: cover;
      background-repeat: no-repeat;
    }

.logo {
  text-align: center;
  padding: 20px;
}
.content{
    font-weight: 600;
    color: #f0f0f0;
}
.logo img {
  width: 100px; /* Adjust size as needed */
  height: 100px; /* Adjust size as needed */
  border-radius: 50%;
  background-color: #f0f0f0; /* Change background color as needed */
  /* Add any vector design or styling here */
}

@media (max-width: 768px) {
  .logo img {
    width: 80px; /* Adjust size as needed for smaller screens */
    height: 80px; /* Adjust size as needed for smaller screens */
  }
}
.fan{
    background-color: #56997e;
}
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
.card {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      margin: 10px;
    }

    .card-link {
      text-decoration: none;
    }

    .card-link:hover .card {
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .search-link {
  display: block;
  text-align: center;
  text-decoration: none;
}

.search-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.search-container input[type="text"] {
  width: 80%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  outline: none;
}

.search-container button {
  float: right;
  width: 20%;
  padding: 10px;
  border: none;
  background: #007bff;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

.search-container button:hover {
  background: #0056b3;
}
.card-text{
    font-size: 11px !important;
}
.btr{
  padding: 10px 20px;
  border-radius: 13px;
  background-color: #007bff;
  color: #fff;

}
.btr:hover{
  background-color: #fff;
  color: #000000;
  text-decoration: none;
}

  </style>
</head>
<body>
 <!--Header -->


 <!-- Header Ends here  -->
<br>
<h2 style="text-align:center; color:#fff">My Querys</h2>
 <div class="container">
  <div class="row">


  <?php  
include('db.php');
$result = $conn->query("SELECT * FROM question WHERE uniqueid = $uniqueid ORDER BY id DESC");

if ($result->num_rows > 0) {


while ($row = $result->fetch_assoc()) {



// Close the connection

?>
     






                    <div class="col-12">
      <a href="view.php?id=<?php echo $row['id'] ?>" class="card-link">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['field_headline'] ?></h5>
          
          </div>
        </div>
      </a>
    </div>
      <?php

}

} else {
echo "No records found";
}
$conn->close();

?>



    
  </div>
</div>


  <!-- Your additional content goes here -->

  <!-- Bootstrap JS and Popper.js (for dropdowns) -->
  <div class="floating-button">
  <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>


</body>
</html>
