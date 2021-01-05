<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-right: 1px solid;
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
       
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
        border-right: 1px solid #009879;
        
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
        
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
       
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
       
    }

    .person {
        position: absolute;
        top: 5%;

    }

    body {
        background-color: #e6e6e6;
    }
</style>

<body>
    <?php session_start(); ?>


    <?php
    $userName = $_SESSION['userName'];

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);


    $sqlForNormal = "SELECT * FROM normal WHERE username='$userName'";


    $resultNormal = $conn->query($sqlForNormal);


    if ($resultNormal->num_rows > 0) {
        while ($row = $resultNormal->fetch_row()) {
            $_SESSION['buildingId'] = $row[1];
            $_SESSION['email'] = $row[11];
            $_SESSION['id'] = $row[0];
            $_SESSION['due'] = $row[12];
        }
    }
    $conn->close();

    ?>
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
    }
    $conn->close();

    ?>

    <div class="person">

        <table class="styled-table" style="position:relative; width:1920px;">
            <thead>
                <tr>
                    <th>Apartment Name</th>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Apartment No</th>
                    <th>How many Person</th>
                    <th>Telephone Number1</th>
                    <th>Telephone Number2</th>
                    <th>Email</th>
                    <th> Moving Date</th> 
                    <th>Address</th>
                    <th>Due</th>
                   

                </tr>
            </thead>

            <tbody>
                <?php

                $userName = $_SESSION['userName'];

                $servername = "localhost";
                $username   = "root";
                $password   = "";
                $dbName     = "apartman";

                $conn = new mysqli($servername, $username, $password, $dbName);


                $sqlForNormal = "SELECT * FROM normal WHERE username='$userName'";


                $resultNormal = $conn->query($sqlForNormal);


                if ($resultNormal->num_rows > 0) {
                    while ($row = $resultNormal->fetch_row()) {
                        echo "<tr>";
                        echo "<td>" . $buildingName . "</td>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td>" . $row[4] . "</td>";
                        echo "<td>" . $row[7] . "</td>";
                        echo "<td>" . $row[8] . "</td>";
                        echo "<td>" . $row[9] . "</td>";
                        echo "<td>" . $row[10] . "</td>";
                        echo "<td>" . $row[11] . "</td>";
                        echo "<td>" . $row[6] . "</td>"; 
                        echo "<td>" . $buildingAddress . "</td>";
                        echo "<td>" . $row[12] . "</td>";
                       
                        echo "</tr>";
                    }
                }
                $conn->close();

                ?>


            </tbody>

        </table>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #32b18e; position: relative; width:1920px;">
        <a class="navbar-brand" href="normal.php"><?php echo $userName; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="color:white">>Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pay.php">Pay</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#32b18e">
                        <a class="dropdown-item" href="settingsNormal.php">Settings</a>

                        <a class="dropdown-item" href="login.php">Log Out</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>




    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>