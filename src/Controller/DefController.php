<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefController extends AbstractController
{
    #[Route('/def', name: 'def')]
    public function index(): Response
    {
        return $this->render('def/index.html.twig', [
            'controller_name' => 'DefController',
        ]);
    }
}
