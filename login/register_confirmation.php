<?php

require '../config/config.php';

if (!isset($_POST["username"]) || empty($_POST["username"]) || !isset($_POST["password"]) || empty($_POST["password"])) {
    $error = "Please fill out all required fields.";
} else {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
    }

    $statement_registered = $mysqli->prepare("SELECT * FROM users WHERE username=?");
    $statement_registered->bind_param("s", $_POST["username"]);

    $executed_registered = $statement_registered->execute();
    if (!$executed_registered) {
        echo $mysqli->error;
    }

    $statement_registered->store_result();
    $numrows = $statement_registered->num_rows;
    $statement_registered->close();

    if ($numrows > 0) {
        $error = "Username has already been taken. Please choose another one.";
    } else {
        $password = hash("sha256", $_POST["password"]);

        $statement = $mysqli->prepare("INSERT INTO users(username, password) VALUES(?,?)");
        $statement->bind_param("ss", $_POST["username"], $password);

        $executed = $statement->execute();
        if (!$executed) {
            echo $mysqli->error;
        }
        $statement->close();
    }

    $mysqli->close();
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body style="background-color:#CBC3E3;">
    <?php include '../rec-db/nav.php'; ?>

    <br></br>

    <div id="header">
        <h1 style="text-align:center;">User Registration</h1>
    </div>

    <div class="container">

        <div class="row mt-5">
            <div class="col-12">
                <?php if (isset($error) && !empty($error)) : ?>
                    <div class="text-danger" style="text-align:center;"><?php echo $error; ?></div>
                <?php else : ?>
                    <div class="text-success" style="text-align:center;"><?php echo $_POST['username']; ?> was successfully registered!</div>
                <?php endif; ?>
            </div> <!-- .col -->
        </div> <!-- .row -->

        <br></br>

        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-primary btn-lg fr" href="login.php" role="button" style="margin-right: 100px;">Login</a>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light btn-lg fr"> Back</a>
                </div>
            </div>
        </div>






</body>

</html>