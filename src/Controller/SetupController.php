<?php

namespace Controller;

use Entity\Setup;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class SetupController extends AbstractController
{
    public function create(Request $request): Response
    {
        $manager = $this->getOrm()->getManager();
        if ($request->getSession()->has('user')) {
            if ($request->request->has('title') && $request->request->has('price') && $request->request->has('description') && $request->request->has('url_photo_setup')) {
                if (strlen($request->request->get('title')) > 20) {
                    return $this->render("addConfig.php", array('errorMsg' => "Title should have maximum 20 characters"));
                } elseif (strlen($request->request->get('price')) > 8) {
                    return $this->render("addConfig.php", array('errorMsg' => "Price should have maximum 8 characters"));
                } else {
                    $newSetup = new Setup();
                    $newSetup->title = $request->request->get('title');
                    $newSetup->user = $request->getSession()->get('user');
                    $newSetup->price = $request->request->get('price');
                    $newSetup->description = $request->request->get('description');
                    $newSetup->url_photo_setup = $request->request->get('url_photo_setup');
                    $manager->persist($newSetup);
                    $manager->flush();
                    return $this->redirectToRoute('display');
                }
            } else {
                return $this->render("addConfig.php");
            }
        } else {
            return $this->redirectToRoute('login');
        }
    }
}
