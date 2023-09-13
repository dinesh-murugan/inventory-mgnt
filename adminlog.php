<?php
include 'dbconn.php';
if (isset($_POST["submit"])) {
  $username = $_POST["email"];
  $password = $_POST["password"];
  $query = "SELECT * FROM admin WHERE email='$username'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row && $row['password'] == $password) {
    header("Location: assetlist.php");
    exit();
  } 
  else {
    echo "Invalid username or password";
} 
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="firstpage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
          <!-- <p>Infanion</p>
          <p>Inventory management</p> -->
          <p class="text-center">ADMIN LOG</p>
        </blockquote>
      </figure>
    </div>
    <div class="row justify-content-center">
      <form class="bg-body-secondary p-5" style="width:30rem" method="POST">
        <div class="mb-3">
          <label for="Email" class="form-label">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label" >Password</label>
          <input name="password" type="password" class="form-control" id="Password" required>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Login</button>
        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
      </form> 
    </div>
  </div>
</body>
</html>
