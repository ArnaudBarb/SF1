<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/user', name: 'user_')]
class UserController extends AbstractController
{
    const users = [
        ['id' => 1, 'name' => 'Michel'],
        ['id' => 3, 'name' => 'Jean'],
        ['id' => 7, 'name' => 'Truc'],
        ['id' => 22, 'name' => 'Jojo'],

    ];

    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('/user/index.html.twig', ['users' => self::users]);
    }
    #[Route(path: '/{id}', name: 'profile')]
    public function profile(string $id): Response
    {
        $userIndex = array_search($id, array_column(self::users, 'id'));

        if ($userIndex === false)
        {
            throw $this->createNotFoundException("User Doesn't exist");
        }
        return $this->render('/user/index.html.twig', ['users' => [self::users[$userIndex]]]);
    }
}
