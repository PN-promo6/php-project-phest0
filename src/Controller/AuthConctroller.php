<?php

namespace Controller;

use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{
    public function login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        if ($request->request->has('username') && $request->request->has('password')) {
            $userId = $userRepo->findBy(array("nickname" => $request->request->get('username'), "password" => $request->request->get('password')));
            var_dump($userId);
            if (count($userId) > 0) {
                $request->getSession()->set('user', $userId[0]);
                return $this->redirectToRoute('display');
            } else {
                $data = array(
                    'errorMsg' => "Wrong login and/or password."
                );
                return $this->render("login.php", $data);
            }
        } else {
            return $this->render("login.php");
        }
    }

    public function logout(Request $request): Response
    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();
        if ($request->request->has('mail') && $request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $userPseudo = $userRepo->findBy(array("nickname" => $request->request->get('username')));
            $userMail = $userRepo->findBy(array("mail" => $request->request->get('mail')));
            if (count($userPseudo) > 0 || count($userMail) > 0) {
                return $this->render("register.php", array('errorMsg' => "Username or mail is already pick, please use another Username/Mail !"));
            } elseif ($request->request->get('password') != $request->request->get('passwordRetype')) {
                return $this->render("register.php", array('erroMsg' => "Password retype is not similar than your first password"));
            } elseif (strlen(trim($request->request->get('username'))) <= 4) {
                return $this->render("register.php", array('erroMsg' => "Username should have at least 4 characters"));
            } elseif (strlen(trim($request->request->get('password'))) <= 8) {
                return $this->render("register.php", array('erroMsg' => "Password should have at least 8 characters"));
            } elseif (count($userPseudo) == 0 && count($userMail) == 0) {
                $newUser = new User();
                $newUser->nickname = trim($request->request->get('username'));
                $newUser->mail = trim($request->request->get('mail'));
                $newUser->password = trim($request->request->get('password'));
                $manager->persist($newUser);
                $manager->flush();
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render("register.php");
        }
    }
}
