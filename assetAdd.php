<?php
include 'dbconn.php';
if (isset($_POST['submit'])) {
    $Asset_name = $_POST['asset_name'];
    
    $Image = file_get_contents($_FILES['image']['tmp_name']);
    $name = $_FILES['image']['name'];
    $imagePath = 'images/' . $name;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    
    $Date_time = $_POST['date_time'];


    $sql = "INSERT INTO assets (Asset_name, Image, Date_time) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $Asset_name, $imagePath, $Date_time);
    if ($stmt->execute()) {
        echo '<script> location.replace("assetlist.php")</script>'; 
        exit;
    } else {
        echo "Something went wrong: " . $stmt->error;
    }
    $stmt->close();
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
<body class="body-background" style="font-family: Garamond;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width: 35rem;">
                    <div class="card-header">
                        <h1 class="text-center bi bi-database-add" style="color: DodgerBlue;"> Adding new asset</h1>
                        <a class="float-md-end p-2 bi bi-house-heart" href="Index.php">Home</a>
                        <a class="bi bi-arrow-left-circle-fill" href="assetlist.php">Assetlist</a>
                    </div>
                    <div class="card-body">
                        <form action="assetAdd.php" method="post" enctype="multipart/form-data" id="myForm">
                            <!-- <div class="form-group">
                                <label for="asset_name">Asset Name</label>
                                <select name="asset_name" id="asset_name" class="form-control" required>
                                    <option>Select Asset Name</option>
                                    <option value="Keyboard">Keyboard</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="LaptopCharger">Laptop Charger</option>
                                    <option value="Mouse">Mouse</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="USB">USB</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="asset_name">Asset Name</label>
                                <input type="text" name="asset_name" id="asset_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png" required>
                            </div>
                            <div class="form-group">
                                <label for="date_time">Assign Date</label>
                                <input type="date" name="date_time" id="date_time" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
