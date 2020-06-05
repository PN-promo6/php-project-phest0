<?php

namespace Controller;

class HomeController
{
    public function display()
    {
        global $setupRepo;
        global $orm;
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
    }
}
