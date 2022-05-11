<?php

namespace App\Controller;

use App\Form\AccessFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessController extends AbstractController
{
    #[Route('client-access', name: 'access')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(AccessFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataForm = $form->getData();

            if ($dataForm['access_type'] === 'ftp') {
                dump($dataForm);
            }
        }

        return $this->render('client-access/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
