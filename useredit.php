<?php
include 'dbconn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $email = $row['Email'];
        $password = $row['Password'];
    } else {
        echo "User not found.";
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
                <div class="card" style="width:35rem">
                    <div class="card-header">
                        <h1 style="color:DodgerBlue;">Editing user details </h1>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
                        <a class="bi bi-arrow-left-circle-fill" href="userslist.php">Userlist</a>
                    </div>
                    <div class="card-body">
                        <form action="usersAdd.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo isset($name) ? $name : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="Email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="Password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo isset($password) ? $password : ''; ?>" required>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        </form>
</body>

</html>
</div>
</div>
</div>
</div>
</div>
</body>

</html>