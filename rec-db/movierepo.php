<?php

require '../config/config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
    exit();
}

$mysqli->set_charset("utf8");

$sql = "SELECT movies.title, genres.genre, ratings.rating, movies.id
FROM movies
LEFT JOIN genres
	ON movies.genre_id = genres.id
LEFT JOIN ratings
	ON movies.rating_id = ratings.id";

$results = $mysqli->query($sql);
if (!$results) {
    echo $mysqli->error;
    exit();
}

$mysqli->close();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Recs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />

</head>

<body style="background-color:#CBC3E3;">
    <?php include 'nav.php'; ?>

    <div id="header">
        <h1>Movie Repo</h1>
        <strong>Movie recs given by our users!</strong>
    </div>

    <div class="d-flex justify-content-center">
        <h1 id="movie-title">Featured Movie Recs</h1>

    </div>

    <div id="clear-float"></div>




    <div class="container">
        <table class="table table-responsive table-hover table-dark" style="width: 75%; margin: auto;">
            <thead>
                <tr>
                    <th scope="col" style="color:yellow">Movie Title</th>
                    <th scope="col" style="color:yellow">Genre</th>
                    <th scope="col" style="color:yellow">Rating</th>
                    <?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) :?>
                        <th scope="col" style="color:yellow">Delete Rec</th>
                    <?php endif; ?>
                    <?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) :?>
                        <th scope="col" style="color:yellow">Clear Details</th>
                    <?php endif; ?>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = $results->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row["title"]; ?> </td>
                        <td><?php echo $row["genre"]; ?> </td>
                        <td><?php echo $row["rating"]; ?> </td>
                        <?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) :?>
                            <td>
									<a onclick="return confirm('Are you sure you want to delete this movie?');" href="delete.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['title']?>"class="btn btn-danger delete-btn">
										Delete
									</a>
								</td>
                        <?php endif; ?>
                        <?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) :?>
                            <td>
									<a onclick="return confirm('Are you sure you want to clear the details of this movie?');" href="cleardetails.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['title']?>"class="btn btn-warning edit-btn">
										Clear Details
									</a>
							</td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <br> </br>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) :?>
                <a class="btn btn-primary btn-lg fr" href="addmovie.php" role="button">Add Movie</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <br> </br>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>