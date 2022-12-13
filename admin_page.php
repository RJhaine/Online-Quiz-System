<?php
include("includes/header_admin.php");


?>

<!doctype html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Great+Vibes&display=swap" rel="stylesheet">
    <title>Online Quiz System</title>

    <style>
    body {
        background-color: #eee3e7;

    }

    .chan {
        float: right;
        margin-top: 2rem;
        width: 42rem;
        height: 32rem;
        margin-right: 2rem;
    }



    #calendar1 {
        padding-top: 10rem;

        margin-left: 5rem;
        padding-top: 5rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);

    }

    .card {
        margin-top: -4rem;

    }

    tr th {
        background-color: #aa6f73;

    }

    #month {
        color: #aa6f73;
    }

    #year {
        color: #aa6f73;

    }
    </style>

</head>

<body>
    <div>
        <center>
            <p style="color:black;font-family: 'Cutive Mono', monospace;font-size:
                60px;margin-bottom: -70px;font-weight:lighter">
                Online Quiz
                System
            </p>
        </center>
    </div>

    <div id="adminimg">
        <img class="chan" src="./assets/src/images/admin1.png" alt="">
    </div>

    <div class="container col-sm-4 col-md-7 col-lg-4 mt-5" id="calendar1">
        <div class=" card">
            <h3 style="color:#aa6f73; text-align: center;font-size:19px" class="card-header" id="monthAndYear"></h3>
            <table class="table table-bordered table-responsive-sm" id="calendar">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>

                <tbody id="calendar-body">


                </tbody>
            </table>

            <div class="form-inline">

                <button style="color: black;" class="btn btn-outline-warning col-sm-6" id="previous"
                    onclick="previous()">Previous</button>

                <button style="color: black ;" class="btn btn-outline-primary col-sm-6" id="next"
                    onclick="next()">Next</button>
            </div>
            <br />
            <form class="form-inline">
                <label style="color:#aa6f73;font-size:15px;   font-weight: bold;padding-bottom:2rem"
                    class="lead mr-2 ml-2" for="month">Jump
                    To:
                </label>
                <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                    <option value=0>Jan</option>
                    <option value=1>Feb</option>
                    <option value=2>Mar</option>
                    <option value=3>Apr</option>
                    <option value=4>May</option>
                    <option value=5>Jun</option>
                    <option value=6>Jul</option>
                    <option value=7>Aug</option>
                    <option value=8>Sep</option>
                    <option value=9>Oct</option>
                    <option value=10>Nov</option>
                    <option value=11>Dec</option>
                </select>


                <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                    <option value=1990>1990</option>
                    <option value=1991>1991</option>
                    <option value=1992>1992</option>
                    <option value=1993>1993</option>
                    <option value=1994>1994</option>
                    <option value=1995>1995</option>
                    <option value=1996>1996</option>
                    <option value=1997>1997</option>
                    <option value=1998>1998</option>
                    <option value=1999>1999</option>
                    <option value=2000>2000</option>
                    <option value=2001>2001</option>
                    <option value=2002>2002</option>
                    <option value=2003>2003</option>
                    <option value=2004>2004</option>
                    <option value=2005>2005</option>
                    <option value=2006>2006</option>
                    <option value=2007>2007</option>
                    <option value=2008>2008</option>
                    <option value=2009>2009</option>
                    <option value=2010>2010</option>
                    <option value=2011>2011</option>
                    <option value=2012>2012</option>
                    <option value=2013>2013</option>
                    <option value=2014>2014</option>
                    <option value=2015>2015</option>
                    <option value=2016>2016</option>
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                    <option value=2019>2019</option>
                    <option value=2020>2020</option>
                    <option value=2021>2021</option>
                    <option value=2022>2022</option>
                    <option value=2023>2023</option>
                    <option value=2024>2024</option>
                    <option value=2025>2025</option>
                    <option value=2026>2026</option>
                    <option value=2027>2027</option>
                    <option value=2028>2028</option>
                    <option value=2029>2029</option>
                    <option value=2030>2030</option>
                </select>
            </form>
        </div>
    </div>


    <script>
    let today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let selectYear = document.getElementById("year");
    let selectMonth = document.getElementById("month");

    let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    let monthAndYear = document.getElementById("monthAndYear");
    showCalendar(currentMonth, currentYear);


    function next() {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
    }

    function previous() {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear);
    }

    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value);
        showCalendar(currentMonth, currentYear);
    }

    function showCalendar(month, year) {

        let firstDay = (new Date(year, month)).getDay();
        let daysInMonth = 32 - new Date(year, month, 32).getDate();

        let tbl = document.getElementById("calendar-body");
        tbl.innerHTML = "";

        // filing data about month and in the page via DOM.
        monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;

        // creating all cells
        let date = 1;
        for (let i = 0; i < 6; i++) {
            // creates a table row
            let row = document.createElement("tr");

            //creating individual cells, filing them up with data.
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    let cell = document.createElement("td");
                    let cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else if (date > daysInMonth) {
                    break;
                } else {
                    let cell = document.createElement("td");
                    let cellText = document.createTextNode(date);
                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        cell.classList.add("bg-warning");
                    } // color today's date
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                    date++;
                }


            }

            tbl.appendChild(row);
        }

    }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>