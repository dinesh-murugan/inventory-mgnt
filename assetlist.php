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
            margin-top: 10rem;
            margin-right:
        }

        .highlight {
            background-color: yellow;
        }
    </style>
</head>

<body class="body-background" style="font-family:Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center bi bi-list-check" style="color:DodgerBlue;">Available List </h1>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-info bi bi-pc-display-horizontal">
                            <a href="assetAdd.php" style="text-decoration: none;">Add Inventory</a>
                        </button>
                        <button type="button" class="btn btn-outline-warning ">
                            <a href="assetissued.php" style="text-decoration: none;">Asset issued</a>
                        </button>
                        <button type="button" class="btn btn-outline-info bi bi-person-square">
                            <a href="usersAdd.php" style="text-decoration: none;">User Register</a>
                        </button>

                        <button type="button" class="btn btn-outline-info ">
                            <a href="userslist.php" style="text-decoration: none;">User List</a>
                        </button>
            </tbody>
          </table>
        
                    
                        <a class="float-md-end p-2 bi bi-house-heart" href="logout.php">Home</a>
                        <br />
                        <br />
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Asset_name</th>
                                    <th>Image</th>
                                    <th>Inventory_Date</th>
                                    <th>User_Id</th>
                                    <th>Assign_date</th>
                                    <th>Assign-Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";
                                $con = new mysqli($host, $username, $password, $database);
                                $sql = "select * from assets where User_Id is NULL ";
                                $run = mysqli_query($con, $sql);
                                $Id = 1;
                                while ($row = mysqli_fetch_array($run)) {
                                    $uid = $row['Id'];
                                    $Asset_name = $row['Asset_name'];
                                    $Image = $row['Image'];
                                    $Date_time = $row['Date_time'];
                                    $User_Id =$row['User_Id'];
                                    $Assign_date = $row['Assign_date'];
                                ?>
                                    <tr>
                                        <td><?php echo $Id ?></td>
                                        <td><?php echo $Asset_name ?></td>
                                        <td><?php echo '<img src="' . $Image . '" alt="Asset Image" width="100" height="100">';?></td>
                                        <td><?php echo $Date_time ?></td>
                                        <td><?php echo $User_Id ?></td>
                                        <td><?php echo $Assign_date ?></td>
                                        <td>
                                            <a href="assetedit.php?Id=<?php echo $row['Id']; ?>" class="text-light" style="text-decoration: none;"> <button class="btn btn-outline-primary bi bi-person-fill-add">
                                                </button></a>
                                            <a href="assetlist.php?del=<?php echo $uid; ?>" class="text-light" style="text-decoration: none; " onclick="return confirm('Are you sure you want to delete this user?');">>
                                                <button class="btn btn-outline-danger bi bi-trash3-fill">
                                                </button></a>
                                                <?php
                                                    include 'dbconn.php';
                                                    if (isset($_GET['del'])) {
                                                        $deleteId = $_GET['del'];
                                                        $sql = "DELETE FROM assets WHERE Id = ?";
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->bind_param("i", $deleteId);
                                                        if ($stmt->execute()) {
                                                        } else {
                                                            echo "Error deleting asset: " . $stmt->error;
                                                        }
                                                        $stmt->close();
                                                    }
                                                    $con->close();
                                                    ?>
                                        </td>
                                    </tr>
                                <?php $Id++;                                    
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>