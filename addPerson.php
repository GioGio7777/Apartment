<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Person</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
    .form {
        position: absolute;
        background-color: whitesmoke;
        width: 800px;
        height: 750px;
        bottom: 5%;
        left: 30%;



    }

    #submit {

        position: relative;
        bottom: -1.5rem;
        right: -43rem;
    }

    #name {
        width: 300px;
    }

    #surName {
        width: 300px;
    }

    .error {
        color: #FF0000;
    }

    #userName {
        width: 300px;
    }

    #p {
        width: 300px;
    }

    #numOfPerson {
        width: 300px;
    }

    #tel1 {
        width: 500px;
    }

    #tel2 {
        width: 500px;
    }

   
</style>


<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="ManagerScreen.php">Apartment Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="ManagerScreen.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addPerson.php">Add Person</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="settingsAdmin.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">Log Out</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
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
        $pwd = $_POST['pw'];

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

    if (!empty($name) && !empty($pwd)) {

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO normal(firstname,surname , username , pwd , apartmentNo , numPerson , tel1 , tel2) VALUES ('$name','$surname','$userName', '$pwd','$aptNo','$noOfPers','$telNo1','$telNo2')";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
    ?>




    <div class="form">

        <h5>* Areas are required</h5>

        <form id="register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-name">
                <label for="name">Name*</label>
                <input type="text" class="form-control" id="name" required="" placeholder="Enter Name" name="name"><span class="error"> <?php echo $nameErr; ?></span>
            </div>
            <div class="form-surname">
                <label for="surName">Surname*</label>
                <input type="text" class="form-control" id="surName" required="" placeholder="Enter Surname" name="surname"><span class="error"> <?php echo $surnameErr; ?></span>
            </div>

            <div class="user-name">
                <label for="userName">Username*</label>
                <input type="text" class="form-control" id="userName" required="" placeholder="Enter Username" name="userName">
            </div>

            <div class="form-group">
                <label for="userName">Password*</label>
                <input type="password" required="" placeholder="Enter Password" class="form-control" id="p" name="pw">
                <input type="checkbox" onclick="showPassword()" id="showP"> Show Password
            </div>

            <div class="form-group">
                <label for="ApartmentId">ApartmentId*</label>
                <input type="text" required="" placeholder="Enter ApartmentId" class="form-control" id="p" name="apID"><span class="error"> <?php echo $aptNoErr; ?></span>
            </div>

            <div class="form-numOFPerson">
                <label for="numPerson">Number Of Person*</label>
                <input type="text" class="form-control" id="numOfPerson" required="" placeholder="Enter Number Of Person" name="numPerson"><span class="error"> <?php echo $noOfPersErr; ?></span>
            </div>

            <div class="form-tel1">
                <label for="tel1">Telephone Number*</label>
                <input type="text" class="form-control" id="tel1" required="" placeholder="Enter Telephone Number" name="tel1"><span class="error"> <?php echo $telNoErr1; ?></span>
            </div>

            <div class="form-numOFPerson">
                <label for="numPerson">Telephone Number 2</label>
                <input type="text" class="form-control" id="tel2" placeholder="Enter Telephone Number 2 (Not required)" name="tel2"> <?php echo $telNoErr2; ?></span>
            </div>


            <button type="submit" class="btn btn-outline-primary" id="submit">Submit</button>

        </form>

    </div>










    <script src="js.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>