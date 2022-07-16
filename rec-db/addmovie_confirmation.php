<?php

require "../config/config.php";

    $isInserted = false;

    if(!isset($_POST["title"]) || empty($_POST["title"]))
	{
		$error = "Please fill out the required title field";
	}
    else
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($mysqli->connect_errno)
		{
			echo $mysqli->connect_error;
			exit();
		}

		$title = $_POST["title"];

        if(isset($_POST["genre_id"]) && !empty($_POST["genre_id"]))
		{
			$genre = $_POST["genre_id"];
		}
		else
		{
			$genre = null;
		}

		if(isset($_POST["rating_id"]) && !empty($_POST["rating_id"]))
		{
			$rating = $_POST["rating_id"];
		}
		else
		{
			$rating = null;
		}

        $statement = $mysqli->prepare("INSERT INTO movies(title, genre_id, rating_id) VALUES (?, ?, ?)");
		$statement->bind_param("sii", $title, $genre, $rating);

		$executed = $statement->execute();

		if(!$executed)
		{
			echo $mysqli->error;
		}
		

		if($statement->affected_rows == 1)
		{
			$isInserted = true;
		}

		$statement->close();

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
    <?php include 'nav.php'; ?>

    <br></br>

    <div id="header">
        <h1 style="text-align:center;">Add Confirmation</h1>
    </div>

    <div class="container">

        <div class="row mt-5">
            <div class="col-12">
                <?php if (isset($error) && !empty($error)) : ?>
                    <div class="text-danger" style="text-align:center;"><?php echo $error; ?></div>
                <?php else : ?>
                    <div class="text-success" style="text-align:center;"><?php echo $_POST['title']; ?> was successfully added!</div>
                <?php endif; ?>
            </div> <!-- .col -->
        </div> <!-- .row -->

        <br></br>

        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-primary btn-lg fr" href="movierepo.php" role="button" style="margin-right: 100px;">Movie Repo</a>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light btn-lg fr"> Back</a>
                </div>
            </div>
        </div>






</body>

</html>