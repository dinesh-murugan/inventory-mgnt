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
                        <h1 class="text-center bi bi-envelope-exclamation-fill" style="color:DodgerBlue;"><br>Late submission</h1>
                    </div>
                    <div class="card-body">
                      
                   
                    <a href="HRassetlost.php"><button type="button" class="btn btn-primary py-2">Asset Lost</button></a>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
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
                                    <th>Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";

                                $con = new mysqli($host, $username, $password, $database);

                                $sql = "SELECT * FROM assets WHERE Assign_date < NOW() - INTERVAL 3 DAY;
                                ";
                                 

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
                                    <tr class="<?php echo $rowClass; ?>">
                                        <td><?php echo $Id ?></td>
                                        <td><?php echo $Asset_name ?></td>
                                        <td>
                                            <?php
                                            if (!empty($Image) && file_exists($Image)) {
                                                echo '<img src="' . $Image . '" alt="Asset Image" width="100" height="100">';
                                            } else {
                                                echo 'No Image Available';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $Date_time ?></td>
                                        <td><?php echo $User_Id ?></td>
                                        <td><?php echo $Assign_date ?></td>
                                        
                                        <td>
                                      

                                            <a href="HRmail.php?Id=<?php echo $row['Id']; ?>">
                                                <button type="button" class="btn btn-outline-secondary bi bi-envelope-plus-fill"></button>
                                            </a>


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