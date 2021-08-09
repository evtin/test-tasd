<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'pages' => range(1, 10)
        ]);
    }

    /**
     * @Route("/page/{id}")
     */
    public function page($id): Response
    {
        return $this->render('site/page.html.twig', [
            'page' => $id
        ]);
    }
}
