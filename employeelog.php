<?php
session_start();
$host = "127.0.0.1";
$username = "drupal10";
$database = "inventory";
$password = "2286";

$con = new mysqli($host, $username, $password, $database);
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT Password FROM user WHERE Email=?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($hashedPassword);
  $stmt->fetch();
  $stmt->close();
  if ($hashedPassword && password_verify($password, $hashedPassword)) {
    $_SESSION['employee'] = $email;
    header("Location: empprofile.php");
    exit();
  } else {
    echo "Invalid username or password";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <style>
    .row p {
      font-size: 2rem;
    }
    .body-background {
      background-image: url('https://images.pexels.com/photos/1432679/pexels-photo-1432679.jpeg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body class="body-background" style="font-family:Garamond;">
  <div class="container mt-5">
    <div class="row">
      <figure class="text-center">
        <blockquote class="blockquote">
         
          <p class="text-center">Employees Login</p>
  </div>

  <div class="row justify-content-center">
    <form class="bg-body-secondary p-5" style="width:30rem" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password" required>
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Login</button>
      <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
      <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal"><a href="otp.php"> Forgot Password?</a></button>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
</body>

</html>