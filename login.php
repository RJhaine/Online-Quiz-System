<?php
session_start();
require 'includes/connection.php';

if (isset($_GET['message'])) {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Great+Vibes&display=swap" rel="stylesheet">

    <script src="assets/src/js/script.js"></script>
    <title>Online Quiz System</title>

    <style>
    body {
        background-color: #eee3e7;


    }

    .logout {
        color: red;
    }

    form {
        margin-right: -3rem;
    }

    #toggleMessage {
        font-size: 12px;
        color: #005b96;
        align-items: center;
    }

    .form-control {
        border: 1px solid #aa6f73;
    }

    .chan {
        padding-top: 2rem;
        margin-left: 3rem;
    }

    p {
        color: black;
        padding-top: 2rem;
        margin-left: 4rem;

    }

    .admin {
        background-color: #aa6f73;
        border-color: #aa6f73;
        border-radius: 3px;


    }

    .popup {
        background: rgba(0, 0, 0, 0.6);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .popup-content {
        height: 450px;
        width: 650px;
        background: #eec9d2;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        text-align: justify;
        padding-right: 4rem;
        padding-bottom: 2rem;
        font-size: 20px;

    }

    .close {
        position: absolute;
        top: 9px;
        right: 10px;
        background: orangered;
        height: 30px;
        width: 30px;
        border-radius: 100px;
        box-shadow: 6px 6px 29px -4px rgba(0, 0, 0, 1);
        cursor: pointer;
    }

    #book {
        height: 35px;

        margin-right: -23px;
        margin-left: -20px;
        padding-right: 3px;
    }




    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .column {
        height: 15rem;
        float: left;
        width: 24.3%;
        margin-bottom: 16px;
        padding: 0 15px;
        transition: 1s;
    }

    .column:hover {
        transform: scale(1.2);
        z-index: 1;
    }

    @media screen and (max-width: 500px) {
        .column {
            width: 100%;
            display: block;
        }
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
        padding: 0 16px;
    }

    .container::after,
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .title {
        color: grey;
        font-size: 12px;
    }

    .button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 7px;
        color: white;
        background-color: #aa6f73;
        text-align: center;
        cursor: pointer;
        width: 100%;
    }

    .button:hover {
        background-color: #555;
    }

    .row {

        padding-left: 4rem;

    }

    .about-section {
        float: left;
        width: 50%;
        margin: 2rem;
        padding-top: -5rem;
        padding: 20px;
        text-align: center;
        background-color: #feb2a8;
        border-radius: 10px;
        color: black;
        box-shadow: -10px 10px 5px rgba(0, 0, 0, 0.2);
        transition: 1s;

    }

    .about {

        margin-top: 7rem;
        padding-bottom: 10rem;


    }

    .about-section:hover {
        transform: scale(1.2);
        background: #c99789;
        box-shadow: 2px 2px 2px #000;
        z-index: 1;
    }

    hr {
        width: 90%;
        height: 1px;
        background: #aa6f73;
        margin-bottom: 2rem;
    }
    </style>
</head>

<body background-color="#eea990">

    <nav style="background-color: #aa6f73;" class=" navbar navbar-dark ">

        <img src=" ./assets/src/images/book.png" alt="book" id="book">
        <a style=" color: white;font-size:2rem;margin-right :3rem;" id="chan" class="navbar-brand" href="">Quiz</a>
        <marquee scrollamount="10" width="80%" style="color: white;font-size: 16px;">Let's test your knowledge take the

            quiz now!
        </marquee>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <a style="color: white;font-size:1rem;margin-right :1rem;" class="navbar-brand" href="./admin.php">Admin</a>
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    <div id="progressbar"></div>

    <div id="scrollPath"></div>

    <div>
        <p
            style="color:black;font-family: 'Great Vibes', cursive;font-size:75px;margin-bottom: -105px;margin-left:4rem">
            Online Quiz
            System
        </p>
    </div>
    <div>
        <img class="chan" src="./assets/src/images/back.png" alt="">
    </div>

    <div class="container" style="margin-top:-31rem;padding-left:30rem;padding-right:1rem;">
        <div style="text-align: center; font-weight: bold;">
            <p><?php if (isset($message)) {
                    echo $message;
                } ?></p>
        </div>

        <form id="loginForm" action="handlers/login_handler.php" method="POST" name="loginForm">
            <div class=" form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label" style="color:orange">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label" style="color:orange">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class=" form-group row" id="confirmPasswordDiv" style="display: none;">
                <label for="inputPassword4" class="col-sm-2 col-form-label" style="color:orange">Confirm
                    Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        placeholder="Confirm Password">
                </div>
            </div>
            <div class="form-group row" id="firstnameDiv" style="display: none;">
                <label for="firstnamelabel" class="col-sm-2 col-form-label " style="color:black">First
                    Name</label>
                <div class=" col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                </div>
            </div>
            <div class="form-group row" id="lastnameDiv" style="display: none;">
                <label for="lastnamelabel" class="col-sm-2 col-form-label" style="color:black">Last Name</label>
                <div class=" col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group row" style="padding-left: 25rem;">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="loginButton" name="loginButton" value="0">
                        Log
                        In</button>
                </div>
            </div>
            <div class="form-group row" onclick="toggleSignup();" style="padding-left: 11rem;margin-left:1rem;">
                <div class="col-sm-10">
                    <p id="toggleMessage"><a href="#" id="toggleMessageTag"
                            style="text-align: center; font-size: 12px; color: #005b96;"><b>If
                                you
                                don't
                                already
                                have an
                                account, click here to sign up<b></a></p>
                </div>
            </div>

        </form>
        <div>
            <p style="font-family: 'Cutive Mono', monospace;margin-top:125px;margin-left:-488px;font-size:30px; "> Study
                .
                Learn
                .
                Share
            </p>
        </div>

    </div>
    <div class="popup">
        <div class="popup-content">
            <h3 style="font-family: 'Cutive Mono', monospace;   font-weight: bold;">Objective: </h3>
            <p style="color:#005b96;font-family: 'Great Vibes', cursive;">Online Quiz System is a system where users can
                take examination
                and
                create
                examination
                questions
                online.The purpose of the online quiz system is to allow users (teachers and students) to use it to give
                and take exams, especially in our current situation right now that we are facing a pandemic which hinder
                students and teachers go to school for face-to-face classes. We made the decision to build this system
                in order to save time ,reduce hassle and stress for both teachers and students.
                It will help both users (teacher and student) to get the result quickly and will help them identify
                which weaknesses area they are going to improve without any delay. Quick results are quick actions for
                better improvement. This is all possible because this Online Quiz System gives the fastest result of the
                exam.
            </p>
            <img src=" ./assets/src/images/close.png" alt="Close" class="close">
        </div>

    </div>


    <hr>
    <div class="about-section">
        <h1 style="font-family: 'Cutive Mono', monospace;color: white;margin-top:1rem">About Us!</h1>
        <p style="font-family: 'Cutive Mono', monospace;margin-right:3rem">Online Quiz System is a system where users
            can
            take
            examination and create examination questions
            online.The
            purpose of the online quiz system is to allow users (teachers and students) to use it to give and take
            exams, especially in our current situation right now that we are facing a pandemic which hinder students and
            teachers go to school for face-to-face classes. We made the decision to build this system in order to save
            time ,reduce hassle and stress for both teachers and students.
        </p>
        <p style="font-family: 'Cutive Mono', monospace;margin-right:3rem">It will help both users (teacher and student)
            to get the
            result quickly and will help them identify
            which
            weaknesses area they are going to improve without any delay. Quick results are quick actions for better
            improvement. This is all possible because this Online Quiz System gives the fastest result of the exam.</p>
    </div>
    <div class="about">
        <img src="./assets/src/images/a.png" alt="about">
    </div>
    <h2 style="text-align:center;font-family: 'Lobster', cursive;margin-top:2rem;margin-bottom:2rem">Our Team</h2><br>

    <div class="row">
        <div class="column">
            <div class="card">
                <img src="./assets/src/images/rich.jpg" alt="Jane" style="width:100%;height:350px">
                <div style="background-color: #dec3c3 ;padding-right:3.8rem" class="container">
                    <h4 style="text-align: center;font-family: 'Lobster', cursive;padding-top:8px;padding-left:32px">
                        Richel
                        Bacayan</h4>
                    <p class="title">Leader & UI Designer</p>

                    <p style="font-size: 13px;margin-top:-1rem;margin-bottom:-1rem;"> 21103788@usc.edu.ph</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="./assets/src/images/chan1.webp" alt="chan" style="width:100%;height:350px">
                <div style="background-color: #dec3c3 ;padding-right:3.8rem" class="container">

                    <h4 style="text-align: center;font-family: 'Lobster', cursive;padding-top:8px;padding-left:32px">
                        Christian Misa</h4>
                    <p class="title">Software Developer</p>

                    <p style="font-size: 13px;margin-top:-1rem;margin-bottom:-1rem;"> 21103874@usc.edu.ph</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="./assets/src/images/roge.jpg" alt="John" style="width:100%;height:350px">
                <div style="background-color: #dec3c3 ;padding-right:3.8rem" class="container">
                    <h4 style="text-align: center;font-family: 'Lobster', cursive;padding-top:8px;padding-left:32px">
                        Rogina Rolloque</h4>
                    <p class="title">UI Designer</p>

                    <p style="font-size: 13px;margin-top:-1rem;margin-bottom:-1rem;">21103880@usc.edu.ph</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="./assets/src/images/sam.jpg" alt="John" style="width:100%;height:350px">
                <div style="background-color: #dec3c3 ;padding-right:3.8rem" class="container">
                    <h4 style="text-align: center;font-family: 'Lobster', cursive;padding-top:8px;padding-left:32px">
                        Jesamae Salado</h4>
                    <p class="title">Tester</p>

                    <p style="font-size: 13px;margin-top:-1rem;margin-bottom:-1rem;"> 21103874@usc.edu.ph</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>
    </div>



    <script>
    document.getElementById("chan").addEventListener("click",
        function() {
            document.querySelector(".popup").style.display = "flex";
        })
    document.querySelector(".close").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none ";
    })
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- end -->