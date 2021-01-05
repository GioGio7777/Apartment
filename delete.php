<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    #bigContainer {
        background-color: white;
        position: absolute;
        width: 700px;
        top: 100px;
        right: 32%;
        border-style: solid;
        border-width: 0.1px;
        border-color: black;


    }

    #changeUserName {
        position: relative;
        width: 700px;
        height: 400px;

        right: 2.5%;
        border-style: solid;
        border-width: 0.1px;
        border-color: black;
    }

    .maill {
        position: relative;
        width: 400px;
        top: 20%;
        left: 15%;
    }

    #apUs {
        position: absolute;
        height: 100px;
        width: 100px;
        top: 10%;
        left: 10%;
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

    .changeMail {
        position: relative;
        top: 10%;
        left: 70%;
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

    .changeMail:hover {
        background-position: 100% 0;
        moz-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .changeMail:focus {
        outline: none;
    }

    .changeMail {
        background-image: linear-gradient(to right, #0ba360, #3cba92, #30dd8a, #2bb673);
        box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
    }


    #deleteNormal {
        position: relative;
        width: 700px;
        height: 300px;

        right: 2.5%;
        border-style: solid;
        border-width: 0.1px;
        border-color: black;
    }

    #deleteManager {
        position: relative;
        width: 700px;
        height: 300px;

        right: 2.5%;
        border-style: solid;
        border-width: 0.1px;
        border-color: black;
    }
</style>

<?php session_start(); ?>

<?php

$userName = $_SESSION['userName'];

?>


<body>




    <div class="container" id="bigContainer">
        <div class="container" id="deleteNormal">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h4>Delete Normal</h4>

                <div class="maill">
                    <label for="exampleFormControlInput1" class="form-label">Enter Username</label>
                    <input type="text" class="form-control" name="userNameNormal" id="exampleFormControlInput1">
                    <button name="deleteN" class="changeMail" value="deleteNormalPerson">Delete</button>
                </div>
            </form>
        </div>

        <div class="container" id="deleteManager">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h4>Delete Manager</h4>

                <div class="maill">
                    <label for="exampleFormControlInput1" class="form-label">Enter Username</label>
                    <input type="text" class="form-control" name="userNameManager" id="exampleFormControlInput1">
                    <button name="deleteM" class="changeMail" value="deleteManagerPerson">Delete</button>
                </div>
            </form>

        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #32b18e; position: relative; width:1920px;">
        <a class="navbar-brand" href="ManagerScreen.php"><?php echo $userName ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="managerScreen.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addPerson.php">Add Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;">>Delete Person</a>
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

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if (isset($_POST["deleteN"]) == 'deleteNormalPerson') {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $uName = $_POST['userNameNormal'];
        }

        $sql = "DELETE FROM normal WHERE username='$uName'";

        if ($conn->query($sql) === TRUE) {

            echo '<script>Swal.fire("Success", "Person Deleted", "success"); </script>';
        } else {
            echo '<script>Swal.fire("Error", "Person cannot deleted", "error"); </script>';
        }
    } elseif (isset($_POST['deleteM']) == 'deleteManagerPerson') {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $uName = $_POST['userNameManager'];
        }
        $sql = "DELETE FROM manager WHERE userName='$uName'";

        if ($conn->query($sql) === TRUE) {

            echo '<script>Swal.fire("Success", "Manager deleted", "success"); </script>';
        } else {
            echo '<script>Swal.fire("Error", "Manager cannot deleted", "error"); </script>';
        }
    }


    $conn->close();

    ?>





    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>