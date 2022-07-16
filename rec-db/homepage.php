<?php

require '../config/config.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecRepo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />


</head>

<body style="background-color:#CBC3E3;">
    <?php include 'nav.php'; ?>

    <div id="header">
        <h1>Welcome to RecRepo!</h1>
        <strong id="slogan">Helping you remember what everyone's telling you to get to</strong>
    </div>


    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary btn-lg fr rounded-pill" href="movierepo.php" role="button">Movie Repo</a>

                <div id="button-space"> </div>

                <a class="btn btn-primary btn-lg fr rounded-pill" href="tvrepo.php" role="button">TV Repo</a>
            </div>
        </div>
    </div>

    <br></br>


    <div class="container animated bounce infinite">
        <div class="row ">
            <div class="col text-center" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right" ">
                <p >Login or create an account to store your movie recs. Discover reccommendations from other people too! </p>
            </div>
        </div>
    </div>















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="main.js"></script>
</body>

</html>