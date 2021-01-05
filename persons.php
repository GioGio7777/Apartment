<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
        border-bottom: 1px solid #009879;
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

    $userNamee = $_SESSION['userName'];
    $buildingAddress = $_SESSION['buildingAddress'];
    $buildingName = $_SESSION['buildingName'];

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "apartman";

    $conn = new mysqli($servername, $username, $password, $dbName);

    $Person = "SELECT * FROM normal";
    $sqlForPerson = $conn->query($Person);

    $ids = array();
    $firstnames = array();
    $surnames = array();
    $userNames = array();
    $buildingIds = array();
    $numPersons = array();
    $tel1s = array();
    $tel2s = array();
    $emails = array();
    $dates = array();
    $dues = array();




    if ($sqlForPerson->num_rows > 0) {
        while ($row = $sqlForPerson->fetch_row()) {

            array_push($ids, $row[0]);
            array_push($firstnames, $row[2]);
            array_push($surnames, $row[3]);
            array_push($userNames, $row[4]);
            array_push($buildingIds, $row[7]);
            array_push($numPersons, $row[8]);
            array_push($tel1s, $row[9]);
            array_push($tel2s, $row[10]);
            array_push($dates, $row[6]);
            array_push($emails, $row[11]);
            array_push($dues, $row[12]);
        }
    }
    $manager = "SELECT * FROM manager";
    $sqlForManager = $conn->query($manager);
    if ($sqlForManager->num_rows > 0) {
        while ($row = $sqlForManager->fetch_row()) {

            array_push($ids, $row[0]);
            array_push($firstnames, $row[2]);
            array_push($surnames, $row[3]);
            array_push($userNames, $row[4]);
            array_push($buildingIds, $row[7]);
            array_push($numPersons, $row[8]);
            array_push($tel1s, $row[9]);
            array_push($tel2s, $row[10]);
            array_push($dates, $row[6]);
            array_push($emails, $row[11]);
            array_push($dues, $row[12]);
        }
    }


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
                    <th>Moving Date</th>
                    <th>Address</th>
                    <th>Due</th>

                </tr>
            </thead>

            <tbody>
                <?php

                for ($i = 0; $i < count($buildingIds); $i++) {
                    if ($i % 2 === 0) {
                        echo "<tr>";
                        echo "<td>" . $buildingName . "</td>";
                        echo "<td>" . $ids[$i] . "</td>";
                        echo "<td>" . $firstnames[$i] . "</td>";
                        echo "<td>" . $surnames[$i] . "</td>";
                        echo "<td>" . $userNames[$i] . "</td>";
                        echo "<td>" . $buildingIds[$i] . "</td>";
                        echo "<td>" . $numPersons[$i] . "</td>";
                        echo "<td>" . $tel1s[$i] . "</td>";
                        echo "<td>" . $tel2s[$i] . "</td>";
                        echo "<td>" . $emails[$i] . "</td>";
                        echo "<td>" . $dates[$i] . "</td>";
                        echo "<td>" . $buildingAddress . "</td>";
                        echo "<td>" . $dues[$i] . "</td>";
                        echo "</tr>";
                    } else {

                        echo '<tr class="active-row">';
                        echo "<td>" . $buildingName . "</td>";
                        echo "<td>" . $ids[$i] . "</td>";
                        echo "<td>" . $firstnames[$i] . "</td>";
                        echo "<td>" . $surnames[$i] . "</td>";
                        echo "<td>" . $userNames[$i] . "</td>";
                        echo "<td>" . $buildingIds[$i] . "</td>";
                        echo "<td>" . $numPersons[$i] . "</td>";
                        echo "<td>" . $tel1s[$i] . "</td>";
                        echo "<td>" . $tel2s[$i] . "</td>";
                        echo "<td>" . $emails[$i] . "</td>";
                        echo "<td>" . $dates[$i] . "</td>";
                        echo "<td>" . $buildingAddress . "</td>";
                        echo "<td>" . $dues[$i] . "</td>";

                        echo "</tr>";
                    }
                }


                ?>

            </tbody>

        </table>
    </div>

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
                    <a class="nav-link" href="addPerson.php">Add Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Delete Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;">>Show Person</a>
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





    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>