<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ActivityClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/activity")
     */
    public function index(Request $request, ActivityClientInterface $client): Response
    {
        $activities = $client->getActivityList(1, 30);
        return $this->render('admin/activity/index.html.twig', compact('activities'));
    }
}
