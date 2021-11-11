<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 *
 * @IsGranted("ROLE_ADMIN")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default", host="www.oleacode.com")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $this->getDoctrine()->getRepository(User::class)->findAll()
        ]);
    }

    /**
     * @Route("/cv", name="cv_default")
     */
    public function cv(): Response
    {
        return $this->render('cv.html.twig');
    }

    /**
     * @Route("/", name="api_default", host="demo.oleacode.com")
     */
    public function apiIndex(): Response
    {
        return $this->json($this->getDoctrine()->getRepository(User::class)->findAll());
    }
}
