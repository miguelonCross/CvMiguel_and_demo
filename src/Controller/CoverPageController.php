<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoverPageController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="index_CoverPage"))
     */
    public function index(): Response
    {
        return $this->render('cv.html.twig', [
            'controller_name' => 'CoverPageController',
        ]);
    }
}
