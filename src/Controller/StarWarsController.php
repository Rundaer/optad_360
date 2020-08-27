<?php

namespace App\Controller;

use App\Entity\Starwars\StarWarsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StarWarsController extends AbstractController
{
    /**
     * @Route("/starWars/", name="star_wars")
     */
    public function downloadAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $endpoints = json_decode(StarWarsAPI::callAPI('GET', StarWarsAPI::API_URL, null), true);

        foreach ($endpoints as $key => $endpoint) {
            $data = json_decode(file_get_contents($endpoint), true);

            // foreach ($variable as $key => $value) {
            //     # code...
            // }
        }



        return $this->render('star_wars/index.html.twig');
    }
}
