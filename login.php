<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db.php');

    $email = $_POST["number"];
    $password = trim($_POST["password"]);
echo $email;
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, uniqueid, name, number, password FROM users WHERE number = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            session_regenerate_id(); // Regenerate session ID for security
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["uniqueid"] = $row["uniqueid"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["number"] = $row["number"];
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Incorrect Number or password.");</script>';
        }
    } else {
        echo '<script>alert("No user found with this Number.");</script>';
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kalam:wght@400;700&display=swap">
   
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
        /* Add your custom styles here */
        body {
            background-image: url('https://img.freepik.com/free-vector/geometrical-abstract-background_53876-91649.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .password-icon {
            cursor: pointer;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="login-container">
        <div class="login-logo">
            <img src="logo.png" alt="Logo" width="110">
            <h5 style="text-align:center">Login</h5>
        </div>
       
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Mobile:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your Number" name="number" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                    <div class="input-group-append">
                        <span class="input-group-text password-icon" onclick="togglePassword()">
                            <i class="fa fa-eye" id="password-icon"></i>
                        </span>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <a href="#" class="float-right">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
           
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign Up</a></p>
        </form>
    </div>
</div>

<!-- ==== How Does It Works Ends here  ======= -->

<div id="loader-container" class="loader-container" style="display: none;">
    <div class="loader"></div>
</div>

  
  <!-- Your content goes here -->
  
  <!-- Bootstrap JS and Popper.js (for dropdowns) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>



  <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
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
