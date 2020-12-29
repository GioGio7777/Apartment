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
                $_SESSION['buildingId']= $row[1];
                $_SESSION['email']=$row[11];
                
            }

          
        }
    $conn->close();

    ?>



<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #32b18e;">
    <a class="navbar-brand" href="ManagerScreen.php"><?php echo $userName ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color:white;">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addPerson.php">Add Person</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="persons.php">Show Person</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#32b18e">
            <a class="dropdown-item" href="settingsAdmin.php">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php">Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <?php


  ?>






  <script src="js.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>