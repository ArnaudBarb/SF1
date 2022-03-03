<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/', name:'index')]
    public function index()
    {
        return new response('<h1>Error 404</h1>');
    }

    #[Route('/chemin', name:'chemin')]
// #[Route('/chemin', name:'chemin', methods: ['POST'])] limitera les accès en post=affichera seulement en get

    public function chemin(request $request)
    {
        // $request = request::createFromGlobals(); remplacé par l'injection de dépendance (request $request)
        //de la fonction chemin
        // dd($request); dump & die= affiche le contenu et arrête le code

        //$valeur ici va récupérer la valeur donnée dans le path
        $valeur = $request->query->get('valeur');

        //on retourne la réponse sur la page
        // return new response("<h2>La valeur est $valeur</h2>");

        //$response renverra une valeur sinon une erreur 404
        $response = new Response("<h2>La valeur est $valeur</h2>",
        Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
        // dd($response);
        return ($response);
    }
}

