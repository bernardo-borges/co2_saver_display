<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmissionController extends AbstractController
{
    /**
     * @Route("/emission", name="emission")
     */
    public function index(): Response
    {


        $url = 'https://events.scoocs.co/public/total_co2';
        $response = file_get_contents($url);
         $json_array=json_decode($response,true); 
        $emissionSaved=$json_array["total_co2"];
        return $this->render('emission/index.html.twig', [
            'number' => $emissionSaved,
        ]);
    }
}
