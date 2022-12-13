<?php
session_start();
require 'connection.php';

if(isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];    

    $query = 
            " SELECT `username`, `user_role`" .
            " FROM `users`" .
            " WHERE `email` = '$userEmail'";

    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_array($result)) {
        $userLoggedIn = $row['username'];
        $userRole = $row['user_role'];
    }
}
else {
    header("Location: http://localhost/quizapp/login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/src/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="assets/src/js/script.js"></script>
    <title>Online Quiz System</title>
    <style>
    #book {
        height: 35px;

        margin-right: -23px;
        margin-left: -20px;
        padding-right: 3px;
    }
    </style>
</head>

<body>
    <nav style="background-color:	#aa6f73;" class="navbar navbar-dark ">

        <a style="color: white;font-size:2rem;padding-right :2rem;" slass="navbar-brand" href="#">Quiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/quizapp/quizhomepage.php">Home <span
                            class="sr-only">(current)</span></a>
                </li>


            </ul>
            <br>
            <span style="color:#283655;" class="navbar-text">
                <i class="fa-sharp fa-solid fa-user"></i>
                User Logged in: &nbsp; <?php echo $userLoggedIn; ?><br><br><br>
            </span>
            <span class="navbar-text">

                <a style="color: #851e3e; margin-left:-222px;font-size:18px;" class="nav-link" href="logout.php"><i
                        class="fa-solid fa-rectangle-xmark"></i>Logout
                </a>
            </span>
        </div>
    </nav>