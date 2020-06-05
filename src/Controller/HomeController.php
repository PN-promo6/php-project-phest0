<?php

namespace Controller;

use Entity\User;
use Entity\Setup;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
        $setupRepo = $this->getOrm()->getRepository(Setup::class);
        $userRepo = $this->getOrm()->getRepository(User::class);
        $items = $setupRepo->findAll();
        if ($request->query->has('search')) {
            $search = $request->query->get('search');
            if (strpos($search, "@") === 0) {
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
        $data = array(
            "items" => $items
        );
        return $this->render("display.php", $data);
    }
}
