<?php
        ini_set ('display_errors', 1);  
        ini_set ('display_startup_errors', 1);  
        error_reporting (E_ALL);  
                                session_start();                              
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";
                                $con = new mysqli($host, $username, $password, $database);
                            if (isset($_GET['id'])) {
                                $deviceid=$_GET['id'];
                                $sql= "UPDATE assets SET Complaint = 'lost' WHERE Id = $deviceid";
                                $run=  mysqli_query($con,$sql);
                            }
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
                    <h1 class="text-center bi bi-envelope-exclamation-fill" style="color:DodgerBlue;"><br>Asset Lost</h1>
                    </div>
                    <div class="card-body">
                    <a href="HRPenalty.php"><button type="button" class="btn btn-primary py-2">Late submission</button></a>   
                    <a class="float-md-end p-2 bi bi-house-heart" href="logout.php">Logout</a>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
                        <br />
                        <br />
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Asset_name</th>
                                    <th>Image</th>
                                    <th>Date_time</th>
                                    <th>User_Id</th>
                                    <th>Assign_date</th>
                                    <th>Complaint</th>
                                    <th>Penalty</th>
                                    <th>Mail</th>
                                    <th>Delete from Inventory </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     $sql = "select * from assets where Complaint is NOT NULL";
                                     $run = mysqli_query($con, $sql);
                                     $si=1;
                                     while ($row = mysqli_fetch_array($run)) {
                                         $uid = $row['Id'];         
                                         $Asset_name = $row['Asset_name'];
                                         $Image = $row['Image'];
                                         $Date_time = $row['Date_time'];
                                         $User_Id =$row['User_Id'];
                                         $Assign_date = $row['Assign_date'];
                                         $complaint = $row['Complaint'];
                                         $Penalty = $row['Penalty'];
                                         echo '<tr class="<?php echo $rowClass; ?> ">
                                         <td>'.$si++.'</td>
                                         <td>'.$Asset_name.'</td>
                                        
                                         <td><img src="' . $Image . '" alt="Asset Image width="100" height="100"></td>
                                         <td>'.$Date_time .'</td>
                                         <td>'.$User_Id  .'</td>
                                         <td>'.$Assign_date .'</td>
                                         <td>'.$complaint.'</td>
                                         <td>'.$Penalty.'</td>
                                         <td>
                                         <a href="hrlostmail.php?deviceid='.$uid.'&&userdata='.$User_Id.'"><button type="button" class="btn btn-outline-secondary bi bi-envelope-plus-fill"></button></a>
                                     </td>
                                     <td>  <a href="HRassetlost.php?del= '.$uid.' class="text-light" style="text-decoration: none; " onclick="return confirm("Are you sure you want to delete this user?");">
                                     <button class="btn btn-outline-danger bi bi-trash3-fill">
                                     </button></a></td>
                                         </tr>';
                                     }
                                     
                                     ?>
                                
                                                <?php
                                                    include 'dbconn.php';

                                                    if ($con->connect_error) {
                                                        die("Connection failed: " . $con->connect_error);
                                                    }

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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>