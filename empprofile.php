<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        }
    </style>
</head>
<body class="body-background" style="font-family:Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Employee profile</h1>
                        <!-- <a href="empprofile.php"><button type="button" class="btn btn-primary  ">Employee profile</button></a> -->
                        <a href="empMyinventory.php"><button type="button" class="btn btn-primary   ">My Inventory</button></a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Asset available
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Availability </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table text-center" >
                            <thead>
                                <tr>
                                    <th scope="col">SNO</th>
                                    <th scope="col">Asset_name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 session_start();
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";

                                $con = new mysqli($host, $username, $password, $database);

                                $sql = "SELECT Asset_name FROM assets WHERE User_Id IS NULL";
                                $run = mysqli_query($con, $sql);
                                $Id = 1;

                                while ($row = mysqli_fetch_array($run)) {
                                    // $uid = $row['Id'];
                                    $Asset_name = $row['Asset_name'];
                                ?>
                                    <tr class="<?php echo $rowClass; ?> ">
                                        <td><?php echo $Id ?></td>
                                        <td><?php echo $Asset_name ?></td>
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
</div>            
                        <a class="float-md-end p-2 bi bi-house-heart" href="logout.php">Logout</a>
                    </div>
                    <div class="card-body text-center">
                        <div class="row g-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        ini_set('display_errors', 1);
                                        ini_set('display_startup_errors', 1);
                                        error_reporting(E_ALL);
                                       
                                        
                                        $host = "127.0.0.1";
                                        $username = "drupal10";
                                        $database = "inventory";
                                        $password = "2286";
                                        $con = new mysqli($host, $username, $password, $database);
                                        $employee = $_SESSION['employee'];
                                        $query = "select * from user where Email='$employee'";
                                        $result = mysqli_query($con, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo '<h3 class="card-title"> NAME: ' . $row['Name'] . '</h3>
                                            <h4 class="card-title"> ID: ' . $row['id'] . '</h4>
                                            <h4 class="card-title"> EMAIL ID: ' . $row['Email'] . '</h4>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
