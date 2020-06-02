<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>Ma Config.io</title>
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

    <section class="container">
        <div class="row">
            <div class="col">
                <h1>Choisir son setup</h1>
            </div>
        </div>

        <div class="row">

            <?php foreach ($items as $item) { ?>
                <div class="col-lg-4 mb-5">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card content -->
                        <div class="card-body d-flex flex-row">

                            <!-- Avatar -->
                            <img src="<?php echo $item->user->profil_url_image ?>" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">

                            <!-- Content -->
                            <div>

                                <!-- Title -->
                                <h4 class="card-title font-weight-bold mb-2"><?php echo $item->title ?></h4>
                                <div class="row">
                                    <!-- Subtitle -->

                                    <div class="col-5">
                                        <a href="?search=@<?php echo $item->user->nickname ?>">@<?php echo $item->user->nickname ?></a>
                                        <span class="btn btn-outline-dark"><?php echo $item->price . "€" ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top rounded-0" src="<?php echo $item->url_photo_setup ?>" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body description">
                            <p class="card-text"><?php echo $item->description ?></p>
                        </div>

                    </div>
                    <!-- Card -->
                </div>
            <?php } ?>
        </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>