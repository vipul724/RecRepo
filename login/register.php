<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body style="background-color:#CBC3E3;">
    <?php include '../rec-db/nav.php'; ?>

    <div class="container py-5 h-100">
        <form action="register_confirmation.php" method="POST">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow" style="border-radius: 3rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Create an Account</h3>

                            <div class="form-outline mb-3">
                                <input type="username" id="input-name" class="form-control form-control-lg" name="username" placeholder="Username" />
                                <small id="username-error" class="invalid-feedback">Username is required.</small>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="password" id="input-pass" class="form-control form-control-lg" name="password" placeholder="Password" />
                                <small id="password-error" class="invalid-feedback">Password is required.</small>
                            </div>


                            <div class="form-outline mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Register</a>
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