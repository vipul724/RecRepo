<?php 

	require "../config/config.php";

	$isDeleted = false;

	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['title']) || empty($_GET['title']))
	{
		$error = "Invalid Movie.";
	}
	else
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($mysqli->connect_errno)
		{
			echo $mysqli->connect_error;
			exit();
		}

		$statement = $mysqli->prepare("DELETE FROM movies WHERE movies.id = ?");
		$statement->bind_param("i", $_GET["id"]);

		$executed = $statement->execute();

		if(!$executed)
		{
			echo $mysqli->error;
			exit();
		}


		if($statement->affected_rows == 1)
		{
			$isDeleted = true;
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
        <h1 style="text-align:center;">Delete Confirmation</h1>
    </div>

    <div class="container">

        <div class="row mt-5">
            <div class="col-12">
                <?php if (isset($error) && !empty($error)) : ?>
                    <div class="text-danger" style="text-align:center;"><?php echo $error; ?></div>
                <?php else : ?>
                    <div class="text-success" style="text-align:center;"><?php echo $_GET['title']; ?> was successfully deleted.</div>
                <?php endif; ?>
            </div>
        </div> 

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