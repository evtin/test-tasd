<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ActivityClientInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/activity")
     */
    public function index(Request $request,PaginatorInterface $paginator, ActivityClientInterface $client): Response
    {
        $activities = $client->getActivityList(1, 30);

        $pagination = $paginator->paginate(
            $activities, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2 /*limit per page*/
        );

        return $this->render('admin/activity/index.html.twig', ['pagination' => $pagination]);
    }
}
