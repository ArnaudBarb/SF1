<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    // #[Route('/page', name: 'app_page')]
    // public function index(): Response
    // {
    //     // $husers = [
    //     //     ['husername' => 'Michel'],
    //     //     ['husername' => 'Francky'],
    //     //     ['husername' => 'Micheline'],
    //     //     ['husername' => 'Judith'],
    //     // ];

    //     // return $this->render('base.html.twig', ['husers' => $husers]);

    //     // $continents = [

    //     //     ['continentname' => 'Europe'],
    //     //     ['continentname' => 'Asie'],
    //     //     ['continentname' => 'Océanie'],
    //     //     ['continentname' => 'Amérique du Nord'],
    //     //     ['continentname' => 'Amérique du Sud'],
    //     // ];
    //     // return $this->render('base.html.twig', ['continents' => $continents]);

    //     // return $this->file('fichier.txt');va télécharger le fichier.txt dans le dossier téléchargement
    //     // return $this->json([
    //     //     'message' => 'Welcome to your new controller!',
    //     //     'path' => 'src/Controller/PageController.php',
    //     // ]);//retourne le contenu en format json
    // }
    #[Route('/machin', name:'app_machin')]
    public function machin(): Response
    {
        throw $this->createNotFoundException('Welcome to the void');
    }
}


