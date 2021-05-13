<?php

namespace App\Controller;

use Exception;
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

        try{

            $url = 'https://events.scoocs.co/public/total_co2';
            $response = file_get_contents($url);
             $json_array=json_decode($response,true); 
             $emissionSaved=0;
             if($json_array["success"]){
                $emissionSaved=$json_array["total_co2"];
             }
            
            return $this->render('emission/index.html.twig', [
                'number' => $emissionSaved,
            ]);

        }catch(Exception $exception ){

            throw new $exception;

        }

     
    }
}
