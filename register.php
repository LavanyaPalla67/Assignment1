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
   
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    /* Add your custom styles here */
    body {
      background-image: url('https://img.freepik.com/free-vector/geometrical-abstract-background_53876-91649.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }

    .registration-container {
      max-width: 400px;
      margin: auto;
      margin-top: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .registration-logo {
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
    <div class="registration-container">
      <div class="registration-logo">
        <img src="logo.png" alt="Logo" width="110">
        <h5 style="text-align:center">Register</h5>
      </div>
      <form method="post" action="reg.php">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
        </div>
        <div class="form-group">
          <label for="number">Mobile:</label>
          <input type="text" class="form-control" id="number" placeholder="Enter your number" name="mobile" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
            <div class="input-group-append">
              <span class="input-group-text password-icon" onclick="togglePassword('password')">
                <i class="fa fa-eye" id="password-icon"></i>
              </span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>

  <!-- Your additional content goes here -->

  <!-- Bootstrap JS and Popper.js (for dropdowns) -->
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
