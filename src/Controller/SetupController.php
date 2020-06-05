<?php

namespace Controller;

use Entity\Setup;

class SetupController
{
    public function create()
    {
        global $manager;
        if (isset($_SESSION['user'])) {
            if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['url_photo_setup'])) {
                if (strlen($_POST['title']) > 20) {
                    $errorMsg = "Title should have maximum 20 characters";
                    include "../templates/addConfig.php";
                } elseif (strlen($_POST['price']) > 8) {
                    $errorMsg = "Price should have maximum 8 characters";
                    include "../templates/addConfig.php";
                } else {
                    $newSetup = new Setup();
                    $newSetup->title = $_POST['title'];
                    $newSetup->user = $_SESSION['user'];
                    $newSetup->price = $_POST['price'];
                    $newSetup->description = $_POST['description'];
                    $newSetup->url_photo_setup = $_POST['url_photo_setup'];
                    $manager->persist($newSetup);
                    $manager->flush();
                    header('Location: /display');
                }
            } else {
                include "../templates/addConfig.php";
            }
        } else {
            header('Location: /login');
        }
    }
}
