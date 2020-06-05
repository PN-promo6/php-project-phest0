<?php

require __DIR__ . '/../vendor/autoload.php';

// session_start();
session_reset();

use Controller\AuthController;
use Controller\HomeController;
use Controller\SetupController;
use Entity\Setup;
use Entity\User;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$setupRepo = $orm->getRepository(Setup::class);
$userRepo = $orm->getRepository(User::class);
$manager = $orm->getManager();
// $item = $setupRepo->find(1);

// $item->title = "nouveau titre";
// $manager->persist($item);

// $newSetup = new Setup();
// $newSetup->title = "Nouveau titre 2 !!!!";
// $newSetup->user = $item->user;
// $newSetup->price = "300";
// $newSetup->description = "C'est juste un test";
// $newSetup->url_photo_setup = "https://i.ibb.co/QNct4fH/1.jpg";
// $manager->persist($newSetup);
// $manager->flush();

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        $AuthController = new AuthController();
        $AuthController->register();
        break;

    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
        break;

    case 'login':
        $AuthController = new AuthController();
        $AuthController->login();
        break;

    case 'new':
        $SetupController = new SetupController();
        $SetupController->create();
        break;

    case 'display':
    default:
        $homeController = new HomeController();
        $homeController->display();
        break;
}
