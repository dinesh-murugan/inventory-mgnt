<?php
include 'dbconn.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    print_r($Id);
    $sql = "SELECT * FROM assets WHERE Id='$Id'";
    $sql = "SELECT id, Name FROM user";
    $result = $con->query($sql);
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
            margin-top: 15rem;
            margin-right: 4rem;
        }
    </style>
</head>

<body class="body-background" style="font-family: Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width: 35rem;">
                    <div class="card-header">
                        <h1 style="color: DodgerBlue;" class="bi bi-pencil-square text-center">Editing user details </h1>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
                        <a class="bi bi-arrow-left-circle-fill" href="assetlist.php">Userlist</a>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="myForm">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="User_Id">User ID</label>
                                    <select class="form-control" name="User_Id">
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['Name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option>No users found</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Assign_date">Assign Date</label>
                                    <input type="date" name="Assign_date" id="Assign_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $User_Id = $_POST['User_Id'];
                                $Assign_date = $_POST['Assign_date'];
                                $sql = "UPDATE assets SET User_Id = $User_Id, Assign_date = '$Assign_date' WHERE ID = $Id";
                                $result = $con->query($sql);
                                if ($result) {
                                    echo "Updated successfully.";
                                    header("Location: assetlist.php");
                                    exit();
                                } else {
                                    echo "Error updating data: " . $con->error;
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
