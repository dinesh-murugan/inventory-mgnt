<?php
include 'dbconn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "INSERT INTO user (Name, Email, Password) VALUES ('$name', '$email', '$password')";

    if ($con->query($sql) === TRUE) {
        echo '<script> location.replace("userslist.php")</script>';
    } else {
        echo "Something went wrong: " . $con->error;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <style>
        .body-background {
            background-image: url('https://images.pexels.com/photos/1432679/pexels-photo-1432679.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            padding: auto;
            margin: auto;
            margin-top: 15rem;
            margin-right: 4rem;
        }
    </style>
</head>

<body class="body-background" style="font-family:Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width:35rem;">
                    <div class="card-header">
                        <h1 class="bi bi-person-add text-center " style="color:DodgerBlue;"> Adding new users</h1>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
                        <a class="bi bi-arrow-left-circle-fill" href="userslist.php">Userlist</a>
                    </div>
                    <div class="card-body">
                        <form action="usersAdd.php" method="post" id="myForm">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="Email" id="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="Password" id="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-primary" name="submit" value="Register" onclick="validateForm(event)">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>