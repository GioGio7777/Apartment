<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #e6e6e6;
    }

    #cont {
        position: absolute;
        left: 50%;
        top: 50%;
        height: 200px;
        margin-top: -100px;
        width: 400px;
        margin-left: -200px;
        margin-left: -200px;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        border-radius: 25px;
    }

    #button {
        position: relative;
        color: white;
        background-color: #32b18e;
        border: 1px solid #1D9AF2;
        border-radius: 4px;
        padding: 0 15px;
        cursor: pointer;
        height: 40px;
        font-size: 14px;
        transition: all 0.2s ease-in-out;
        left: 70%;
        top: 50px;
    }

    #button:hover {
        box-shadow: 1px 1px #53a7ea, 2px 2px #53a7ea, 3px 3px #53a7ea;
        transform: translateX(-3px);
    }
</style>



<body>


    <div class="container" id="cont">


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
                <button type="submit" id="button" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <?php

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $mail = $_POST['mail'];
    }

    if (!empty($mail)) {

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sqlForManager = "SELECT pwd FROM manager WHERE userMail='$mail'";
        $sqlForNormal  = "SELECT pwd FROM normal   WHERE userMail='$mail'";

        $resultManager = $conn->query($sqlForManager);
        $resultNormal  = $conn->query($sqlForNormal);



        if ($resultManager->num_rows > 0) {
            while ($row = $resultManager->fetch_row()) {
                $pswd = $row[1];
                $name = $row[0];
            }

            $msg = "Hello" . $name . "\nYour password is" . $pswd;
            $msg = wordwrap($msg, 100);
            mail($mail, "Password", $msg);
        } else if ($resultNormal->num_rows > 0) {
            while ($row = $resultNormal->fetch_row()) {
                $pswd = $row[1];
                $name = $row[0];
            }

            $msg = "Hello" . $name . "\nYour password is:" . $pswd;
            $msg = wordwrap($msg, 100);
            mail($mail, "Password", $msg);
        } else
            echo '<script>Swal.fire("Error", "Cannot find user", "error"); </script>';
    }
    $conn->close();

    ?>


    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>