<?php

namespace Controller;

use Entity\User;

class AuthController
{
    public function login()
    {
        global $userRepo;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userId = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password']));
            if (count($userId) > 0) {
                $_SESSION['user'] = $userId[0];
                header('Location: /display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/login.php";
            }
        } else {
            include "../templates/login.php";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: /display');
    }

    public function register()
    {
        global $userRepo;
        global $manager;
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
                header('Location: /display');
            }
        } else {
            include "../templates/register.php";
        }
    }
}
