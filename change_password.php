<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$host = "127.0.0.1";
$username = "drupal10";
$database = "inventory";
$password = "2286";
$con = new mysqli($host, $username, $password, $database);
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $newPassword = $_POST["new_password"];
  $confirmPassword = $_POST["confirm_password"];

  if ($newPassword === $confirmPassword) {
    $hashToStoreInDb = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE user SET Password=? WHERE Email=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $hashToStoreInDb, $email);
    $stmt->execute();
    $stmt->close();

    header("Location: Index.php");
    exit();
  } else {
    echo "Error: The passwords entered do not match.";
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
      <form class="bg-body-secondary p-5" style="width:30rem" method="POST" action="change_password.php">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>

          <input name="email" type="email" class="form-control" id="email" required>

        </div>
        <div class="mb-3">
          <label for="new_password" class="form-label">New Password</label>
          <input name="new_password" type="password" class="form-control" id="new_password" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Re-enter Password</label>
          <input name="confirm_password" type="password" class="form-control" id="confirm_password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
      </form>
    </div>
  </div>
</body>

</html>