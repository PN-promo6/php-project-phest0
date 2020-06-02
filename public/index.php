<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();
// session_reset();

use Entity\Setup;
use Entity\User;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$setupRepo = $orm->getRepository(Setup::class);

// $manager = $orm->getManager();
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
        break;
    case 'logout':
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userRepo = $orm->getRepository(User::class);
            $userId = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password']));
            if (count($userId) > 0) {
                $_SESSION['userId'] = $userId[0]->id;
                header('Location: ?action=display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/login.php";
            }
        } else {
            include "../templates/login.php";
        }
        break;
    case 'new':
        break;
    case 'display':
    default:
        $items = $setupRepo->findAll();
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            if (strpos($search, "@") === 0) {
                $userRepo = $orm->getRepository(User::class);
                $nickname = substr($search, 1);
                $users = $userRepo->findBy(array("nickname" => $nickname));
                if (count($users) == 1) {
                    $user = $users[0];
                    $items = $setupRepo->findBy(array("user" => $user->id));
                }
            } else {
                $items = $setupRepo->findBy(array("description" => $search));
            }
        } else {
            $items = $setupRepo->findAll();
        }
        include "../templates/display.php";
        break;
}
