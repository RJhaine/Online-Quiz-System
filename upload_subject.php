<?php
include("includes/header_admin.php");

if ($userRole > 1) {
    header("Location: http://localhost/quizapp/quizhomepage.php");
    exit();
}

$subjectOptions = array(
    "English" => "English",
    "Maths" => "Maths",
    "Html" => "Html",
    "Php" => "Php",
    "Big_data" => "Big_Data",


);

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

    h2 {
        font-size: 25px;
        font-family: 'Cutive Mono', monospace;
        font-weight: bold;
        color: #3c2f2f;
        margin-top: 5rem;
    }

    .delete {
        float: left;
        margin-left: -1rem;

    }

    #submitUploadSubject {
        background-color: #aa6f73;
        margin-bottom: 10px;
        margin-left: 20rem;
        border-color: #3c2f2f;

    }

    #submitUploadSubject:hover {
        color: black;
        background-color: #aaaaaa;

    }

    #subject {

        margin-top: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 1s;
    }

    #subject:hover {
        transform: scale(1.2);
        z-index: 1;
    }

    .delete img {
        margin-top: 2rem;
        transition: 1s;
    }

    .delete img:hover {
        transform: scale(1.2);
        z-index: 1;
    }
    </style>

</head>

<body>

    <center>
        <h2>You can add your questions here by choosing the subject </h2>
    </center>
    <div class="delete">
        <img src="./assets/./src/images/add1.png" alt="">
    </div>

    <div class="container"
        style="margin-top: 9rem;background-color:#dec3c3; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;">
        <form id="indexForm" method="POST" action="quiz.php" name="uploadSubjectForm">
            <input type="hidden" name="userLoggedIn" value="<?php echo $userLoggedIn; ?>">
            <div class="form-group row">
                <label for="subjects" class="col-sm-2 col-form-label"
                    style="font-family: 'Great Vibes', cursive;font-size:25px;padding-top:2rem">Choose
                    subject to
                    upload</label>
                <div class="col-sm-10">
                    <select type="select" class="form-control" id="subject" name="subject">
                        <?php
                        foreach ($subjectOptions as $key => $value) {
                        ?>
                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row" style="padding-top:-2rem;">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="submitUploadSubject"
                        name="submitUploadSubject">Proceed</button>
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