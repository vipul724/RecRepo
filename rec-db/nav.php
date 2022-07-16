
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../rec-db/homepage.php">RecRepo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../rec-db/movierepo.php">Movie Repo</a>
                    <a class="nav-link" href="../rec-db/tvrepo.php">TV Repo</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) :?>
                    <a class="nav-link" href="../login/login.php">Login</a>
                    <?php else :?>
                        <div class="p-2">Hello <?php echo $_SESSION["username"]; ?>!</div>
                        <a class="nav-link" href="../login/logout.php">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    