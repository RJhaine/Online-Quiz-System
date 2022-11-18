<?php
session_start();
require 'includes/connection.php';

if(isset($_GET['message'])) {
    $message = $_GET['message'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Great+Vibes&display=swap" rel="stylesheet">

    <script src="assets/src/js/script.js"></script>
    <title>Quiz Time</title>
    <style>
    body {
        background-color: #eee3e7;


    }

    .logout {
        color: red;
    }


    #toggleMessage {
        font-size: 12px;

        padding-right: 1rem;
    }

    #loginButton {
        padding-left: -3rem;
    }

    .form-control {
        border: 1px solid #aa6f73;
        width: 18rem;
    }
    </style>
</head>

<body>
    <nav style="background-color:	#aa6f73;" class="navbar navbar-dark ">
        <a style="color: white;font-size:20px;padding-left:2rem;font-style:italic;" slass="navbar-brand"
            href="./login.php">Back</a>

        <marquee scrollamount="10" width="80%" style="color: white;font-size: 16px;">You want to login as a
            Administrator?
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You
            want to login as
            a
            Administrator?
        </marquee>

        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <a style="color: white;font-size:1rem;margin-right :10px;" class="navbar-brand">Admin</a>
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <center>
        <div class="container" style="margin-top:150px;padding-left:16rem;padding-right:16rem;">
            <div style="text-align: center; font-weight: bold;">
                <p><?php if(isset($message)) {echo $message;} ?></p>
            </div>
            <div class="header">
                <h2 style="color:black;font-family: 'Great Vibes', cursive;font-size:75px;padding-left: 2rem;">Teacher .
                    Admin</h2>
            </div>
            <form id=" loginForm" action="handlers/login_admin.php" method="POST" name="loginForm">
                <div class=" form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                        style="color:orange;margin-right:-2rem">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"
                        style="color:orange;margin-right:-2rem">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                </div>
                <div class=" form-group row" id="confirmPasswordDiv" style="display: none;">
                    <label for="inputPassword4" class="col-sm-2 col-form-label"
                        style="color:orange;margin-right:-2rem">Confirm
                        Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group row" id="firstnameDiv" style="display: none;">
                    <label for="firstnamelabel" class="col-sm-2 col-form-label "
                        style="color:black;margin-right:-2rem">First
                        Name</label>
                    <div class=" col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row" id="lastnameDiv" style="display: none;">
                    <label for="lastnamelabel" class="col-sm-2 col-form-label"
                        style="color:black;margin-right:-2rem">Last Name</label>
                    <div class=" col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row" style="padding-left: 10rem;">
                    <div class="col-sm-10">
                        <button style="background-color:#aa6f73;border-color:#aa6f73;margin-left:-2rem" type="submit"
                            class="btn btn-primary" id="loginButton" name="loginAdmin" value="0">Log
                            In</button>
                    </div>
                </div>
                <div class="form-group row" onclick="toggleSignup();" style="padding-left: 10rem;">
                    <div class="col-sm-10">
                        <p id="toggleMessage"><a href="#" id="toggleMessageTag"
                                style="text-align: center; font-size: 12px; color: #005b96;padding-right:2rem"><b>If you
                                    don't
                                    already
                                    have an
                                    account, click here to sign up<b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </center>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>