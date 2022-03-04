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
// #[Route('/chemin', name:'chemin')] manière simple de faire
// #[Route('/chemin', name:'chemin', methods: ['POST'], schemes: ['https'])]
//limitera les accès en post=affichera seulement en get, schemes redirigera vers https 
// si la requête est faite en http
    #[Route('/chemin/{name}', name:'chemin', methods: ['GET'], schemes: ['https'])]
//l'utilisation de {name} sert à indiquer des paramètres d'url en plus et d'entrer les 
//valeurs avec juste des '/' et pas page=.../valeur=...
    public function chemin(Request $request, string $name)//ou $name='qqchose'
    {
        // $request = request::createFromGlobals(); remplacé par l'injection de dépendance (request $request)
        //de la fonction chemin
        // dd($request); dump & die= affiche le contenu et arrête le code

        //$valeur ici va récupérer la valeur donnée dans le path
        // $valeur = $request->query->get('valeur');//ne sert plus ici car on a ajouté
        //{name} dans la route

        //on retourne la réponse sur la page
        // return new response("<h2>La valeur est $valeur</h2>");

        //$response renverra une valeur sinon une erreur 404
        $response = new Response("<h2>La valeur est $name</h2>",
        Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
        // dd($response);
        return ($response);
    }//requirements sert à apporter une condition (\d+=regex=résultat est un entier 
    //avec au moins une valeur.
    //defaults sert à insérer des données d'informations que l'on peut récupérer par dump
    #[Route('/test/{id}', name: 'testById', priority: 1, defaults:['title' => 'Page test'],
            requirements: ['id' => '\d+'], methods: ['GET'], schemes:['https'])]
    public function testById(Request $request, int $id)
    {
        // dd($request);
        return new Response("<h1>La valeur est $id</h1>");
    }
    #[Route('/test/{id}', name: 'testByName', methods: ['GET'], schemes:['https'])]
    public function testByName(string $name ='defaut')
    {
        return new Response("<h1>Le mot est $name</h1>");
    }
}

