<?php session_start();
include 'email.php';

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $otp = rand(100000, 999999);

  $_SESSION['email']=$email;
  $_SESSION['otp']=$otp;
  print_r($_SESSION['$otp ']);
  sendEmail($email, 'OTP - verification', $otp);  
  header("Location: otpVerify.php");
  exit();
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<style>
    .body-background {
      background-image: url('https://images.pexels.com/photos/1432679/pexels-photo-1432679.jpeg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
<body class="body-background" style="font-family:Garamond;">
  <div class="container" style="padding-top:15rem;" >

  <div class="row justify-content-center">
  <form class="bg-body-secondary p-5" style="width:30rem" method="POST">
    <div class="mb-3">
      <label for="forgotEmail" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="forgotEmail" required>
      <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Send OTP</button>
  </form>
  </div>
  </div>  
</body>
</html>
