<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: Index.php");
  exit();
}
$email = $_SESSION['email'];
if (isset($_POST['submit'])) {
  $otp = $_POST['otp'];

  if ($otp == $_SESSION['otp']) {
    header("Location: change_password.php?email=$email");
    exit();
  } else {
    $error = "Invalid OTP. Please try again.";
    
  }
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
  <div class="container " style="padding-top:15rem;">

    <div class="row justify-content-center">
      <form class="bg-body-secondary p-5" style="width:30rem" method="POST" action="otpVerify.php">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input name="email" type="email" class="form-control" id="email" required value="<?php echo $email; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="otp" class="form-label">Enter OTP</label>
          <input name="otp" type="text" class="form-control" id="otp" required>
        </div>
        <?php if (isset($error)) { ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <button type="submit" name="submit" class="btn btn-primary">Verify OTP</button>
      </form>
    </div>
  </div>
</body>

</html>