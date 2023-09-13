<?php
$host = "127.0.0.1";
$username = "drupal10";
$database = "inventory";
$password = "2286";

$con = new mysqli($host, $username, $password, $database);

$delete = $_GET['del'];

$sql = "DELETE FROM user WHERE id = $delete";

if ($con->query($sql) === TRUE) {
    echo '<script>location.replace("userslist.php")</script>';
} else {
    echo "Something went wrong: " . $con->error;
}

$con->close();
?>