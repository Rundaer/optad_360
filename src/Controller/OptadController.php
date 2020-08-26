<?php

namespace App\Controller;

use App\Entity\OptAd;
use App\Entity\OptAdAPI;
use App\Form\TableSortFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OptadController extends AbstractController
{
    /**
     * @Route("/optadApi", name="optad_formAPI")
     */
    public function fromAPI_Action(Request $request)
    {
        $apiArray = array(
            'key'       => OptAdAPI::KEY,
            'output'    => 'json'
        );
        $apiMethod = 'GET';
        $form = $this->createForm(TableSortFormType::class);
        
        
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $apiArray = array_merge($apiArray, $form->getData());
            $requestAPI = json_decode(OptAdAPI::callAPI($apiMethod, OptAdAPI::API_URL.strtolower($apiMethod), $apiArray));

            if (!empty($requestAPI) && isset($requestAPI->msg)) {
                return $this->render('optad/fromAPI.html.twig', [
                    'form'      => $form->createView(),
                    'msg'       => $requestAPI->msg
                ]);
            }

            return $this->render('optad/fromAPI.html.twig', [
                'data'      => $requestAPI->data,
                'settings'  => $requestAPI->settings,
                'headers'   => $requestAPI->headers,
                'form'      => $form->createView(),
                'test'      => $form->getData(),
            ]);
        }
        
        $requestAPI = json_decode(OptAdAPI::callAPI($apiMethod, OptAdAPI::API_URL.strtolower($apiMethod), $apiArray));

        return $this->render(
            'optad/fromAPI.html.twig',
            [
                'data'      => $requestAPI->data,
                'settings'  => $requestAPI->settings,
                'headers'   => $requestAPI->headers,
                'form'      => $form->createView(),
                'test'      => 'test',
            ]
        );
    }

    /**
     * @Route("/optadDb", name="optad_formDB")
     */
    public function fromDB_Action()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $optAds = $entityManager
            ->getRepository(OptAd::class)
            ->findAll();

        $downloadForm = $this->createFormBuilder()
            ->setAction($this->generateUrl("optad_save_to_database"))
            ->add("submit", SubmitType::class, ["label" => "Download data from API"])
            ->getForm();

            
        return $this->render(
            'optad/fromDB.html.twig',
            [
                "downloadForm" => $downloadForm->createView(),
                'data'         => $optAds,
            ]
        );
    }

    /**
     * @Route("/optadSave", name="optad_save_to_database")
     */
    public function downloadFromAPI(Request $request)
    {
        $apiArray = array(
            'key'       => OptAdAPI::KEY,
            'output'    => 'json',
            'startDate' => '2019-07-02',
            'endDate'   => '2020-07-02'
        );

        $apiMethod = 'GET';
        $requestAPI = json_decode(OptAdAPI::callAPI($apiMethod, OptAdAPI::API_URL.strtolower($apiMethod), $apiArray));
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($requestAPI->data as $item) {
            $row = new OptAd();
            
            $date = new DateTime($item[2]);

            $row
                ->setUrl($item[0])
                ->setTags($item[1])
                ->setDate($date)
                ->setEstimatedRevenue($item[3])
                ->setAdImpression($item[4])
                ->setCpm($item[5])
                ->setClicks($item[6])
                ->setCtr($item[7])
            ;
            $entityManager->persist($row);
            $entityManager->flush();
        }
        $this->addFlash("success", "Data from API downloaded!");

        return $this->redirectToRoute("optad_formDB");
    }
}
