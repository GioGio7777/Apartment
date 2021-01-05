<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
  body {
    background-color: #e6e6e6;
  }

  #apUs {
    position: relative;
    height: 100px;
    width: 100px;
    top: 10px;
    left: 0%;
  }
</style>

<?php session_start(); ?>


<?php
$userName = $_SESSION['userName'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbName     = "apartman";

$conn = new mysqli($servername, $username, $password, $dbName);


$sqlForManager = "SELECT * FROM manager WHERE username='$userName'";


$resultManager = $conn->query($sqlForManager);


if ($resultManager->num_rows > 0) {
  while ($row = $resultManager->fetch_row()) {
    $_SESSION['buildingId'] = $row[1];
    $_SESSION['email'] = $row[11];
    $_SESSION['id'] = $row[0];
  }
}
$conn->close();

?>



<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #32b18e; position: relative; width:1920px;">
        <a class="navbar-brand" style="color:white;"><?php echo $userName ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="color:white;">>Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addPerson.php" >Add Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Delete Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="persons.php">Show Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="due.php">Due</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payManager.php">Pay</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#32b18e">
                        <a class="dropdown-item" href="settingsAdmin.php">Settings</a>
                        
                        <a class="dropdown-item" href="login.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


  <?php
  $userName = $_SESSION['userName'];

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbName     = "apartman";

  $conn = new mysqli($servername, $username, $password, $dbName);
  $bID = $_SESSION['buildingId'];

  $sqlForManager = "SELECT * FROM building WHERE buildingID='$bID'";


  $resultManager = $conn->query($sqlForManager);


  if ($resultManager->num_rows > 0) {
    while ($row = $resultManager->fetch_row()) {
      $buildingName = $row[1];
      $buildingImg = $row[2];
      $_SESSION['buildingApt'] = $row[3];
      $buildingAddress = $row[4];
    
    }
    $_SESSION['buildingAddress']=$buildingAddress;
    $_SESSION['buildingName']=$buildingName;
  }
  $conn->close();

  ?>




  <div id="apUs">
    <?php

    echo  "<div class='card' style='width: 18rem;'> <img src= ' " . $buildingImg .  " ' class='card-img-top' alt='...'> 
    <div class='card-body'>
    <h5 class='card-title'>" . $buildingName . " Apartment </h5>
    <p class='card-text'>" . $buildingAddress . "</p>
    </div>";

    ?>

  </div>



 




  <script src="js.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>