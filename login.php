<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Screen</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<style>
    .loginDiv {
        position: absolute;
        background-color: white;
        left: 50%;
        top: 20%;
        height: 340px;
        margin-top: -100px;
        width: 350px;
        margin-left: -200px;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        border-radius: 25px;
    }

    #userNameForm {
        position: relative;
        top: 1em;
        left: 1em;
    }

    #uName {

        width: 300px;
    }

    #pwForm {
        position: relative;
        top: 1em;
        left: 1em;

    }

    #p {

        width: 300px;
    }

    #shoP {
        position: fixed;
        top: 5em;
    }

    #submit {
        position: relative;
        left: 15em;
        top: 1em;
    }

    #forgotPassword {
        position: relative;
        left: -7em;
        bottom: -2em;
        color: #32b18e;
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
        left: 60%;
        width: 100px;
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
</style>


<body>

    <div class="loginDiv">

        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group" id="userNameForm">
                <label for="userName">Username</label>
                <input type="text" class="form-control" id="uName" required="" placeholder="Enter Username" name="userName">
            </div>

            <div class="form-group" id="pwForm">
                <label for="password">Password</label>
                <input type="password" required="" placeholder="Enter Password" class="form-control" id="p" name="pw">
                <input type="checkbox" onclick="showPassword()" id="showP"> Show Password
                <br>
            </div>

            <button type="submit" id="btn" class="changeMail" onclick="progress()">Login</button>

            <a href="forgotPassword.php" id="forgotPassword">Forgot Password</a>


        </form>






    </div>






    <?php

    session_start();

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);



    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['userName'];
        $pwd = md5($_POST['pw']);
    }

    if (!empty($name) && !empty($pwd)) {

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sqlForManager = "SELECT userName, pwd FROM manager WHERE userName='$name' AND pwd='$pwd'";
        $sqlForNormal  = "SELECT userName, pwd FROM normal   WHERE userName='$name' AND pwd='$pwd'";

        $resultManager = $conn->query($sqlForManager);
        $resultNormal  = $conn->query($sqlForNormal);





        if ($resultManager->num_rows > 0) {
            echo '<script>Swal.fire("Welcome", "Login Successful", "success"); </script>';
            $_SESSION["userName"] = $name;
            header('Refresh:1 url= ManagerScreen.php');
        } else if ($resultNormal->num_rows > 0) {
            echo '<script>Swal.fire("Welcome", "Login Successful", "success"); </script>';
            $_SESSION['userName'] = $name;
            header('Refresh:1 url= normal.php');;
        } else
            echo '<script>Swal.fire("Error", "User name or password incorrect", "error"); </script>';
    }
    $conn->close();
    ?>


    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>

</html>