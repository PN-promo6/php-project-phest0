<?php

require '../vendor/autoload.php';

use Entity\Setup;
use Entity\User;

$user1 = new User();
$user1->id = 1;
$user1->nickname = "Phesto";
$user1->password = "fjfjfkl";
$user1->mail = "phesto@salut.fr";
$user1->profil_url_image = "https://randomuser.me/api/portraits/women/81.jpg";

$user2 = new User();
$user2->id = 2;
$user2->nickname = "Giacomo";
$user2->password = "klgjgo";
$user2->mail = "giac@salut.fr";
$user2->profil_url_image = "https://randomuser.me/api/portraits/men/38.jpg";

$user3 = new User();
$user3->id = 3;
$user3->nickname = "cotonZ";
$user3->password = "cotonZ";
$user3->mail = "ael@salut.fr";
$user3->profil_url_image = "https://randomuser.me/api/portraits/women/8.jpg";

$user4 = new User();
$user4->id = 4;
$user4->nickname = "jusDeGroXkimi77";
$user4->password = "coton";
$user4->mail = "jus@salut.fr";
$user4->profil_url_image = "https://randomuser.me/api/portraits/lego/6.jpg";

$user5 = new User();
$user5->id = 5;
$user5->nickname = "tajai";
$user5->password = "okok";
$user5->mail = "taj@salut.fr";
$user5->profil_url_image = "https://randomuser.me/api/portraits/men/76.jpg";

$user6 = new User();
$user6->id = 6;
$user6->nickname = "roibab";
$user6->password = "roi";
$user6->mail = "bab@salut.fr";
$user6->profil_url_image = "https://randomuser.me/api/portraits/men/92.jpg";

$setup1 = new Setup();
$setup1->id = 1;
$setup1->title = "Setup gamer pro";
$setup1->price = 2899;
$setup1->creation_date_setup = date('d-m-Y');
$setup1->description = "GTX 2080TI, I9-9900K";
$setup1->url_photo_setup = "https://i.ibb.co/QNct4fH/1.jpg";
$setup1->user = $user1;

$setup2 = new Setup();
$setup2->id = 2;
$setup2->title = "Setup gamer 2020";
$setup2->price = 1520;
$setup2->creation_date_setup = date('d-m-Y');
$setup2->description = "GTX 2070, i7 7700k";
$setup2->url_photo_setup = "https://i.ibb.co/gFPPv02/2.jpg";
$setup2->user = $user2;

$setup3 = new Setup();
$setup3->id = 3;
$setup3->title = "Setup gamer 2020";
$setup3->price = 1280;
$setup3->creation_date_setup = date('d-m-Y');
$setup3->description = "AMD Ryzen 5 3600 (3.6 GHz), Asus TUF B450 PLUS GAMING, Asus GeForce RTX 2070 DUAL O8G EVO";
$setup3->url_photo_setup = "https://i.ibb.co/sgMmMfq/3.jpg";
$setup3->user = $user3;

$setup4 = new Setup();
$setup4->id = 4;
$setup4->title = "Setup 800 euros";
$setup4->price = 789;
$setup4->creation_date_setup = date('d-m-Y');
$setup4->description = "Processeur Intel i3-9100F, Carte mère Asus B365-Plus, RAM Corsair Vengeance LPX 2x8Go 2666MHz, EVGA GTX 1660 SC Ultra Gaming 6GB";
$setup4->url_photo_setup = "https://i.ibb.co/xh7wyXx/4.jpg";
$setup4->user = $user4;

$setup5 = new Setup();
$setup5->id = 5;
$setup5->title = "Setup 500 euros";
$setup5->price = 489;
$setup5->creation_date_setup = date('d-m-Y');
$setup5->description = "Ryzen 3 3200G, Asus PRIME B450, 2x8 Corsair 3000 Mhz, GTX 1650 SUPER ASUS TUF";
$setup5->url_photo_setup = "https://i.ibb.co/7RNyC6s/5.jpg";
$setup5->user = $user5;

$setup6 = new Setup();
$setup6->id = 6;
$setup6->title = "Setup 700 euros";
$setup6->price = 679;
$setup6->creation_date_setup = date('d-m-Y');
$setup6->description = "MSI A320M-A PRO MAX, Sapphire Radeon RX 580 PULSE, Cooler Master MasterBox Q300L, AMD Ryzen 5 3600";
$setup6->url_photo_setup = "https://i.ibb.co/VBM7SV7/6.jpg";
$setup6->user = $user6;

$items = array($setup1, $setup2, $setup3, $setup4, $setup5, $setup6);
?>

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
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" id="scrollEffectNavbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="" target="_blank">
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

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons row">

                    <div class="">
                        <li class="nav-item">
                            <button type="button" class="btn btn-outline-dark mr-3">S'inscrire</button>
                        </li>
                    </div>
                    <div class="">
                        <li class="nav-item">
                            <button type="button" class="btn btn-success">Se connecter</button>
                        </li>
                    </div>

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

                                    <div class="col-7">
                                        <p class="card-text"><i class="far fa-clock pr-2"></i><?php echo $item->creation_date_setup ?></p>
                                    </div>
                                    <div class="col-5">
                                        <span class="btn btn-outline-primary"><?php echo $item->price . "€" ?></span>
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
                        <div class="card-body">
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
    <script src="./js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>