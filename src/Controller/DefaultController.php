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
    #[Route('/toto/{name}', name:'toto', methods: ['GET'], schemes: ['https'])]
    public function toto(string $name)
    {
        $response = new Response("<h2>La valeur est $name</h2>",
        Response::HTTP_NOT_FOUND, ['content-type' => 'text/html']);
        // dd($response);
        return ($response);
    }
    #[Route('/test/{id}', name: 'testById', priority: 1, defaults:['title' => 'Page test'],requirements: ['id' => '\d+'], methods: ['GET'], schemes:['https'])]
    public function testById(Request $request, int $id)
    {
        // dd($request);
        return new Response("<h1>La valeur est $id</h1>");
    }
    #[Route('/{name}', name: 'testByName', methods: ['GET'], schemes:['https'])]
    public function testByName(string $name ='defaut')
    {
        return new Response("<h1>Le mot est $name</h1>");
    }
}

