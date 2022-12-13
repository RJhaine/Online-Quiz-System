<?php
include("includes/header_admin.php");

if(!isset($_GET['subject']) && !isset($_POST['subject'])) {
    header("Location: http://localhost/quizapp/quizhomepage.php");    
    exit();
}

if($userRole > 1) {
    header("Location: http://localhost/quizapp/quizhomepage.php");    
    exit();
}

if(isset($_POST['subject'])) {
    $subject = $_POST['subject'];   
}

$query = 
    " SELECT * " .
    " FROM `questions`" .
    " WHERE `subject`='$subject'";

$result = mysqli_query($con, $query);

$totalQuestions = mysqli_num_rows($result);

$questionNumber = (int)$totalQuestions + 1;

?>

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

    .btn {
        background-color: #aa6f73;

        color: white;
        border-color: black;
    }
    </style>
</head>

<body>




    <div class="container" style="margin-top: 50px;">
        <h3 style="text-align: center; margin-bottom: 25px;font-family: 'Cutive Mono', monospace;">Upload Questions Now
        </h3>

        <form id="questionForm" method="POST" action="handlers/question_handler.php" name="questionForm"
            enctype="multipart/form-data">
            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
            <input type="hidden" name="questionNumber" value="<?php echo $questionNumber; ?>">
            <input type="hidden" name="userRole" value="<?php echo $userRole; ?>">
            <div class="form-group row" style="margin-bottom: 15px;">
                <label for="question" class="col-sm-2 col-form-label">Question <?php echo $questionNumber; ?></label>
                <div class="col-sm-10" style="margin-bottom: 15px;">
                    <input type="text" class="form-control" id="question" name="question">
                </div>
                <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="answer" name="answer">
                </div>

                <div class="col-sm-10" style="margin-top: 15px;">
                    <input type="file" name="fileToUpload" class="" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn " id="submitQuestion" name="submitQuestion">Submit</button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>