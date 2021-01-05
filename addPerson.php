<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Person</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
    body {
        background-color: #e6e6e6;
    }

    .form {
        position: relative;
        background-color: white;
        width: 800px;
        height: 750px;
        top: 70px;
        left: 30%;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        border-radius: 25px;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .buttons {
        margin: 10%;
        text-align: center;
    }

    .add {
        position: absolute;
        top: 80%;
        left: 35rem;
        width: 150px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin: 20px;
        height: 40px;
        text-align: center;
        border: none;
        background-size: 300% 100%;

        border-radius: 50px;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .add:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .changaddeMail:focus {
        outline: none;
    }

    .add {
        background-image: linear-gradient(to right, #0ba360, #3cba92, #30dd8a, #2bb673);
        box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
    }

    #name {
        position: absolute;
        top: 5%;
        left: 1.5rem;
        width: 300px;
    }

    #surName {
        position: absolute;
        top: 5%;
        left: 25.0rem;
        width: 300px;
    }

    .error {
        position: relative;
        color: #FF0000;
        left: 1.5rem;
    }

    #userName {
        position: absolute;
        top: 20%;
        left: 1.5rem;
        width: 300px;
    }

    #p {
        position: absolute;
        top: 20%;
        left: 25rem;
        width: 300px;
    }

    #apId {
        position: absolute;
        top: 37%;
        left: 1.5rem;
        width: 300px;
    }

    #numOfPerson {
        position: absolute;
        top: 37%;
        left: 25rem;
        width: 300px;
    }

    #tel1 {
        position: absolute;
        top: 50%;
        left: 1.5rem;
        width: 400px;
    }

    #tel2 {
        position: absolute;
        top: 60%;
        left: 1.5rem;
        width: 400px;
    }

    #mail {
        position: absolute;
        top: 70%;
        left: 1.5rem;
        width: 400px
    }



    h5 {
        position: relative;
        left: 1.5rem;
    }

    #check {
        position: absolute;
        top: 54%;
        left: 30rem;
    }
  
</style>


<body>

    <?php session_start(); ?>
    <?php
    $userNamee = $_SESSION['userName'];
    $buildID = $_SESSION['buildingId'];
    $buildNum = $_SESSION['buildingApt'];
    $dueMoney = $_SESSION['dueMoney'];
    ?>
    <?php
     $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);

    $Person = "SELECT * FROM normal";
    $sqlForPerson = $conn->query($Person);

    
    
   
    $buildingIds = array();
    
    
  


    if ($sqlForPerson->num_rows > 0) {
        while ($row = $sqlForPerson->fetch_row()) {

            array_push($buildingIds, $row[7]);
           
           
        }
    }
    $manager = "SELECT * FROM manager";
    $sqlForManager = $conn->query($manager);
    if ($sqlForManager->num_rows > 0) {
        while ($row = $sqlForManager->fetch_row()) {

            
            array_push($buildingIds, $row[7]);
         
        }
    }


    ?>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #32b18e; position: relative; width:1920px;">
        <a class="navbar-brand" href="ManagerScreen.php"><?php echo $userNamee ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="managerScreen.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;">>Add Person</a>
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

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $nameErr = $surnameErr = $aptNoErr = $livingPersonErr = $noOfPersErr = $telNoErr1 = $telNoErr2 = "";
    $name = $surname = $userName = $pwd = $aptNo = $noOfPers = $telNo1 =  $telNo2 = "";

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
            $nameErr = "Only letters and white space allowed";
        } else $name = $_POST['name'];

        if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['surname'])) {
            $surnameErr = "Only letters and white space allowed";
        } else $surname = $_POST['surname'];

        $userName = $_POST['userName'];
        $pwd = md5($_POST['pw']);
        $email = $_POST['email'];

        if (!is_numeric($_POST['apID'])) {
            $aptNoErr = "Only integer value allowed";
        } else  $aptNo = $_POST['apID'];

        if (!is_numeric($_POST['numPerson'])) {
            $noOfPersErr = "Only integer value allowed";
        } else  $noOfPers = $_POST['numPerson'];

        if (!is_numeric($_POST['tel1'])) {
            $telNoErr1 = "Only integer value allowed";
        } else  $telNo1 = $_POST['tel1'];

        if (!empty($_POST['tel2'])) {
            if (!is_numeric($_POST['tel2'])) {
                $telNoErr2 = "Only integer value allowed";
            } else  $telNo2 = $_POST['tel2'];
        }
    }

    if (isset($_POST['flexRadioDefault']) == 'normal') {
        if (!empty($name) && !empty($pwd)) {

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO normal(buildingID,firstname,surname , username , pwd , apartmentNo , numPerson , tel1 , tel2 , email) VALUES ($buildID,'$name','$surname','$userName', '$pwd','$aptNo','$noOfPers','$telNo1','$telNo2','$email')";


            if ($conn->query($sql) === TRUE) {
                echo '<script>Swal.fire("Success", "Person successfully created", "success"); </script>';
            } else {
                echo '<script>Swal.fire("Error", "Person could not created", "error"); </script>';
            }
        }
    } else {
        if (!empty($name) && !empty($pwd)) {

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO manager(buildingID,firstname,surname , username , pwd , apartmentNo , numOfPerson , tel1 , tel2 , email,dueMoney) VALUES ($buildID,'$name','$surname','$userName', '$pwd','$aptNo','$noOfPers','$telNo1','$telNo2','$email','$dueMoney')";


            if ($conn->query($sql) === TRUE) {
                echo '<script>Swal.fire("Success", "Person successfully created", "success"); </script>';
            } else {
                echo '<script>Swal.fire("Error", "Person could not created", "error"); </script>';
            }
        }
    }

    $conn->close();
    ?>




    <div class="form">

        <h5>* Areas are required</h5>

        <form id="register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-name" id="name">
                <label for="name">Name*</label>
                <input type="text" class="form-control" required="" placeholder="Enter Name" name="name"><span class="error"> <?php echo $nameErr; ?></span>
            </div>
            <div class="form-surname" id="surName">
                <label for="surName">Surname*</label>
                <input type="text" class="form-control" required="" placeholder="Enter Surname" name="surname"><span class="error"> <?php echo $surnameErr; ?></span>
            </div>

            <div class="user-name" id="userName">
                <label for="userName">Username*</label>
                <input type="text" class="form-control" required="" placeholder="Enter Username" name="userName">
            </div>

            <div class="form-group" id="p">
                <label for="userName">Password*</label>
                <input type="password" required="" placeholder="Enter Password" class="form-control" name="pw">
            </div>

            <div class="form-group" id="apId">
                <select class="form-select" aria-label="Default select example" required="" name="apID">
                    <option selected>Door number</option>

                    <?php
                    for ($i = 1; $i <= $buildNum; $i++) {
                        if(!in_array($i,$buildingIds))
                        echo "<option value=" . "$i" . ">" . "$i</option>";
                    }

                    ?>

                </select>


            </div>

            <div class="form-group" id="numOfPerson">
                <select class="form-select" aria-label="Default select example" required="" name="numPerson">
                    <option selected>Number Of Person</option>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<option value=" . "$i" . ">" . "$i</option>";
                    }

                    ?>

                </select>

            </div>

            <div class="form-tel1" id="tel1">
                <label for="tel1">Telephone Number*</label>
                <input type="text" class="form-control" required="" placeholder="Enter Telephone Number" name="tel1"><span class="error"> <?php echo $telNoErr1; ?></span>
            </div>

            <div class="form-numOFPerson" id="tel2">
                <label for="numPerson">Telephone Number 2</label>
                <input type="text" class="form-control" placeholder="Enter Telephone Number 2 (Not required)" name="tel2"> <?php echo $telNoErr2; ?></span>
            </div>

            <div class="mb-3" id="mail">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
            <div id=check>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="manager" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Manager
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="normal" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Normal
                    </label>
                </div>
            </div>

            <button type="submit" class="add">Add</button>


        </form>


    </div>

    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>