<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Screen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<style>
    

    .loginDiv {
        position: absolute;
        background-color: white;
        width: 600px;
        height: 350px;
        bottom: 40%;
        left: 40%;



    }

    #userName{}


</style>


<body>

    <div class="loginDiv">

        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group" id = "userName">
                <label for="userName">Username*</label>
                <input type="text" class="form-control" id="userName" required="" placeholder="Enter Username" name="userName">
            </div>

            <div class="form-group">
                <label for="userName">Password</label>
                <input type="password" required="" placeholder="Enter Password" class="form-control" id="p" name="pw">
                <input type="checkbox" onclick="showPassword()" id="showP"> Show Password
            </div>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>



    <?php

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['userName'];
        $pwd = $_POST['pw'];
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
            header('Location: ManagerScreen.php');
        } else if ($resultNormal->num_rows > 0) {
            header('Location: normal.php');
        } else
            echo "<script type='text/javascript'>alert('Wrong Password or User Name');</script>";;
    }
    $conn->close();
    ?>













    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>