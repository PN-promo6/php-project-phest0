<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();
// session_reset();

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
        if (isset($_POST['mail']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $userPseudo = $userRepo->findBy(array("nickname" => $_POST['username']));
            $userMail = $userRepo->findBy(array("mail" => $_POST['mail']));
            if (count($userPseudo) > 0 || count($userMail) > 0) {
                $errorMsg = "Username or mail is already pick, please use another Username/Mail !";
                include "../templates/register.php";
            } elseif ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Password retype is not similar than your first password";
                include "../templates/register.php";
            } elseif (strlen(trim($_POST['username'])) <= 4) {
                $errorMsg = "Username should have at least 4 characters";
                include "../templates/register.php";
            } elseif (strlen(trim($_POST['password'])) <= 8) {
                $errorMsg = "Password should have at least 8 characters";
                include "../templates/register.php";
            } elseif (count($userPseudo) == 0 && count($userMail) == 0) {
                $newUser = new User();
                $newUser->nickname = trim($_POST['username']);
                $newUser->mail = trim($_POST['mail']);
                $newUser->password = trim($_POST['password']);
                $manager->persist($newUser);
                $manager->flush();
                header('Location: /?action=display');
            }
        } else {
            include "../templates/register.php";
        }
        break;

    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userId = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password']));
            if (count($userId) > 0) {
                $_SESSION['user'] = $userId[0];
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
                    header('Location: ?action=display');
                }
            } else {
                include "../templates/addConfig.php";
            }
        } else {
            header('Location: /?action=login');
        }
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
