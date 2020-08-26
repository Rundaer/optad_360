<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StarWarsController extends AbstractController
{
    /**
     * @Route("/starWars/", name="star_wars")
     */
    public function downloadAction()
    {
        return $this->render('star_wars/index.html.twig', [
            'controller_name' => 'StarWarsController',
        ]);
    }
}
