<?php
include 'dbconn.php';
include 'email.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $sql = "SELECT assets.*, user.Email FROM assets JOIN user ON assets.User_Id = user.id WHERE assets.Id = '$Id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mail_id = $row['Email'];
    } else {
        echo "User not found.";
    }
}

if (isset($_POST["submit"])) {
    $recipient = $_POST["recipient"];
    $message = $_POST["message"];

    $subject = "Asset Return Reminder";
    sendEmail($recipient, $subject, $message);
    header("Location: HRPenalty.php");
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
          <input type="text" class="form-control" id="recipient-name" name="recipient" value="<?php echo isset($mail_id) ? $mail_id : ''; ?>">
        </div>
        <?php
        if (isset($_GET['Id'])) {
          $Id = $_GET['Id'];
          $sql = "SELECT * FROM assets WHERE Id='$Id'";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (isset($row['Assign_date'])) {
              $borrowedDateTime = $row['Assign_date'];
              $borrowedTime = strtotime($borrowedDateTime);
              $currentTime = time();
              $elapsedTime = $currentTime - $borrowedTime;
              $elapsedDays = floor($elapsedTime / (60 * 60 * 24));
              $penaltyAmount = $elapsedDays * 100;
              if ($penaltyAmount > 0) {
            
                $Asset_name = $row['Asset_name'];
                echo '<div class="mb-3">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea style="height:280px;" class="form-control" id="message-text" name="message">Hi ,
    
              This is a reminder that you still haven\'t returned the "' . $Asset_name . '" within the allotted period. It\'s been almost "' . $elapsedDays . ' days" at this point. As a result, you desire to pay "' . $penaltyAmount . '" INR.Requesting you to return the asset at admin.
    
Thanks and Regards,
HR_team Infanion
https://www.infanion.com

</textarea>
              </div>';
              } else {
                echo "No penalty is applicable.";
              }
            } else {
              echo "Date time information not found in the database.";
            }
          } else {
            echo "User not found.";
          }
        }
        ?>
        <a class="float-md-end p-2" href="HRPenalty.php"> <<-- Back</a>
            <button type="submit" name="submit" class="btn btn-primary">Send message</button>
      </form>
    </div>
  </div>
  </form>
  </div>
  </div>
</body>

</html>