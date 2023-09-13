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
            margin-top: 5rem;
           
        }
    </style>
</head>
</head>

<body class="body-background" style="font-family:Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-9 " >
                <div class="card" style="width: 70rem;">
                    <div class="card-header">
                        <h1 class="text-center bi bi-people" style="color:DodgerBlue;"> User List</h1>
                    </div>
                    <div class="card-body" >
                        <button type="button" class="btn btn-outline-success"><a href="usersAdd.php" style="text-decoration: none;"> Add New user</a> </button>
                        <a class="bi bi-arrow-left-circle-fill p-3" href="assetlist.php">Assests list</a>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
                        <br />
                        <br />
                        <table class="table text-center" >
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Edit-Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";
                                $con = new mysqli($host, $username, $password, $database);
                                $sql = "select * from user";
                                $run = mysqli_query($con, $sql);
                                $id = 1;
                                while ($row = mysqli_fetch_array($run)) {
                                    $uid = $row['id'];
                                    $Name = $row['Name'];
                                    $Email = $row['Email'];
                                    $Password = $row['Password'];
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $Name ?></td>
                                        <td><?php echo $Email ?></td>
                                        <td><?php echo $Password ?></td>
                                        <td><a href="useredit.php?id=<?php echo $row['id']; ?>" class="text-light" style="text-decoration: none;">

                                                <button class="btn btn-outline-primary bi bi-pencil-square">
                                                </button></a>
                                            <a href="userdelete.php?del=<?php echo $uid; ?>" class="text-light" style="text-decoration: none;" onclick="return confirm('Are you sure you want to delete this user?');">
                                                <button class="btn btn-outline-warning bi bi-person-x-fill"></button></a>
                                        </td>
                                    </tr>
                                <?php $id++;
                                } ?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
                                
</body>

</html>
</body>

</html>