<?php
    require "../config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

    $sql_genres = "SELECT * FROM genres;";
    $results_genres = $mysqli->query($sql_genres);
	if($results_genres == false)
	{
		echo $mysqli->error;
		exit();
	}

    $sql_ratings = "SELECT * FROM ratings;";
    $results_ratings = $mysqli->query($sql_ratings);
	if($results_ratings == false)
	{
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
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body style="background-color:#CBC3E3;">
    <?php include 'nav.php'; ?>

    <div class="container py-5 h-100">
        <form action="addmovie_confirmation.php" method="POST">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow" style="border-radius: 3rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Add a Movie</h3>

                            <div class="form-outline mb-3">
                                <input type="text" id="input-title" class="form-control form-control-lg" name="title" placeholder="Title" />
                                <small id="title-error" class="invalid-feedback">Title is required.</small>
                            </div>

                            <hr> </hr>

                            <div class="form-group row">
                                <div class="col-mb-3">
                                    <select name="genre_id" id="genre-id" class="form-control">
                                        <option value="" selected disabled>-- Select a Genre--</option>

                                        <!-- PHP Output Here -->
                                        <?php while ($row = $results_genres->fetch_assoc()) : ?>

                                            <option value="<?php echo $row["id"]; ?>">
                                                <?php echo $row["genre"]; ?>
                                            </option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>

                            <hr> </hr>


                            <div class="form-group row">
                                <div class="col-mb-3">
                                    <select name="rating_id" id="rating-id" class="form-control">
                                        <option value="" selected disabled>-- Select a Rating--</option>

                                        <!-- PHP Output Here -->
                                        <?php while ($row = $results_ratings->fetch_assoc()) : ?>

                                            <option value="<?php echo $row["id"]; ?>">
                                                <?php echo $row["rating"]; ?>
                                            </option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>

                            <br></br>


                            <div class="form-outline mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

        <script>
        document.querySelector('form').onsubmit = function() {
            if (document.querySelector('#input-title').value.trim().length == 0) {
                document.querySelector('#input-title').classList.add('is-invalid');
            } else {
                document.querySelector('#input-title').classList.remove('is-invalid');
            }

            return (!document.querySelectorAll('.is-invalid').length > 0);
        }
    </script>

</body>

</html>