<?php

    session_start();

    session_destroy();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body style="background-color:#CBC3E3;">
    <?php include '../rec-db/nav.php'; ?>

    <div id="header">
        <h1 style="text-align:center;">Logout</h1>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-12" style="text-align:center;">You are now logged out.</div>
			<div class="col-12 mt-3" style="text-align:center;">You can go to <a href="../rec-db/homepage.php">home page</a> or <a href="login.php">log in</a> again.</div>

		</div> <!-- .row -->
	</div>
</body>

</html>