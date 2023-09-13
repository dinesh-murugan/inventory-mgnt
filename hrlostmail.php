<?php
include 'dbconn.php';
include 'email.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
ini_set ('display_errors', 1);  
        ini_set ('display_startup_errors', 1);  
        error_reporting (E_ALL);  
                                session_start();
                                
                                // $userName= $_SESSION['employee'];
                                $host = "127.0.0.1";
                                $username = "drupal10";
                                $database = "inventory";
                                $password = "2286";

                                $con = new mysqli($host, $username, $password, $database);
                            // global $deviceid;
                            if (isset($_GET['deviceid'])) {
                                $deviceid=$_GET['deviceid'];
                                $User=$_GET['userdata'];
                            echo $User;
                            }
                            if (isset($_POST["submit"])) {
                                // $recipient = $_POST["recipient"];
                                $message = $_POST["message"];
                                $subject = "Asset lost penalty";
                                ///////
                                $que="SELECT Email FROM user WHERE id = $User";
                                                        $res1=mysqli_query($con,$que);
                                                        $e=mysqli_fetch_assoc($res1);
                                                        $email=$e['Email'];
                                //////
                                sendEmail($email, $subject, $message);
                                $query="UPDATE assets SET Penalty=$message WHERE Id=$deviceid";

                                $res=mysqli_query($con,$query);
                                header("Location: HRassetlost.php");
                                exit();
                            }
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="firstpage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <style>
    .row p {
      font-size: 2rem;
    }

    .body-background {
      background-image: url('https://images.pexels.com/photos/1432679/pexels-photo-1432679.jpeg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body class="body-background" style="font-family:Garamond;">
  <div class="container " style="padding-top:15rem;">

    <div class="row justify-content-center">
      <form class="bg-body-secondary p-5" style="width:30rem" method="POST">
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Recipient:</label>
          <input type="text" class="form-control" id="recipient-name" name="recipient" disabled value="<?php echo $deviceid;?>">
        </div>
        <div class="mb-3">
              <label for="message-text" class="col-form-label">Penalty INR:</label>
              <textarea style="height:50px;" class="form-control" id="message-text" name="message">
</textarea>
        
            <button type="submit" name="submit" class="btn btn-primary">Send message</button>
      </form>
    </div>
  </div>
  </form>
  </div>
  </div>
</body>

</html>