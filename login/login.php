<?php

require '../config/config.php';

if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $error = "Please enter a username and password.";
        } else {
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($mysqli->connect_errno) {
                echo $mysqli->connect_error;
                exit();
            }

            $passwordInput = hash("sha256", $_POST["password"]);
            $adminLogin = hash("sha256", "admin123");

            $sql = "SELECT * FROM users
						WHERE username = '" . $_POST["username"] . "' AND password = '" . $passwordInput . "';";

            $results = $mysqli->query($sql);

            if (!$results) {
                echo $mysqli->error;
                exit();
            }

            if ($results->num_rows == 1) {
                // Log the user in. Save their info
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $_POST["username"];

                if(strcmp("admin123", $_POST["username"]) == 0 && $passwordInput == $adminLogin)
                {
                    $_SESSION["admin"] = true;
                }


                header("Location: ../rec-db/homepage.php");
            } else {
                $error = "Invalid username or password.";
            }
        }
    }
} else {
    header("Location: ../rec-db/homepage.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body style="background-color:#CBC3E3;">
    <?php include '../rec-db/nav.php'; ?>

    <div class="container py-5 h-100">
        <form action="login.php" method="POST">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow" style="border-radius: 3rem;">


                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">RecRepo Login</h3>



                            <div class="form-outline mb-3">
                                <input type="text" id="input-name" class="form-control form-control-lg" name="username" placeholder="Username" />
                                <small id="username-error" class="invalid-feedback">Please enter a username.</small>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="password" id="input-pass" class="form-control form-control-lg" name="password" placeholder="Password" />
                                <small id="password-error" class="invalid-feedback">Please enter a password.</small>
                            </div>

                            <div class="row mb-3">
                                <div class="font-italic text-danger col-sm-9 ml-sm-auto" style="text-align: center;">
                                    <!-- Show errors here. -->
                                    <?php
                                    if (isset($error) && !empty($error)) {
                                        echo $error;
                                    }
                                    ?>
                                </div>
                            </div>



                            <div>
                                <a href="register.php" style="text-decoration: none;">Don't have an account? Register
                                    here.</a>
                            </div>
                            <br> </br>

                            <div class="form-outline mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Login</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        document.querySelector('form').onsubmit = function() {
            if (document.querySelector('#input-name').value.trim().length == 0) {
                document.querySelector('#input-name').classList.add('is-invalid');
            } else {
                document.querySelector('#input-name').classList.remove('is-invalid');
            }

            if (document.querySelector('#input-pass').value.trim().length == 0) {
                document.querySelector('#input-pass').classList.add('is-invalid');
            } else {
                document.querySelector('#input-pass').classList.remove('is-invalid');
            }

            return (!document.querySelectorAll('.is-invalid').length > 0);
        }
    </script>

</body>

</html>