<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessController extends AbstractController
{
    #[Route('/check-client-access', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('check-client-access/index.html.twig', [
            'controller_name' => 'AccessController',
        ]);
    }
}
