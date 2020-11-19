<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroMayorController extends AbstractController
{
    /**
     * @Route("/libro/mayor", name="libro_mayor")
     */
    public function index(): Response
    {
        return $this->render('libro_mayor/index.html.twig', [
            'controller_name' => 'LibroMayorController',
        ]);
    }
}
