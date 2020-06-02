<!DOCTYPE html>
<html lang="en">

<head>
    <title>Social Network (PHP Course))</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar banner" id="scrollEffectNavbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="maconfig.io">
                <strong class="blue-text">Ma Config.io</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="" target="_blank">Trouver une config</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="" target="_blank">Partager sa config</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" method="get">
                    <input name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
                </form>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons row">
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="?action=logout" role="button">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=login" role="button">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success" href="?action=register" role="button">Sign Up</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <div class="container log">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <form class="form-signin" method="POST" action="?action=login">
                    <?php
                    if (isset($errorMsg)) {
                        echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                    }
                    ?>
                    <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>